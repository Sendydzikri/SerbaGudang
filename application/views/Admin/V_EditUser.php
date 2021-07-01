<!DOCTYPE html>
<html>

<head>
    <title>Edit User</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/Bootstrap.min.css'); ?>">
</head>

<body>
    <div class="box">
        <?php foreach ($row as $u) {   ?>
        <form action="<?php echo site_url('Admin/C_User/prosesUpdate/') . $u->id_user ?>" method="post">
            <center>
                <h1> Form Edit User </h1>
            </center>
            <div class="container">
                <div class="row">
                    <div class="col-sm">


                        <label>ID User</label><input class="form-control" name="id_user"
                            value="<?php echo $u->id_user ?>" type="text" aria-label="default input example"
                            disabled><br>

                        <label>Nama User</label><input class="form-control" name="nama_user"
                            value="<?php echo $u->nama_user ?>" type="text" aria-label="default input example"><br>

                        <label>Username</label><input class="form-control" name="username"
                            value="<?php echo $u->username ?>" type="text" aria-label="default input example"><br>
                        
                        <label>Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-control">
                            <option value="1"> Admin </option>
                            <option value="2"> Pimpinan </option>
                            <option value="3"> Supplier </option>
                        </select><br>

                        <label>Password</label><input class="form-control" name="password"
                            value="<?php echo $u->password ?>" type="text" aria-label="default input example"><br>

                        <button type="submit" value="Update" class="btn btn-primary">Edit</button>

                    </div>
                </div>
            </div>



        </form>
        <?php }  ?>

    </div>
</body>

</html>