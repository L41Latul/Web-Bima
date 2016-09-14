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
                <li class="active">Transaksi Microstodex</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Transaksi Microstodex</h3>
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
                    <table class="table table-hover">
                        <tr>

                            <td>
                                <select class="form-control" name="link">
                                    <option selected="selected">Transaksi</option>
                                    <?php foreach($jenis_transaksi as $sm15){ ?>
                                        <option value="link<?php echo $sm15['id_jenis_transaksi']; ?>"><?php echo $sm15['jenis_transaksi']; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="link">
                                    <option selected="selected">Bank</option>
                                    <?php foreach($bank as $sm15){ ?>
                                        <option value="link<?php echo $sm15['id_bank']; ?>"><?php echo $sm15['bank']; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="link">
                                    <option selected="selected">Bulan Transaksi</option>
                                    <?php foreach($link as $sm15){ ?>
                                        <option value="link<?php echo $sm15['id_link']; ?>"><?php echo $sm15['nama_link']; ?></option>
                                    <?php } ?>
                                </select>
                            </td>

                            <td>
                                <select class="form-control" name="ltgg">
                                    <option selected="selected">Jumlah</option>
                                    <?php foreach($ltgg as $smm){ ?>
                                        <option value="ltgg<?php echo $smm['ltgg']; ?>"><?php echo $smm['ltgg']; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <input type="text" size="11" id="klien" name="klien" placeholder="Nama Client" >
                            </td>

                            <td>
                                <input type="text" size="11" id="ib" name="ib" placeholder="Nama IB">
                            </td>
                            <td>
                                <button class="btn btn-default pull-right">Reset</button>
                            </td>

                        </tr>
                    </table>
                    <table class="table table-hover">
                        <tbody><tr>
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
                        <?php
                        $no=1;

                        foreach($msd_transaksi as $e) {

                        ?>

                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo tgl_eng_to_ind($e['tgl_transaksi']); ?></td>
                            <td><?php echo $e['jenis_transaksi']; ?></td>
                            <td><?php echo $e['nama']; ?></td>
                            <td><?php echo $e['bank']; ?></td>
                            <td><?php echo $e['nama_ib']; ?></td>
                            <td><?php echo $e['jumlah_transaksi']; ?></td>
                            <td><a href=msd_transaksi_t.php?edit=<?php echo $e['id_transaksi']; ?>><button class="btn btn-primary btn-sm btn-flat">Edit</button></a></td>
                            <td><a href="msd_transaksi_t.php?hapus=<?php echo $e['id_transaksi']; ?>"><button class="btn btn-primary btn-sm btn-flat" onclick="return confirm('Yakin menghapus data transaksi microstudex ini?');">Hapus</button></a></td>
                        </tr>
                        <?php } ?>
                        </tbody></table>
                </div><!-- /.box-body -->

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
                        +"<td>"+user.nama+"</td>"
                        +"<td>"+user.bank+"</td>"
                        +"<td>"+user.nama_ib+"</td>"
                        +"<td>"+user.jumlah+"</td>"
                        +"<td><a href=msd_transaksi_t.php?edit="+user.id_transaksi+"><button class=btn btn-primary btn-sm btn-flat>Edit</button></a></td>"
                        +"<td><a href=msd_transaksi_t.php?hapus="+user.id_transaksi+"><button onclick='alert(Yakin menghapus data transaksi microstudex ini?);' class=btn btn-primary btn-sm btn-flat >Hapus</button></a></td>"


                        +"</tr>" ;
                tbl_body += "<tr>"+tbl_row+"</tr>";
                a++;
            });
            return tbl_body;
        }

        function jumlah(data){                   // create table get data from database
            var b="";
            b += data.jumlah;
            return b;
        }

        function cetak(data){                   // create table get data from database
            var a = String(data.query);
            return a;
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
                url: "model/m_fxp_transaksi.php",                      // search. page send data using json
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
    </script>
<?php require_once "view/parsial/v_bawah.php"; ?>