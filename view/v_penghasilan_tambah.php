<?php require_once "view/parsial/v_atas.php"; ?>
<?php require_once "view/parsial/v_kiri.php"; ?>


    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Tambah Penghasilan
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Penghasilan</li>
            </ol>
        </section>

        <!-- Main content -->


        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tambah Kode Penghasilan Baru</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php
            if (isset($penghasilan_edit))foreach ($penghasilan_edit as $row);
            ?>
            <form role="form" action="penghasilan_t.php" method="post" id="formID" class="formular">
                <div class="box-body">
                    <div class="form-group">
                        <label>Jenis Penghasilan</label>
                        <input class="form-control" name="penghasilan" placeholder="Masukkan Jenis Penghasilan" type="text" value="<?php if (isset($penghasilan_edit)) echo $row['penghasilan']; ?>">
                        <?php if (isset($penghasilan_edit)){?>
                            <input type ="hidden" value="<?php echo $row ['id_penghasilan']?>" name="id_penghasilan">
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

    <!-- add new calpenghasilanar event modal -->


<?php require_once "view/parsial/v_bawah.php"; ?>