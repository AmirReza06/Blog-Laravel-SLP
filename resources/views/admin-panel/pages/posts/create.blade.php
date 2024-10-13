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
                    <h1 class="fs-3 fw-bold">ایجاد مقاله</h1>
                </div>

                <!-- Posts -->
                <div class="mt-4">
                    <form action="{{ route('store.post') }}" class="row g-4" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 col-sm-6 col-md-4">
                            <label class="form-label">عنوان مقاله</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" />
                            <div class="text-form text-danger">@error('title'){{ $message }}@enderror</div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <label class="form-label">نویسنده مقاله</label>
                            <input type="text" name="author" value="{{ old('author') }}" class="form-control" />
                            <div class="text-form text-danger">@error('author'){{ $message }}@enderror</div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <label class="form-label">دسته بندی مقاله</label>
                            <select class="form-select" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
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
                            <textarea class="form-control" rows="6"  name="body">{{ old('body') }}</textarea>
                            <div class="text-form text-danger">@error('body'){{ $message }}@enderror</div>
                        </div>

                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-dark">ایجاد</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection

