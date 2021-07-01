<!DOCTYPE html>
<html>

<head>
    <title>Edit Barang</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/Bootstrap.min.css'); ?>">
</head>

<body>
    <div class="box">
        <?php foreach ($row as $u) {   ?>
        <form action="<?php echo site_url('Admin/C_Barang/prosesUpdate/') . $u->kode_barang ?>" method="post">
            <center>
                <h1> Form Edit Barang </h1>
            </center>
            <div class="container">
                <div class="row">
                    <div class="col-sm">


                        <label>ID Barang</label><input class="form-control" name="kode_barang"
                            value="<?php echo $u->kode_barang ?>" type="text" aria-label="default input example"
                            disabled><br>

                        <label>Nama Barang</label><input class="form-control" name="nama_barang"
                            value="<?php echo $u->nama_barang ?>" type="text" aria-label="default input example"><br>

                        <label>Jenis Barang</label><input class="form-control" name="jenis_barang"
                            value="<?php echo $u->jenis_barang ?>" type="text" aria-label="default input example"><br>

                        <label>Stok Barang</label><input class="form-control" name="stok_barang"
                            value="<?php echo $u->stok_barang ?>" type="text" aria-label="default input example"><br>

                        <label>Harga Barang /pcs</label><input class="form-control" name="harga_barang"
                            value="<?php echo $u->harga_barang ?>" type="text" aria-label="default input example"><br>

                        <label>Status Barang</label><input class="form-control" name="status_barang"
                            value="<?php echo $u->status_barang ?>" type="text" aria-label="default input example"><br>

                        <button type="submit" value="Update" class="btn btn-primary">Edit</button>

                    </div>
                </div>
            </div>



        </form>
        <?php }  ?>

    </div>
</body>

</html>