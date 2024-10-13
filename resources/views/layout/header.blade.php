<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Maghalex</title>

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
        crossorigin="anonymous"
    />

    <link rel="stylesheet" href="{{ asset("./assets/css/style.css") }}" />
</head>

<body>
<div class="container py-3">
    <header class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
        <a href="" style="color: #030000" class="fs-3 fw-medium text-decoration-none">Maghalex</a>

        <nav class="d-inline-flex mt-2 mt-md-0 me-md-auto">
            <a class="me-3 py-2 link-body-emphasis text-decoration-none {{ (str_contains($_SERVER['REQUEST_URI'], 'home') ? 'fw-bold text-dark' : '') }}" href="{{ route('index') }}">صفحه اصلی</a>
            <a class="me-3 py-2 link-body-emphasis text-decoration-none {{ (str_contains($_SERVER['REQUEST_URI'], 'content') ? 'fw-bold text-dark' : '') }}" href="{{ route('content') }}">ارتباط با ما</a>
            @if(auth()->check())
                <a class="me-3 py-2 link-body-emphasis text-decoration-none {{ (str_contains($_SERVER['REQUEST_URI'], 'admin-panel') ? 'fw-bold text-dark' : '') }}" href="{{ route('index.adminPanel') }}">پنل ادمین</a>
            @endif
        </nav>
    </header>

