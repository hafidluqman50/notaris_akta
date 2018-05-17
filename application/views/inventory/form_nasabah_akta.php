<?php $this->load->view('templates/header') ?>
	<div class="content-wrapper">
		<div class="container">
			<section class="content-header">
				<h1>Inventory Notaris</h1>
			</section>
			<section class="content">
				<div class="box box-default">
					<div class="box-header with-title">
						<h3 class="box-title">Form Nasabah PPAT</h3>
					</div>
					<form action="<?php echo base_url('inventory/aktainventory/save_nasabah_akta') ?>" method="POST">
					<div class="box-body">
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Nasabah</label>
								<input type="text" name="nasabah" class="form-control" placeholder="Isi Nasabah" value="<?php echo(isset($row) ? $row['nasabah_akta'] : '') ?>">
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
								<label for="">Kelengkapan</label>
								<input type="text" class="form-control" name="kelengkapan" placeholder="Isi Kelengkapan; Ex: LENGKAP" value="<?php echo(isset($row) ? $row['kelengkapan'] : '') ?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Jenis Pekerjaan</label>
								<textarea name="jenis_pekerjaan" class="form-control" cols="30" rows="10" placeholder="Isi Jenis Pekerjaan; Ex:Pengecekan,HT"><?php echo(isset($row) ? $row['jenis_pekerjaan'] : '') ?></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Print Sal</label>
								<input type="text" name="print_sal" class="form-control" placeholder="Isi Print Sal" value="<?php echo(isset($row) ? $row['print_sal'] : '') ?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Rpk Mnt</label>
								<input type="text" name="rpk_mnt" class="form-control" placeholder="Isi Rpk Mnt" value="<?php echo(isset($row) ? $row['rpk_mnt'] : '') ?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Invoice</label>
								<input type="number" name="invoice" class="form-control" placeholder="Isi Nilai Invoice" value="<?php echo(isset($row) ? $row['invoice'] : '') ?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Danlap</label>
								<textarea name="dan_lap" class="form-control" cols="30" rows="10" placeholder="Isi Danlap; Ex:CEK 150, BN 500, HT 450"><?php echo(isset($row) ? $row['dan_lap'] : '') ?></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Exp SKMHT</label>
								<textarea name="exp_skmht" class="form-control" cols="30" rows="10" placeholder="Isi Exp SKMHT; Ex: 1 BULAN 14/01/2018"><?php echo(isset($row) ? $row['exp_skmht'] : '') ?></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Exp Cnot</label>
								<textarea name="exp_cnot" class="form-control" cols="30" rows="10" placeholder="Isi Exp Cnot; Ex: 3 BULAN 14/03/2018"><?php echo(isset($row) ? $row['exp_cnot'] : '') ?></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Per Lap</label>
								<input type="text" name="per_lap" class="form-control" placeholder="Isi Per Lap; Ex:Peningkatan" value="<?php echo(isset($row) ? $row['per_lap'] : '') ?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">No SPS</label>
								<input type="text" name="no_sps" class="form-control" placeholder="Isi NO SPS" value="<?php echo(isset($row) ? $row['no_sps'] : '') ?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="">Atr Odr</label>
								<input type="text" name="atr_odr" class="form-control" placeholder="Isi ATR ODR" value="<?php echo(isset($row) ? $row['atr_odr'] : '') ?>">
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
						<input type="hidden" value="<?php echo(isset($row) ? $row['id_u_inv_akta'] : '') ?>" name="id">
          				<button type="submit" name="takis" value="sipp" class="btn btn-primary">Simpan</button>
					</div>
				</form>
				</div>
			</section>
		</div>
	</div>
<?php $this->load->view('templates/footer') ?>