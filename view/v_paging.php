<?php
$halaman = 'javascript:halaman();';
$pagess = 'javascript:pagess();';
?>
<ul class="pagination">
    <li><a href="msd_transaksi.php?page=<?php echo $pagess -1 ?>"> &laquo; </a></li>
</ul>
<?php
for($x=1;$x<=$halaman;$x++)
{
    ?>
    <ul class="pagination">
        <li><a href="msd_transaksi.php?page=<?php echo $x ?>"><?php echo $x ?></a></li>
    </ul>
<?php
}
?>
<ul class="pagination">
    <li><a href="msd_transaksi.php?page=<?php echo $pagess +1 ?>"> &raquo; </a></li>
</ul>