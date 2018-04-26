<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Blog\StorePostRequest;
use App\Models\Banner;
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
            'posts' => Post::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
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
        preg_match('/@banner\((\d+)\)/', $post->content, $m);
        $bannerId = $m[1];
        $template = view('admin.banners.partials.template', ['banner' => Banner::find($bannerId)])->render();
        $post->content = preg_replace("/@banner\((\d+)\)/", $template, $post->content);
        $post->save();

        return view('admin.blog.show', [
            'post' => $post,
            'hello' => 'Hello, world',
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
        dd($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $post
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back();
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    private function createPost(array $data)
    {
        $user = \Auth::user();

        return Post::create([
            'author_id' => $user ? $user->getKey() : null,
            'slug'      => $data['slug'],
            'title'     => $data['title'],
            'content'   => $data['content'],
            'published' => $data['published'],
            'posted_at' => $data['postedAt'],
        ]);
    }

    /**
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
     * @param string $data
     *
     * @return mixed
     */
    private function getImageTypeFromBase64(string $data)
    {
        $pos  = strpos($data, ';');

        return explode('/', substr($data, 0, $pos))[1];
    }
}
