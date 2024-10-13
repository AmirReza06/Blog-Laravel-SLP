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
                    <h1 class="fs-3 fw-bold">مشاهده پیام</h1>
                </div>

                <!-- Posts -->
                <div class="mt-4">
                    <form class="row g-4">
                        <div class="col-12 col-sm-6 col-md-4">
                            <label class="form-label">id :</label>
                            <input disabled type="text" name="id" class="form-control" value="{{ $message->id }}"/>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <label class="form-label">نام :</label>
                            <input disabled type="text" name="name" class="form-control" value="{{ $message->name }}"/>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <label class="form-label">ایمیل :</label>
                            <input disabled type="text" name="email" class="form-control" value="{{ $message->email }}"/>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <label class="form-label">عنوان :</label>
                            <input disabled type="text" name="title" class="form-control" value="{{ $message->title }}"/>
                        </div>

                        <div class="col-12">
                            <label class="form-label">متن پیام :</label>
                            <textarea disabled name="body" class="form-control" rows="5">
                                {{ $message->body }}
                            </textarea>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection

