
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="<?=base_url()?>assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?=base_url()?>assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?=base_url()?>assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?=base_url()?>assets/css/theme.css" rel="stylesheet" media="all">

     <!-- DataTables CSS CDN -->
     <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet" media="all">


</head>

<!-- Sidebar -->
<aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="<?= base_url() ?>assets/#">
                <img src="<?= base_url() ?>assets/images/icon/bytebites.png" alt="Logo" />
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
    <ul class="list-unstyled navbar__list">
        <!-- Dashboard -->
        <li class="active has-sub">
            <a class="js-arrow" href="#">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>
        <!-- Menu -->
        <li>
        <a class="js-arrow" href="<?= base_url('menu_admin') ?>">
                <i class="fas fa-utensils"></i> Menu
            </a>
        </li>
        <!-- Order -->
        <li>
            <a href="#">
                <i class="fas fa-clipboard-list"></i> Order
            </a>
        </li>
        <!-- User -->
        <li>
            <a href="#">
                <i class="fas fa-users"></i> User
            </a>
        </li>
        <!-- Report -->
        <li>
            <a href="#">
                <i class="fas fa-chart-line"></i> Report
            </a>
        </li>
    </ul>
</nav>

        </div>
        
    </aside>

    

<!-- Jquery JS-->
<script src="<?=base_url()?>assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?=base_url()?>assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?=base_url()?>assets/vendor/slick/slick.min.js">
    </script>
    <script src="<?=base_url()?>assets/vendor/wow/wow.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/animsition/animsition.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?=base_url()?>assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?=base_url()?>assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=base_url()?>assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?=base_url()?>assets/js/main.js"></script>

    <!-- DataTables JS CDN -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#table1').DataTable();
    });
</script>

</body>

</html>
<!-- end document-->
