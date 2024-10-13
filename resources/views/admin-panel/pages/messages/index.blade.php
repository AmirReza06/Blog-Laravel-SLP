@extends('admin-panel.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Section -->
            @include('admin-panel.layout.sidebar')
            <!-- Main Section -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
                >
                    <h1 class="fs-3 fw-bold">پیام ها</h1>
                </div>
                @if(session()->has('error'))
                    <div class="alert alert-warning">{{ session('error') }}</div>
                @elseif(session()->has('success'))
                    <div class="alert alert-success text-success">{{ session('success') }}</div>
                @endif
                <!-- Comments -->
                <h1 class="fs-3 fw-bold text-secondary mt-4">پیام های اخیر</h1>
                <div class="mt-4 mb-4">
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
                            @if($disapproveMessages->count() == 0)
                                <div class="alert alert-danger">پیامی یافت نشد.</div>
                            @else
                                @foreach($disapproveMessages as $disapproveMessage)
                                    <tr>
                                        <th>{{ $disapproveMessage->id }}</th>
                                        <td>{{ $disapproveMessage->name }}</td>
                                        <td>{{ $disapproveMessage->email }}</td>
                                        <td>{{ $disapproveMessage->title }}</td>
                                        <td>
                                            {{ substr($disapproveMessage->body, 0 ,50) . '...' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('approve.message', ['id' => $disapproveMessage->id]) }}" class="btn btn-sm btn-outline-primary">در انتظار پاسخ</a>
                                            <a href="{{ route('show.message', ['id' => $disapproveMessage->id]) }}" class="btn btn-sm btn-outline-dark">مشاهده</a>
                                            <a href="{{ route('delete.message', ['id' => $disapproveMessage->id]) }}" class="btn btn-sm btn-outline-danger">حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <h1 class="fs-3 fw-bold text-secondary mt-4">پیام های پاسخ داده شده</h1>
                <div class="mt-4 mb-4">
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
                            @if($approveMessages->count() == 0)
                                <div class="alert alert-danger">پیام پاسخ داده ای یافت نشد.</div>
                            @else
                                @foreach($approveMessages as $approveMessage)
                                    <tr>
                                        <th>{{ $approveMessage->id }}</th>
                                        <td>{{ $approveMessage->name }}</td>
                                        <td>{{ $approveMessage->email }}</td>
                                        <td>{{ $approveMessage->title }}</td>
                                        <td>
                                            {{ substr($approveMessage->body,0 , 50) . '...' }}
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-outline-dark disabled">پاسخ داده شده</a>

                                            <a href="{{ route('delete.message', ['id' => $approveMessage->id]) }}" class="btn btn-sm btn-outline-danger">حذف</a>
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
