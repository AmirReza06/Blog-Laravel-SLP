@extends("layout.master")

@section("content")
    <!-- Search Section -->
    <main>
        <form action="{{ route('search') }}" method="GET" class="mb-4">
            <div class="input-group mb-3">
                <input style="border-radius: 20px" type="text" name="search" class="form-control" placeholder="جستجو در مقاله ها ..."/>
                <button style="border-radius: 20px" class="btn btn-primary me-2" type="submit"><i class="bi bi-search"></i></button>
            </div>
        </form>
    @if(session()->has('error'))
        <div class="alert alert-warning">{{ session('error') }}</div>
    @elseif(session()->has('success'))
        <div class="alert alert-success text-success">{{ session('success') }}</div>
    @endif
    @include("layout.slider")

    <div class="text-center pt-4 pt-md-5" id="categories">
        <div class="mb-1">
            <h3 class="text-secondary fw-bold">دسته بندی ها</h3>
        </div>
        <hr class="mb-5">
        <div class="row flex-column">
            <div class="mb-5">
                <div class="col-lg-12">
                    <div class="row g-3">
                @if($categories->count() > 0)
                @foreach($categories as $category)
                        <div class="col-sm-3 mb-2">
                            <div>
                                <a href="{{ route('index', 'category=' . $category->id) }}" class="me-3 py-2 link-body-emphasis text-decoration-none">
                                    <img
                                        width="100px"
                                        height="100px"
                                        src="{{ asset('assets/images/categories/' . $category->image) }}">
                                    <div style="color: #000000" class="me-3 fs-4 mt-1">
                                    {{ $category->title }}
                                    </div>
                                </a>
                            </div>
                        </div>
                @endforeach
                @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Section -->
    <section class="mt-4" id="posts">
            <!-- Posts Content -->
        <div class="mb-1 text-center">
            <h3 class="text-secondary fw-bold">مقالات</h3>
        </div>
        <hr class="mb-5">
            <div class="col-lg-12">
                <div class="row g-3">
                    @if($posts != null)
                        @if(isset($_GET['category']))
                            @foreach($posts as $post)
                                <div class="col-sm-4 mb-2">
                                    <div class="card shadow">
                                        <img src="{{ asset('./assets/images/posts/' . $post->image)}}" class="card-img-top shadow" height="250px" alt="post-image"
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
                        @else
                    @foreach($posts as $post)
                        <div class="col-sm-4 mb-2">
                            <div class="card shadow">
                                <img src="{{ asset('./assets/images/posts/' . $post->image)}}" class="card-img-top shadow" height="250px" alt="post-image"
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
                    @else
                        <div class="alert alert-danger">هیچ مقاله ای در این دسته بندی  یافت نشد.</div>
                    @endif
                </div>
                <br>
                {{ $posts->links('layout.pagination') }}
            </div>

@endsection
