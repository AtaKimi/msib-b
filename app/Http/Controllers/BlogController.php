<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(50);
        $blogs_count = Blog::all()->count();
        return view('admin.blog.index', compact('blogs', 'blogs_count'));
    }

    public function search(Request $request) {
        $blogs = DB::table('blogs')->where('title', 'like', '%'. $request['search'] .'%')->orWhere('tags', 'like', '%'.$request['search'].'%');
        $blogs_count = $blogs->count();
        $blogs = $blogs->paginate(50);
        return view('admin.blog.index', compact('blogs', 'blogs_count'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'tags' => 'required|string',
            'header_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
        ]);

        $imageName = time() . '.' . $request->header_img->extension();
        $request->header_img->move(public_path('assets/img/header_img'), $imageName);
        $validatedData['header_img'] = 'assets/img/header_img/' . '' . $imageName;

        $blog = new Blog;
        $blog->fill($validatedData);
        $blog->save();

        return redirect()->route('admin-blog-index');
    }

    public function uploadImg(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Blog $blog, Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'tags' => 'required|string',
            'header_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
        ]);

        if ($request->hasFile('header_img')) {
            // Delete the old header image if it exists.
            if ($blog->header_img) {
                File::delete(public_path($blog->header_img));
            }

            // Upload the new header image.
            $imageName = time() . '.' . $request->header_img->extension();
            $request->header_img->move(public_path('assets/img/header_img'), $imageName);
            $validatedData['header_img'] = 'assets/img/header_img/' . '' . $imageName;
        } else {
            $validatedData['header_img'] = $blog->header_img;
        }

        $blog->fill($validatedData);
        $blog->save();

        return redirect()->route('admin-blog-index', $blog->id);
    }

    public function destroy(Blog $blog)
    {
        // Delete the header image.
        if ($blog->header_img) {
            File::delete(public_path($blog->header_img));
        }

        $blog->delete();

        return redirect()->route('admin-blog-index');
    }
}
