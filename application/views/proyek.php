<?= $this->session->flashdata('pesan'); ?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
			 <a href="<?= base_url('proyek/tambah') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Proyek</a>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr class="text-center">
							<th>No</th>
							<th>Nama Proyek</th>
							<th>Client</th>
							<th>Tanggal Mulai</th>
							<th>Tanggal Selesai</th>
							<th>Pimpinan Proyek</th>
							<th>Keterangan</th>
							<th>Lokasi</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						<?php foreach($proyek as $pr) : ?>
							<tr class="text-center">
								<td><?= $no++ ?></td>
								<td><?= $pr['namaProyek'] ?></td>
								<td><?= $pr['client'] ?></td>
								<td><?= date('d/m/Y', strtotime($pr['tglMulai'])) ?></td>
								<td><?= date('d/m/Y', strtotime($pr['tglSelesai'])) ?></td>
								<td><?= $pr['pimpinanProyek'] ?></td>
								<td><?= $pr['keterangan'] ?></td>
								<td><?= $pr['lokasiId']['namaLokasi'] ?></td>
								<td>
									<button data-toggle="modal" data-target="#edit<?= $pr['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
									<a href="<?= base_url('proyek/delete/' . $pr['id']) ?>" class="btn btn-danger btn-sm" 
										onclick="return confirm('Apakah anda yakin ingin hapus data ini?')"><i class="fas fa-trash"></i></a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->

		<!-- Modal Edit -->
		<?php foreach($proyek as $pr) : ?>
		<div class="modal fade" id="edit<?= $pr['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Proyek</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url('proyek/edit/' . $pr['id']) ?>" method="post">
							<div class="form-group">
								<label>Nama Proyek</label>
								<input type="text" name="namaProyek" class="form-control" value="<?= $pr['namaProyek'] ?>">
								<?= form_error('namaProyek', '<div class="text-small text-danger">', '</div>'); ?>
							</div>
							<div class="form-group">
								<label>Client</label>
								<input type="text" name="client" class="form-control" value="<?= $pr['client'] ?>">
								<?= form_error('client', '<div class="text-small text-danger">', '</div>'); ?>
							</div>
							<div class="form-group">
								<label>Tanggal Mulai</label>
								<input type="date" name="tglMulai" class="form-control" value="<?= date('Y-m-d', strtotime($pr['tglMulai'])) ?>">
								<?= form_error('tglMulai', '<div class="text-small text-danger">', '</div>'); ?>
							</div>
							<div class="form-group">
								<label>Tanggal Selesai</label>
								<input type="date" name="tglSelesai" class="form-control" value="<?= date('Y-m-d', strtotime($pr['tglSelesai'])) ?>">
								<?= form_error('tglSelesai', '<div class="text-small text-danger">', '</div>'); ?>
							</div>
							<div class="form-group">
								<label>Pimpinan Proyek</label>
								<input type="text" name="pimpinanProyek" class="form-control" value="<?= $pr['pimpinanProyek'] ?>">
								<?= form_error('pimpinanProyek', '<div class="text-small text-danger">', '</div>'); ?>
							</div>
							<div class="form-group">
								<label>Keterangan</label>
								<textarea name="keterangan" class="form-control"><?= $pr['keterangan'] ?></textarea>
								<?= form_error('keterangan', '<div class="text-small text-danger">', '</div>'); ?>
							</div>
							<div class="form-group">
								<label>Lokasi</label>
								<select name="lokasiId" class="form-control">
									<option value="" hidden>-- Pilih Lokasi --</option>
									<?php foreach($lokasi as $lo) : ?>
										<option value="<?= $lo['id'] ?>" <?= ($lo['id'] == $pr['lokasiId']['id']) ? 'selected' : '' ?>>
											<?= $lo['namaLokasi'] ?>
										</option>
									<?php endforeach ?>
								</select>
								<?= form_error('lokasi_id', '<div class="text-small text-danger">', '</div>'); ?>
							</div>
							<div class="modal-footer">	
								<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
								<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
		<?php endforeach ?>

	</div>
	<!-- /.col -->
</div>
<!-- /.row -->

