@extends('admin-panel.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Section -->
            @include('admin-panel.layout.sidebar')
            <!-- Main Section -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
                >
                    <h1 class="fs-3 fw-bold">ایجاد دسته بندی</h1>
                </div>
                @if(session()->has('error'))
                    <div class="alert alert-warning">{{ session('error') }}</div>
                @elseif(session()->has('success'))
                    <div class="alert alert-success text-success">{{ session('success') }}</div>
                @endif
                <!-- Posts -->
                <div class="mt-4">
                    <form action="{{ route('store.category') }}" class="row g-4" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 col-sm-6 col-md-4">
                            <label class="form-label">تصویر دسته بندی</label>
                            <input type="file" name="image" class="form-control" />
                            <div class="text-form text-danger">@error('image'){{ $message }}@enderror</div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4">
                            <label class="form-label">عنوان دسته بندی</label>
                            <input type="text" name="title" class="form-control" />
                            <div class="text-form text-danger">@error('title'){{ $message }}@enderror</div>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-dark">
                                ایجاد
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection
