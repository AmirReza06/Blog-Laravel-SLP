@extends('admin-panel.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin-panel.layout.sidebar')

            <!-- Main Section -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="fs-3 fw-bold">داشبورد</h1>
                </div>
                @if(session()->has('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @elseif(session()->has('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @elseif(session()->has('warning'))
                    <div class="alert alert-warning">{{ session('warning') }}</div>
                @endif

                <!-- Recently Posts -->
                <div class="mt-4">
                    <h4 class="text-secondary fw-bold">مقالات اخیر</h4>
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
                                            <a href="{{ route('edit.post', ['id' => $post->id]) }}" class="btn btn-sm btn-outline-dark">ویرایش</a>
                                            <a href="{{ route('delete.post', ['id' => $post->id]) }}" class="btn btn-sm btn-outline-danger">حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <div class="alert alert-danger">مقاله یافت نشد.</div>
                            @endif
                            </tbody>
                        </table>
{{--                        {{ $posts->links('admin-panel.layout.pagination') }}--}}
                    </div>
                </div>

                <!-- Recently Comments -->
                <div class="mt-4">
                    <h4 class="text-secondary fw-bold">کامنت های اخیر</h4>
                    <div class="table-responsive small">
                        <table class="table table-hover align-middle">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>نام</th>
                                <th>متن کامنت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($comments->count() > 0)
                                @foreach($comments as $comment)
                            <tr>
                                <th>{{ $comment->id }}</th>
                                <td>{{ $comment->name }}</td>
                                <td>
                                    {{ $comment->comment }}
                                </td>
                                <td>
                                    @if($comment->status)
                                        <a class="btn btn-sm btn-outline-dark disabled">تایید شده</a>
                                    @else
                                        <a href="{{ route('approve.comment', ['id' => $comment->id]) }}" class="btn btn-sm btn-outline-primary">در انتظار تایید</a>
                                    @endif

                                    <a href="{{ route('delete.comment', ['id' => $comment->id]) }}" class="btn btn-sm btn-outline-danger">حذف</a>
                                </td>
                            </tr>
                                @endforeach
                            @else
                                <div class="alert alert-danger">کامنتی یافت نشد.</div>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Categories -->
                <div class="mt-4">
                    <h4 class="text-secondary fw-bold">دسته بندی</h4>
                    <div class="table-responsive small">
                        <table class="table table-hover align-middle">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>عنوان</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($categories->count() > 0)
                                @foreach($categories as $category)
                            <tr>
                                <th>{{ $category->id }}</th>
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

                <!-- Messages -->
                <div class="mt-4">
                    <h4 class="text-secondary fw-bold">پیام های اخیر</h4>
                    <div class="table-responsive small">
                        <table class="table table-hover align-middle">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>نام</th>
                                <th>ایمیل</th>
                                <th>عنوان</th>
                                <th>متن پیام</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($messages->count() == 0)
                                <div class="alert alert-danger">پیامی یافت نشد.</div>
                            @else
                                @foreach($messages as $message)
                                    <tr>
                                        <th>{{ $message->id }}</th>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->title }}</td>
                                        <td>
                                            {{ substr($message->body, 0 ,50) . '...' }}
                                        </td>
                                        <td>
                                            @if($message->status == 0)
                                                <a href="{{ route('approve.message', ['id' => $message->id]) }}" class="btn btn-sm btn-outline-primary">در انتظار پاسخ</a>
                                            @else
                                                <a class="btn btn-sm btn-outline-dark disabled">پاسخ داده شده</a>
                                            @endif
                                            <a href="{{ route('show.message', ['id' => $message->id]) }}" class="btn btn-sm btn-outline-info">مشاهده</a>
                                            <a href="{{ route('delete.message', ['id' => $message->id]) }}" class="btn btn-sm btn-outline-danger">حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection


