<?php require_once "view/parsial/v_atas.php"; ?>
<?php require_once "view/parsial/v_kiri.php"; ?>


    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Tambah Jenis Transaksi
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Jenis Transaksi</li>
            </ol>
        </section>

        <!-- Main content -->


        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tambah Jenis Transaksi Baru</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php
            if (isset($jenis_transaksi_edit))foreach ($jenis_transaksi_edit as $row);
            ?>
            <form role="form" action="jenis_transaksi_t.php" method="post" id="formID" class="formular">
                <div class="box-body">
                    <div class="form-group">
                        <label>Jenis Transaksi</label>
                        <input class="form-control" name="jenis_transaksi" placeholder="Masukkan Jenis Transaksi" type="text" value="<?php if (isset($jenis_transaksi_edit)) echo $row['jenis_transaksi']; ?>">
                        <?php if (isset($jenis_transaksi_edit)){?>
                            <input type ="hidden" value="<?php echo $row ['id_jenis_transaksi']?>" name="id_jenis_transaksi">
                        <?php } ?>
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div><!-- /.box -->


    </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->

    <!-- add new caljenis_transaksiar event modal -->


<?php require_once "view/parsial/v_bawah.php"; ?>