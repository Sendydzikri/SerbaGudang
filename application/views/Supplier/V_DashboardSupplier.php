<div class="container mt-4">
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah">
		<i class="fa fa-plus"></i> Tambah Barang
	</button>
</div>
<div class="container mt-2">
	<div class="text-center"> <b> DATA YANG SUDAH DI APPROVE </b> </div>
	<table id="table-data" class="table table-striped table-bordered data">
		<thead class="bg-dark text-white">
			<th>ID Masuk</th>
			<th>Kode Barang</th>
			<th>Jumlah Barang</th>
		</thead>
		<tbody>
			<?php foreach($data_supplierApprove as $ds){ ?>
				<tr>
					<td><?= $ds['id_masuk'] ?></td>
					<td><?= $ds['nama_barang'] ?></td>
					<td><?= $ds['jumlah_barang'] ?></td>
				</tr>
			<?php }?>
		</tbody>
	</table>

</div>

<div class="container mt-5">
	<div class="text-center">  <b> DATA YANG BELUM DI APPROVE </b> </div>
	<table id="table-data" class="table table-striped table-bordered data">
		<thead class="bg-dark text-white">
			<th>ID Masuk</th>
			<th>Kode Barang</th>
			<th>Jumlah Barang</th>
		</thead>
		<tbody>
			<?php foreach($data_supplier as $ds){ ?>
				<tr>
					<td><?= $ds['id_masuk'] ?></td>
					<td><?= $ds['nama_barang'] ?></td>
					<td><?= $ds['jumlah_barang'] ?></td>
				</tr>
			<?php }?>
		</tbody>
	</table>

</div>
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	<form action="<?= base_url("Supplier/addBarang");?>" method="post">      
      <div class="modal-body">
      	
        <div class="form-group">
        	<label for="inputKode">Pilih Barang</label>
        	<select name="kode_barang" id="inputKode" class="form-control">
        		<?php foreach($kode as $k){ ?>
        			<option value="<?= $k['kode_barang'] ?>"><?= $k['nama_barang'] ?></option>
        		<?php }?>
        	</select>
        </div>
        <div class="form-group">
        	<label for="jumlah"> Jumlah Barang </label>
        	<input type="number" id="jumlah" name="jumlah" class="form-control">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Kirim Barang</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){

        $('.data').DataTable();

    });
</script>