<?php require_once "view/parsial/v_atas.php"; ?>
<?php require_once "view/parsial/v_kiri.php"; ?>


    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Tambah Data Client Microstodex
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Client Microstodex</li>
            </ol>
        </section>

        <!-- Main content -->


        <!-- general form elements -->
        <div class="box box-primary">
            <!-- form start -->
            <?php
            if (isset($msd_client_edit))foreach ($msd_client_edit as $row);
            ?>
            <form role="form" action="msd_client_t.php" method="post" id="formID" class="formular" enctype="multipart/form-data">
                <div class="box-body">
                    <table style="width: 100%; border-collapse: separate; border-spacing: 20px 0px;">
                        <?php if((isset($_GET['lihat']))) { ?>
                            <tr>
                                <td colspan="2">
                                    <div class="attachment-block clearfix">
                                        <center>
                                            <a href="scan_id/<?php if($row['scan_id']=="") echo 'no images.jpg'; else echo $row['scan_id']; ?>" target="_blank">
                                                <img src="scan_id/<?php if($row['scan_id']=="") echo 'no images.jpg'; else echo $row['scan_id']; ?>" style="height: 180px;">
                                            </a>
                                        </center>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td style="width: 50%;">
                                <div class="form-group">
                                    <label>Nama Client Microstodex</label>
                                    <input class="form-control validate[required,custom[onlyLetterSp]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="nama" maxlength="100" placeholder="Masukkan Nama Client Microstodex" type="text" value="<?php if (isset($msd_client_edit)) echo $row['nama']; ?>">
                                    <?php if (isset($msd_client_edit)){?>
                                        <input type ="hidden" value="<?php echo $row ['id_client']?>" name="id_client">
                                    <?php } ?>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>Tanggal Registrasi</label>
                                    <table style="width: 100%;"><tr><td>
                                                <input class="form-control validate[required,custom[onlyNumberSp]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="tgl" maxlength="2" placeholder="Masukkan Tanggal" type="text" value="<?php if (isset($msd_client_edit))echo substr($row['tgl_daftar'],8,2); ?>"></td>
                                            <td>

                                                <select class="form-control validate[required]" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="bln">substr($row['tgl_daftar'],8,2)
                                                    <?php if (isset($msd_client_edit)){ ?>
                                                        <option value="<?php echo substr($row['tgl_daftar'],5,2); ?>'" selected="selected"><?php echo cetak_bulan(substr($row['tgl_daftar'],5,2)); ?></option>
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
                                                <input class="form-control validate[required,custom[onlyNumberSp]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="thn" maxlength="4" placeholder="Masukkan Tahun" type="text" value="<?php if (isset($msd_client_edit))echo substr($row['tgl_daftar'],0,4); ?>"></td>
                                            </td></tr></table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>No Akun</label>
                                    <input class="form-control validate[required,custom[onlyNumberSp]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="no_akun" maxlength="100" placeholder="Masukkan No Akun Client" type="text" value="<?php if (isset($msd_client_edit))echo $row['no_akun']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input class="form-control validate[required] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="alamat" placeholder="Masukkan Alamat" type="text" value="<?php if (isset($msd_client_edit))echo $row['alamat']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>No Telepon</label>
                                    <input class="form-control validate[required,custom[onlyNumberSp]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="no_telp" maxlength="12" placeholder="Masukkan No Telefon" type="text" value="<?php if (isset($msd_client_edit))echo $row['no_telp']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control validate[custom[email]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="email" maxlength="100" placeholder="Masukkan Alamat Email" type="text" value="<?php if (isset($msd_client_edit))echo $row['email']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Nama Bank</label>
                                    <select class="form-control validate[required]" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="id_bank">
                                        <?php if (isset($msd_client_edit)){ ?>
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
                            <td>
                                <div class="form-group">
                                    <label>No Rekening</label>
                                    <input class="form-control validate[required] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="no_rek" maxlength="30" placeholder="Masukkan No Rekening Client" type="text" value="<?php if (isset($msd_client_edit))echo $row['no_rek']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Komisi</label>
                                    <select class="form-control validate[required]" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="id_komisi">
                                        <?php if (isset($msd_client_edit)){ ?>
                                            <option value="<?php echo $row['id_komisi']; ?>'" selected="selected"><?php echo $row['komisi']; ?></option>
                                            <option value=""></option>
                                        <?php } else { ?>
                                            <option value=""></option>
                                        <?php } ?>
                                        <?php foreach($komisi as $sm){ ?>
                                            <option value="<?php echo $sm['id_komisi']; ?>'"><?php echo $sm['komisi']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>Tipe Akun</label>
                                    <select class="form-control validate[required]" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="id_tipe_akun">
                                        <?php if (isset($msd_client_edit)){ ?>
                                            <option value="<?php echo $row['id_tipe_akun']; ?>" selected="selected"><?php echo $row['tipe_akun']; ?></option>
                                            <option value="-"></option>
                                        <?php } else { ?>
                                            <option value=""></option>
                                        <?php } ?>
                                        <?php foreach($tipe_akun as $sm){ ?>
                                            <option value="<?php echo $sm['id_tipe_akun']; ?>"><?php echo $sm['tipe_akun']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Nama IB</label>
                                    <select class="form-control validate[required]" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="id_ib">
                                        <?php if (isset($msd_client_edit)){ ?>
                                            <option value="<?php echo $row['id_ib']; ?>" selected="selected"><?php echo $row['nama_ib']; ?></option>
                                            <option value="-"></option>
                                        <?php } else { ?>
                                            <option value=""></option>
                                        <?php } ?>
                                        <?php foreach($ib as $sm){ ?>
                                            <option value="<?php echo $sm['id_ib']; ?>"><?php echo $sm['nama_ib']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </td>
                            <?php if(!(isset($_GET['lihat']))) { ?>
                            <td>
                                <div class="form-group">
                                    <label>Scan ID</label>
                                    <table><tr>
                                        <td>
                                        <input class="form-control" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> type="file" name="scan_id">
                                        </td>
                                        <?php if (isset($msd_client_edit)){ ?><td>
                                        <input class="form-control" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> type="text" name="scan_id_hide" value="<?php echo $row['scan_id']; ?>">
                                        </td><?php } ?>
                                    </tr></table>
                                    </div>
                        <?php } if(!(isset($_GET['lihat']))) { ?>
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

    <!-- add new calmsd_clientar event modal -->


<?php require_once "view/parsial/v_bawah.php"; ?>