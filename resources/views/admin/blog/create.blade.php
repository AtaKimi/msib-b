@extends('layouts.admin')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row container-fluid bg-light rounded mx-0 p-3">
            <h1 class="font-family-open-sans text-center fw-bold text-black-50 mb-3">Create a blog</h1>
            <div class="bg-light rounded">
                <form action="{{ route('admin-blog-store') }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Slaying Dragons">
                        <label for="title">Title</label>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="sub_title" name="sub_title"
                            placeholder="How to slay a dragon">
                        <label for="sub_title">Subtitle</label>
                        @error('sub_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="header_img">Image:</label>
                        <input type="file" name="header_img" id="header_img"
                            class="form-control @error('header_img') is-invalid @enderror" accept="image/jpg">

                        @error('header_img')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="tags" name="tags"
                            placeholder="How to slay a dragon">
                        <label for="tags">Tags</label>
                        @error('tags')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <p class="text-warning">Setiap dipisahkan oleh tanda titik koma (;)</p>
                    <div class="form-group mb-3">
                        <textarea name="content" id="editor"></textarea>
                        @error('content')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end"> <button type="submit"
                            class="btn btn-primary px-4 py-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '{{ route('admin-blog-upload-img') . '?_token=' . csrf_token() }}',
                }
            })
            .catch(error => {
            });
    </script>
@endsection
