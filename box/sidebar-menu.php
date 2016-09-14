
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
    <li class="active">
        <a href="index.php">
            <span class="label label-primary">●</span> Dashboard
        </a>
    </li>

    <?php if((strpos($level,'1'))) {
         ?>
        <li class="treeview">
            <a href="#">
                <span class="label label-primary">↘</span>
                <span>Data Jenis</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a style="margin-left: 10px;" href="bank.php"><span class="label label-primary">●</span>    Bank</a></li>
                <li><a style="margin-left: 10px;" href="jenis_transaksi.php"><span class="label label-primary">●</span>    Jenis Transaksi</a></li>
                <li><a style="margin-left: 10px;" href="kelas.php"><span class="label label-primary">●</span>    Kelas</a></li>
                <li><a style="margin-left: 10px;" href="penghasilan.php"><span class="label label-primary">●</span>    Penghasilan</a></li>
                <li><a style="margin-left: 10px;" href="tipe_akun.php"><span class="label label-primary">●</span>    Tipe Akun</a></li>
                <li><a style="margin-left: 10px;" href="komisi.php"><span class="label label-primary">●</span>    Jenis Komisi</a></li>
            </ul>
        </li>
        <li>
            <a href="user.php">
                <span class="label label-primary">●</span>   <span>User</span>
            </a>
        </li>
    <?php }
    if((strpos($level,'1')) || (strpos($level,'2'))) {
    ?>

        <li>
            <a href="ftc_murid.php">
                <span class="label label-success">●</span>  <span>FTC Murid</span>
            </a>
        </li>
        <li>
            <a href="ftc_murid_t.php">
                <span class="label label-success">●</span>  <span>FTC Murid Tambah</span>
            </a>
        </li>

    <?php }
    if((strpos($level,'3')) || (strpos($level,'1'))) {
    ?>
        <li>
            <a href="msd_ib.php">
                <span class="label label-warning">●</span>  <span>MSD IB</span>
            </a>
        </li>
        <li>
            <a href="msd_ib_t.php">
                <span class="label label-warning">●</span>  <span>MSD IB Tambah</span>
            </a>
        </li>
        <li>
            <a href="msd_client.php">
                <span class="label label-warning">●</span>  <span>MSD Client</span>
            </a>
        </li>
        <li>
            <a href="msd_client_t.php">
                <span class="label label-warning">●</span>  <span>MSD Client Tambah</span>
            </a>
        </li>
        <li>
            <a href="msd_transaksi.php">
                <span class="label label-warning">●</span>  <span>MSD Transaksi </span>
            </a>
        </li>
        <li>
            <a href="msd_transaksi_t.php">
                <span class="label label-warning">●</span>  <span>MSD Transaksi Tambah</span>
            </a>
        </li>

    <?php }
    if((strpos($level,'4') || (strpos($level,'1')))) {
    ?>
        <li>
            <a href="fxp_ib.php">
                <span class="label label-danger">●</span>  <span>FXP IB</span>
            </a>
        </li>
        <li>
            <a href="fxp_ib_t.php">
                <span class="label label-danger">●</span>  <span>FXP IB Tambah</span>
            </a>
        </li>
        <li>
            <a href="fxp_client.php">
                <span class="label label-danger">●</span>  <span>FXP Client</span>
            </a>
        </li>
        <li>
            <a href="fxp_client_t.php">
                <span class="label label-danger">●</span>  <span>FXP Client Tambah</span>
            </a>
        </li>
        <li>
            <a href="fxp_transaksi.php">
                <span class="label label-danger">●</span>  <span>FXP Transaksi</span>
            </a>
        </li>
        <li>
            <a href="fxp_transaksi_t.php">
                <span class="label label-danger">●</span>  <span>FXP Transaksi Tambah</span>
            </a>
        </li>

    <?php }
    ?>

</ul>