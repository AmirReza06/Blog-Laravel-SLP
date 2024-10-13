@extends('admin-panel.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Section -->
            @include('admin-panel.layout.sidebar')
            <!-- Main Section -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
                >
                    <h1 class="fs-3 fw-bold">کامنت ها</h1>
                </div>

                <!-- Comments -->
                    <h1 class="fs-3 fw-bold text-secondary mt-5">کامنت های تایید نشده</h1>
                <div class="mt-4 mb-4">
                    <div class="table-responsive small">
                        <table class="table table-hover align-middle">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>نام</th>
                                <th>متن کامنت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($disapproveComments->count() > 0)
                                @foreach($disapproveComments as $disapproveComment)
                                    <tr>
                                        <th>{{ $disapproveComment->id }}</th>
                                        <td>{{ $disapproveComment->name }}</td>
                                        <td>
                                            {{ $disapproveComment->comment }}
                                        </td>
                                        <td>
                                            <a href="{{ route('approve.comment', ['id' => $disapproveComment->id]) }}" class="btn btn-sm btn-outline-primary">در انتظار تایید</a>

                                            <a href="{{ route('delete.comment', ['id' => $disapproveComment->id]) }}" class="btn btn-sm btn-outline-danger">حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <div class="alert alert-danger">کامنتی یافت نشد.</div>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                    <h1 class="fs-3 fw-bold text-secondary mt-5">کامنت های تایید شده</h1>
                    <div class="mt-4 mb-4">
                        <div class="table-responsive small">
                            <table class="table table-hover align-middle">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>نام</th>
                                    <th>متن کامنت</th>
                                    <th>وضغیت</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($approveComments->count() > 0)
                                    @foreach($approveComments as $approveComment)
                                        <tr>
                                            <th>{{ $approveComment->id }}</th>
                                            <td>{{ $approveComment->name }}</td>
                                            <td>
                                                {{ $approveComment->comment }}
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-outline-dark disabled">تایید شده</a>

                                                <a href="{{ route('delete.comment', ['id' => $approveComment->id]) }}" class="btn btn-sm btn-outline-danger">حذف</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <div class="alert alert-danger">کامنتی یافت نشد.</div>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
            </main>
        </div>
    </div>
@endsection
