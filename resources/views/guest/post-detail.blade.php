@extends('layouts.guest')

@section('content')
    <header class="masthead" style="background-image: url('/{{$post->header_img}}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading font-family-open-sans ">
                        <h1 class="fw-bold">{{$post->title}}</h1>
                        <h2 class="subheading">{{$post->sub_title}}</h2>
                        <p class="text-white fw-bold fs-3">
                            Tags: @foreach ($post->tags as $tag)
                                <span class="px-2 py-1 bg-info shadow font-monospace rounded fs-4">{{$tag}}</span>
                            @endforeach
                        </p>
                        <span class="meta">
                            Posted by
                            <a href="#!" class="text-decoration-none">Digitaliz</a>
                            {{$post->created_at}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7" id="blog-container">
                   {!! $post->content !!}
                </div>
            </div>
        </div>
    </article>
@endsection
