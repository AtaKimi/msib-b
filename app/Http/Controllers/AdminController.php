<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $blogs_count = Blog::all()->count();
        $users_count = User::all()->count();
        return view('admin.dashboard', compact('blogs_count', 'users_count'));
    }
}
