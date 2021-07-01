

<div class="box" style="color:black">

    <div class="table">
        <!-- Datatables -->
        <div class="col-lg-11">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary">Menu Laporan Barang Keluar</h3>
                    <button type="button" id="print" class="btn btn-primary">
                        <i class="fa fa-plus"> </i> Print Laporan
                    </button>
                </div>


                <div class="table-responsive p-3">

                    <table class="table table-bordered table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>

                                <th>ID Barang Keluar</th>
                                <th>Nama Customer</th>                                
                                <th>Nama Barang</th>
                                <th>Tanggal Keluar</th>
                                <th>Jumlah Barang</th>
                                <th>Total Harga</th>
                                

                            </tr>
                        </thead>
                                               <tbody>
                            <?php
                            if($barang_keluar != null ){
                            foreach ($barang_keluar as $b) { ?>
                            <tr>
                                <td><?php echo $b['id_keluar'] ?></td>
                                <td><?php echo $b['nama_customer'] ?></td>
                                <td><?php echo $b['nama_barang'] ?></td>
                                <td><?php echo $b['tgl_keluar'] ?></td>
                                <td><?php echo $b['jumlah_barang'] ?></td>
                                <td><?php echo $b['tot_harga'] ?></td>
                               

                            </tr>
                            <?php  $total_jumlah = $b['total_jumlah']; 
                                   $total_harga = $b['tot_harga'];
                            }}else{ ?>

                                <td colspan="6" class="text-center"> Data Masih Kosong ! </td>

                            <?php 

                                $total_jumlah = 0; 
                                $total_harga = 0;
                            }?>
                            </tbody>
                            <tr>
                                <th colspan="3"></th>
                                <th>Total : </th>
                                <th> <?= $total_jumlah ?> pcs </th>
                                <th> Rp. <?= $total_harga ?>,- </th>
                            </tr>
                            <br><br>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#dataTable').DataTable();
        $('#print').on('click',function(){
            window.print();
        });
    });
</script>
