<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Your Blog Here | LaravelAdmin</title>
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

    <!-- Quill css -->
    <link href="{{asset('vendor/quill/quill.core.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('vendor/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('vendor/quill/quill.bubble.css')}}" rel="stylesheet" type="text/css" />


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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Blog Master</a>
                                        </li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Blog Master</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title mb-0"> Add Blogs Here </h4>
                                </div>
                                <div class="card-body">
                                    @if(session('success'))
                                        <div id="alert-success" class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <form action="/admin/add-blog" method="POST" id="blogForm"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div id="basicwizard">
                                            <div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="product">Blog
                                                                Title :</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" id="BlogTitle"
                                                                    name="BlogTitle" placeholder="Enter Blog Title"
                                                                    required>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="image">Blog
                                                                Image :</label>
                                                            <div class="col-md-9">
                                                                <input type="file" id="blog_image" class="form-control"
                                                                    name="blog_image">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h4 class="header-title">Enter Blog Description
                                                                            Here</h4>
                                                                    </div>
                                                                    <ul class="list-group list-group-flush">
                                                                        <li class="list-group-item">
                                                                            <div class="mb-2">
                                                                                <div id="snow-editor-1"
                                                                                    style="height: 300px;"
                                                                                    name="blog_description"></div>
                                                                                <input type="hidden"
                                                                                    name="blog_description"
                                                                                    id="blogDescription">
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->
                                                        <ul class="list-inline wizard mb-0">
                                                            <li class="next list-inline-item float-end">
                                                                <button type="submit" class="btn btn-info">Add Blog
                                                                    <i class="ri-check-line ms-1"></i></button>
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-danger">Cancel<i
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
                                    <h4 class="header-title">Your Added Blogs</h4>
                                    <p class="text-muted mb-0">
                                        Play With Your Blogs 😉
                                    </p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive-sm">
                                        <table id="basic-datatable"
                                            class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Blog ID</th>
                                                    <th>Blog Name</th>
                                                    <th>Blog Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($blogs as $blog)
                                                    <tr>
                                                        <td>{{$blog->id}}</td>
                                                        <td>{{$blog->title}}</td>
                                                        <td><img src="{{ asset('images/blog-images/' . $blog->image) }}"
                                                                alt="image" class="img-fluid avatar-md rounded"></td>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="text-reset fs-16 px-1"
                                                                onclick="editBlog({{ $blog->id }})">
                                                                <i class="ri-settings-3-line" data-bs-toggle="modal"
                                                                    data-bs-target="#color-modal"></i></a>

                                                            <a href="/admin/delete-blog/{{$blog->id}}"
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

                <!-- Signup modal content -->
                <div id="blog-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-full-width">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form id="updateBlogForm" method="POST" action="#" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="blog_name" class="form-label">Update Blog Name</label>
                                        <input class="form-control" type="text" id="blog_name" name="blogName" required
                                            placeholder="Blog Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="current_image_name" class="form-label">Choose Blog Image </label>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Current Image</label>
                                            <input type="text" id="current_image_name" class="form-control" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="new_image" class="form-label">Update Image</label>
                                            <input class="form-control" type="file" id="new_image" name="new_image">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="blog_name" class="form-label">Update Blog Description</label>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div class="mb-2">
                                                    <div id="snow-editor-2" style="height: 300px;"
                                                        name="update_blog_description"></div>
                                                    <input type="hidden" name="update_blog_description"
                                                        id="updateBlogDescription">
                                                </div>
                                            </li>
                                        </ul>
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
                                <input type="radio" class="btn-check" name="data-layout-position"
                                    id="layout-position-fixed" value="fixed">
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

        <!-- Quill Editor js -->
        <script src="{{asset('vendor/quill/quill.min.js')}}"></script>

        <!-- Quill Demo js -->
        <script src="{{asset('js/pages/quilljs.init.js')}}"></script>

        <!-- Initialize Quill editor -->
        <script>
            $("#blogForm").on("submit", function () {
                var myEditor = document.querySelector('#snow-editor-1')
                var html = myEditor.children[0].innerHTML
                $('#blogDescription').val(html)
            })

            // Synchronize Quill content before submitting the update form
            $("#updateBlogForm").on("submit", function () {
                const quillEditor = document.querySelector('#snow-editor-2').quillInstance;
                if (quillEditor) {
                    // Get Quill content and set it to the hidden input field
                    const html = quillEditor.root.innerHTML;
                    $('#updateBlogDescription').val(html);
                }
            });

        </script>

        <script>
            function editBlog(blogId) {
                // Make an AJAX request to fetch blog data
                $.ajax({
                    url: `/admin/edit-blog/${blogId}`,
                    type: 'GET',
                    success: function (response) {
                        // Populate the modal fields with the fetched data
                        $('#blog_name').val(response.title);
                        $('#current_image_name').val(response.image);

                        // Access the Quill instance for #snow-editor-2 and set its content
                        const quillEditor = document.querySelector('#snow-editor-2').quillInstance;
                        if (quillEditor) {
                            quillEditor.root.innerHTML = response.description;
                        } else {
                            console.error('Quill instance for #snow-editor-2 not found.');
                        }

                        // Set the form action URL to update the blog
                        $('#updateBlogForm').attr('action', `/admin/update-blog/${blogId}`);

                        // Show the modal
                        $('#blog-modal').modal('show');
                    },
                    error: function () {
                        alert('Failed to fetch blog data. Please try again.');
                    }
                });
            }


        </script>

</body>

</html>