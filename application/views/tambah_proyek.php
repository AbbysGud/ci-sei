<div style="padding-bottom: 20px;">
	<form action="<?= base_url('proyek/tambah_aksi') ?>" method="post">
		<div class="form-group">
			<label>Nama Proyek</label>
			<input type="text" name="namaProyek" class="form-control">
			<?= form_error('namaProyek', '<div class="text-small text-danger">', '</div>'); ?>
		</div>
		<div class="form-group">
			<label>Client</label>
			<input type="text" name="client" class="form-control">
			<?= form_error('client', '<div class="text-small text-danger">', '</div>'); ?>
		</div>
		<div class="form-group">
			<label>Tanggal Mulai</label>
			<input type="date" name="tglMulai" class="form-control">
			<?= form_error('tglMulai', '<div class="text-small text-danger">', '</div>'); ?>
		</div>
		<div class="form-group">
			<label>Tanggal Selesai</label>
			<input type="date" name="tglSelesai" class="form-control">
			<?= form_error('tglSelesai', '<div class="text-small text-danger">', '</div>'); ?>
		</div>
		<div class="form-group">
			<label>Pimpinan Proyek</label>
			<input type="text" name="pimpinanProyek" class="form-control">
			<?= form_error('pimpinanProyek', '<div class="text-small text-danger">', '</div>'); ?>
		</div>
		<div class="form-group">
			<label>Keterangan</label>
			<textarea name="keterangan" class="form-control"></textarea>
			<?= form_error('keterangan', '<div class="text-small text-danger">', '</div>'); ?>
		</div>
		<div class="form-group">
			<label>Lokasi</label>
			<select name="lokasiId" class="form-control">
				<option value="" hidden>-- Pilih Lokasi --</option>
				<?php foreach($lokasi as $lo) : ?>
					<option value="<?= $lo['id'] ?>"><?= $lo['namaLokasi'] ?></option>
				<?php endforeach ?>
			</select>
			<?= form_error('lokasi_id', '<div class="text-small text-danger">', '</div>'); ?>
		</div>
		<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
		<button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
	</form>
</div>

