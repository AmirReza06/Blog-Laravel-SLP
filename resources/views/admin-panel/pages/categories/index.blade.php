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
                    <h1 class="fs-3 fw-bold">دسته بندی ها</h1>

                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="{{ route('create.category') }}" class="btn btn-sm btn-warning">
                            ایجاد دسته بندی
                        </a>
                    </div>
                </div>
                @if(session()->has('error'))
                    <div class="alert alert-warning">{{ session('error') }}</div>
                @elseif(session()->has('success'))
                    <div class="alert alert-success text-success">{{ session('success') }}</div>
                @endif
                <!-- Categories -->
                <div class="mt-4">
                    <h4 class="text-secondary fw-bold">دسته بندی های اخیر</h4>
                    <div class="table-responsive small">
                        <table class="table table-hover align-middle">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>تصویر</th>
                                <th>عنوان</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($categories->count() > 0)
                                @foreach($categories as $category)
                                    <tr>
                                        <th>{{ $category->id }}</th>
                                        <td><img width="100" height="50px" class="rounded" src="{{ asset('assets/images/categories/' . $category->image) }}" alt="image"></td>
                                        <td>{{ $category->title }}</td>
                                        <td>
                                            <a href="{{ route('edit.category', ['id' => $category->id]) }}" class="btn btn-sm btn-outline-dark">ویرایش</a>
                                            <a href="{{ route('delete.category', ['id' => $category->id]) }}" class="btn btn-sm btn-outline-danger">حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <div class="alert alert-danger">دسته بندی یافت نشد.</div>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Deleted Category -->
                <div class="mt-5">
                    <h4 class="text-secondary fw-bold">دسته بندی های حذف شده</h4>
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
                            @if($trashedCategories->count() > 0)
                                @foreach($trashedCategories as $trashedCategory)
                                    <tr>
                                        <th>{{ $trashedCategory->id }}</th>
                                        <td>{{ $trashedCategory->title }}</td>
                                        <td>{{ $trashedCategory->author }}</td>
                                        <td>
                                            <a href="{{ route('forceDelete.category', ['id' => $trashedCategory->id]) }}" class="btn btn-sm btn-outline-danger">حذف کامل</a>
                                            <a href="{{ route('remake.category', ['id' => $trashedCategory->id]) }}" class="btn btn-sm btn-outline-info">بازگردانی</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <div class="alert alert-danger">دسته بندی یافت نشد.</div>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection


