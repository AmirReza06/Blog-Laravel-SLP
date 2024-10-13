@extends('layout.master')

@section('content')
    <main>
        <form action="{{ route('search') }}" method="GET" class="mb-4">
            <div class="input-group mb-3">
                <input style="border-radius: 20px" type="text" name="search" class="form-control" placeholder="جستجو ..."/>
                <button style="border-radius: 20px" class="btn btn-primary me-2" type="submit"><i class="bi bi-search"></i></button>
            </div>
        </form>
    <main>
        <!-- Content Section -->
        <section class="mt-4">

                <!-- Posts Content -->
                <div class="col-lg-12">
                        <div class="col">
                            <div class="alert alert-secondary">
                                پست های مرتبط با کلمه [ {{ $_GET['search'] }} ]
                            </div>
                            @if($posts->count() == 0)
                            <div class="alert alert-danger">
                                مقاله مورد نظر پیدا نشد !!!!
                            </div>
                        </div>
                    <div class="row g-3">
                        @else
                            @foreach($posts as $post)
                                <div class="col-sm-4 mb-2">
                                    <div class="card shadow">
                                        <img src="{{ asset("./assets/images/$post->iamge")}}" class="card-img-top" alt="post-image"
                                        />
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="card-title fw-bold">{{ $post->title }}</h5>
                                                <div><span class="badge text-bg-primary text-white">{{ $post->category->title }}</span>
                                                </div>
                                            </div>
                                            <p class="card-text text-secondary pt-3">
                                                {{ substr($post->body, 0 , 400) . '...' }}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="{{ route('index.single', ['id' => $post->id]) }}" class="btn btn-sm btn-warning">مشاهده</a>
                                                <p class="fs-7 mb-0">
                                                    نویسنده : {{ $post->author }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
        </section>
    </main>
@endsection
