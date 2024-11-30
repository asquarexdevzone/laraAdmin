<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Your Catalogues Here | LaravelAdmin</title>
    @include('admin.include')
    <!-- Datatables css -->
    <link href="{{asset('vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css')}}"
        rel="stylesheet" type="text/css" />
    <link href="{{asset('vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css')}}" rel="stylesheet"
        type="text/css" />
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">


        <!-- ========== Topbar Start ========== -->
        @include('admin.topbar')
        <!-- ========== Topbar End ========== -->


        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.sidebar')
        <!-- ========== Left Sidebar End ========== -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Catalogue Master</a>
                                        </li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Catalogue Master</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title mb-0"> Add Catalogue Here </h4>
                                </div>
                                <div class="card-body">

                                    @if(session('success'))
                                        <div id="alert-success" class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <form action="{{ route('add.catalogue') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div id="basicwizard">
                                            <div>
                                                <div class="row">
                                                    <div class="col-12">

                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label"
                                                                for="catalogue-name">Catalogue Name :</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control"
                                                                    id="catalogue-name" name="catalogue_name"
                                                                    placeholder="Enter Catalogue Name" required>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="product">Select
                                                                Product :</label>
                                                            <div class="col-md-9">
                                                                <select class="form-select" id="product" name="product"
                                                                    required>
                                                                    <option value="" disabled selected>Select product
                                                                    </option>
                                                                    @foreach ($products as $product)
                                                                        <option value="{{ $product->id }}">
                                                                            {{ $product->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="category">Select
                                                                Category :</label>
                                                            <div class="col-md-9">
                                                                <select class="form-select" id="category"
                                                                    name="category" required>
                                                                    <option value="" disabled selected>Select Category
                                                                    </option>
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}">
                                                                            {{ $category->name }}
                                                                        </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="size">Select
                                                                Size :</label>
                                                            <div class="col-md-9">
                                                                <select class="form-select" id="size" name="size"
                                                                    required>
                                                                    <option value="" disabled selected>Select Size
                                                                    </option>
                                                                    @foreach ($sizes as $size)
                                                                        <option value="{{ $size->id }}">
                                                                            {{ $size->name }}
                                                                        </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label"
                                                                for="categoryname">Catalogue Link :</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control"
                                                                    id="catalogue-link" name="catalogue_link"
                                                                    placeholder="Enter Catalogue link If Any" required>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="image">Choose
                                                                Coverpage :</label>
                                                            <div class="col-md-9">
                                                                <input type="file" id="catalogue-coverpage"
                                                                    class="form-control" name="catalogue_coverpage">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="image">Choose
                                                                Catalogue From Device :</label>
                                                            <div class="col-md-9">
                                                                <input type="file" id="catalogue-pdf"
                                                                    class="form-control" name="catalogue_pdf">
                                                            </div>
                                                        </div>

                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->

                                                <ul class="list-inline wizard mb-0">
                                                    <li class="next list-inline-item float-end">
                                                        <button type="submit" class="btn btn-info">Add Catalogue <i
                                                                class="ri-check-line ms-1"></i></button>
                                                        <a href="javascript:void(0);" class="btn btn-danger">Cancel<i
                                                                class="ri-close-fill ms-1"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> <!-- tab-content -->
                                </div> <!-- end #basicwizard-->
                                </form>


                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div><!-- end row -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="header-title">Your Added Catalogues</h4>
                                <p class="text-muted mb-0">
                                    Play With Your Catalogues 😉
                                </p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-sm">
                                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Catalogue ID</th>
                                                <th>Catalogue Name</th>
                                                <th>Product</th>
                                                <th>Category</th>
                                                <th>Size</th>
                                                <th>Cover Page</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($catalogues as $catalogue)
                                                <tr>
                                                    <td>{{ $catalogue->id }}</td>
                                                    <td>{{ $catalogue->name }}</td>
                                                    <td>{{ $catalogue->product_name }}</td>
                                                    <td>{{ $catalogue->category_name }}</td>
                                                    <td>{{ $catalogue->size_name }}</td>
                                                    <td><img src="{{ asset('images/catalogues_coverpages/' . $catalogue->image) }}"
                                                            alt="image" class="img-fluid avatar-md rounded"></td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="text-reset fs-16 px-1"
                                                            onclick="editCatalogue({{ $catalogue->id }})">
                                                            <i class="ri-settings-3-line" data-bs-toggle="modal"
                                                                data-bs-target="#catalogue-modal"></i></a>
                                                        <a href="/admin/delete-catalogue/{{ $catalogue->id }}"
                                                            class="text-reset fs-16 px-1"> <i
                                                                class="ri-delete-bin-2-line"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive-->
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div> <!-- container -->
            </div> <!-- content -->

            <div id="catalogue-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form id="updateCatalogueForm" method="POST" action="#" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="catalogue_name" class="form-label">Update Catalogue Name </label>
                                    <input class="form-control" type="text" id="catalogue_name" name="catalogueName"
                                        required placeholder="Catalogue Name">
                                </div>
                                <div class="mb-3">
                                    <label for="cat_name" class="form-label">Select Product To Update </label>
                                    <div class="col-md-12">
                                        <select class="form-select" id="productId" name="productName" required>
                                            <option value="" disabled selected>Select product
                                            </option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">
                                                    {{ $product->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="cat_name" class="form-label">Select Category To Update </label>
                                    <div class="col-md-12">
                                        <select class="form-select" id="categoryId" name="categoryName" required>
                                            <option value="" disabled selected>Select Category
                                            </option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="cat_name" class="form-label">Select Size To Update </label>
                                    <div class="col-md-12">
                                        <select class="form-select" id="sizeId" name="sizeName" required>
                                            <option value="" disabled selected>Select Size
                                            </option>
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size->id }}">
                                                    {{ $size->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="catalogue_link" class="form-label">Update Catalogue Link </label>
                                    <input class="form-control" type="text" id="catalogueLink" name="catalogueLink"
                                        required placeholder="Catalogue Link">
                                </div>
                                <div class="mb-3">
                                    <label for="cat_name" class="form-label">Choose Category Image </label>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Current Image</label>
                                        <input type="text" id="currentCoverPage" class="form-control" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Update Image</label>
                                        <input class="form-control" type="file" id="image" name="update_coverpage">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="cat_name" class="form-label">Choose Catalogue PDF </label>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Current PDF</label>
                                        <input type="text" id="currentPdf" class="form-control" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Update PDF</label>
                                        <input class="form-control" type="file" id="image" name="update_pdf">
                                    </div>
                                </div>
                                <div class="mb-3 text-center">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <!-- Footer Start -->
            @include('admin.footer')
            <!-- end Footer -->
        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
            <h5 class="text-white m-0">Theme Settings</h5>
            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>

        <div class="offcanvas-body p-0">
            <div data-simplebar class="h-100">
                <div class="p-3">
                    <h5 class="mb-3 fs-16 fw-bold">Color Scheme</h5>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form-switch card-switch mb-1">
                                <input class="form-check-input" type="checkbox" name="data-bs-theme"
                                    id="layout-color-light" value="light">
                                <label class="form-check-label" for="layout-color-light">
                                    <img src="images/layouts/light.png" alt="" class="img-fluid">
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check form-switch card-switch mb-1">
                                <input class="form-check-input" type="checkbox" name="data-bs-theme"
                                    id="layout-color-dark" value="dark">
                                <label class="form-check-label" for="layout-color-dark">
                                    <img src="images/layouts/dark.png" alt="" class="img-fluid">
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                        </div>
                    </div>

                    <div id="layout-width">
                        <h5 class="my-3 fs-16 fw-bold">Layout Mode</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-layout-mode"
                                        id="layout-mode-fluid" value="fluid">
                                    <label class="form-check-label" for="layout-mode-fluid">
                                        <img src="images/layouts/light.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Fluid</h5>
                            </div>

                            <div class="col-4">
                                <div id="layout-boxed">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-layout-mode"
                                            id="layout-mode-boxed" value="boxed">
                                        <label class="form-check-label" for="layout-mode-boxed">
                                            <img src="images/layouts/boxed.png" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Boxed</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 class="my-3 fs-16 fw-bold">Topbar Color</h5>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form-switch card-switch mb-1">
                                <input class="form-check-input" type="checkbox" name="data-topbar-color"
                                    id="topbar-color-light" value="light">
                                <label class="form-check-label" for="topbar-color-light">
                                    <img src="images/layouts/light.png" alt="" class="img-fluid">
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check form-switch card-switch mb-1">
                                <input class="form-check-input" type="checkbox" name="data-topbar-color"
                                    id="topbar-color-dark" value="dark">
                                <label class="form-check-label" for="topbar-color-dark">
                                    <img src="images/layouts/topbar-dark.png" alt="" class="img-fluid">
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                        </div>
                    </div>

                    <div>
                        <h5 class="my-3 fs-16 fw-bold">Menu Color</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-menu-color"
                                        id="leftbar-color-light" value="light">
                                    <label class="form-check-label" for="leftbar-color-light">
                                        <img src="images/layouts/sidebar-light.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-menu-color"
                                        id="leftbar-color-dark" value="dark">
                                    <label class="form-check-label" for="leftbar-color-dark">
                                        <img src="images/layouts/light.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                            </div>
                        </div>
                    </div>

                    <div id="sidebar-size">
                        <h5 class="my-3 fs-16 fw-bold">Sidebar Size</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                        id="leftbar-size-default" value="default">
                                    <label class="form-check-label" for="leftbar-size-default">
                                        <img src="images/layouts/light.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Default</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                        id="leftbar-size-compact" value="compact">
                                    <label class="form-check-label" for="leftbar-size-compact">
                                        <img src="images/layouts/compact.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Compact</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                        id="leftbar-size-small" value="condensed">
                                    <label class="form-check-label" for="leftbar-size-small">
                                        <img src="images/layouts/sm.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Condensed</h5>
                            </div>


                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                        id="leftbar-size-full" value="full">
                                    <label class="form-check-label" for="leftbar-size-full">
                                        <img src="images/layouts/full.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Full Layout</h5>
                            </div>
                        </div>
                    </div>

                    <div id="layout-position">
                        <h5 class="my-3 fs-16 fw-bold">Layout Position</h5>

                        <div class="btn-group checkbox" role="group">
                            <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed"
                                value="fixed">
                            <label class="btn btn-soft-primary w-sm" for="layout-position-fixed">Fixed</label>

                            <input type="radio" class="btn-check" name="data-layout-position"
                                id="layout-position-scrollable" value="scrollable">
                            <label class="btn btn-soft-primary w-sm ms-0"
                                for="layout-position-scrollable">Scrollable</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas-footer border-top p-3 text-center">
            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                </div>
                <div class="col-6">
                    <a href="https://1.envato.market/velonic" target="_blank" role="button"
                        class="btn btn-primary w-100">Buy Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor js -->
    <script src="{{ asset('js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('js/app.min.js') }}"></script>

    <!-- Daterangepicker js -->
    <script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>

    <!-- Apex Charts js -->
    <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector Map js -->
    <script src="{{ asset('vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script
        src="{{ asset('vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- Dashboard App js -->
    <script src="{{ asset('js/pages/dashboard.js') }}"></script>

    <!-- Datatables js -->
    <script src="{{asset('vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('vendor/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{asset('vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js')}}"></script>
    <script src="{{asset('vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('vendor/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>

    <!-- Datatable Demo Aapp js -->
    <script src="{{asset('js/pages/datatable.init.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('js/app.min.js')}}"></script>

    <script>
        function editCatalogue(catalogueId) {
            $.ajax({
                url: `/admin/edit-catalogue/${catalogueId}`,
                type: 'GET',
                success: function (response) {
                    if (response.catalogue) {
                        // Populate modal fields with the fetched data
                        $('#catalogue_name').val(response.catalogue.name);
                        $('#productId').val(response.catalogue.product_id);
                        $('#categoryId').val(response.catalogue.category_id);
                        $('#sizeId').val(response.catalogue.size_id);
                        $('#catalogueLink').val(response.catalogue.catalogue_link);
                        $('#updateCatalogueForm').attr('action', `/admin/update-catalogue/${catalogueId}`);
                        $('#currentCoverPage').val(response.catalogue.image);
                        $('#currentPdf').val(response.catalogue.catalogue_pdf);
                        // Show the modal
                        $('#catalogue-modal').modal('show');
                    } else {
                        alert('Failed to fetch Catalogue data. Catalogue not found.');
                    }
                },
                error: function () {
                    alert('Failed to fetch Catalogue data. Please try again.');
                }
            });
        }

    </script>

</body>

</html>