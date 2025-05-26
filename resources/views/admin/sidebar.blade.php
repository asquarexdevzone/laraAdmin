<div class="leftside-menu">

    @php
        $logoPath = auth()->user()->logo ? asset('uploads/logos/' . auth()->user()->logo) : asset('images/asquarex-logo.png');
    @endphp

    <!-- Brand Logo Light -->
    <a href="{{ url('/admin/dashboard') }}" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ $logoPath }}" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{ $logoPath }}" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="{{ url('/admin/dashboard') }}" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{ $logoPath }}" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="{{ $logoPath }}" alt="small logo">
        </span>
    </a>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-item">
                <a href="{{'/admin/dashboard'}}" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{'/admin/product-master'}}" aria-expanded="false" aria-controls="sidebarForms"
                    class="side-nav-link">
                    <i class="ri-table-line"></i>
                    <span> Product Master </span>

                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{'/admin/category-master'}}" aria-expanded="false" aria-controls="sidebarForms"
                    class="side-nav-link">
                    <i class="ri-table-line"></i>
                    <span> Category Master </span>

                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{'/admin/color-master'}}" aria-expanded="false" aria-controls="sidebarForms"
                    class="side-nav-link">
                    <i class="ri-table-line"></i>
                    <span> Color Master </span>

                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{'/admin/sizes-master'}}" aria-expanded="false" aria-controls="sidebarForms"
                    class="side-nav-link">
                    <i class="ri-table-line"></i>
                    <span> Size Master </span>

                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{'/admin/catalogue-master'}}" aria-expanded="false" aria-controls="sidebarForms"
                    class="side-nav-link">
                    <i class="ri-table-line"></i>
                    <span> Catalogue Master </span>

                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{'/admin/blog-master'}}" aria-expanded="false" aria-controls="sidebarForms"
                    class="side-nav-link">
                    <i class="ri-table-line"></i>
                    <span> Blog Master </span>

                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{'/admin/gallery-images'}}" aria-expanded="false" aria-controls="sidebarForms"
                    class="side-nav-link">
                    <i class="ri-table-line"></i>
                    <span> Gallery Images </span>

                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{'/admin/site-setting'}}" aria-expanded="false" aria-controls="sidebarForms"
                    class="side-nav-link">
                    <i class="ri-table-line"></i>
                    <span> Site Setting </span>

                </a>
            </li>


        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>