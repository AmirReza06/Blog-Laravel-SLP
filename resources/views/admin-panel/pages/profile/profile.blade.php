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
                    <h1 class="fs-3 fw-bold">صفحه پروفایل</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="{{ route('create.profile', ['id' => auth()->user()->id]) }}" class="btn btn-sm btn-primary">
                            افزودن ادمین
                        </a>
                        <a href="{{ route('edit.profile', ['id' => auth()->user()->id]) }}" class="btn btn-sm btn-dark me-2">
                            ویرایش پروفایل
                        </a>
                        <a href="{{ route('delete.profile', ['id' => auth()->user()->id]) }}" class="btn btn-sm btn-danger me-2">
                            حذف اکانت
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
                    <form action="{{ route('edit.profile', ['id' => auth()->user()->id]) }}" class="g-4" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 col-sm-6 col-md-4 mt-4">
                            <label class="form-label">id :</label>
                            <input disabled type="text" name="id" class="form-control" value="{{ $user->id }}" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 mt-4">
                            <label class="form-label">نام :</label>
                            <input disabled type="text" name="name" class="form-control" value="{{ $user->name }}" />
                            <div class="text-form text-danger">@error('name'){{ $message }}@enderror</div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 mt-4">
                            <label class="form-label">ایمیل :</label>
                            <input disabled type="text" name="email" class="form-control" value="{{ $user->email }}" />
                            <div class="text-form text-danger">@error('email'){{ $message }}@enderror</div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 mt-4">
                            <label class="form-label">رمز عبور :</label>
                            <input disabled type="password" name="password" class="form-control" value="{{ $user->password }}" />
                        </div>
                        <div class="col-12 mt-4 mb-5">
                            <a href="{{ route('index.adminPanel') }}" class="btn btn-danger"> خروج </a>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection

