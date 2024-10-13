    @include("layout.header")


        <!-- Content Section -->
        @yield('content')
        <!-- Subscribue Section -->
        <div style="border-radius: 20px" class="bg-dark p-4 mt-5 shadow">
            <div class="container py-4">
                <div class="row d-flex justify-content-center py-3">
                    <div class="col-md-6">
                        <h2 style="font-size: 22px;color: white" class="mt-5">مشترک شدن در خبرنامه ما</h2>
                        <span style="color: #718096;">دریافت ایمیل درباره آخرین مقاله ها و پیشنهادات جدید</span>
                    </div>
                    <div class="col-sm-4">
                        <form action="{{ route('store.Subscriber') }}" class="subscribe-form" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="mb-2">
                                    <label style="color: white">نام :</label>
                                    <input type="text" name="name" class="form-control">
                                    <div  style="direction: ltr" class="text-form text-danger">@error('name'){{ $message }}@enderror</div>
                                </div>
                                <div class="mb-2">
                                    <label style="color: white" class="mb-1">ایمیل :</label>
                                    <input style="border: white" name="email" type="text" class="form-control">
                                    <div style="direction: ltr" class="text-form text-danger">@error('email'){{ $message }}@enderror</div>
                                </div>
                                <button type="submit" name="addSubscriber" class="btn btn-primary">ثبت</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </main>
    @include("layout.footer")
