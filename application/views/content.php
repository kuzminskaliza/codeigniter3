<?php

/* @var string $content */
/* @var string $vendor_url */

$content = $content ?? '';
$vendor_url = config_item('vendor_url');
?>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= base_url('crud/allData') ?>" class="nav-link">Home</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a href="<?= base_url('home/logout') ?>" class="btn btn-outline-danger btn-sm">Logout</a>
            </li>
        </ul>

    </nav>

    <script src="<?= $vendor_url; ?>plugins/jquery/jquery.min.js"></script>

	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<a href="<?= base_url('crud/allData') ?>" class="brand-link">
			<i class="fas fa-user mr-2"></i>
			<span class="brand-text font-weight-light"><?= $this->session->userdata('full_name') ?></span>
		</a>
	</aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content"><?= $content; ?> </section>
        <!-- /.content -->
    </div>

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->

    <!-- Bootstrap -->
    <script src="<?= $vendor_url; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="<?= $vendor_url; ?>plugins/select2/js/select2.full.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= $vendor_url; ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= $vendor_url; ?>dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="<?= $vendor_url; ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="<?= $vendor_url; ?>plugins/raphael/raphael.min.js"></script>
    <script src="<?= $vendor_url; ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="<?= $vendor_url; ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= $vendor_url; ?>plugins/chart.js/Chart.min.js"></script>

    <script>
        $(function () {
            $('.select2').select2()
        })
    </script>
    <style>
        .dark-mode input:-webkit-autofill,
        .dark-mode input:-webkit-autofill:focus,
        .dark-mode input:-webkit-autofill:hover,
        .dark-mode select:-webkit-autofill,
        .dark-mode select:-webkit-autofill:focus,
        .dark-mode select:-webkit-autofill:hover,
        .dark-mode textarea:-webkit-autofill,
        .dark-mode textarea:-webkit-autofill:focus,
        .dark-mode textarea:-webkit-autofill:hover {
            -webkit-text-fill-color: #000;
        }

        .select2-container--default .select2-search__field {
            color: #000 !important;
        }
    </style>
</body>
