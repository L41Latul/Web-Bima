

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
            <li><a href="index.php"> <i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Transaksi Microstodex</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Transaksi Microstodex <small> < Gunakan tombol Tab untuk filter > </small></h3>
                <div class="box-tools">
                    <div class="input-group">

                        <div class="input-group-btn">
                            <a href="msd_transaksi_t.php"><button class="btn btn-default pull-right"><span class="label label-primary"><i class="fa fa-plus"></i></span>  Tambah Data</button></a>
                            <form method="post" action="cetak/c_msd_transaksi.php">
                                <div id="forms"></div>
                            <button type="submit" class="btn btn-default pull-right"><span class="label label-primary"><i class="fa fa-print"></i></span> Cetak Laporan</button>
                            <input class="btn btn-default pull-right" name="subjudul" placeholder="Masukkan Keterangan Laporan" type="text">
                            </form>
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
                                <?php require_once 'view/parsial/v_select_tanggal.php'; ?></php>
                                <input type="text" size="11" id="klien" name="klien" placeholder="Nama Client" >
                                <input type="text" size="11" id="ib" name="ib" placeholder="Nama IB">
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
                        <th>No Akun</th>
                        <th>Nama Client </th>
                        <th>Bank</th>
                        <th>IB</th>
                        <th>Jumlah</th>
                        <th>Lihat</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                    </tfoot>

                </table>
            </div><!-- /.box-body -->

            <div class="box-footer clearfix no-border">
                <h5 class="box-title" style="font-weight: bold; color: ##3c8dbc;" id="jumlah"></h5>
            </div>

        </div><!-- /.box -->


    </section><!-- /.content -->
</aside><!-- /.right-side -->



<script src="jquery-latest.js"></script>
<script>
    function makeTable(data){                   // create table get data from database
        var tbl_body = "";                          // table body
        var a=1;
        $.each(data.users, function(i,user){
            var tbl_row =
                ""
                    +"<td>"+a+"</td>"
                    +"<td>"+user.PerDate+"</td>"
                    +"<td>"+user.jenis_transaksi+"</td>"
                    +"<td>"+user.no_akun+"</td>"
                    +"<td>"+user.nama+"</td>"
                    +"<td>"+user.bank+"</td>"
                    +"<td>"+user.nama_ib+"</td>"
                    +"<td>"+user.jumlah+"</td>"
                    +"<td><a href=msd_transaksi_t.php?lihat="+user.id_transaksi+"><button class='btn btn-sm btn-warning'><i class='fa fa-search'></i></button></a></td>"
                    +"<td><a href=msd_transaksi_t.php?edit="+user.id_transaksi+"><button class='btn btn-sm btn-info'><i class='fa fa-edit'></i></button></a></td>"
                    +"<td><a href=msd_transaksi_t.php?hapus="+user.id_transaksi+"><button class='btn btn-sm btn-danger'><i class='fa fa-trash-o'></i></button></a></td>"


                    +"</tr>" ;
            tbl_body += "<tr>"+tbl_row+"</tr>";
            a++;
        });
        return tbl_body;
    }

    function jumlah(data){                   // create table get data from database
        var b="<tr  style='font-weight: bold; color: ##3c8dbc;'>";
        b += "<td colspan='11'> JUMLAH DATA : "+data.jumlah+"</td></tr>";

        $.each(data.sums, function(i,suma){
            b += "<tr  style='font-weight: bold; color: ##3c8dbc;'><td colspan='11'> JUMLAH " +suma.jenis_transaksi+ " : " +suma.jml+ " </td></tr> ";
        });
        return b;
    }

    function forms(data){
        var cetak = "";
        cetak += "<textarea name='sql' style='display:none;' id='sql'>"+data.query+"</textarea>"
                +"<textarea name='jmldata' style='display:none;' id='jmldata'>"+data.jumlah+"</textarea>";
        $.each(data.sums, function(i,suma){
            cetak += "<textarea style='display:none;' name='"+suma.jenis_transaksi+"'>" +suma.jml+ "</textarea>";
        });
        return cetak;
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

    function getKlien(){
        var klien = $('#klien').val();
        return klien;
    }

    function getIb(){
        var ib = $('#ib').val();
        return ib;
    }

    function updateEmployees(opts, klien, ib){        // update the filter using ajax
        $.ajax({
            type: "POST",                          //       POST method
            url: "model/m_msd_transaksi.php",                      // search. page send data using json
            dataType : 'json',
            cache: false,
            data: {filterOpts: opts, filterKlien: klien, filterIb : ib},
            success: function(records){
                $('#employees tbody').html(makeTable(records));
                $('#forms').html(forms(records));
                $('#employees tfoot').html(jumlah(records));
            }
        });
    }


    var $checkboxes = $(".ms");          // check radio button is clicked
    $checkboxes.on("change", function(){
        var klien = getKlien();
        var ib = getIb();
        var opts = getEmployeeFilterOptions();    // update the database
        updateEmployees(opts, klien, ib);
    });

    $('#klien').change(function(){
        var opts = getEmployeeFilterOptions();
        var a = this.value;
        var ib = getIb();
        updateEmployees(opts, a, ib);
    })

    $('#ib').change(function(){
        var opts = getEmployeeFilterOptions();
        var klien = getKlien();
        var a = this.value;
        updateEmployees(opts, klien, a);
    })
    updateEmployees();
</script>


<?php require_once "view/parsial/v_bawah.php"; ?>