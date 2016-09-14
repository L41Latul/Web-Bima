<?php
require_once 'model/librari/konfigurasi.php';
require_once 'model/librari/librari.php';
require_once 'model/m_msd.php';
require_once 'model/m_jenis.php';
require_once 'model/m_autentikasi.php';

$select = query_msd_transaksi();
$jenis_transaksi = semua_jenis_transaksi();
$bank = semua_bank();
$client = semua_msd_client();
$msd_ib = semua_msd_ib();
?>

<?php require_once "view/parsial/v_atas.php"; ?>
<?php require_once "view/parsial/v_kiri.php"; ?>


<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Transaksi
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Transaksi Microstudex</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Transaksi Microstudex</h3>
                <div class="box-tools">
                    <div class="input-group">
                        <input name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search" type="text">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-header -->
            <p></p>
            <div class="box-body table-responsive no-padding">
                <form name="search_form" id="search_form">
                <table class="table table-hover">
                    <tr>

                        <td>
                            <select aria-controls="example1" size="1" class="ms">
                                <option selected="selected" value="">Transaksi</option>
                                <?php foreach($jenis_transaksi as $sm15){ ?>
                                    <option value="transaksi<?php echo $sm15['id_jenis_transaksi']; ?>"><?php echo $sm15['jenis_transaksi']; ?></option>
                                <?php } ?>
                            </select>
                        </td>

                        <td>
                            <select aria-controls="example1" size="1" class="ms" name="client">
                                <option selected="selected" value="">Nama Client</option>
                                <?php foreach($client as $smm){ ?>
                                    <option value="client<?php echo $smm['id_client']; ?>"><?php echo $smm['nama']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <select aria-controls="example1" size="1" class="ms" name="bank">
                                <option selected="selected" value="">Bank</option>
                                <?php foreach($bank as $sm15){ ?>
                                    <option value="bank<?php echo $sm15['id_bank']; ?>"><?php echo $sm15['bank']; ?></option>
                                <?php } ?>
                            </select>
                        </td>

                        <td>
                            <select aria-controls="example1" size="1" class="ms" name="ib">
                                <option selected="selected" value="">Nama IB</option>
                                <?php foreach($msd_ib as $smm){ ?>
                                    <option value="ib<?php echo $smm['id_ib']; ?>"><?php echo $smm['nama_ib']; ?></option>
                                <?php } ?>
                            </select>
                        </td>

                        <td>
                            <select aria-controls="example1" size="1" class="ms" name="tgla">
                                <option selected="selected" value="">Tgl</option>
                                <option value='tgla1'>01</option>
                                <option value='tgla2'>02</option>
                                <option value='tgla3'>03</option>
                                <option value='tgla4'>04</option>
                                <option value='tgla5'>05</option>
                                <option value='tgla6'>06</option>
                                <option value='tgla7'>07</option>
                                <option value='tgla8'>08</option>
                                <option value='tgla9'>09</option>
                                <option value='tgla10'>10</option>
                                <option value='tgla11'>11</option>
                                <option value='tgla12'>12</option>
                                <option value='tgla13'>13</option>
                                <option value='tgla14'>14</option>
                                <option value='tgla15'>15</option>
                                <option value='tgla16'>16</option>
                                <option value='tgla17'>17</option>
                                <option value='tgla18'>18</option>
                                <option value='tgla19'>19</option>
                                <option value='tgla20'>20</option>
                                <option value='tgla21'>21</option>
                                <option value='tgla22'>22</option>
                                <option value='tgla23'>23</option>
                                <option value='tgla24'>24</option>
                                <option value='tgla25'>25</option>
                                <option value='tgla26'>26</option>
                                <option value='tgla27'>27</option>
                                <option value='tgla28'>28</option>
                                <option value='tgla29'>29</option>
                                <option value='tgla30'>30</option>
                                <option value='tgla31'>31</option>
                            </select>
                            <select aria-controls="example1" size="1" class='ms' name="blna">
                                <option selected="selected" value="">Bln</option>
                                <option value='blna1'>01</option>
                                <option value='blna2'>02</option>
                                <option value='blna3'>03</option>
                                <option value='blna4'>04</option>
                                <option value='blna5'>05</option>
                                <option value='blna6'>06</option>
                                <option value='blna7'>07</option>
                                <option value='blna8'>08</option>
                                <option value='blna9'>09</option>
                                <option value='blna10'>10</option>
                                <option value='blna11'>11</option>
                                <option value='blna12'>12</option>
                            </select>
                            <select aria-controls="example1" size="1" class="ms" name="thna">
                                <option selected="selected" value="">Thn</option>
                                <option value='thna2010'>2010</option>
                                <option value='thna2011'>2011</option>
                                <option value='thna2012'>2012</option>
                                <option value='thna2013'>2013</option>
                                <option value='thna2014'>2014</option>
                                <option value='thna2015'>2015</option>
                                <option value='thna2016'>2016</option>
                                <option value='thna2017'>2017</option>
                                <option value='thna2018'>2018</option>
                            </select>
                        </td>
                        <td>
                            <select aria-controls="example1" size="1" class="ms" name="jumlah">
                                <option selected="selected" value="">Jumlah</option>
                                <?php foreach($ltgg as $smm){ ?>
                                    <option value="jumlah<?php echo $smm['ltgg']; ?>"><?php echo $smm['ltgg']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <button aria-controls="example1" size="1">Reset</button>
                        </td>

                    </tr>
                </table>
                    </form>
                
                <table class="table table-hover" id="employees">
                    <thead><tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Transaksi</th>
                        <th>Nama Client </th>
                        <th>Bank</th>
                        <th>IB</th>
                        <th>Jumlah</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>

                </table>
                <p id="demo"></p>
            </div><!-- /.box-body -->


        </div><!-- /.box -->


    </section><!-- /.content -->
</aside><!-- /.right-side -->

<?php require_once "view/parsial/v_bawah.php"; ?>

<script src="jquery-latest.js"></script>
<script>

    function makeTable(data){                   // create table get data from database
        var tbl_body = "";                          // table body
        var a=1;
        $.each(data.users, function(i,user){
            var tbl_row =
                ""
                    +"<td>"+a+"</td>"
                    +"<td>"+user.tgl_transaksi+"</td>"
                    +"<td>"+user.jenis_transaksi+"</td>"
                    +"<td>"+user.nama+"</td>"
                    +"<td>"+user.bank+"</td>"
                    +"<td>"+user.nama_ib+"</td>"
                    +"<td>"+user.jumlah_transaksi+"</td>"
                    +"<td><a href=msd_transaksi_t.php?edit="+user.id_transaksi+"><button class=btn btn-primary btn-sm btn-flat>Edit</button></a></td>"
                    +"<td><a href=msd_transaksi_t.php?hapus="+user.id_transaksi+"><button onclick='alert(Yakin menghapus data transaksi microstudex ini?);' class=btn btn-primary btn-sm btn-flat >Hapus</button></a></td>"


                    +"</tr>" ;
            tbl_body += "<tr>"+tbl_row+"</tr>";
            a++;
        });
        return tbl_body;
    }

    function getEmployeeFilterOptions(){     // get filter options value
        var opts = [];
        $( "select option:selected" ).each(function(){             // this function select when radio button is clicked
            if(this.selected){
                opts.push(this.value);                 // get check box values
            }
        });
        return opts;
    }

    function updateEmployees(opts){        // update the filter using ajax
        $.ajax({
            type: "POST",                          //       POST method
            url: "checksearch.php",                      // search. page send data using json
            dataType : 'json',
            cache: false,
            data: {filterOpts: opts},
            success: function(records){
                $('#employees tbody').html(makeTable(records));
            }
        });
    }


    var $checkboxes = $(".ms");          // check radio button is clicked
    $checkboxes.on("change", function(){
        var opts = getEmployeeFilterOptions();    // update the database
        updateEmployees(opts);
    });
    updateEmployees();


    $(function() {
        $("#employees input[type=checkbox]").on("change", function(e) {
            var id = $(this).parent().index()+1,
                col = $("table tr th:nth-child("+id+"), table tr td:nth-child("+id+")");
            $(this).is(":checked") ? col.show() : col.hide();
        }).prop("checked", true).change();

        $("button").on("click", function(e) {
            $("input[type=checkbox]").prop("checked", true).change();
        });
    })
</script>

</body>
</html>