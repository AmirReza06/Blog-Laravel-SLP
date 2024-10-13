<!-- Sidebar Section -->
<div
    class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary"
>
    <div
        class="offcanvas-md offcanvas-end bg-body-tertiary"
        tabindex="-1"
        id="sidebarMenu"
    >
        <div class="offcanvas-header">
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="offcanvas"
                data-bs-target="#sidebarMenu"
            ></button>
        </div>

        <div
            class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto"
        >
            <ul class="nav flex-column pe-3">
                <li class="nav-item">
                    <a class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2 {{ str_contains($_SERVER['REQUEST_URI'], 'home') ? 'text-secondary' : '' }}" href="{{ route('index.adminPanel') }}">
                        <i class="bi bi-house-fill fs-4 text-dark"></i>
                        <span class="fw-bold">داشبورد</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2 {{ str_contains($_SERVER['REQUEST_URI'], 'posts') ? 'text-secondary' : '' }}" href="{{ route('index.post') }}">
                        <i class="bi bi-file-earmark-image-fill fs-4 text-primary"></i>
                        <span class="fw-bold">مقالات</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2 {{ str_contains($_SERVER['REQUEST_URI'], 'categories') ? 'text-secondary' : '' }}"
                        href="{{ route('index.category') }}"
                    >
                        <i
                            class="bi bi-folder-fill fs-4 text-warning"
                        ></i>

                        <span class="fw-bold">دسته بندی</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2 {{ str_contains($_SERVER['REQUEST_URI'], 'comments') ? 'text-secondary' : '' }}"
                        href="{{ route('index.comment') }}"
                    >
                        <i
                            class="bi bi-chat-left-text-fill fs-4 text-success"
                        ></i>

                        <span class="fw-bold">کامنت ها</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2 {{ str_contains($_SERVER['REQUEST_URI'], 'messages') ? 'text-secondary' : '' }}"
                        href="{{ route('index.message') }}">
                        <i class="bi bi-chat-left-text-fill fs-4 text-secondary"></i>
                        <span class="fw-bold">پیام ها</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2 "
                        href="{{ route('post.logout') }}">
                        <i class="bi bi-box-arrow-right fs-4 text-danger"></i>
                        <span class="fw-bold">خروج</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2 "
                        href="{{ route('index') }}">
                        <i class="bi bi-box-arrow-right fs-4 text-info"></i>
                        <span class="fw-bold">رفتن به صفحه اصلی</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
