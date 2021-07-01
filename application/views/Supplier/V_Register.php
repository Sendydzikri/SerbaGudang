<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4 text-center">Form Register !</h3>
              <form method="POST" action="<?= base_url("Supplier/aksi_register") ?>"> 
                <div class="form-label-group">
                  <input type="text" name="nama_user" id="inputEmail" class="form-control" placeholder="Masukan Username Anda" required autofocus>
                  <label for="inputEmail">Nama User</label>
                </div>

                <div class="form-label-group">
                  <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Masukan Username Anda" required autofocus>
                  <label for="inputEmail">Username</label>
                </div>

                <div class="form-label-group">
                  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                  <label for="inputPassword">Password</label>
                </div>
                <div class="form-label-group">
                  <input type="password" name="password1" id="inputPassword1" class="form-control" placeholder="Masukan Ulang Password" required>
                  <label for="inputPassword1">Masukan Ulang Password</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Daftar</button>
                <p class="text-center"><a href="<?= base_url('Login') ?>">Kembali</a> </p> 
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
