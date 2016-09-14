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
                <li class="active">Murid</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Murid <small> < Gunakan tombol Tab untuk filter > </small></h3>
                    <div class="box-tools">
                        <div class="input-group">

                            <div class="input-group-btn">
                                <a href="ftc_murid_t.php"><button class="btn btn-default pull-right"><span class="label label-primary"><i class="fa fa-plus"></i></span>  Tambah Data</button></a>
                                <form method="post" action="cetak/c_ftc_murid.php">
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
                                    <select aria-controls="example1" size="1" class="ms" style="height: 25px;">
                                        <option selected="selected" value="">Tipe Kelas</option>
                                        <?php foreach($kelas as $sm15){ ?>
                                            <option value="kelas<?php echo $sm15['id_kelas']; ?>"><?php echo $sm15['tipe_kelas']; ?></option>
                                        <?php } ?>
                                    </select>&nbsp;&nbsp;
                                    <?php require_once 'view/parsial/v_select_tanggal.php'; ?></php> &nbsp;
                                    <input type="text" size="11" id="murid" name="murid" placeholder="Nama Murid" >
                                    <button aria-controls="example1" size="1">Reset</button>
                                </td>
                            </tr>
                        </table>
                    </form>

                    <table class="table table-hover" id="employees">
                        <thead><tr>
                            <th>No</th>
                            <th>Tgl Daftar</th>
                            <th>Nama </th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Email</th>
                            <th>Pin BB</th>
                            <th>Kelas</th>
                            <th>Biaya</th>
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
            $.each(data.murid, function(i,user){
                var tbl_row =
                    ""
                        +"<td>"+a+"</td>"
                        +"<td>"+user.PerDate+"</td>"
                        +"<td>"+user.nama+"</td>"
                        +"<td>"+user.alamat+"</td>"
                        +"<td>"+user.no_telp+"</td>"
                        +"<td>"+user.emaill+"</td>"
                        +"<td>"+user.pin_bb+"</td>"
                        +"<td>"+user.tipe_kelas+"</td>"
                        +"<td>"+user.biaya+"</td>"
                        +"<td><a href=ftc_murid_t.php?lihat="+user.id_murid+"><button class='btn btn-sm btn-warning'><i class='fa fa-search'></i></button></a></td>"
                        +"<td><a href=ftc_murid_t.php?edit="+user.id_murid+"><button class='btn btn-sm btn-info'><i class='fa fa-edit'></i></button></a></td>"
                        +"<td><a href=ftc_murid_t.php?hapus="+user.id_murid+"><button class='btn btn-sm btn-danger'><i class='fa fa-trash-o'></i></button></a></td>"

                        +"</tr>" ;
                tbl_body += "<tr>"+tbl_row+"</tr>";
                a++;
            });
            return tbl_body;
        }

        function jumlah(data){                   // create table get data from database
            var b="<tr  style='font-weight: bold; color: ##3c8dbc;'>";
            b += "<td></td><td colspan='10'> JUMLAH DATA : "+data.jumlah+"</td>";
            b += "</tr>";
            b +="<tr  style='font-weight: bold; color: ##3c8dbc;'>";
        $.each(data.sums, function(i,sumb){
            b += "<td></td><td colspan='10'> TOTAL BIAYA: "+sumb.total_biaya+"</td>";
        });
            b += "</tr>"
            return b;
        }

        function forms(data){
            var cetak = "";
            cetak += "<textarea name='sql' style='display:none;' id='sql'>"+data.query+"</textarea>"
                +"<textarea name='jmldata' style='display:none;' id='jmldata'>"+data.jumlah+"</textarea>";

        $.each(data.sums, function(i,sumb){
            cetak += "<textarea style='display:none;' name='totalbiaya'>" +sumb.total_biaya+ "</textarea>";
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

        function getMurid(){
            var murid = $('#murid').val();
            return murid;
        }

        function updateEmployees(opts, murid){        // update the filter using ajax
            $.ajax({
                type: "POST",                          //       POST method
                url: "model/m_ftc_murid.php",                      // search. page send data using json
                dataType : 'json',
                cache: false,
                data: {filterOpts: opts, filterMurid : murid},
                success: function(records){
                    $('#employees tbody').html(makeTable(records));
                    $('#forms').html(forms(records));
                    $('#employees tfoot').html(jumlah(records));
                }
            });
        }


        var $checkboxes = $(".ms");          // check radio button is clicked
        $checkboxes.on("change", function(){
            var murid = getMurid();
            var opts = getEmployeeFilterOptions();    // update the database
            updateEmployees(opts, murid);
        });

        $('#murid').change(function(){
            var opts = getEmployeeFilterOptions();
            var murid = getMurid();
            updateEmployees(opts, murid);
        })

        updateEmployees();


    </script>

<?php require_once "view/parsial/v_bawah.php"; ?>