@extends('layouts.guest')

@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('/assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1 class="fw-bold font-family-open-sans">Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container px-4 px-lg-5 bg-body-tertitary">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @foreach ($posts as $post)
                    <div class="post-preview font-family-open-sans">
                        <a href="{{ route('post-detail', $post->id) }}" class="text-decoration-none">
                            <h2 class="post-title fw-bold ">{{ $post->title }}</h2>
                            <h3 class="post-subtitle fw-light fs-2">{{ $post->sub_title }}</h3>
                        </a>
                        <p class="text-muted fs-5">
                            Tags: @foreach ($post->tags as $tag)
                                <span class="px-3 py-1 bg-body-secondary rounded-pill fw-bold fs-6">{{$tag}}</span>
                            @endforeach
                        </p>
                        <p class="post-meta">
                            Posted by
                            <a href="#!" class="text-black">Digitaliz</a>
                            {{ $post->created_at }}
                        </p>
                    </div>
                    <hr class="my-4" />
                @endforeach
                @if ($posts_count > 50)
                    {!! $posts->withQueryString()->links('pagination::bootstrap-5') !!}
                @endif
            </div>
        </div>
    </div>
@endsection
