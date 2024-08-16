<div style="padding-bottom: 20px;">
	<form action="<?= base_url('lokasi/tambah_aksi') ?>" method="post">
		<div class="form-group">
			<label>Nama Lokasi</label>
			<input type="text" name="namaLokasi" class="form-control">
			<?= form_error('namaLokasi', '<div class="text-small text-danger">', '</div>'); ?>
		</div>
		<div class="form-group">
			<label>Negara</label>
			<input type="text" name="negara" class="form-control">
			<?= form_error('negara', '<div class="text-small text-danger">', '</div>'); ?>
		</div>
		<div class="form-group">
			<label>Provinsi</label>
			<input type="text" name="provinsi" class="form-control">
			<?= form_error('provinsi', '<div class="text-small text-danger">', '</div>'); ?>
		</div>
		<div class="form-group">
			<label>Kota</label>
			<input type="text" name="kota" class="form-control">
			<?= form_error('kota', '<div class="text-small text-danger">', '</div>'); ?>
		</div>
		<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
		<button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
	</form>
</div>

