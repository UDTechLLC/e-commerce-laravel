<?php

namespace App\Http\Controllers\Web;

use App\Http\Resources\Web\PostsResource;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('web.blog.index');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function all(Request $request)
    {
        $category = $request->get('filter');

        return PostsResource::collection(Post::published()->filterCategory($category)->paginate(20));
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post)
    {
        $post->increment('view_count');

        return view('web.blog.show', [
            'post' => $post,
            'topPosts' => Post::published()->orderByDesc('view_count')->limit(4)->get()
        ]);
    }
}
