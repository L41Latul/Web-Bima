<?php require_once "view/parsial/v_atas.php"; ?>
<?php require_once "view/parsial/v_kiri.php"; ?>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                FTC (Fibbonacci  Training Center) Management <small>Dashboard</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

        <?php if((strpos($level,'2')) || (strpos($level,'1'))) { ?>
            <h4>FTC</h4>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>
                                Murid
                            </h3>
                            <p>
                                Tambah Data Murid
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="ftc_murid_t.php" class="small-box-footer">
                            Masuk Ke Halaman <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>
                                Murid
                            </h3>
                            <p>
                                Lihat Data Murid
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-document-text"></i>
                        </div>
                        <a href="ftc_murid.php" class="small-box-footer">
                            Masuk Ke Halaman <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>
                                Murid
                            </h3>
                            <p>
                                Edit Data Murid
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i>
                        </div>
                        <a href="ftc_murid_t.php" class="small-box-footer">
                            Masuk Ke Halaman  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>
                                Web
                            </h3>
                            <p>
                                Tentang Website
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-document"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Masuk Ke Halaman <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->
            <p><h1></h1></p>

        <?php } ?>

        <?php if((strpos($level,'3')) || (strpos($level,'1'))) { ?>
            <h4>Microstodex</h4>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>
                                IB
                            </h3>
                            <p>
                                Tambah Data IB
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="msd_ib_t.php" class="small-box-footer">
                            Masuk Ke Halaman <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>
                                IB
                            </h3>
                            <p>
                                Lihat Data IB
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-document-text"></i>
                        </div>
                        <a href="msd_ib.php" class="small-box-footer">
                            Masuk Ke Halaman <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>
                                Client
                            </h3>
                            <p>
                                Tambah Data Client
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i>
                        </div>
                        <a href="msd_client_t.php" class="small-box-footer">
                            Masuk Ke Halaman  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>
                                Client
                            </h3>
                            <p>
                                Lihat Data Client
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-document"></i>
                        </div>
                        <a href="msd_client.php" class="small-box-footer">
                            Masuk Ke Halaman <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->
            <p><h1></h1></p>

            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>
                                WD/DP
                            </h3>
                            <p>
                                Tambah Transaksi
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-compose"></i>
                        </div>
                        <a href="msd_transaksi_t.php" class="small-box-footer">
                            Masuk Ke Halaman <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>
                                WD/DP
                            </h3>
                            <p>
                                Lihat Data Transaksi
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-calendar"></i>
                        </div>
                        <a href="msd_transaksi.php" class="small-box-footer">
                            Masuk Ke Halaman <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>
                                WD/DP
                            </h3>
                            <p>
                                Edit Data Transaksi
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-edit"></i>
                        </div>
                        <a href="msd_transaksi.php" class="small-box-footer">
                            Masuk Ke Halaman <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>
                                Web
                            </h3>
                            <p>
                                Tentang Website
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-information"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Masuk Ke Halaman  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->
            <p><h1></h1></p>
        <?php } ?>

        <?php if((strpos($level,'4')) || (strpos($level,'1'))) { ?>
                <h4>Forexperia</h4>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>
                                IB
                            </h3>
                            <p>
                                Tambah Data IB
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="fxp_ib_t.php" class="small-box-footer">
                            Masuk Ke Halaman <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>
                                IB
                            </h3>
                            <p>
                                Lihat Data IB
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-document-text"></i>
                        </div>
                        <a href="fxp_ib.php" class="small-box-footer">
                            Masuk Ke Halaman <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>
                                Client
                            </h3>
                            <p>
                                Tambah Data Client
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i>
                        </div>
                        <a href="fxp_client_t.php" class="small-box-footer">
                            Masuk Ke Halaman  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>
                                Client
                            </h3>
                            <p>
                                Lihat Data Client
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-document"></i>
                        </div>
                        <a href="fxp_client.php" class="small-box-footer">
                            Masuk Ke Halaman <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->
            <p><h1></h1></p>

            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>
                                WD/DP
                            </h3>
                            <p>
                                Tambah Transaksi
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-compose"></i>
                        </div>
                        <a href="fxp_transaksi_t.php" class="small-box-footer">
                            Masuk Ke Halaman <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>
                                WD/DP
                            </h3>
                            <p>
                                Lihat Data Transaksi
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-calendar"></i>
                        </div>
                        <a href="fxp_transaksi.php" class="small-box-footer">
                            Masuk Ke Halaman <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>
                                WD/DP
                            </h3>
                            <p>
                                Edit Data Transaksi
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-edit"></i>
                        </div>
                        <a href="fxp_transaksi.php" class="small-box-footer">
                            Masuk Ke Halaman <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>
                                Web
                            </h3>
                            <p>
                                Tentang Website
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-information"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Masuk Ke Halaman  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->
                <p><h1></h1></p>
    <?php } ?>
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- add new calendar event modal -->

<?php require_once "view/parsial/v_bawah.php"; ?>