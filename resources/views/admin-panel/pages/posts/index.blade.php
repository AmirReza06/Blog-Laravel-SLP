@extends('admin-panel.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin-panel.layout.sidebar')

            <!-- Main Section -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
                >
                    <h1 class="fs-3 fw-bold">مقالات</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="{{ route('create.post') }}" class="btn btn-sm btn-primary">
                            ایجاد مقاله
                        </a>
                    </div>
                </div>
                @if(session()->has('error'))
                    <div class="alert alert-warning">{{ session('error') }}</div>
                @elseif(session()->has('success'))
                    <div class="alert alert-success text-success">{{ session('success') }}</div>
                @endif
                <!-- Posts -->
                <div class="mt-4">
                    <h4 class="text-secondary fw-bold">مقالات </h4>
                    <div class="table-responsive small">
                        <table class="table table-hover align-middle">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>عنوان</th>
                                <th>نویسنده</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($posts->count() > 0)
                                @foreach($posts as $post)
                                    <tr>
                                        <th>{{ $post->id }}</th>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->author }}</td>
                                        <td>
                                            <a href="{{ route('edit.post', ['id' => $post->id]) }}" class="btn btn-sm btn-outline-success">ویرایش</a>
                                            <a href="{{ route('delete.post', ['id' => $post->id]) }}" class="btn btn-sm btn-outline-danger">حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <div class="alert alert-danger">مقاله یافت نشد.</div>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Deleted Posts -->
                <div class="mt-5">
                    <h4 class="text-secondary fw-bold">مقالات حذف شده</h4>
                    <div class="table-responsive small">
                        <table class="table table-hover align-middle">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>عنوان</th>
                                <th>نویسنده</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($trashedPosts->count() > 0)
                                @foreach($trashedPosts as $trashedPost)
                                    <tr>
                                        <th>{{ $trashedPost->id }}</th>
                                        <td>{{ $trashedPost->title }}</td>
                                        <td>{{ $trashedPost->author }}</td>
                                        <td>
                                            <a href="{{ route('remake.post', ['id' => $trashedPost->id]) }}" class="btn btn-sm btn-outline-info">بازگردانی</a>
                                            <a href="{{ route('forceDelete.post', ['id' => $trashedPost->id]) }}" class="btn btn-sm btn-outline-danger">حذف کامل</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <div class="alert alert-danger">مقاله یافت نشد.</div>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection


