<?php require_once "view/parsial/v_atas.php"; ?>
<?php require_once "view/parsial/v_kiri.php"; ?>


    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Tambah Komisi
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Bank</li>
            </ol>
        </section>

        <!-- Main content -->


        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tambah Komisi Baru</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php
            if (isset($komisi_edit))foreach ($komisi_edit as $row);
            ?>
            <form role="form" action="komisi_t.php" method="post" id="formID" class="formular">
                <div class="box-body">
                    <div class="form-group">
                        <label>Komisi</label>
                        <input class="form-control" name="komisi" placeholder="Masukkan Jenis komisi" type="text" value="<?php if (isset($komisi_edit)) echo $row['komisi']; ?>">
                        <?php if (isset($komisi_edit)){?>
                            <input type ="hidden" value="<?php echo $row ['id_komisi']?>" name="id_komisi">
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

    <!-- add new calkomisiar event modal -->


<?php require_once "view/parsial/v_bawah.php"; ?>