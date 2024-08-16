
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Tabel Proyek</h3>
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
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->

		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Tabel Lokasi</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="example2" class="table table-bordered table-striped">
					<thead>
						<tr class="text-center">
							<th>No</th>
							<th>Nama Lokasi</th>
							<th>Negara</th>
							<th>Provinsi</th>
							<th>Kota</th>
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
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->

	</div>
	<!-- /.col -->
</div>
<!-- /.row -->

