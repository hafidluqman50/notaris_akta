<?php $this->load->view('templates/header') ?>
	<div class="content-wrapper">
		<div class="container">
			<section class="content-header">
				<h1>Inventory Notaris</h1>
			</section>
			<section class="content">
				<div class="box box-default">
					<div class="box-header with-title">
						<h3 class="box-title">Form Inventory Fidusia</h3>
					</div>
					<form action="<?php echo base_url('inventory/aktainventory/save_inv_sertifikat') ?>" method="POST">
					<div class="box-body">
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Keterangan Order</label>
								<input type="text" class="form-control" name="ket_order" placeholder="Isi Order" value="<?php echo(isset($row) ? $row['ket_order'] : '') ?>" required>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Tgl Masuk</label>
								<input type="date" name="masuk" class="form-control" placeholder="Isi Jenis Bank" value="<?php echo(isset($row) ? $row['masuk'] : '') ?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Tgl Keluar</label>
								<input type="date" name="keluar" class="form-control" placeholder="Isi Nasabah" value="<?php echo(isset($row) ? $row['keluar'] : '') ?>">
							</div>
						</div>
					</div>
					<div class="box-footer">
						<input type="hidden" value="<?php echo(isset($row) ? $row['id_inv_sertifikat'] : '') ?>" name="id">
						<input type="hidden" value="<?php echo(isset($id_inv_sertifikat) ? $id_inv_sertifikat : '') ?>" name="id_inv_sertifikat">
          				<button type="submit" name="takis" value="sipp" class="btn btn-primary">Simpan</button>
					</div>
				</form>
				</div>
			</section>
		</div>
	</div>
<?php $this->load->view('templates/footer') ?>