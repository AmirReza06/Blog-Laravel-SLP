<!-- Footer Section -->
<footer class="text-center pt-4 my-md-5 pt-md-5 border-top">
    <section style="border-radius: 20px; background-color: #d5e0e0" class="footer shadow mb-3">

        <div class="box-container">

            <div class="box">
                <h3>دسترسی سریع</h3>
                <a href="{{ route('index') }}"> <i class="bi-house fas fa-arrow-right"></i> صفحه اصلی </a>
                <a href="{{ route('content') }}"> <i class="bi-telephone fas fa-arrow-right"></i> ارتباط با ما </a>
                <a href="{{ (str_contains($_SERVER['REQUEST_URI'], 'home') ? '#categories' : route('index') . '#categories') }}"> <i class="bi-table fas fa-arrow-right"></i> دسته بندی ها </a>
                <a href="{{ (str_contains($_SERVER['REQUEST_URI'], 'home') ? '#posts' : route('index') . '#posts') }}"> <i class="bi-folder fas fa-arrow-right"></i> مقالات </a>
            </div>


            <div class="box">
                <h3>شبکه های اجتماعی</h3>
                <a href=""> <i class="bi-facebook fab fa-facebook-f"></i> facebook </a>
                <a href="#"> <i class="bi-twitter fab fa-twitter"></i> twitter </a>
                <a href="#"> <i class="bi-instagram fab fa-instagram"></i> instagram </a>
                <a href="#"> <i class="bi-telegram fab fa-linkedin"></i> telegram </a>
            </div>

        </div>
        <div class="row flex-column mt-2">
            <div>
                <p class="">کلیه حقوق محتوا این سایت متعلق به وب سایت maghalex.ir میباشد</p>
            </div>
            <div>
                <a href="#"><i class="bi bi-phone fs-3 text-dark ms-2"></i></a>
                <a href="#"><i class="bi bi-tablet fs-3 text-dark ms-2"></i></a>
                <a href="#"><i class="bi bi-laptop fs-2 text-dark"></i></a>
            </div>
        </div>
    </section>

</footer>
</div>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"
></script>
</body>
</html>
