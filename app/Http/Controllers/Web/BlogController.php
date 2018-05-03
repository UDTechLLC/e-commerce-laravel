<?php

namespace App\Http\Controllers\Web;

use App\Http\Resources\Web\PostsResource;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Post;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('web.blog.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function all()
    {
        return PostsResource::collection(Post::published()->paginate(20));
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post)
    {
        $post->increment('view_count');
        $this->insertBanner($post);

        return view('web.blog.show', [
            'post'     => $post,
            'topPosts' => Post::published()->orderByDesc('view_count')->limit(4)->get()
        ]);
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
}
