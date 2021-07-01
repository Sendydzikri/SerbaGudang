<style>
.r {
    align-content: center;
    margin-left: 300px;
}
</style>
<center>
    <div class="container-fluid">
        <h1 class="mt-4">HALAMAN UTAMA ADMIN</h1>

        <div class="row r">
            <div class="col-xl-4 col-md-6">
                <div class="card bg-primary text-black mb-4">
                    <div class="card-body">User</div>


                    <div class="card-footer d-flex  justify-content-between"><i class="fa">TOTAL :</i><?= $user ?>
                    </div>



                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="card bg-warning text-black mb-4">
                    <div class="card-body">Barang</div>

                    <div class="card-footer d-flex  justify-content-between"><i class="fa">TOTAL :</i><?= $barang ?>
                    </div>


                </div>
            </div>
        </div>
    </div>
</center>