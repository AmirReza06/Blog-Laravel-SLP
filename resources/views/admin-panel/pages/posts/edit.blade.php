@extends('admin-panel.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Section -->
            @include('admin-panel.layout.sidebar')

            <!-- Main Section -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
                >
                    <h1 class="fs-3 fw-bold">ویرایش مقاله</h1>
                </div>

                <!-- Posts -->
                <div class="mt-4">
                    <form action="{{ route('update.post', ['id' => $post->id]) }}" class="row g-4" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12 col-sm-6 col-md-4">
                            <label class="form-label">عنوان مقاله</label>
                            <input type="text" name="title" class="form-control" value="{{ $post->title }}"/>
                            <div class="text-form text-danger">@error('title'){{ $message }}@enderror</div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <label class="form-label">نویسنده مقاله</label>
                            <input type="text" name="author" class="form-control" value="{{ $post->author }}"/>
                            <div class="text-form text-danger">@error('author'){{ $message }}@enderror</div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <label class="form-label"
                            >دسته بندی مقاله</label
                            >
                            <select class="form-select" name="category_id">
                                @foreach($categories as $category)
                                    <option {{ ($category->id == $post->category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <label for="formFile" class="form-label">تصویر مقاله</label>
                            <input class="form-control" name="image" type="file" />
                            <div class="text-form text-danger">@error('image'){{ $message }}@enderror</div>
                        </div>

                        <div class="col-12">
                            <label for="formFile" class="form-label">متن مقاله</label>
                            <textarea class="form-control" name="body" rows="8">{{ $post->body }}</textarea>
                            <div class="text-form text-danger">@error('body'){{ $message }}@enderror</div>
                        </div>


                        <div class="col-12 col-sm-6 col-md-4">
                            <img class="rounded" src="{{ asset("./assets/images/posts/$post->image")}}" width="300" />
                        </div>

                        <div class="col-12">
                            <button type="submit" name="update" class="btn btn-dark">ویرایش</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection

