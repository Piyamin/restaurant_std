<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <title>Search</title>
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-light" style="background-color: #a7460e;">
                    <!-- Logo -->
                    <div class="logo">
                            <img src="images/icons/logo.png" alt="IMG-LOGO">
                        </a>
                    </div>

                    <!-- Menu -->
                    <div class="wrap_menu p-l-45 p-l-0-xl">
                        <nav class="menu">
                            <ul class="main_menu">
                                <li>
                                    <a href="http://localhost/restaurant_std/v3/view/index.php">หน้าหลัก</a>
                                </li>

                                <li>
                                    <a href="http://localhost/restaurant_std/v3/view/add.php">เพิ่มข้อมูล</a>
                                </li>

                                <li>
                                    <a href="http://localhost/restaurant_std/v3/view/search.php">ค้นหาข้อมูล</a>
                                </li>

                                <li>
                                    <a href="http://localhost/restaurant_std/v3/view/edit.php">แก้ไขข้อมูล</a>
                                </li>

                                <li>
                                    <a href="http://localhost/restaurant_std/v3/view/del.php">ลบข้อมูล</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-10">
                <input type="text" class="form-control" id="keyword" placeholder="รหัสเมนู/ชื่อเมนู">
            </div>
            <div class="col-md-2">
                <button type="button" name='btnSearch' id="btnSearch" class="form-control btn btn-outline-warning">สืบค้น</button>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <table id="showdata" class="table  table-hover" width="100%">
                    <thead>
                        <tr class="table-warning">
                            <th>รหัสเมนู</th>
                            <th>ชื่อเมนูอาหาร</th>
                            <th>ประเภทอาหาร</th>
                            <th>ราคา</th>
                        </tr>
                    </thead>
                    <tbody id="tblData">
                </table>
            </div>
        </div>

    </div>

    <!--===============================================================================================-->
    <script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
    <script type="text/javascript" src="js/slick-custom.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="vendor/parallax100/parallax100.js"></script>
    <script type="text/javascript">
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <!--===============================================================================================-->
    <script src="v3.js"></script>

</body>

</html>