<?php $this->load->view('templates/header') ?>
	<div class="content-wrapper">
		<div class="container">
			<section class="content-header">
				<h1>Akta PPAt</h1>
			</section>
			<section class="content">
				<div class="box box-default">
					<div class="box-header with-title">
						<h3 class="box-title">Form Akta Pemberian Hak Tanggungan(APHT)</h3>
					</div>
					<form action="<?php echo base_url('fidusia/akta/save_apht') ?>" method="POST">
					<div class="box-body">
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Nama Penjual</label>
								<input type="text" class="form-control" value="<?php echo $cek['nama_penjual'] ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Kedudukan Keluarga Penjual</label>
								<input type="text" class="form-control" value="<?php echo $cek['kedudukan_keluarga_penjual'] ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Nama Persetujuan</label>
								<input type="text" class="form-control" value="<?php echo $cek['nama_persetujuan'] ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Nomor Akta</label>
								<input type="text" class="form-control" name="nomor_akta_apht" placeholder="Isi Nomor Akta" value="<?php echo(isset($row) ? $row['nomor_akta_apht'] : '') ?>" required>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Tanggal Akta</label>
								<input type="date" class="form-control" name="tanggal_akta_apht" value="<?php echo(isset($row) ? $row['tanggal_akta_apht'] : '') ?>" required>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Nomor Hak Tanggungan</label>
								<input type="text" name="nomor_hak_tanggungan" class="form-control" value="<?php echo(isset($row) ? $row['nomor_hak_tanggungan'] : '') ?>" placeholder="Isi Nomor Hak Tanggungan" required>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Tanggal Hak Tanggungan</label>
								<input type="date" name="tanggal_hak_tanggungan" class="form-control" value="<?php echo(isset($row) ? $row['tanggal_hak_tanggungan'] : '') ?>">
							</div>
						</div>
					</div>
					<div class="box-footer">
						<input type="hidden" value="<?php echo(isset($row) ? $row['id_apht'] : '') ?>" name="id">
						<input type="hidden" value="<?php echo $cek['id_skmht'] ?>" name="id_skmht">
          				<button type="submit" name="takis" value="sipp" class="btn btn-primary">Simpan</button>
					</div>
				</form>
				</div>
			</section>
		</div>
	</div>
<?php $this->load->view('templates/footer') ?>