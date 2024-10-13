<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>

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

    <link rel="stylesheet" href="{{ asset('./assets/css/style.css') }}" />
</head>

<body>
<header style="background-color: #7087a6" class="sticky-top flex-md-nowrap p-2 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-5 text-white" href="{{ route('profile', ['id' => auth()->user()->id]) }}">
        <img style="" src="{{ asset('./assets/images/profile.png') }}" height="40px" class="me-0">
        {{ auth()->user()->name }}
    </a>

    <button
        class="ms-2 nav-link px-3 text-white d-md-none"
        type="button"
        data-bs-toggle="offcanvas"
        data-bs-target="#sidebarMenu"
    >
        <i class="bi bi-justify-left fs-2"></i>
    </button>
</header>
