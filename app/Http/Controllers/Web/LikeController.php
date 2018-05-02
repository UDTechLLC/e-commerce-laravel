<?php

namespace App\Http\Controllers\Web;

use App\Models\Post;
use App\Http\Controllers\Controller;

/**
 * Class LikeController
 * @package App\Http\Controllers\Web
 */
class LikeController extends Controller
{
    public function like(Post $post)
    {
        $post->increment('likes_count');
    }

    public function dislike(Post $post)
    {
        $post->decrement('likes_count');
    }
}
