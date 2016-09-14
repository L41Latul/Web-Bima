<?php require_once "view/parsial/v_atas.php"; ?>
<?php require_once "view/parsial/v_kiri.php"; ?>


    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo $judul_halaman; ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">User</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data User</h3>
                    <div class="box-tools">
                        <div class="input-group-btn">
                            <a href="user_t.php"><button class="btn btn-default pull-right"><span class="label label-primary"><i class="fa fa-plus"></i></span>  Tambah Data</button></a>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Akses</th>
                            <th>Lihat</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                        <?php
                        $no=1;

                        foreach($user as $e) {

                        ?>

                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $e['username']; ?></td>
                            <td><?php echo $e['nama']; ?></td>
                            <td><?php echo $e['email']; ?></td>
                            <td><?php echo cetak_akses($e['level']); ?></td>
                            <td><a href="user_t.php?lihat=<?php echo $e['id_user']; ?>"><button class="btn btn-sm btn-warning"><i class="fa fa-search"></i></button></a></td>
                            <td><a href="user_t.php?edit=<?php echo $e['id_user']; ?>"><button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button></a></td>
                            <td><a href="user_t.php?hapus=<?php echo $e['id_user']; ?>"><button class="btn btn-sm btn-danger"onclick="return confirm('Yakin menghapus data user ini?');"><i class="fa fa-trash-o"></i></button></a></td>
                        </tr>
                        <?php } ?>
                        </tbody></table>
                </div><!-- /.box-body -->

            </div><!-- /.box -->


        </section><!-- /.content -->
    </aside><!-- /.right-side -->

<?php require_once "view/parsial/v_bawah.php"; ?>