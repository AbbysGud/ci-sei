<?= $this->session->flashdata('pesan'); ?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
			 <a href="<?= base_url('lokasi/tambah') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Lokasi</a>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr class="text-center">
							<th>No</th>
							<th>Nama Lokasi</th>
							<th>Negara</th>
							<th>Provinsi</th>
							<th>Kota</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						<?php foreach($lokasi as $lo) : ?>
							<tr class="text-center">
								<td><?= $no++ ?></td>
								<td><?= $lo['namaLokasi'] ?></td>
								<td><?= $lo['negara'] ?></td>
								<td><?= $lo['provinsi'] ?></td>
								<td><?= $lo['kota'] ?></td>
								<td>
									<button data-toggle="modal" data-target="#edit<?= $lo['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
									<a href="<?= base_url('lokasi/delete/' . $lo['id']) ?>" class="btn btn-danger btn-sm" 
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
		<?php foreach($lokasi as $lo) : ?>
		<div class="modal fade" id="edit<?= $lo['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Lokasi</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url('lokasi/edit/' . $lo['id']) ?>" method="post">
							<div class="form-group">
								<label>Nama Lokasi</label>
								<input type="text" name="namaLokasi" class="form-control" value="<?= $lo['namaLokasi'] ?>">
								<?= form_error('namaLokasi', '<div class="text-small text-danger">', '</div>'); ?>
							</div>
							<div class="form-group">
								<label>Negara</label>
								<input type="text" name="negara" class="form-control" value="<?= $lo['negara'] ?>">
								<?= form_error('negara', '<div class="text-small text-danger">', '</div>'); ?>
							</div>
							<div class="form-group">
								<label>Provinsi</label>
								<input type="text" name="provinsi" class="form-control" value="<?= $lo['provinsi'] ?>">
								<?= form_error('provinsi', '<div class="text-small text-danger">', '</div>'); ?>
							</div>
							<div class="form-group">
								<label>Kota</label>
								<input type="text" name="kota" class="form-control" value="<?= $lo['kota'] ?>">
								<?= form_error('kota', '<div class="text-small text-danger">', '</div>'); ?>
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

