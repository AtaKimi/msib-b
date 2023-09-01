<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index() {
        $posts = Blog::paginate(10);
        $posts_count = Blog::all()->count();
        foreach ($posts as $post) {
            $post->tags = explode(';',$post->tags);
        }
        return view('guest.index', compact('posts', 'posts_count'));
    }

    public function about() {
        return view('guest.about');
    }

    public function contact() {
        return view('guest.contact');
    }

    public function post() {
        return view('guest.post');
    }

    public function postDetail($id) {
        $post = Blog::findOrFail($id);
        $post->tags = explode(';',$post->tags);
        return view('guest.post-detail', ["post" => $post]);
    }

    public function ckeditor() {
        return view('ckeditor');
    }
}
