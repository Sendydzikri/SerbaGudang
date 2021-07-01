

<div class="box" style="color:black">

    <div class="table">
        <!-- Datatables -->
        <div class="col-lg-11">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary">Menu Kelola User</h3>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahUser">
                        <i class="fa fa-plus"> </i> Tambah User
                    </button>
                </div>


                <div class="table-responsive p-3">

                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>

                                <th>ID User</th>
                                <th>Nama User</th>
                                <th>Level</th>
                                <th>Jabatan</th>
                                <th>Username</th>
                                <th>AKSI</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($user as $u) { ?>
                            <tr>
                                <td><?php echo $u['id_user'] ?></td>
                                <td><?php echo $u['nama_user'] ?></td>
                                <td><?php echo $u['level'] ?></td>
                                <td><?php echo $u['jabatan'] ?></td>
                                <td><?php echo $u['username'] ?></td>
                                <td>
                                    <div class="btn-group text-white" role="group">
                                        <button type="button" class="btn btn-danger">
                                            <a href="<?= base_url('Admin/C_User/hapusUser/'.$u['id_user']); ?>">
                                            <i class="fa fa-close text-white"></i></a>
                                        </button>
                                        <button type="button" class="btn btn-warning" >
                                            <a href="<?= base_url('Admin/C_User/TampilEdit/'.$u['id_user']); ?>">
                                            <i class="fa fa-file text-white"></i></a>
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


    <div class="box" style="color:black">

    <div class="table">
        <!-- Datatables -->
        <div class="col-lg-11">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary">Menu Approval User</h3>
                </div>


                <div class="table-responsive p-3">

                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>

                                <th>ID User</th>
                                <th>Nama User</th>
                                <th>Level</th>
                                <th>Jabatan</th>
                                <th>Username</th>
                                <th>AKSI</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($approval_user as $us) { ?>
                            <tr>
                                <td><?php echo $us['id_user'] ?></td>
                                <td><?php echo $us['nama_user'] ?></td>
                                <td><?php echo $us['level'] ?></td>
                                <td><?php echo $us['jabatan'] ?></td>
                                <td><?php echo $us['username'] ?></td>
                                <td>
                                    <div class="btn-group text-white" role="group">
                                            <a href="<?= base_url('Admin/hapusRegist/'.$us['id_user']); ?>" class="btn btn-danger">
                                            <i class="fa fa-close text-white"></i></a>
                                            <a href="<?= base_url("Admin/Approve/".$us['id_user']); ?>" class="btn btn-success">
                                            <i class="fa fa-check text-white"></i></a>
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

<div class="modal fade" id="tambahUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="<?= base_url("Admin/addUser");?>" method="post">      
      <div class="modal-body">
        
        <div class="form-group">
            <label for="nama_user">Nama User</label>
            <input type="text" id="nama_user" name="nama_user" placeholder="masukan nama user" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="username"> Username </label>
            <input type="text" id="username" name="username" placeholder="masukan username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jabatan"> Jabatan </label>
            <select name="jabatan" id="jabatan" class="form-control">
                <option value="1"> Admin </option>
                <option value="2"> Pimpinan </option>
                <option value="3"> Supplier </option>
            </select>
        </div>
        <div class="form-group">
            <label for="password"> Password </label>
            <input type="password" id="password" name="password1"  placeholder="masukan password"  class="form-control" required>
        </div> 
        <div class="form-group">
            <label for="password"> Password Verif</label>
            <input type="password" id="password" name="password2" class="form-control" placeholder="masukan ulang password"  required>
        </div>                                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah User</button>
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

