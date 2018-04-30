<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Blog\StorePostRequest;
use App\Http\Resources\Web\PostsResource;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     *
     * @return void
     *
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\InvalidBase64Data
     * @throws \Throwable
     */
    public function store(StorePostRequest $request)
    {
        /** @var Post $post */
        $post = $this->createPost($request->all());

        $this->saveImageBase64($request->get('imagePreview'), $post, 'preview');
        $this->saveImageBase64($request->get('image'), $post, 'banner');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function show(Post $post)
    {
        $this->insertBanner($post);

        return view('admin.blog.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $post
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post'       => json_encode(new PostsResource($post)),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $post
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back();
    }

    /**
     * Create post.
     *
     * @param array $data
     *
     * @return mixed
     */
    private function createPost(array $data)
    {
        /** @var User $user */
        $user = \Auth::user();
        //dd($data);
        /** @var Post $post */
        $post = Post::create([
            'author_id'        => $user ? $user->getKey() : null,
            'slug'             => $data['slug'],
            'title'            => $data['title'],
            'content'          => $data['content'],
            'meta_title'       => $data['metaTags']['title'],
            'meta_description' => $data['metaTags']['description'],
            'meta_keywords'    => $data['metaTags']['keywords'],
            'published'        => $data['published'],
            'posted_at'        => $data['postedAt'],
        ]);

        $category = Category::find($data['categoryId']);

        $post->category()->associate($category);
        $post->save();

        return $post;
    }

    /**
     * Attach image to model.
     *
     * @param string $base64Data
     * @param Post $post
     * @param string $collection
     *
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\InvalidBase64Data
     */
    private function saveImageBase64(string $base64Data, Post $post, string $collection)
    {
        $imageType = $this->getImageTypeFromBase64($base64Data);

        $post->addMediaFromBase64($base64Data)
            ->usingFileName("{$post->slug}_{$collection}.{$imageType}")
            ->toMediaCollection($collection);
    }

    /**
     * Get image extension from base64 format string.
     *
     * @param string $data
     *
     * @return mixed
     */
    private function getImageTypeFromBase64(string $data)
    {
        $pos = strpos($data, ';');

        return explode('/', substr($data, 0, $pos))[1];
    }

    /**
     * Insert banner to content.
     *
     * @param Post $post
     *
     * @return null|string|string[]
     * @throws \Throwable
     */
    private function insertBanner(Post $post)
    {
        $content = $post->content;

        $banner = $this->getBanner($content);

        if (null !== $banner) {
            $template = view('admin.banners.partials.template', ['banner' => $banner])->render();

            $post->content = preg_replace("/@banner\((\d+)\)/", $template, $content);
        }
    }

    /**
     * Get banner from content.
     *
     * @param string $content
     *
     * @return mixed
     */
    private function getBanner(string $content)
    {
        preg_match('/@banner\((\d+)\)/', $content, $m);

        $bannerId = $m[1] ?? null;

        return $bannerId ? Banner::find($bannerId) : null;
    }
}
