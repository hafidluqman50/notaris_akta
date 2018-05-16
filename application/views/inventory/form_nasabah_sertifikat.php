<?php $this->load->view('templates/header') ?>
	<div class="content-wrapper">
		<div class="container">
			<section class="content-header">
				<h1>Inventory Notaris</h1>
			</section>
			<section class="content">
				<div class="box box-default">
					<div class="box-header with-title">
						<h3 class="box-title">Form Nasabah Fidusia</h3>
					</div>
					<form action="<?php echo base_url('inventory/aktainventory/save_nasabah_fidusia') ?>" method="POST">
					<div class="box-body">
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Nomor</label>
								<input type="text" class="form-control" name="nomor" placeholder="Isi Nomor" value="<?php echo(isset($row) ? $row['nomor'] : '') ?>" required>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Jenis Sertifikat</label>
								<input type="text" class="form-control" name="jenis_sertifikat" placeholder="Isi Jenis Sertifikat" value="<?php echo(isset($row) ? $row['jenis_sertifikat'] : '') ?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Jenis Bank</label>
								<input type="text" name="jenis_bank" class="form-control" placeholder="Isi Jenis Bank" value="<?php echo(isset($row) ? $row['jenis_bank'] : '') ?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Nasabah</label>
								<input type="text" name="nasabah_fidusia" class="form-control" placeholder="Isi Nasabah" value="<?php echo(isset($row) ? $row['nasabah_sertifikat'] : '') ?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Posisi Kantor</label>
								<input type="text" name="kantor" class="form-control" placeholder="Isi Rpk Mnt" value="<?php echo(isset($row) ? $row['kantor'] : '') ?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Posisi BPN</label>
								<input type="text" name="bpn" class="form-control" placeholder="Isi Posisi BPN" value="<?php echo(isset($row) ? $row['bpn'] : '') ?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Posisi Luar</label>
								<input type="text" name="luar" class="form-control" placeholder="Isi Posisi Luar; Ex:1;" value="<?php echo(isset($row) ? $row['luar'] : '') ?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Keterangan</label>
								<textarea name="keterangan" name="keterangan" class="form-control" cols="30" rows="10" placeholder="Isi Keterangan"><?php echo(isset($row) ? $row['keterangan'] : '') ?></textarea>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<input type="hidden" value="<?php echo(isset($row) ? $row['id_u_inv_sertifikat'] : '') ?>" name="id">
          				<button type="submit" name="takis" value="sipp" class="btn btn-primary">Simpan</button>
					</div>
				</form>
				</div>
			</section>
		</div>
	</div>
<?php $this->load->view('templates/footer') ?>