<?php require_once "view/parsial/v_atas.php"; ?>
<?php require_once "view/parsial/v_kiri.php"; ?>


    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Tambah Data IB Microstodex
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">IB Microstodex</li>
            </ol>
        </section>

        <!-- Main content -->


        <!-- general form elements -->
        <div class="box box-primary">
            <!-- form start -->
            <?php
            if (isset($msd_ib_edit))foreach ($msd_ib_edit as $row);
            ?>
            <form role="form" action="msd_ib_t.php" method="post" id="formID" class="formular" enctype="multipart/form-data">
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
                                    <label>Nama IB Microstodex</label>
                                    <input class="form-control validate[required,custom[onlyLetterSp]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="nama_ib" maxlength="100" placeholder="Masukkan Nama IB Microstodex" type="text" value="<?php if (isset($msd_ib_edit)) echo $row['nama_ib']; ?>">
                                    <?php if (isset($msd_ib_edit)){?>
                                        <input type ="hidden" value="<?php echo $row ['id_ib']?>" name="id_ib">
                                    <?php } ?>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input class="form-control validate[required] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="alamat" placeholder="Masukkan Alamat" type="text" value="<?php if (isset($msd_ib_edit))echo $row['alamat']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>No Telepon</label>
                                    <input class="form-control validate[required,custom[onlyNumberSp]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="no_telp" maxlength="12" placeholder="Masukkan No Telefon" type="text" value="<?php if (isset($msd_ib_edit))echo $row['no_telp']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control validate[custom[email]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="email" maxlength="100" placeholder="Masukkan Alamat Email" type="text" value="<?php if (isset($msd_ib_edit))echo $row['email']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Pin BB</label>
                                    <input class="form-control validate[required,custom[onlyLetterNumber]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="pin_bb" maxlength="8" placeholder="Masukkan Pin BB" type="text" value="<?php if (isset($msd_ib_edit))echo $row['pin_bb']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>Nama Bank</label>
                                    <select class="form-control validate[required]" name="id_bank" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> >
                                        <?php if (isset($msd_ib_edit)){ ?>
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
                                    <label>No Rekening</label>
                                    <input class="form-control validate[required] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="no_rek" maxlength="100" placeholder="Masukkan No Rekening" type="text" value="<?php if (isset($msd_ib_edit))echo $row['no_rek']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>Website</label>
                                    <input class="form-control validate[custom[url]] text-input" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> name="website" maxlength="100" placeholder="Masukkan Alamat Website" type="text" value="<?php if (isset($msd_ib_edit))echo $row['website']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr><?php if(!(isset($_GET['lihat']))) { ?>
                            <td>
                            <div class="form-group">
                                <label>Scan ID</label>
                                <table><tr>
                                        <td>
                                            <input class="form-control" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> type="file" name="scan_id">
                                        </td>
                                        <?php if (isset($msd_ib_edit)){ ?><td>
                                            <input class="form-control" <?php if(isset($_GET['lihat'])) echo 'disabled'; ?> type="text" name="scan_id_hide" value="<?php echo $row['scan_id']; ?>">
                                            </td><?php } ?>
                                    </tr></table>
                            </div>
                            </td><?php } ?>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <td><?php if(!(isset($_GET['lihat']))) { ?>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary btn-flat submit">Submit</button>
                                </div>
                                <?php } ?>
                            </td>
                            <td></td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->
            </form>
        </div><!-- /.box -->


    </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->

    <!-- add new calmsd_ibar event modal -->


<?php require_once "view/parsial/v_bawah.php"; ?>