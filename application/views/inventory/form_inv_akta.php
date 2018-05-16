<?php $this->load->view('templates/header') ?>
	<div class="content-wrapper">
		<div class="container">
			<section class="content-header">
				<h1>Inventory Notaris</h1>
			</section>
			<section class="content">
				<div class="box box-default">
					<div class="box-header with-title">
						<h3 class="box-title">Form Inventory PPAT</h3>
					</div>
					<form action="<?php echo base_url('inventory/aktainventory/save_inv_ppat') ?>" method="POST">
					<div class="box-body">
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Nomor Akta</label>
								<input type="text"  class="form-control" name="no_akta" placeholder="Isi Nomor Akta" value="<?php echo(isset($row) ? $row['no_akta'] : '') ?>" required>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Jenis Akta</label>
								<input type="text" class="form-control" name="jenis_akta" placeholder="Isi Jenis Akta; Ex:AJB;" value="<?php echo(isset($row) ? $row['jenis_akta'] : '') ?>">
							</div>							
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Tanggal Akta</label>
								<input type="date" class="form-control" name="tgl_akta" value="<?php echo(isset($row) ? $row['tgl_akta'] : '') ?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Ketik Akt</label>
								<input type="date" class="form-control" name="ketik_akt" value="<?php echo(isset($row) ? $row['ketik_akt'] : '') ?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Call Akt</label>
								<input type="date" name="call_akt" class="form-control" placeholder="Isi Jenis Bank" value="<?php echo(isset($row) ? $row['call_akt'] : '') ?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Ttd Akd</label>
								<input type="date" name="ttd_akd" class="form-control" value="<?php echo(isset($row) ? $row['ttd_akd'] : '') ?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Atr Mnt</label>
								<input type="date" name="atr_mnt" class="form-control" value="<?php echo(isset($row) ? $row['atr_mnt'] : '') ?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Mnt Kmb</label>
								<input type="date" name="mnt_kmb" class="form-control" value="<?php echo(isset($row) ? $row['mnt_kmb'] : '') ?>">
							</div>
						</div>
					</div>
					<div class="box-footer">
						<input type="hidden" value="<?php echo(isset($row) ? $row['id_inv_akta'] : '') ?>" name="id">
						<input type="hidden" value="<?php echo(isset($id_inv_akta) ? $id_inv_akta : '') ?>" name="id_inv_akta">
          				<button type="submit" name="takis" value="sipp" class="btn btn-primary">Simpan</button>
					</div>
				</form>
				</div>
			</section>
		</div>
	</div>
<?php $this->load->view('templates/footer') ?>