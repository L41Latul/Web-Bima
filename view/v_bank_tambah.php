<?php require_once "view/parsial/v_atas.php"; ?>
<?php require_once "view/parsial/v_kiri.php"; ?>


    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Tambah Nama Bank
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
                <h3 class="box-title">Tambah Nama Bank Baru</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php
            if (isset($bank_edit))foreach ($bank_edit as $row);
            ?>
            <form role="form" action="bank_t.php" method="post" id="formID" class="formular">
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama Bank</label>
                        <input class="form-control" name="bank" placeholder="Masukkan Jenis bank" type="text" value="<?php if (isset($bank_edit)) echo $row['bank']; ?>">
                        <?php if (isset($bank_edit)){?>
                            <input type ="hidden" value="<?php echo $row ['id_bank']?>" name="id_bank">
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

    <!-- add new calbankar event modal -->


<?php require_once "view/parsial/v_bawah.php"; ?>