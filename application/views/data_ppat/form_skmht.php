<?php $this->load->view('templates/header') ?>
	<div class="content-wrapper">
		<div class="container">
			<section class="content-header">
				<h1>Akta PPAT</h1>
			</section>
			<section class="content">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Form Surat Kuasa Membebankan Hak Tanggungan(SKMHT)</h3>
					</div>
					<form action="<?= base_url('fidusia/akta/save_skmht') ?>" role="form" method="POST">
						<div class="box-body">
							<div class="form-group row">
								<div class="col-md-6">
									<label>No Akta</label>
									<input type="text" class="form-control" name="nomor_akta" placeholder="Isi Nomor Akta" value="<?php echo(isset($row)) ? $row['nomor_akta'] : '' ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Tanggal Surat Akta</label>
									<input type="date" name="tgl_surat_akta" class="form-control" value="<?php echo(isset($row)) ? $row['tgl_surat_akta'] : '' ?>" required>
								</div>
							</div>
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
									<input type="text" name="tmpt_lhr_penjual" class="form-control" placeholder="Isi Tempat Lahir Penjual" value="<?php echo(isset($row)) ? $row['tmpt_lhr_penjual'] : '' ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label>Tanggal Lahir Penjual</label>
									<input type="date" name="tgl_lhr_penjual" class="form-control" value="<?php echo(isset($row)) ? $row['tgl_lhr_penjual'] : '' ?>" required>
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
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Gelar Persetujuan</label>
									<select name="gelar_persetujuan" class="form-control" required>
										<option selected disabled>=========Gelar Persetujuan============</option>
										<option value="tuan" <?php if (isset($row)) echo($row['gelar_persetujuan'] == 'tuan' ? 'selected' : ''); ?>>Tuan</option>
										<option value="nyonya" <?php if (isset($row)) echo($row['gelar_persetujuan'] == 'nyonya' ? 'selected' : ''); ?>>Nyonya</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nama Persetujuan</label>
									<input type="text" name="nama_persetujuan" class="form-control" placeholder="Isi Nama Persetujuan" value="<?php echo(isset($row)) ? $row['nama_persetujuan'] : '' ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Tempat Lahir Persetujuan</label>
									<input type="text" name="tmpt_lhr_persetujuan" class="form-control" placeholder="Isi Tempat Lahir Persetujuan" value="<?php echo(isset($row)) ? $row['tmpt_lhr_persetujuan'] : '' ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label>Tanggal Lahir Persetujuan</label>
									<input type="date" name="tgl_lhr_persetujuan" class="form-control" value="<?php echo(isset($row)) ? $row['tgl_lhr_persetujuan'] : '' ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Pekerjaan Persetujuan</label>
									<input type="text" name="pekerjaan_persetujuan" class="form-control" placeholder="Isi Pekerjaan Persetujuan" value="<?php echo(isset($row)) ? $row['pekerjaan_persetujuan'] : '' ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Alamat Persetujuan</label>
									<textarea name="alamat_persetujuan" class="form-control" cols="30" rows="10" required><?php echo(isset($row)) ? $row['alamat_persetujuan'] : '' ?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">RT Persetujuan</label>
									<input type="text" name="rt_persetujuan" class="form-control" placeholder="Isi RT Persetujuan" value="<?php echo(isset($row)) ? $row['rt_persetujuan'] : '' ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Kelurahan Persetujuan</label>
									<select name="kelurahan_persetujuan" class="form-control" required>
										<option selected disabled>========Pilih Jenis Kelurahan=========</option>
										<option value="Kelurahan" <?php if (isset($row)) echo ($row['kelurahan_persetujuan'] == 'Kelurahan') ? 'selected' : '' ?>>
											Kelurahan
										</option>
										<option value="Desa" <?php if (isset($row)) echo ($row['kelurahan_persetujuan'] == 'Desa') ? 'selected' : '' ?>>
											Desa
										</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label>Nama Kelurahan Persetujuan</label>
									<input type="text" name="nama_kelurahan_persetujuan" class="form-control" placeholder="Isi Nama Kelurahan Persetujuan" value="<?php echo(isset($row) ? $row['nama_kelurahan_persetujuan'] : '') ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nama Kecamatan Persetujuan</label>
									<input type="text" name="kecamatan_persetujuan" class="form-control" placeholder="Isi Nama Kecamatan Persetujuan" value="<?php echo(isset($row) ? $row['kecamatan_persetujuan'] : '') ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Kota Persetujuan</label>
									<select name="kota_persetujuan" class="form-control" required>
										<option selected disabled>=======Pilih Jenis Kota Persetujuan========</option>
				                      <option value="Kota" <?php if (isset($row)) echo ($row['kota_persetujuan'] == 'Kota') ? 'selected' : '' ?>>Kota</option>
				                      <option value="Kabupaten" <?php if (isset($row)) echo ($row['kota_persetujuan'] == 'Kabupaten') ? 'selected' : '' ?>>Kabupaten</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nama Kota Persetujuan</label>
									<input type="text" name="nama_kota_persetujuan" placeholder="Isi Nama Kota Persetujuan" class="form-control" value="<?php echo(isset($row) ? $row['nama_kota_persetujuan'] : '') ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nomor Identitas Persetujuan</label>
									<input type="text" name="nomor_identitas_persetujuan" placeholder="Isi Nomor Identitas Persetujuan" class="form-control" value="<?php echo(isset($row) ? $row['nomor_identitas_persetujuan'] : '') ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nilai Perjanjian</label>
									<input type="number" class="form-control" placeholder="Isi Nilai/Jumlah Uang Perjanjian" name="nilai_perjanjian" value="<?php echo(isset($row) ? $row['nilai_perjanjian'] : '') ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nomor Perjanjian Kredit</label>
									<input type="text" name="nomor_perjanjian_kredit" class="form-control" value="<?php echo(isset($row) ? $row['nomor_perjanjian_kredit'] : '') ?>" placeholder="Isi Nomor Perjanjian Kredit" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Tanggal Perjanjian</label>
									<input type="date" class="form-control" name="tanggal_perjanjian" value="<?php echo(isset($row) ? $row['tanggal_perjanjian'] : '') ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Peringkat Tanggungan</label>
									<input type="text" name="peringkat_tanggungan" class="form-control" value="<?php echo(isset($row) ? $row['peringkat_tanggungan'] : '') ?>" placeholder="Isi Peringkat Tanggungan; Ex: I (Pertama)" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nilai Tanggungan</label>
									<input type="number" name="nilai_tanggungan" class="form-control" value="<?php echo(isset($row) ? $row['nilai_tanggungan'] : '') ?>" placeholder="Isi Nilai/Jumlah Uang Tanggungan" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Jenis Kepemilikan</label>
									<input type="text" name="jenis_kepemilikan" class="form-control" value="<?php echo(isset($row) ? $row['jenis_kepemilikan'] : '') ?>" placeholder="Isi Jenis Kepemilikan; Ex: Hak Milik" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nomor Kepemilikan</label>
									<input type="text" name="nomor_kepemilikan" class="form-control" value="<?php echo(isset($row) ? $row['nomor_kepemilikan'] : '') ?>" placeholder="Isi Nomor Kepemilikan" required>
								</div>
							</div>	
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nomor Surat Ukur</label>
									<input type="text" name="nomor_surat_ukur" class="form-control" value="<?php echo(isset($row) ? $row['nomor_surat_ukur'] : '') ?>" placeholder="Isi Nomor Surat Ukur" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Tanggal Surat Ukur</label>
									<input type="date" name="tanggal_surat_ukur" class="form-control" value="<?php echo(isset($row) ? $row['tanggal_surat_ukur'] : '') ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Luas Tanah</label>
									<input type="number" class="form-control" name="luas_tanah" value="<?php echo(isset($row) ? $row['luas_tanah'] : '') ?>" placeholder="Isi Luas Tanah" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nomor Identifikasi Bidang</label>
									<input type="text" class="form-control" name="nomor_nib" placeholder="Isi Nomor NIB" value="<?php echo(isset($row) ? $row['nomor_nib'] : '') ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nomor Surat Pemberitahuan Pajak Terhutang Pajak Bumi Dan Bangunan</label>
									<input type="text" class="form-control" name="nomor_spptpbb" placeholder="Isi Nomor SPPTPBB" value="<?php echo(isset($row) ? $row['nomor_spptpbb'] : '') ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Kecamatan Tanah</label>
									<input type="text" name="kecamatan_tanah" class="form-control" placeholder="Isi Nama Kecamatan Tanah" value="<?php echo(isset($row) ? $row['kecamatan_tanah'] : '') ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Kelurahan Tanah</label>
									<select name="kelurahan_tanah" class="form-control" required>
										<option selected disabled>============Pilih Kelurahan Tanah==========</option>
										<option value="desa" <?php if (isset($row)) echo $row['kelurahan_tanah'] == 'desa' ? 'selected' : ''?>>Desa</option>
										<option value="kelurahan" <?php if (isset($row)) echo $row['kelurahan_tanah'] == 'kelurahan' ? 'selected' : ''?>>Kelurahan</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nama Kelurahan Tanah</label>
									<input type="text" name="nama_kelurahan_tanah" class="form-control" value="<?php echo(isset($row) ? $row['nama_kelurahan_tanah'] : '') ?>" placeholder="Isi Nama Kelurahan Tanah" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Luas Bangunan</label>
									<input type="number" name="luas_bangunan" class="form-control" placeholder="Isi Luas Bangunan" value="<?php echo(isset($row) ? $row['luas_bangunan'] : '') ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Alamat Bangunan</label>
									<textarea name="alamat_bangunan" class="form-control" cols="30" rows="10" required><?php echo(isset($row) ? $row['alamat_bangunan'] : '') ?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">RT Bangunan</label>
									<input type="text" name="rt_bangunan" class="form-control" placeholder="Isi RT Bangunan" value="<?php echo(isset($row) ? $row['rt_bangunan'] : '') ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Tanggal Dibuat APHT</label>
									<input type="date" class="form-control" name="tanggal_dibuat_apht" value="<?php echo(isset($row) ? $row['tanggal_dibuat_apht']) ?>">
								</div>
							</div>
						</div>
						<div class="box-footer">
              				<input type="hidden" name="id" value="<?php echo (!empty($row)) ? $row['id_skmht'] : '' ?>">
              				<button type="submit" name="takis" value="sipp" class="btn <?php echo(!empty($row['id_skmht']) ? 'btn-warning' : 'btn-primary') ?>"><?php echo(!empty($row['id_skmht']) ? 'Edit' : 'Simpan') ?></button>
						</div>
					</form>
				</div>
			</section>
		</div>
	</div>
<?php $this->load->view('templates/footer') ?>