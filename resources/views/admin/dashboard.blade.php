@extends('layouts.admin')

@section('content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="bi bi-book text-primary" style="font-size: 40px"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Blogs</p>
                        <h6 class="mb-0">{{$blogs_count}}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="bi bi-person text-primary" style="font-size: 40px"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total users</p>
                        <h6 class="mb-0">{{$users_count}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->
@endsection