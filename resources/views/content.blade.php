@extends('layout.master')

@section('content')
    @if(session()->has('error'))
        <div class="alert alert-warning">{{ session('error') }}</div>
    @elseif(session()->has('success'))
        <div class="alert alert-success text-success">{{ session('success') }}</div>
    @endif
<section>
    <div style="direction: ltr" class="row">
        <div class="col-lg-7">
            <div class="row justify-content-center">
                <div class="col">
{{--                    <div class="card shadow p-3">--}}
                        <form action="{{ route('post.content') }}" method="POST" class="form row g-4 mt-5" dir="rtl">
                            @csrf
                            <h3 class="fs-3 mt-0" dir="rtl"> <i dir="ltr" class="bi bi-send fs-3 text-dark ms-2 me-2">ارسال پیام</i></h3>
                            <hr class="mt-4" />
                            <div class="col-12 col-sm-6 col-md-6">
                                <label class="mb-2">نام :</label>
                                <input type="text" name="name" class="form-control shadow">
                                <div class="text-form text-danger">@error('name'){{ $message }}@enderror</div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                                <label class="mb-2">ایمیل :</label>
                                <input type="email" name="email" class="form-control shadow">
                                <div class="text-form text-danger">@error('email'){{ $message }}@enderror</div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                                <label class="mb-2">عنوان :</label>
                                <input type="text" name="title" class="form-control shadow">
                                <div class="text-form text-danger">@error('title'){{ $message }}@enderror</div>
                            </div>
                            <div class="mt-4">
                                <label class="mb-2">متن پیام :</label>
                                <textarea name="body" class="form-control shadow" rows="5"></textarea>
                                <div class="text-form text-danger">@error('body'){{ $message }}@enderror</div>
                            </div>
                            <button type="submit" name="sendMessage" class="w-100 btn btn-primary mt-4 shadow">ارسال</button>
                        </form>
{{--                    </div>--}}
                </div>
            </div>
        </div>
        <div style="text-align: center" dir="rtl" class="col-lg-5 mt-4">
            <br>
            <br>
            <br>
                <a class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2 {{ str_contains($_SERVER['REQUEST_URI'], 'comments') ? 'text-secondary' : '' }}"
                   href="{{ route('index.comment') }}">
                    <a  href="#" class="text-decoration-none"><i class="bi bi-telegram fs-1 text-primary ms-2"></i></a><br><br>
                    <a href="#"><i class="bi bi-whatsapp fs-1 text-success ms-2"></i></a><br><br>
                    <a href="#"><i style="color:#b72b2b" class="bi bi-instagram fs-1 ms-2"></i></a><br><br>
                    <a href="#"><i style="color: #00aaf6" class="bi bi-twitter fs-1 ms-2"></i></a><br><br>
                    <a href="#"><i class="bi bi-linkedin fs-1 text-primary ms-2"></i></a><br><br>
                    <a href="#"><i style="color: #3434ce" class="bi bi-facebook fs-1 ms-2"></i></a>

                </a>

        </div>
</section>
@endsection
