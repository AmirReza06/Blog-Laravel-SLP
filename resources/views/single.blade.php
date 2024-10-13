@extends('layout.master')

@section('content')
    <main>
        <form action="{{ route('search') }}" method="GET" class="mb-4">
            <div class="input-group mb-3">
                <input style="border-radius: 20px" type="text" name="search" class="form-control" placeholder="جستجو در مقاله ها ..."/>
                <button style="border-radius: 20px" class="btn btn-primary me-2" type="submit"><i class="bi bi-search"></i></button>
            </div>
        </form>
    </main>
    <!-- Content -->
    <section class="mt-4">
        @if(session()->has('error'))
            <div class="alert alert-warning">{{ session('error') }}</div>
        @elseif(session()->has('success'))
            <div class="alert alert-success text-success">{{ session('success') }}</div>
        @endif
        <div class="row">
            <!-- Posts & Comments Content -->
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    <!-- Post Section -->
                    <div class="col">
                        <div class="card shadow">
                            <img
                                src="{{asset('./assets/images/posts/' . $post->image)}}"
                                class="card-img-top"
                                height="600px"
                                alt="post-image"
                            />
                            <div class="card-body">
                                <div
                                    class="d-flex justify-content-between"
                                >
                                    <h5 class="card-title fw-bold">
                                        {{ $post->title }}
                                    </h5>
                                    <div>
                                        <span style="border-radius: 5px" class="p-1 text-bg-primary text-white">{{ $post->category->title }}</span>
                                    </div>
                                </div>
                                <p
                                    class="card-text text-dark text-justify pt-3"
                                >
                                    {{ $post->body }}
                                </p>
                                <div>
                                    <p class="fs-6 mt-5 mb-0">
                                        نویسنده : {{ $post->author }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="mt-4" />

                    <!-- Comment Section -->
                    <div class="col">
                        <!-- Comment Form -->
                        <div class="card shadow">
                            <div class="card-body">
                                <p class="fw-bold fs-5">ارسال کامنت</p>

                                <form action="{{ route('add.comment' , ['id' => $post->id]) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">نام :</label>
                                        <input type="text" name="name" class="form-control">
                                        <div style="direction: ltr;" class="text-form text-danger">@error('name'){{ $message }}@enderror</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">متن کامنت :</label>
                                        <textarea class="form-control" name="comment" rows="3"></textarea>
                                        <div style="direction: ltr;" class="text-form text-danger">@error('comment'){{ $message }}@enderror</div>
                                    </div>
                                    <button type="submit" name="addComment" class="btn btn-dark">ارسال</button>
                                </form>
                            </div>
                        </div>

                        <hr class="mt-4" />
                        <!-- Comment Content -->
                        <p class="fw-bold fs-6">تعداد کامنت : {{ $comments->count() }}</p>
                        @foreach($comments as $comment)
                        <div class="card bg-light-subtle mb-3 shadow">
                            <div class="card-body">
                                <div class="d-flex align-items-center ">
                                    <img src="{{ asset("./assets/images/profile.png") }}" width="45" height="45" alt="user-profle"/>

                                    <h5 class="card-title me-2 mb-0">
                                        {{ $comment->name }}
                                    </h5>
                                </div>
                                <p class="card-text pt-3 pr-3">
                                    {{ $comment->comment }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

@endsection
