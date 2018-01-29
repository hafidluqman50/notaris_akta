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
					<form action="<?php echo base_url('fidusia/akta/save_ajb') ?>" method="POST">
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
								<input type="text" class="form-control" name="nomor_akta_ajb" placeholder="Isi Nomor Akta" value="<?php echo(isset($row) ? $row['nomor_akta_ajb'] : '') ?>" required>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Tanggal Akta</label>
								<input type="date" class="form-control" name="tanggal_akta_ajb" value="<?php echo(isset($row) ? $row['tanggal_akta_ajb'] : '') ?>" required>
							</div>
						</div><div class="form-group row">
								<div class="col-md-6">
									<label for="">Gelar Pembeli</label>
									<select name="gelar_pembeli" class="form-control" required>
										<option selected disabled>=========Gelar Pembeli============</option>
										<option value="tuan" <?php if (isset($row)) echo($row['gelar_pembeli'] == 'tuan' ? 'selected' : ''); ?>>Tuan</option>
										<option value="nyonya" <?php if (isset($row)) echo($row['gelar_pembeli'] == 'nyonya' ? 'selected' : ''); ?>>Nyonya</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nama Pembeli</label>
									<input type="text" name="nama_pembeli" class="form-control" placeholder="Isi Nama Pembeli" value="<?php echo(isset($row)) ? $row['nama_pembeli'] : '' ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Tempat Lahir Pembeli</label>
									<input type="text" name="tmpt_lhr_pembeli" class="form-control" placeholder="Isi Tempat Lahir Pembeli" value="<?php echo(isset($row)) ? $row['tempat_lahir_pembeli'] : '' ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label>Tanggal Lahir Pembeli</label>
									<input type="date" name="tgl_lhr_pembeli" class="form-control" value="<?php echo(isset($row)) ? $row['tanggal_lahir_pembeli'] : '' ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Pekerjaan Pembeli</label>
									<input type="text" name="pekerjaan_pembeli" class="form-control" placeholder="Isi Pekerjaan Pembeli" value="<?php echo(isset($row)) ? $row['pekerjaan_pembeli'] : '' ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Alamat Pembeli</label>
									<textarea name="alamat_pembeli" class="form-control" cols="30" rows="10" required><?php echo(isset($row)) ? $row['alamat_pembeli'] : '' ?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">RT Pembeli</label>
									<input type="text" name="rt_pembeli" class="form-control" placeholder="Isi RT Pembeli" value="<?php echo(isset($row)) ? $row['rt_pembeli'] : '' ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Kelurahan Pembeli</label>
									<select name="kelurahan_pembeli" class="form-control" required>
										<option selected disabled>========Pilih Jenis Kelurahan=========</option>
										<option value="Kelurahan" <?php if (isset($row)) echo ($row['kelurahan_pembeli'] == 'Kelurahan') ? 'selected' : '' ?>>
											Kelurahan
										</option>
										<option value="Desa" <?php if (isset($row)) echo ($row['kelurahan_pembeli'] == 'Desa') ? 'selected' : '' ?>>
											Desa
										</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label>Nama Kelurahan Pembeli</label>
									<input type="text" name="nama_kelurahan_pembeli" class="form-control" placeholder="Isi Nama Kelurahan Pembeli" value="<?php echo(isset($row) ? $row['nama_kelurahan_pembeli'] : '') ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nama Kecamatan Pembeli</label>
									<input type="text" name="kecamatan_pembeli" class="form-control" value="<?php echo(isset($row) ? $row['kecamatan_pembeli'] : '') ?>" placeholder="Isi Nama Kecamatan Pembeli" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Kota Pembeli</label>
									<select name="kota_pembeli" class="form-control" required>
										<option selected disabled>=======Pilih Jenis Kota Pembeli========</option>
				                      <option value="Kota" <?php if (isset($row)) echo ($row['kota_pembeli'] == 'Kota') ? 'selected' : '' ?>>Kota</option>
				                      <option value="Kabupaten" <?php if (isset($row)) echo ($row['kota_pembeli'] == 'Kabupaten') ? 'selected' : '' ?>>Kabupaten</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nama Kota Pembeli</label>
									<input type="text" name="nama_kota_pembeli" class="form-control" value="<?php echo(isset($row) ? $row['nama_kota_pembeli'] : '') ?>" placeholder="Isi Nama Kota Pembeli" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nomor Identitas Pembeli</label>
									<input type="text" name="nomor_identitas_pembeli" class="form-control" value="<?php echo(isset($row) ? $row['nomor_identitas_pembeli'] : '') ?>" placeholder="Isi Nomor Identitas Pembeli" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nilai Beli</label>
									<input type="number" name="nilai_beli" class="form-control" value="<?php echo(isset($row) ? $row['nilai_beli'] : '') ?>" placeholder="Isi Nilai/Jumlah Uang Beli">
								</div>
							</div>
					</div>
					<div class="box-footer">
						<input type="hidden" value="<?php echo(isset($row) ? $row['id_ajb'] : '') ?>" name="id">
						<input type="hidden" value="<?php echo $cek['id_apht'] ?>" name="id_apht">
          				<button type="submit" name="takis" value="sipp" class="btn btn-primary">Simpan</button>
					</div>
				</form>
				</div>
			</section>
		</div>
	</div>
<?php $this->load->view('templates/footer') ?>