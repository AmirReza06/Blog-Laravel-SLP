<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>php tutorial || blog project || webprog.io</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
        crossorigin="anonymous"
    />

    <link rel="stylesheet" href="{{ asset('./assets/css/styleForAdminPanel.css') }}" />
</head>
<body class="auth">
<main class="form-signing w-500 m-auto">
    <form class="form" action="{{ route('store.profile', ['id' => auth()->user()->id]) }}" method="POST">
        @csrf
        <div class="fs-2 fw-bold text-center mb-4">افزودن ادمین</div>
        @if(session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @elseif(session()->has('success'))
            <div class="alert alert-success text-success">{{ session('success') }}</div>
        @elseif(session()->has('warning'))
            <div class="alert alert-success text-warning">{{ session('warning') }}</div>
        @endif
        <div class="mb-3">
            <label class="form-label">نام</label>
            <input type="text" name="name" class="form-control shadow" value="{{ old('name') }}" />
            <div class="text-form text-danger">@error('name'){{ $message }}@enderror</div>
        </div>

        <div class="mb-3">
            <label class="form-label">ایمیل</label>
            <input type="email" name="email" class="form-control shadow" value="{{ old('email') }}" />
            <div class="text-form text-danger">@error('email'){{ $message }}@enderror</div>
        </div>

        <div class="mb-3">
            <label class="form-label">رمز عبور</label>
            <input type="password" name="password" class="form-control shadow" />
            <div class="text-form text-danger">@error('password'){{ $message }}@enderror</div>
        </div>

        <div class="mb-3">
            <label class="form-label">تکرار رمز عبور</label>
            <input type="password" name="password_confirmation" class="form-control shadow" />
            <div class="text-form text-danger">@error('password_confirmation'){{ $message }}@enderror</div>
        </div>
        <button class="w-100 btn btn-dark mt-4 shadow" type="submit">
            افزودن
        </button>
    </form>
</main>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"
></script>
</body>
</html>
