

<div class="box" style="color:black">

    <div class="table">
        <!-- Datatables -->
        <div class="col-lg-11">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary">Menu Kelola Barang Keluar</h3>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahKeluar">
                        <i class="fa fa-plus"> </i> Tambah Barang Keluar
                    </button>
                </div>


                <div class="table-responsive p-3">

                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>

                                <th>ID Barang Keluar</th>
                                <th>Nama Customer</th>                                
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Total Harga</th>
                                <th>Tanggal Keluar</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($barang as $b) { ?>
                            <tr>
                                <td><?php echo $b['id_keluar'] ?></td>
                                <td><?php echo $b['nama_customer'] ?></td>
                                <td><?php echo $b['nama_barang'] ?></td>
                                <td><?php echo $b['jumlah_barang'] ?></td>
                                <td><?php echo $b['total_harga'] ?></td>
                                <td><?php echo $b['tgl_keluar'] ?></td>

                            </tr>
                            <?php } ?>
                            </tbody>
                            <br><br>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="tambahKeluar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="<?= base_url("Admin/addBarangKeluar");?>" method="post">      
      <div class="modal-body">
        <div class="form-group">
            <label for="kode_barang"> Nama Barang </label>
            <select name="kode_barang" id="kode_barang" class="form-control">
                <?php foreach($dataBarang as $db){?>
                    <option value="<?= $db['kode_barang'] ?>"><?= $db['nama_barang'] ?></option>
                <?php }?>
            </select>
        </div>        
        <div class="form-group">
            <label for="jumlah_barang">Jumlah barang</label>
            <input type="number" id="jumlah_barang" name="jumlah_barang" placeholder="masukan Jumlah Barang" class="form-control" required>
        </div>     
        <div class="form-group">
            <label for="nama_customer"> Nama Customer </label>
            <input type="text" id="nama_customer" name="nama_customer" placeholder="masukan nama customer" class="form-control" required>
        </div>
                             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Barang Keluar</button>
      </div>
      </form>
    </div>
  </div>
</div>        
<script type="text/javascript">
    $(document).ready(function(){
        $('#dataTable').DataTable();

        $('')
    });
</script>
