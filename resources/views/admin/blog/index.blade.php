@extends('layouts.admin')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row min-vh-100 bg-light rounded align-items-center justify-content-center mx-0">
            <div class="bg-light rounded h-100 p-4">
                <div class="row">
                    <form action="{{ route('admin-blog-search') }}" method="GET">
                        <div class="input-group mb-3 col-lg-9">
                            <input type="text" class="form-control py-3 fs-5" placeholder="Search blog"
                                aria-label="Username" name="search" aria-describedby="basic-addon1">
                            <span class="input-group-text"><button type="submit" class="btn btn-primary"><i
                                        class="bi bi-search" style="font-size: 25px"></i></button></span>
                        </div>
                    </form>

                </div>
                @if (!empty($blogs))
                    <h1 class="mb-4">Blog list</h1>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">tags</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($blogs as $blog)
                                <tr>
                                    <th scope="row">{{ $blog->id }}</th>
                                    <td class="text-break"<a href="{{ route('post-detail', $blog->id) }}"
                                        class="text-decoration-none text-primary">{{ $blog->title }}</a></td>
                                    <td class="text-break">{{ $blog->tags }}</td>
                                    <td class="text-break">{{ $blog->created_at }}</td>
                                    <td><a href="{{ route('admin-blog-edit', $blog->id) }}"
                                            class="btn btn-primary w-100 mb-1">Edit</a>
                                        <form action="{{ route('admin-blog-destroy', $blog->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger w-100">Delete</button>
                                        </form>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($blogs_count > 50)
                        {!! $blogs->withQueryString()->links('pagination::bootstrap-5') !!}
                    @endif
                @else
                    <h1>Empty</h1>
                @endif


            </div>
        </div>
    </div>
@endsection
