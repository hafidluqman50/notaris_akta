<?php $this->load->view('templates/header') ?>
<div class="content-wrapper">
	<div class="container">
		<section class="content-header">
			<h1>
				Template Surat
			</h1>
		</section>
		<section class="content">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Form Surat Debitur</h3>
				</div>
				<div class="box-body">
					<form role="form" action="<?php echo base_url('/fidusia/akta/save_surat_debitur') ?>" method="POST">
					<input type="hidden" name="id_surat" value="<?php echo(isset($row)) ? $row['id_surat'] : '' ?>">
					<div class="form-group row">
						<div class="col-md-6">
							<label for="">Nama Surat</label>
							<input type="text" class="form-control" name="nama_surat" placeholder="Masukkan Nama Surat" value="<?php echo(isset($row)) ? $row['nama_surat'] : '' ?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label for="">Template Surat</label>
							<textarea name="template" class="form-control" id="debitur" cols="30" rows="30"><?php echo(isset($row)) ? $row['template'] : ''; ?></textarea>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" name="takis" value="sipp" class="btn <?php echo(isset($row)) ? 'btn-warning' : '' ?>" name="proses"><?php echo(isset($row)) ? 'Edit' : 'Tambah'; ?></button>
				</div>
			</form>
			</div>
		</section>
	</div>
</div>
<?php $this->load->view('templates/footer') ?>