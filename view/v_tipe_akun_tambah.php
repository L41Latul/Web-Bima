<?php require_once "view/parsial/v_atas.php"; ?>
<?php require_once "view/parsial/v_kiri.php"; ?>


    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Tambah Tipe Akun
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Tipe Akun</li>
            </ol>
        </section>

        <!-- Main content -->


        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tambah Tipe Akun Baru</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php
            if (isset($tipe_akun_edit))foreach ($tipe_akun_edit as $row);
            ?>
            <form role="form" action="tipe_akun_t.php" method="post" id="formID" class="formular">
                <div class="box-body">
                    <div class="form-group">
                        <label>Tipe Akun</label>
                        <input class="form-control" name="tipe_akun" placeholder="Masukkan Tipe Akun" type="text" value="<?php if (isset($tipe_akun_edit)) echo $row['tipe_akun']; ?>">
                        <?php if (isset($tipe_akun_edit)){?>
                            <input type ="hidden" value="<?php echo $row ['id_tipe_akun']?>" name="id_tipe_akun">
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

    <!-- add new caltipe_akunar event modal -->


<?php require_once "view/parsial/v_bawah.php"; ?>