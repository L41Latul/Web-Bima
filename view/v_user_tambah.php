<?php require_once "view/parsial/v_atas.php"; ?>
<?php require_once "view/parsial/v_kiri.php"; ?>


    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Tambah Data User
            </h1>

            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">User</li>
            </ol>
        </section>

        <!-- Main content -->


        <!-- general form elements -->
        <div class="box box-primary">
            <!-- form start -->
            <?php
            if (isset($user_edit))foreach ($user_edit as $row);
            ?>
            <form role="form" action="user_t.php" method="post" id="formID" class="formular" >
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control validate[required,custom[onlyLetterSp]] text-input" name="nama" placeholder="Masukkan Nama User" type="text" value="<?php if (isset($user_edit)) echo $row['nama']; ?>">
                        <?php if (isset($user_edit)){?>
                            <input type ="hidden" value="<?php echo $row ['id_user']?>" name="id_user">
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control validate[custom[email]] text-input" name="email" placeholder="Masukkan Email User" type="text" value="<?php if (isset($user_edit)) echo $row['email']; ?>">
                    </div>
                    <!-- checkbox -->

                    <div class="form-group">
                        <label class="heading">Akses :</label>
                        <?php foreach($akses as $sm){ ?>
                            <div><input type="checkbox" name="level[]" value="<?php echo $sm['id_akses']; ?>" <?php if (isset($user_edit)) if(strpos($row['level'],$sm['id_akses'])) echo "checked"; ?>>
                                <?php echo $sm['hak']; ?></div>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control validate[required,custom[onlyLetterSp]] text-input" name="username" placeholder="Masukkan Username User" type="text" value="<?php if (isset($user_edit)) echo $row['username']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control validate[<?php if (!isset($user_edit)) echo 'required'; ?>] text-input" name="password1" id="password" placeholder="Masukkan Password Baru (Kosongkan jika tidak ingin mengubah password)" type="password">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control validate[<?php if (!isset($user_edit)) echo 'required,'; ?>equals[password]] text-input" name="password2" placeholder="Masukkan Password Baru (Kosongkan jika tidak ingin mengubah password)" type="password">
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div><!-- /.box -->


    </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->

    <!-- add new caluserar event modal -->


<?php require_once "view/parsial/v_bawah.php"; ?>