<?php
session_start();
include("check_login.php");

/*

if(!isset($_SESSION['global_admin'])){
 header("location: login.php");
 exit();
}*/
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>مطــــاحــن روتـــانا للـــغلال</title>

    <!-- calender-->


    <!-- Bootstrap -->

    <!-- Respomsive slider -->
    <link href="css/responsive-calendar.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- clock style-->
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/demo.css" />
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
    @media (min-width: 768px) {
        .sidebar .nav-item .nav-link[data-toggle=collapse].collapsed::after {
            content: "";
        }
    }

    .nav-link i {
        font-size: .85rem;
        margin-right: .25rem;
        float: right;
    }

    @media (min-width: 768px) {
        .sidebar .nav-item .nav-link span {
            font-size: .85rem;
            display: inline;
            float: right;
        }
    }

    .sidebar-dark .sidebar-heading {
        color: rgba(255, 255, 255, .4);
        display: contents;
    }

    .fa-laugh-wink:before {
        content: "";
    }

    .input-group-append {


        border-top-left-radius: 10px !important;
    }


    .bro {
        color: white;

        background: #0080c0;
        float: right;
        width: 100%;
        padding-bottom: 5px;
    }

    ul {

        padding-inline-start: 0px;
    }

    .dropdown-menu li {
        background: #8bd7ed;
        border: 1px solid #eee;
        border-top-left-radius: 50%;
        border-bottom-left-radius: 50%;

    }

    .dropdown-menu li:hover {
        background: #00ffff;


    }

    .dropdown-menu li a:hover {
        padding-bottom: 20px;
        color: #ff8080;
    }

    .down_from_top {
        background: #00ffff;
        color: white;
        position: fixed;
        right: 200px;
        width: 250px;
        opacity: 0.8;
        top: 0px;
        text-align: right;
        padding: 5px;
        border-radius: 6px;
        z-index: 100;



    }

    .down_from_top2 {

        color: white;
        position: fixed;
        right: 420px;
        width: 250px;

        top: 0px;
        text-align: right;
        padding: 5px;
        border-radius: 6px;
        z-index: 1001;



    }

    .dropdown-toggle::after {
        display: none;
        margin-left: .255em;
        vertical-align: .255em;
        content: "";
        border-top: .3em solid;
        border-right: .3em solid transparent;
        border-bottom: 0;
        border-left: .3em solid transparent;
    }

    @media (min-width: 380px) {
        .bro {
            font-size: 14px;

        }

        .clock {
            text-align: center;
        }

        .bro>img {
            margin-top: 15px;

            margin-right: 12px;
        }
    }

    @media (max-width: 780px) {

        .bro>img {
            height: 50px;
            margin-top: 7px;

        }

        table tr td {
            font-size: 8px;
        }

        .table,
        tr,
        td {
            font-size: 8px;
        }

        tbody,
        tr,
        td {
            font-size: 8px;
        }

        .clock {
            text-align: right;
        }

        .logo_text {

            margin-top: 10px;

        }
    }


    .clock_in {
        width: auto;
        height: 400px;

        right: 1px;



    }

    canvas {
        width: auto;






    }

    form {
        font-size: 13px;
    }

    .bg_color_lightgreen {
        background: lightgreen;
    }

    .bg_color_lightblue {
        background: lightblue;
    }

    .bg_color_likebrown {
        background: #aa5555;
    }



    
    .bg_color_darkyellow {
        background: #ffff80;
    }

    .bg_color_darkblue {
        background: #003264;
    }
    </style>

</head>

<body id="page-top" dir='rtl'>
    <div class="down_from_top" id="down_from_top" style='display:none;'>
        <div><a href='#' class='hide_show' style='color:red;' onclick='return false;'>x</a></div>
        <div class='drop_value'> </div>

    </div>
    <div class="down_from_top2" id="down_from_top2" style='display:none;'>
        <div><a href='#' class='' style='color:red;' onclick='return false;'></a></div>
        <div class='drop_value2'> </div>

    </div>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion col-xs-12" style='float:right;'
            id="accordionSidebar">

            <div class="  bro">
                <img src="images/rotana.png" id='seventyfive' width='50%' class='rotate-15  '
                    style='border-radius:40%;float:right;margin-right:10px;' alt="" class='col-md-5 col-xs-12'>


                <br>
                <br>
                <br>

                <span class='logo_text'>Rotan<br> Flour <br>Mills</span>
                <div id='fatora_report'style='display:none;'> <center><img src="images/report_title.png" width="80%"/></center></div> 
            </div>
               <!--------------------------------- منتجات----------------------منتجات------------------     -->

                              <div class="dropdown" style='float:right;'>

                  <div class="btn btn-default dropdown-toggle bro" type="button" id="menu1" data-toggle="dropdown">منتجات
                      <span class="caret"></span></div>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style='text-align:right;'>

                      <li onclick='return false;' onmousedown="give_pages('store_insert.php','اضافة منتج')"><a
                              href="#">اضافة منتج</a></li>

                      <li class='li_hover' role="presentation" onclick='return false;'
                          onmousedown="give_pages('show_all_product.php','عرض المنتجات ');"><a role="menuitem"
                              tabindex="-1" href="#"> عرض المنتجات </a></li>


                  </ul>

                  </div>
                  <!--------------------------------- الصادرات----------------------الصادرات------------------     -->
                  <div class="dropdown" style='float:right;'>
                  <div class="btn btn-default dropdown-toggle bro" type="button" id="menu1" data-toggle="dropdown">
                      الصادرات
                      <span class="caret"></span></div>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style='text-align:right;'>
                      <li onclick='return false;' onmousedown="give_pages('exports_insert.php','اضافة صادر')"><a href="#">
                              إضافة جديد</a></li>
                              <li onclick='return false;' onmousedown="give_pages('add_multi_exports.php','اضافة متعدد')"><a href="#">
                              إضافة متعدد</a></li>
                      <li class='li_hover' role="presentation" onclick='return false;'
                          onmousedown="give_pages('show_all_export.php','  عرض الصادر       ');"><a role="menuitem"
                              tabindex="-1" href="#"> المشتريات</a></li>

                  </ul>
                  </div>
                  <!--------------------------------- حركة المخزن----------------------حركة المخزن-------------     -->
                  <div class="dropdown" style='float:right;'>
                  <div class="btn btn-default dropdown-toggle bro" type="button" id="menu1" data-toggle="dropdown"
                      onclick='return false;' onmousedown="give_pages('show_all_history.php','حركة المخزن');"> حركة المخزن
                      <span class="caret"></span></div>

                  </div>
                  <!--------------------------------- الواردات----------------------الواردات------------------     -->
                  <div class="dropdown" style='float:right;'>
                  <div class="btn btn-default dropdown-toggle bro" type="button" id="menu1" data-toggle="dropdown">
                      الواردات
                      <span class="caret"></span></div>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style='text-align:right;'>
                      <li class='li_hover' role="presentation" onclick='return false;'
                          onmousedown="give_pages('show_all_waiting.php','  عرض الوارد المنتظر ');"><a role="menuitem"
                              tabindex="-1" href="#"> المنتظر</a></li>
                      <li class='li_hover' role="presentation" onclick='return false;'
                          onmousedown="give_pages('show_all_import.php','  عرض الوارد المستلم');"><a role="menuitem"
                              tabindex="-1" href="#"> المستلم</a></li>
                  </ul>
                  </div>
                  <!--------------------------------- حسابات----------------------حسابات------------------     -->
                  <div class="dropdown" style='float:right;'>
                  <div class="btn btn-default dropdown-toggle bro" type="button" id="menu1" data-toggle="dropdown">حسابات
                      <span class="caret"></span></div>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style='text-align:right;'>
                      <li class='li_hover' role="presentation" onclick='return false;'
                          onmousedown="give_pages('add_new_tored.php','اضافة توريد');"><a role="menuitem" tabindex="-1"
                              href="#"> ادخال توريد</a></li>
                      <li class='li_hover' role="presentation" onclick='return false;'
                          onmousedown="give_pages('show_all_tored.php','عرض الحسابات');"><a role="menuitem" tabindex="-1"
                              href="#"> عرض الحسابات</a></li>
                  </ul>
                  </div>
                  <!--------------------------------- مبيعات----------------------مبيعات------------------     -->
                  <div class="dropdown" style='float:right;'>
                  <div class="btn btn-default dropdown-toggle bro" type="button" id="menu1" data-toggle="dropdown">
                      مبيعات
                      <span class="caret"></span></div>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style='text-align:right;'>
                      <li role="presentation" onclick='return false;' onmousedown='give_pages("shb.php","بيع المنتجات")'>
                          <a role="menuitem" tabindex="-1" href="#"> بيع المنتجات </a></li>
                      <li role="presentation" onclick='return false;'
                          onmousedown='give_pages("show_all_fatora.php","عرض الفواتير")'><a role="menuitem" tabindex="-1"
                              href="#"> عرض الفواتير </a></li>

                              <li role="presentation" onclick='return false;'
                          onmousedown='give_pages("show_all_sell.php","عرض وارد مبيعات")'><a role="menuitem" tabindex="-1"
                              href="#"> وارد مبيعات  </a></li>

                  </ul>
                  </div>
                  <!--------------------------------- الموظفين----------------------الموظفين------------------     -->
                  <div class="dropdown" style='float:right;'>
                  <div class="btn btn-default dropdown-toggle bro" type="button" id="menu1" data-toggle="dropdown">
                      الموظفين
                      <span class="caret"></span></div>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style='text-align:right;'>
                      <li role="presentation" onclick='return false;'
                          onmousedown='give_pages("add_new_employee.php","إضافة موظف جديد")'><a role="menuitem"
                              tabindex="-1" href="#">اضافة موظف</a></li>
                      <li role="presentation" onclick='return false;'
                          onmousedown='give_pages("show_all_employee.php"," عرض الموظفين    ")'><a role="menuitem"
                              tabindex="-1" href="#">عرض الموظفين</a></li>
                      <li role="presentation" onclick='return false;'
                          onmousedown='give_pages("add_new_sal.php","  إضافة مرتبات      ")'><a role="menuitem" tabindex="-1"
                              href="#">اضافة راتب</a></li>
                      <li role="presentation" onclick='return false;'
                          onmousedown='give_pages("show_all_sal.php","عرض المرتبات")'><a role="menuitem" tabindex="-1"
                              href="#"> عرض الرواتب</a></li>

                  </ul>
                  </div>
                  <!--------------------------------- المستخدمين----------------------المستخدمين------------------     -->
                  <div class="dropdown" style='float:right;'>
                  <div class="btn btn-default dropdown-toggle bro" type="button" id="menu1" data-toggle="dropdown">
                      المستخدمين
                      <span class="caret"></span></div>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style='text-align:right;'>
                      <li onclick='return false;' onmousedown="give_pages('add_new_user.php','اضافة مستخدم')"><a
                              href="#">اضافة مستخدم</a></li>
                      <li class='li_hover' role="presentation" onclick='return false;'
                          onmousedown="give_pages('show_all_user.php','عرض المستخدمين ');"><a role="menuitem"
                              tabindex="-1" href="#"> عرض المستخدمين </a></li>

                  </ul>
                  </div>
                  <!--------------------------------- التقارير----------------------التقارير------------------     -->
                  <div class="dropdown" style='float:right;'>
                  <div class="btn btn-default dropdown-toggle bro" type="button" id="menu1" data-toggle="dropdown">
                      التقارير
                      <span class="caret"></span></div>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style='text-align:right;'>
                      <li role="presentation" onclick='return false;'
                          onmousedown='give_pages("report_form_export.php","")'><a role="menuitem" tabindex="-1"
                              href="#">الصادرات</a></li>
                      <li role="presentation" onclick='return false;'
                          onmousedown='give_pages("report_form_import.php"," تقرير عن الواردات     ")'><a role="menuitem"
                              tabindex="-1" href="#">الواردات</a></li>
                      <li role="presentation" onclick='return false;'
                          onmousedown='give_pages("report_sel.php"," تقرير عن المبيعات ")'><a role="menuitem"
                              tabindex="-1" href="#">المبيعات </a></li>
                      <li role="presentation" onclick='return false;'
                          onmousedown='give_pages("report_acounts.php"," تقرير عن  الحسابات ")'><a role="menuitem"
                              tabindex="-1" href="#">الحسابات </a>
                          </li>
                      <li role="presentation" onclick='return false;'
                          onmousedown='give_pages("report_salary.php","تقرير عن المرتبات ")'><a role="menuitem"
                              tabindex="-1" href="#"> المرتبات </a></li>

                  </ul>
                  </div>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
                    style='background:blue;'>

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">

                        Rotana Flour Mills
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">

                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">


                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60"
                                            alt="">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60"
                                            alt="">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Setting</span>
                                <img class="img-profile rounded-circle" src="images/rotana.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile: <?php echo $_SESSION['ufname'];?>
                                    
                                </a>
                                <a class="dropdown-item" href="#" onclick='return false;'
                                    onmousedown='give_pages("settings.php","اعدادات الحساب ");'>
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick='return false;' onmousedown='logout();'>
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style='font-family:0;' id='seventyfive'> مطاحن روتانا للغلال
                            وكيل نيالا </h1>
                            <div style='display:none;' id='per' ><?php echo $_SESSION['uper']; ?></div>
                            <div style='display:none'id='full_name'><?php echo $_SESSION['ufull_name'];?></div> 
                        <a href="index.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-home fa-sm text-white-50"></i>الرئيسية</a>
                    </div>


                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-9" id='col_large'>
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <div id='titley'>
                                        <h6 class="m-0 font-weight-bold text-primary"> الوقــــــــــت</h6>
                                    </div>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div id='contenty'>


                                        <div class="jquery-script-ads">
                                            <script type="text/javascript">
                                            <!--
                                            google_ad_client = "ca-pub-2783044520727903";
                                            /* jQuery_demo */
                                            google_ad_slot = "2780937993";

                                            google_ad_width = 228;
                                            google_ad_height = 90;
                                            //
                                            -->
                                            </script>


                                        </div>
                                        <div class="jquery-script-clear"></div>


                                        <div class="wrapper clearfix show text-right">
                                            <div class='clock_in'>
                                                <div class="clock" id="clock" style='width:100%; height:100%;'></div>
                                            </div>


                                        </div>
                                    </div>
                                    <div id="report_title"
                                        style='width:100%;direction: rtl;text-align:right;display:none;'> </div>
                                    <div id='report_content'></div>
                                </div>

          <div id="tyba_ezen" style='padding-top:10%;padding-top:10%;'>
            <center>
                <div  id="ezen1"  style="width:90%; border-style:dotted;padding:2%">
                        <div id="report_image1">  </div>
                        <div id="report_date1">  </div>
                        <div  id='report_content1'></div>
                 </div>

                 <div  id="ezen2"  style="width:90%; border-style:dotted;padding:2%;margin-top:50%">
                    <div  style='' id="report_image2">  </div>
                    <div id="report_date2">  </div>
                    <div id='report_content2'></div>  
                 </div>
                    

            </center>
          </div>
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-3" id='col_small'>
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary" id='titley2'>التقويم</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body" style='height:530px;' id='contenty2'>

                                    <!-- Responsive calendar - START -->
                                    <div class="responsive-calendar">
                                        <div class="controls">
                                            <a class="pull-left" data-go="prev">
                                                <div class="btn btn-primary">Prev</div>
                                            </a>
                                            <h4><span data-head-year></span> <span data-head-month></span></h4>
                                            <a class="pull-right" data-go="next">
                                                <div class="btn btn-primary">Next</div>
                                            </a>
                                        </div>
                                        <hr />
                                        <div class="day-headers">
                                            <div class="day header">Mon</div>
                                            <div class="day header">Tue</div>
                                            <div class="day header">Wed</div>
                                            <div class="day header">Thu</div>
                                            <div class="day header">Fri</div>
                                            <div class="day header">Sat</div>
                                            <div class="day header">Sun</div>
                                        </div>
                                        <div class="days" data-group="days">

                                        </div>
                                    </div>
                                    <!-- Responsive calendar - END -->

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->




                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto"
                            style='height:150px;border:2px solid #eee;padding-top:8px;'>
                            <span>Copyright &copy; WHD For Software Development - Nyala</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
   <script src="vendor/jquery/jquery.min.js"></script-->


        <script src="jqueryui/external/jquery/jquery.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="js/responsive-calendar.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $(".responsive-calendar").responsiveCalendar({
                time: '2019-01',
                events: {
                    "2019-04-30": {
                        "number": 5,
                        "url": "http://w3widgets.com/responsive-slider"
                    },
                    "2019-04-26": {
                        "number": 1,
                        "url": "http://w3widgets.com"
                    },
                    "2019-05-03": {
                        "number": 1
                    },
                    "2019-06-12": {}
                }
            });
        });
        </script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
        <script src="js/ajax.js"></script>
        <!-- Page level plugins -->


        <!-- jquery clock plugin-->

        <script type="text/javascript" src="js/clock-1.1.0.min.js"></script>
        <script>
        var clock = $("#clock").clock(),
            data = clock.data('clock');

        // data.pause();
        // data.start();
        // data.setTime(new Date());

        var d = new Date();
        d.setHours(9);
        d.setMinutes(51);
        d.setSeconds(20);

        var clock1 = $("#clock1").clock({
            theme: 't2',
            date: d
        });

        var clock2 = $("#clock2").clock({
            theme: 't3'
        });
        </script>
        <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
                '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
        </script>
        <!--shb prodects-->
        <script>
        // Get the modal



        /* 
                         window.location.assign("phatora.php?id="+<?php echo $_SESSION['cacount'];?>+"&mony="+priceenter+"&bagydate="+bagydate+"&ch="+ch);
            */
        </script>



        <?php
//include"footer.php";
?>

        <script src="jqueryui/jquery-ui.js"></script>

        <script>
        $(function() {
            $("#date").datepicker({
                dateFormat: 'yy-mm-dd'
            });
            $("#date2").datepicker({
                dateFormat: 'yy-mm-dd'
            });
            $("#date3").datepicker({
                dateFormat: 'yy-mm-dd'
            });



        });
        </script>


        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="js/js.js"></script>



        <script type='text/javascript' src='js/bootstrap.min.js'></script>
        <script type='text/javascript' src='js/js.js'></script>
        <!--end shb prodects  
<script type='text/javascript' src='js/jquery-3.1.1.min.js'></script>
-->
</body>

</html>