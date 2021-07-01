

<div class="box">

    <div class="table">
        <!-- Datatables -->
        <div class="col-lg-11">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary">Menu Kelola Barang</h3>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah">
                        <i class="fa fa-plus"> </i> Tambah Barang
                    </button>
                </div>


                <div class="table-responsive p-3">

                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>

                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <th>Stok Barang</th>
                                <th>Harga Barang /pcs</th>
                                <th>Status Barang</th>
                                <th>AKSI</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($barang->result() as $key => $data) { ?>
                            <tr>
                                <td><?php echo $data->kode_barang ?></td>
                                <td><?php echo $data->nama_barang ?></td>
                                <td><?php echo $data->jenis_barang ?></td>
                                <td><?php echo $data->stok_barang ?></td>
                                <td><?php echo $data->harga_barang ?></td>
                                <td><?php echo $data->status_barang ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button type="button" class="btn btn-warning">
                                            <a href="<?php echo site_url("Admin/C_Barang/updateBarang/" . $data->kode_barang)
                                                            ?>">
                                                <img src="<?php echo base_url('assets/image/edit.png'); ?>" width="25"
                                                    height="25">
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-success">
                                            <a href='<?php echo site_url("Admin/C_Barang/hapusBarang/" . $data->kode_barang)
                                                            ?>'>
                                                <img src="<?php echo base_url('assets/image/delete.png'); ?>" width="25"
                                                    height="25">
                                            </a>
                                        </button>
                                    </div>
                                </td>
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
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="<?= base_url("Admin/addBarang");?>" method="post">      
      <div class="modal-body">
        
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" id="nama_barang" name="nama_barang" placeholder="masukan nama barang" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jenis"> Jenis Barang </label>
            <input type="text" id="jenis" name="jenis" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="stock"> Stock Barang </label>
            <input type="number" id="stock" name="stock" class="form-control" required>
        </div>        
        <div class="form-group">
            <label for="harga"> Harga Barang </label>
            <input type="number" id="harga" name="harga" class="form-control" required>
        </div>        
        <div class="form-group">
            <label for="status"> Status Barang </label>
            <select name="status" id="" class="form-control">
                <option value="1"> Tersedia </option>
                <option value="2"> Tidak Tersedia </option>
            </select>
        </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Barang</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#dataTable').DataTable();
    });
</script>
