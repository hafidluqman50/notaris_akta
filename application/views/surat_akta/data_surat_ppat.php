<?php $this->load->view('templates/header') ?>
<div class="content-wrapper">
	<div class="container">
		<section class="content-header">
			<h1>
				Template Surat Akta
			</h1>
		</section>
		<section class="content">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Data Template Surat PPAT</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<?php if ($this->session->flashdata('pesan')) :?>
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">X</button>
									<?php echo $this->session->flashdata('pesan'); ?>
								</div>
							<?php endif ?>

                    <p>
                        <a href="<?php echo base_url('fidusia/akta/tambah_surat_ppat'); ?>" class="btn btn-primary">Tambah Data</a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Surat</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($row as $i => $row): ?>
                                <tr>
                                    <td><?php echo $i+1; ?></td>
                                    <td><?php echo $row['nama_surat']; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo base_url('fidusia/akta/edit_surat_ppat/'.$row['id_surat']); ?>" class="btn btn-success">Ubah</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<?php $this->load->view('templates/footer') ?>