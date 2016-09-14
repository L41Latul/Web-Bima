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
                <li class="active">IB Microstodex</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data IB Microstodex <small> < Gunakan tombol Tab untuk filter > </small></h3>
                    <div class="box-tools">
                        <div class="input-group">

                            <div class="input-group-btn">
                                <a href="msd_ib_t.php"><button class="btn btn-default pull-right"><span class="label label-primary"><i class="fa fa-plus"></i></span>  Tambah Data</button></a>
                                <form method="post" action="cetak/c_msd_ib.php">
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
                        <input type="text" id="nama" placeholder="Filter Nama IB"  style="margin-left: 10px;">
                    </form>

                    <table class="table table-hover" id="employees">
                        <thead><tr>
                            <th>No</th>
                            <th>Nama </th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Email</th>
                            <th>Pin BB</th>
                            <th>Bank</th>
                            <th>Client</th>
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
            $.each(data.msd_ib, function(i,user){
                var tbl_row =
                    ""
                        +"<td>"+a+"</td>"
                        +"<td>"+user.nama_ib+"</td>"
                        +"<td>"+user.alamat+"</td>"
                        +"<td>"+user.no_telp+"</td>"
                        +"<td>"+user.email+"</td>"
                        +"<td>"+user.pin_bb+"</td>"
                        +"<td>"+user.bank+"</td>"
                        +"<td style='text-align: center;'>"+user.jumlah_client+"</td>"
                        +"<td><a href=msd_ib_t.php?lihat="+user.id_ib+"><button class='btn btn-sm btn-warning'><i class='fa fa-search'></i></button></a></td>"
                        +"<td><a href=msd_ib_t.php?edit="+user.id_ib+"><button class='btn btn-sm btn-info'><i class='fa fa-edit'></i></button></a></td>"
                        +"<td><a href=msd_ib_t.php?hapus="+user.id_ib+"><button class='btn btn-sm btn-danger'><i class='fa fa-trash-o'></i></button></a></td>"


                        +"</tr>" ;
                tbl_body += "<tr>"+tbl_row+"</tr>";
                a++;
            });
            return tbl_body;
        }

        function jumlah(data){                   // create table get data from database
            var b="<tr  style='font-weight: bold; color: ##3c8dbc;'>";
            b += "<td></td><td colspan='9'> JUMLAH DATA : "+data.jumlah+"</td>";
            b += "</tr>"
            return b;
        }

        function forms(data){
            var cetak = "";
            cetak += "<textarea name='sql' style='display:none;' id='sql'>"+data.query+"</textarea>"
                +"<textarea name='jmldata' style='display:none;' id='jmldata'>"+data.jumlah+"</textarea>";
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

        function getNama(){
            var nama = $('#nama').val();
            return nama;
        }

        function getAlamat(){
            var alamat = $('#alamat').val();
            return alamat;
        }

        function getTelp(){
            var telp = $('#no_telp').val();
            return telp;
        }

        function getEmail(){
            var email = $('#email').val();
            return email;
        }

        function getBb(){
            var pin_bb = $('#pin_bb').val();
            return pin_bb;
        }

        function getWebsite(){
            var website = $('#website').val();
            return website;
        }

        function updateEmployees(opts, nama, alamat, telp, email, bb, website){        // update the filter using ajax
            $.ajax({
                type: "POST",                          //       POST method
                url: "model/m_msd_ib.php",                      // search. page send data using json
                dataType : 'json',
                cache: false,
                data: {filterOpts: opts, f_nama: nama, f_alamat : alamat, f_telp : telp, f_email : email, f_bb : bb, f_web : website},
                success: function(records){
                    $('#employees tbody').html(makeTable(records));
                    $('#forms').html(forms(records));
                    $('#employees tfoot').html(jumlah(records));
                }
            });
        }

        var $checkboxes = $(".ms");          // check radio button is clicked
        $checkboxes.on("change", function(){
            var opts = getEmployeeFilterOptions();
            var nama = getNama();
            var alamat = getAlamat();
            var telp = getTelp();
            var email = getEmail();
            var bb = getBb();
            var website = getWebsite();
            updateEmployees(opts, nama, alamat, telp, email, bb, website);
        });

        $('#nama').change(function(){
            var opts = getEmployeeFilterOptions();
            var nama = this.value;
            var alamat = getAlamat();
            var telp = getTelp();
            var email = getEmail();
            var bb = getBb();
            var website = getWebsite();
            updateEmployees(opts, nama, alamat, telp, email, bb, website);
        })

        $('#alamat').change(function(){
            var opts = getEmployeeFilterOptions();
            var nama = getNama();
            var alamat = this.value;
            var telp = getTelp();
            var email = getEmail();
            var bb = getBb();
            var website = getWebsite();
            updateEmployees(opts, nama, alamat, telp, email, bb, website);
        })

        $('#no_telp').change(function(){
            var opts = getEmployeeFilterOptions();
            var nama = getNama();
            var alamat = getAlamat();
            var telp = this.value;
            var email = getEmail();
            var bb = getBb();
            var website = getWebsite();
            updateEmployees(opts, nama, alamat, telp, email, bb, website);
        })

        $('#email').change(function(){
            var opts = getEmployeeFilterOptions();
            var nama = getNama();
            var alamat = getAlamat();
            var telp = getTelp();
            var email = this.value;
            var bb = getBb();
            var website = getWebsite();
            updateEmployees(opts, nama, alamat, telp, email, bb, website);
        })

        $('#pin_bb').change(function(){
            var opts = getEmployeeFilterOptions();
            var nama = getNama();
            var alamat = getAlamat();
            var telp = getTelp();
            var email = getEmail();
            var bb = this.value;
            var website = getWebsite();
            updateEmployees(opts, nama, alamat, telp, email, bb, website);
        })

        $('#website').change(function(){
            var opts = getEmployeeFilterOptions();
            var nama = getNama();
            var alamat = getAlamat();
            var telp = getTelp();
            var email = getEmail();
            var bb = getBb();
            var website = this.value;
            updateEmployees(opts, nama, alamat, telp, email, bb, website);
        })
        updateEmployees();
    </script>
<?php require_once "view/parsial/v_bawah.php"; ?>