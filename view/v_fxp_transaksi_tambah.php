<?php require_once "view/parsial/v_atas.php"; ?>
<?php require_once "view/parsial/v_kiri.php"; ?>


    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Tambah Data Transaksi Forexperia
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Transaksi Forexperia</li>
            </ol>
        </section>

        <!-- Main content -->


        <!-- general form elements -->
        <div class="box box-primary">
            <!-- form start -->
            <?php
            if (isset($fxp_transaksi_edit))foreach ($fxp_transaksi_edit as $row);
            ?>
            <form role="form" action="fxp_transaksi_t.php" method="post" id="formID" class="formular">
                <div class="box-body">
                    <table style="width: 100%; border-collapse: separate; border-spacing: 20px 0px;">
                        <tr>
                            <td style="width: 50%;">
                                <div class="form-group">
                                    <label>Tipe Transaksi</label>
                                    <select class="form-control validate[required]" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="id_jenis_transaksi">
                                        <?php if (isset($fxp_transaksi_edit)){ ?>
                                            <option value="<?php echo $row['id_jenis_transaksi']; ?>" selected="selected"><?php echo $row['jenis_transaksi']; ?></option>
                                            <option value="-"></option>
                                        <?php } else { ?>
                                            <option value=""></option>
                                        <?php } ?>
                                        <?php foreach($jenis_transaksi as $sm){ ?>
                                            <option value="<?php echo $sm['id_jenis_transaksi']; ?>"><?php echo $sm['jenis_transaksi']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>Tanggal Transaksi</label>
                                    <table style="width: 100%;"><tr><td>
                                                <input class="form-control validate[required,custom[onlyNumberSp]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="tgl" maxlength="2" placeholder="Masukkan Tanggal" type="text" value="<?php if (isset($fxp_transaksi_edit))echo substr($row['tgl_transaksi'],8,2); ?>"></td>
                                            <td>

                                                <select class="form-control validate[required]" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="bln">substr($row['tgl_transaksi'],8,2)
                                                    <?php if (isset($fxp_transaksi_edit)){ ?>
                                                        <option value="<?php echo substr($row['tgl_transaksi'],5,2); ?>'" selected="selected"><?php echo cetak_bulan(substr($row['tgl_transaksi'],5,2)); ?></option>
                                                        <option value="-"></option>
                                                    <?php } else { ?>
                                                        <option value=""></option>
                                                    <?php } ?>
                                                    <option value='01'>Januari</option>
                                                    <option value='02'>Februari</option>
                                                    <option value='03'>Maret</option>
                                                    <option value='04'>Aprik</option>
                                                    <option value='05'>Mei</option>
                                                    <option value='06'>Juni</option>
                                                    <option value='07'>Juli</option>
                                                    <option value='08'>Agustus</option>
                                                    <option value='09'>September</option>
                                                    <option value='10'>Oktober</option>
                                                    <option value='11'>November</option>
                                                    <option value='12'>Desember</option>
                                                </select>
                                            <td>
                                                <input class="form-control validate[required,custom[onlyNumberSp]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="thn" maxlength="4" placeholder="Masukkan Tahun" type="text" value="<?php if (isset($fxp_transaksi_edit))echo substr($row['tgl_transaksi'],0,4); ?>"></td>
                                            </td></tr></table>
                                    <?php if (isset($fxp_transaksi_edit)){?>
                                        <input type ="hidden" value="<?php echo $row ['id_transaksi']?>" name="id_transaksi">
                                    <?php } ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 50%;">
                                <div class="form-group">
                                    <label>Nama Client</label>
                                    <select class="form-control validate[required]" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="id_client">
                                        <?php if (isset($fxp_transaksi_edit)){ ?>
                                            <option value="<?php echo $row['id_client']; ?>" selected="selected"><?php echo $row['nama']; ?></option>
                                            <option value="-"></option>
                                        <?php } else { ?>
                                            <option value=""></option>
                                        <?php } ?>
                                        <?php foreach($client as $sm){ ?>
                                            <option value="<?php echo $sm['id_client']; ?>"><?php echo $sm['nama']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </td>
                            <td style="width: 50%;">
                                <div class="form-group">
                                    <label>Nama Bank</label>
                                    <select class="form-control validate[required]" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="id_bank">
                                        <?php if (isset($fxp_transaksi_edit)){ ?>
                                            <option value="<?php echo $row['id_bank']; ?>'" selected="selected"><?php echo $row['bank']; ?></option>
                                            <option value="-"></option>
                                        <?php } else { ?>
                                            <option value=""></option>
                                        <?php } ?>
                                        <?php foreach($bank as $sm){ ?>
                                            <option value="<?php echo $sm['id_bank']; ?>'"><?php echo $sm['bank']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Transfer Dari Nasabah</label>
                                    <input class="form-control validate[required,custom[onlyNumberSp]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="jumlah_transaksi" placeholder="Masukkan Jumlah Transfer" type="text" value="<?php if (isset($fxp_transaksi_edit))echo $row['jumlah_transaksi']; ?>">
                                </div>
                            </td>
                            <td style="width: 50%;">
                                <div class="form-group">
                                    <label>Transfer Ke Pusat</label>
                                    <input class="form-control validate[required,custom[onlyNumberSp]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="transfer_ke" placeholder="Masukkan Jumlah Transfer" type="text" value="<?php if (isset($fxp_transaksi_edit))echo $row['transfer_ke']; ?>">
                                </div>
                            </td>
                        </tr>
                        <?php if(isset($_GET['lihat']) AND $level==1) { ?>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Dibuat Oleh</label>
                                    <input class="form-control" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="created" type="text" value="<?php echo ambil_nama($row['id_created'])['nama']; ?>">
                                </div>
                            </td>
                            <td style="width: 50%;">
                                <div class="form-group">
                                    <label>Terakhir Diedit Oleh</label>
                                    <input class="form-control" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="modified" type="text" value="<?php echo ambil_nama($row['id_modified'])['nama']; ?>">
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php if(!(isset($_GET['lihat']))) { ?>
                            <tr>
                                <td>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </td>
                                <td>

                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div><!-- /.box-body -->
            </form>
        </div><!-- /.box -->


    </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->

    <!-- add new calfxp_transaksiar event modal -->


<?php require_once "view/parsial/v_bawah.php"; ?>