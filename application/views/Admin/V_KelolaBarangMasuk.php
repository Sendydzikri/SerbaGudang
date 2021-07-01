

<div class="box" style="color:black">

    <div class="table">
        <!-- Datatables -->
        <div class="col-lg-11">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary">Menu Kelola Barang Masuk</h3>

                </div>


                <div class="table-responsive p-3">

                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>

                                <th>ID Barang Masuk</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Nama Supplier</th>
                                <th>AKSI</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($barang as $b) { ?>
                            <tr>
                                <td><?php echo $b['id_masuk'] ?></td>
                                <td><?php echo $b['nama_barang'] ?></td>
                                <td><?php echo $b['jumlah_barang'] ?></td>
                                <td><?php echo $b['nama_user'] ?></td>
                                <td>
                                    <div class="btn-group text-white" role="group">
                                        <button type="button" class="btn btn-danger">
                                            <a href="<?= base_url('Admin/tolakBarang/'.$b['id_masuk']); ?>"><i class="fa fa-close text-white"></i></a>
                                        </button>
                                        <button type="button" class="btn btn-success">
                                            <a href="<?= base_url('Admin/terimaBarang/'.$b['id_masuk'] ); ?>"><i class="fa fa-check text-white"></i></a>
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#dataTable').DataTable();
    });
</script>
