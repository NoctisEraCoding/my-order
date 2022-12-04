<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: NiceAdmin - v2.2.2
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="/assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">NiceAdmin</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number"><span id="totalNotifications">{{count(Auth::user()->notification->where('read','=', 0))}}</span></span>
                </a><!-- End Notification Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        You have <span id="totalNotifications1">{{count(Auth::user()->notification->where('read','=', 0))}}</span> new notifications
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <span id="notificationList">
                        @foreach(Auth::user()->notification->where('read','=', 0) as $notification)
                            <span id="notification{{$notification->id}}">
                                <li class="notification-item" onclick="readNotification({{$notification->id}})">
                                    <div>
                                        <p>{{$notification->text}}</p>
                                        <p>{{date('Y-m-d', strtotime($notification->created_at))}}</p>
                                    </div>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                            </span>
                        @endforeach
                    </span>

                    <li class="dropdown-footer">
                        <a href="#">Show all notifications</a>
                    </li>

                </ul><!-- End Notification Dropdown Items -->

            </li><!-- End Notification Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->name}}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{Auth::user()->name}}</h6>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{route('admin.modifyUser', [Auth::user()->id])}}">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{route('admin.getLogout')}}">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.modifyShopData')}}">
                <i class="ri-list-settings-fill"></i>
                <span>Shop Data</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.homepageSettingList')}}">
                <i class="bx bxs-customize"></i>
                <span>Customize Slider Homepage</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.categoryList')}}">
                <i class="bx bxs-category"></i>
                <span>Categories</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.productList')}}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Products</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.menuList')}}">
                <i class="bx bxs-food-menu"></i>
                <span>Menus</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.courierList')}}">
                <i class="bx bxs-car"></i>
                <span>Couriers</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.userList')}}">
                <i class="bx bxs-user-detail"></i>
                <span>Users</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar-->

@yield('content')

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/chart.js/chart.min.js"></script>
<script src="/assets/vendor/echarts/echarts.min.js"></script>
<script src="/assets/vendor/quill/quill.min.js"></script>
<script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>
<script src="/assets/js/jquery-3.6.1.min.js"></script>

<script>
    let countNotification = {{count(Auth::user()->notification->where('read','=', 0))??0}};
    let pusher = new Pusher('{{config('broadcasting.connections.pusher.key')}}', {
        cluster: '{{config("configurations.pusher_cluster")}}'
    });

    let channel = pusher.subscribe('new-notification');
    channel.bind('add-notification', function(data) {
        countNotification++;
        $("#totalNotifications").text(countNotification);
        $("#totalNotifications1").text(countNotification);
        $("#notificationList").prepend('<span id="notification'+data.id+'"><li class="notification-item" onclick="readNotification('+data.id+')"><div><p>'+data.message+'</p><p>'+data.date+'</p></div></li><li><hr class="dropdown-divider"></li></span>');
    });

    function readNotification(notificationId){
        $.post('{{route("admin.postReadNotification")}}',
        {
            id: notificationId,
            _token: "{{csrf_token()}}"
        },
        function(data){
            countNotification--;
            $("#totalNotifications").text(countNotification);
            $("#totalNotifications1").text(countNotification);
            $("#notification"+notificationId).text("");
        });
    }
</script>

@yield('scriptPage')

</body>

</html>
