<?php require_once "view/parsial/v_atas.php"; ?>
<?php require_once "view/parsial/v_kiri.php"; ?>


    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Tambah Data Murid
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Murid</li>
            </ol>
        </section>

        <!-- Main content -->


        <!-- general form elements -->
        <div class="box box-primary">
            <!-- form start -->
            <?php
            if (isset($murid_edit))foreach ($murid_edit as $row);
            ?>
            <form role="form" action="ftc_murid_t.php" method="post" id="formID" class="formular">
                <div class="box-body">
                    <table style="width: 100%; border-collapse: separate; border-spacing: 20px 0px;">
                        <tr>
                            <td style="width: 50%;">
                                <div class="form-group">
                                    <label>Nama Murid</label>
                                    <input class="form-control validate[required,custom[onlyLetterSp]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="nama" maxlength="100" placeholder="Masukkan Nama Murid" type="text" value="<?php if (isset($murid_edit)) echo $row['nama']; ?>">
                                    <?php if (isset($murid_edit)){?>
                                        <input type ="hidden" value="<?php echo $row ['id_murid']?>" name="id_murid">
                                    <?php } ?>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>Tanggal Registrasi</label>
                                    <table style="width: 100%;"><tr><td>
                                                <input class="form-control validate[required,custom[onlyNumberSp]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="tgl" maxlength="2" placeholder="Masukkan Tanggal" type="text" value="<?php if (isset($murid_edit))echo substr($row['tgl_registrasi'],8,2); ?>"></td>
                                            <td>

                                                <select class="form-control validate[required]" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="bln">substr($row['tgl_daftar'],8,2)
                                                    <?php if (isset($murid_edit)){ ?>
                                                        <option value="<?php echo substr($row['tgl_registrasi'],5,2); ?>'" selected="selected"><?php echo cetak_bulan(substr($row['tgl_registrasi'],5,2)); ?></option>
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
                                                <input class="form-control validate[required,custom[onlyNumberSp]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="thn" maxlength="4" placeholder="Masukkan Tahun" type="text" value="<?php if (isset($murid_edit))echo substr($row['tgl_registrasi'],0,4); ?>"></td>
                                            </td></tr></table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input class="form-control validate[required,custom[onlyLetterSp]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="tempat_lahir" maxlength="100" placeholder="Masukkan Tempat Lahir" type="text" value="<?php if (isset($murid_edit))echo $row['tempat_lahir']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <table style="width: 100%;"><tr><td>
                                                <input class="form-control validate[required,custom[onlyNumberSp]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="tgl2" maxlength="2" placeholder="Masukkan Tanggal" type="text" value="<?php if (isset($murid_edit))echo substr($row['tgl_lahir'],8,2); ?>"></td>
                                            <td>

                                                <select class="form-control validate[required]" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="bln2">substr($row['tgl_registrasi'],8,2)
                                                    <?php if (isset($murid_edit)){ ?>
                                                        <option value="<?php echo substr($row['tgl_lahir'],5,2); ?>'" selected="selected"><?php echo cetak_bulan(substr($row['tgl_lahir'],5,2)); ?></option>
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
                                                <input class="form-control validate[required,custom[onlyNumberSp]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="thn2" maxlength="4" placeholder="Masukkan Tahun" type="text" value="<?php if (isset($murid_edit))echo substr($row['tgl_lahir'],0,4); ?>"></td>
                                            </td></tr></table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input class="form-control validate[required] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="alamat" placeholder="Masukkan Alamat" type="text" value="<?php if (isset($murid_edit))echo $row['alamat']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>No Telepon</label>
                                    <input class="form-control validate[required,custom[onlyNumberSp]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="no_telp" maxlength="12" placeholder="Masukkan No Telepon" type="text" value="<?php if (isset($murid_edit))echo $row['no_telp']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control validate[custom[email]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="email" maxlength="100" placeholder="Masukkan Alamat Email" type="text" value="<?php if (isset($murid_edit))echo $row['email']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>Pin BB</label>
                                    <input class="form-control validate[required,custom[onlyLetterNumber]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="pin_bb" maxlength="8" placeholder="Masukkan Pin BB" type="text" value="<?php if (isset($murid_edit))echo $row['pin_bb']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <input class="form-control validate[required,custom[onlyLetterSp]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="pekerjaan" maxlength="100" placeholder="Masukkan Pekerjaan" type="text" value="<?php if (isset($murid_edit))echo $row['pekerjaan']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>Penghasilan</label>
                                    <select class="form-control validate[required]" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="id_penghasilan">
                                        <?php if (isset($murid_edit)){ ?>
                                            <option value="<?php echo $row['id_penghasilan']; ?>'" selected="selected"><?php echo $row['penghasilan']; ?></option>
                                            <option value="-"></option>
                                        <?php } else { ?>
                                            <option value=""></option>
                                        <?php } ?>
                                        <?php foreach($penghasilan as $sm){ ?>
                                            <option value="<?php echo $sm['id_penghasilan']; ?>'"><?php echo $sm['penghasilan']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select class="form-control validate[required]" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="id_kelas">
                                        <?php if (isset($murid_edit)){ ?>
                                            <option value="<?php echo $row['id_kelas']; ?>'" selected="selected"><?php echo $row['tipe_kelas']; ?></option>
                                            <option value="-"></option>
                                        <?php } else { ?>
                                            <option value=""></option>
                                        <?php } ?>
                                        <?php foreach($kelas as $sm){ ?>
                                            <option value="<?php echo $sm['id_kelas']; ?>'"><?php echo $sm['tipe_kelas']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>Biaya Pelatihan</label>
                                    <input class="form-control validate[required,custom[onlyNumberSp]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="biaya" maxlength="8" placeholder="Masukkan Biaya Pelatihan" type="text" value="<?php if (isset($murid_edit))echo $row['biaya']; ?>">
                                </div>
                            </td>
                        </tr><?php if(!(isset($_GET['lihat']))) { ?>
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

    <!-- add new calmuridar event modal -->


<?php require_once "view/parsial/v_bawah.php"; ?>