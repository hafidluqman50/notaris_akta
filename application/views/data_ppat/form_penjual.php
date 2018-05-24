<?php $this->load->view('templates/header') ?>
	<div class="content-wrapper">
		<div class="container">
			<section class="content-header">
				<h1>Akta PPAT</h1>
			</section>
			<section class="content">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Form Pengisian Data Penjual</h3>
					</div>
					<form action="<?= base_url('ppat/aktappat/save_penjual') ?>" role="form" method="POST">
						<div class="box-body">
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Gelar Penjual</label>
									<select name="gelar_penjual" class="form-control" required>
										<option selected disabled>=========Gelar Penjual============</option>
										<option value="tuan" <?php if (isset($row)) echo($row['gelar_penjual'] == 'tuan' ? 'selected' : ''); ?>>Tuan</option>
										<option value="nyonya" <?php if (isset($row)) echo($row['gelar_penjual'] == 'nyonya' ? 'selected' : ''); ?>>Nyonya</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nama Penjual</label>
									<input type="text" name="nama_penjual" class="form-control" placeholder="Isi Nama Penjual" value="<?php echo(isset($row)) ? $row['nama_penjual'] : '' ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Tempat Lahir Penjual</label>
									<input type="text" name="tmpt_lhr_penjual" class="form-control" placeholder="Isi Tempat Lahir Penjual" value="<?php echo(isset($row)) ? $row['tempat_lahir_penjual'] : '' ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label>Tanggal Lahir Penjual</label>
									<input type="date" name="tgl_lhr_penjual" class="form-control" value="<?php echo(isset($row)) ? $row['tanggal_lahir_penjual'] : '' ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Pekerjaan Penjual</label>
									<input type="text" name="pekerjaan_penjual" class="form-control" placeholder="Isi Pekerjaan Penjual" value="<?php echo(isset($row)) ? $row['pekerjaan_penjual'] : '' ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Alamat Penjual</label>
									<textarea name="alamat_penjual" class="form-control" cols="30" rows="10" required><?php echo(isset($row)) ? $row['alamat_penjual'] : '' ?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">RT Penjual</label>
									<input type="text" name="rt_penjual" class="form-control" placeholder="Isi RT Penjual" value="<?php echo(isset($row)) ? $row['rt_penjual'] : '' ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">RW Penjual</label>
									<input type="text" name="rw_penjual" class="form-control" placeholder="Isi RW Penjual" value="<?php echo(isset($row)) ? $row['rw_penjual'] : '' ?>">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Kelurahan Penjual</label>
									<select name="kelurahan_penjual" class="form-control" required>
										<option selected disabled>========Pilih Jenis Kelurahan=========</option>
										<option value="Kelurahan" <?php if (isset($row)) echo ($row['kelurahan_penjual'] == 'Kelurahan') ? 'selected' : '' ?>>
											Kelurahan
										</option>
										<option value="Desa" <?php if (isset($row)) echo ($row['kelurahan_penjual'] == 'Desa') ? 'selected' : '' ?>>
											Desa
										</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label>Nama Kelurahan Penjual</label>
									<input type="text" name="nama_kelurahan_penjual" class="form-control" placeholder="Isi Nama Kelurahan Penjual" value="<?php echo(isset($row) ? $row['nama_kelurahan_penjual'] : '') ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nama Kecamatan Penjual</label>
									<input type="text" name="kecamatan_penjual" class="form-control" value="<?php echo(isset($row) ? $row['kecamatan_penjual'] : '') ?>" placeholder="Isi Nama Kecamatan Penjual" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Kota Penjual</label>
									<select name="kota_penjual" class="form-control" required>
										<option selected disabled>=======Pilih Jenis Kota Penjual========</option>
				                      <option value="Kota" <?php if (isset($row)) echo ($row['kota_penjual'] == 'Kota') ? 'selected' : '' ?>>Kota</option>
				                      <option value="Kabupaten" <?php if (isset($row)) echo ($row['kota_penjual'] == 'Kabupaten') ? 'selected' : '' ?>>Kabupaten</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nama Kota Penjual</label>
									<input type="text" name="nama_kota_penjual" class="form-control" value="<?php echo(isset($row) ? $row['nama_kota_penjual'] : '') ?>" placeholder="Isi Nama Kota Penjual" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nomor Identitas Penjual</label>
									<input type="text" name="nomor_identitas_penjual" class="form-control" value="<?php echo(isset($row) ? $row['nomor_identitas_penjual'] : '') ?>" placeholder="Isi Nomor Identitas Penjual" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Kedudukan Keluarga Penjual</label>
									<select name="kedudukan_keluarga_penjual" class="form-control" required>
										<option selected disabled>===========Pilih Kedudukan Keluarga==========</option>
										<option value="suami"  <?php if (isset($row)) echo ($row['kedudukan_keluarga_penjual'] == 'suami') ? 'selected' : '' ?>>Suami</option>
										<option value="istri"  <?php if (isset($row)) echo ($row['kedudukan_keluarga_penjual'] == 'istri') ? 'selected' : '' ?>>Istri</option>
									</select>
								</div>
							</div>
						</div>
						<div class="box-footer">
              				<input type="hidden" name="id" value="<?php echo (!empty($row)) ? $row['id_ppat'] : '' ?>">
              				<button type="submit" name="takis" value="sipp" class="btn <?php echo(!empty($row['id_ppat']) ? 'btn-warning' : 'btn-primary') ?>"><?php echo(!empty($row['id_ppat']) ? 'Edit' : 'Simpan') ?></button>
						</div>
					</form>
				</div>
			</section>
		</div>
	</div>
<?php $this->load->view('templates/footer') ?>