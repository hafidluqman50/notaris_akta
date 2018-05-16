<?php $this->load->view('templates/header') ?>
	<div class="content-wrapper">
		<div class="container">
			<section class="content-header">
				<h1>Akta PPAt</h1>
			</section>
			<section class="content">
				<div class="box box-default">
					<div class="box-header with-title">
						<h3 class="box-title">Form Akta Jual Beli(AJB)</h3>
					</div>
					<form action="<?php echo base_url('ppat/aktappat/save_ajb') ?>" method="POST">
					<div class="box-body">
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
									<input type="text" name="tmpt_lhr_persetujuan" class="form-control" placeholder="Isi Tempat Lahir Persetujuan" value="<?php echo(isset($row)) ? $row['tempat_lahir_persetujuan'] : '' ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label>Tanggal Lahir Persetujuan</label>
									<input type="date" name="tgl_lhr_persetujuan" class="form-control" value="<?php echo(isset($row)) ? $row['tanggal_lahir_persetujuan'] : '' ?>" required>
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
									<label for="">Kelurahan Bangunan</label>
									<select name="kelurahan_bangunan" class="form-control" required>
										<option selected disabled>========Pilih Jenis Kelurahan=========</option>
										<option value="Kelurahan" <?php if (isset($row)) echo ($row['kelurahan_bangunan'] == 'Kelurahan') ? 'selected' : '' ?>>
											Kelurahan
										</option>
										<option value="Desa" <?php if (isset($row)) echo ($row['kelurahan_bangunan'] == 'Desa') ? 'selected' : '' ?>>
											Desa
										</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label>Nama Kelurahan Bangunan</label>
									<input type="text" name="nama_kelurahan_bangunan" class="form-control" placeholder="Isi Nama Kelurahan Bangunan" value="<?php echo(isset($row) ? $row['nama_kelurahan_bangunan'] : '') ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nama Kecamatan Bangunan</label>
									<input type="text" name="kecamatan_bangunan" class="form-control" value="<?php echo(isset($row) ? $row['kecamatan_bangunan'] : '') ?>" placeholder="Isi Nama Kecamatan Bangunan" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Kota Bangunan</label>
									<select name="kota_bangunan" class="form-control" required>
										<option selected disabled>=======Pilih Jenis Kota Bangunan========</option>
				                      <option value="Kota" <?php if (isset($row)) echo ($row['kota_bangunan'] == 'Kota') ? 'selected' : '' ?>>Kota</option>
				                      <option value="Kabupaten" <?php if (isset($row)) echo ($row['kota_bangunan'] == 'Kabupaten') ? 'selected' : '' ?>>Kabupaten</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="">Nama Kota Bangunan</label>
									<input type="text" name="nama_kota_bangunan" class="form-control" value="<?php echo(isset($row) ? $row['nama_kota_bangunan'] : '') ?>" placeholder="Isi Nama Kota Bangunan" required>
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
              			<input type="hidden" name="id_ppat" value="<?= $id_ppat; ?>">
          				<button type="submit" name="takis" value="sipp" class="btn btn-primary">Simpan</button>
					</div>
				</form>
				</div>
			</section>
		</div>
	</div>
<?php $this->load->view('templates/footer') ?>