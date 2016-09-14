
<?php
$us = profil();
$level = $us['level'];

?>
<!-- header logo: style can be found in header.less -->
<header class="header">
<a href="index.php" class="logo">
    <!-- Add the class icon to your logo image or logo icon to add the margining -->
    FTC Management
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>
<div class="navbar-right">
<ul class="nav navbar-nav">
<!-- Messages: style can be found in dropdown.less-->

<li class="dropdown messages-menu">
    <a href="user_t.php?edit=<?php echo $us['id_user']; ?>" class="dropdown-toggle">
        <i class="fa fa-user"></i> Edit Profil
        <span class="label label-success"> ● </span>
    </a>
</li>
<!-- Notifications: style can be found in dropdown.less -->
<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-users"></i> Hak Akses
        <span class="label label-warning"> ● </span>
    </a>
    <ul class="dropdown-menu">
        <li>
            <!-- inner menu: contains the actual data -->
            <div style="position: relative; overflow: hidden; width: auto; " class="slimScrollDiv"><ul style="overflow: hidden; width: 100%; " class="menu">
                    <?php
                    if(!(strpos($level,'2'))) $haak = "IB, Client dan Transaksi";
                    else $haak = "Murid";
                    ?>
                    <li>
                        <a href="#">
                            <i class="fa fa-search info"></i> Lihat Data <?php echo $haak; ?>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-pencil danger"></i> Tambah Data <?php echo $haak; ?>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-edit warning"></i> Edit Data <?php echo $haak; ?>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-floppy-o success"></i> Cetak Laporan <?php echo $haak; ?>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-trash-o primary"></i> Hapus Data <?php echo $haak; ?>
                        </a>
                    </li>
                </ul><div style="background: none repeat scroll 0% 0% rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 0px; z-index: 99; right: 1px;" class="slimScrollBar"></div><div style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: none repeat scroll 0% 0% rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;" class="slimScrollRail"></div></div>
        </li>
    </ul>
</li>
<!-- Tasks: style can be found in dropdown.less -->
<li class="dropdown tasks-menu">
    <a href="logout.php" class="dropdown-toggle">
        <i class="fa fa-sign-out"></i> Logout
        <span class="label label-danger"> ● </span>
    </a>
</li>
</ul>
</div>
</nav>
</header>