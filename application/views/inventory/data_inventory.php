<?php $this->load->view('templates/header') ?>

  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Inventory Notaris
          <!-- <small>Example 2.0</small> -->
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Inventory Akta</h3>
            &nbsp;
            <a href="<?php echo base_url('inventory/aktainventory/cetak_excel'); ?>" class="btn btn-success"><span class="fa fa-file-excel-o"></span> Cetak Report</a>
          </div>
          <div class="box-body">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <?php if($this->session->flashdata('pesan')): ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">X</button>
                            <?php echo $this->session->flashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <p>
                        <a href="<?php echo base_url('inventory/aktainventory/add_nasabah_akta/'); ?>" class="btn btn-primary">Tambah Data</a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                	<th>No.</th>
                                	<th>Nasabah</th>
                                	<th>Jenis Bank</th>
                                	<th>Kelengkapan</th>
                                	<th>Status</th>
                                	<th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php foreach ($data_akta as $key => $ppat): ?>
                            	<tr>
                            		<td><?= $key+1 ?></td>
                            		<td><?= $ppat['nasabah_akta'] ?></td>
                            		<td><?= $ppat['jenis_bank'] ?></td>
                            		<td><?= $ppat['kelengkapan'] ?></td>
                            		<td><?php if ($ppat['status'] == 1): ?>
                            			Selesai
                            			<?php else: ?>
                            				Belum Selesai
                            		<?php endif ?></td>
                            		<td>
                            			<a href="<?= base_url('inventory/aktainventory/monitor_akta/'.$ppat['id_u_inv_akta']) ?>" class="btn btn-info">Monitor
                            			</a>
                            			<?php if ($ppat['status'] == 1): ?>
                            			<a href="#" class="btn btn-primary" disabled>
                            				Selesai
                            			</a>
                            			<?php else: ?>
                            			<a href="<?= base_url('inventory/aktainventory/selesai_akta/'.$ppat['id_u_inv_akta']) ?>" class="btn btn-primary" onclick="return confirm('Yakin Monitor Data Telah Selesai?');">
                            			Selesai
                            			</a>
                            			<?php endif ?>
                            			<a href="<?= base_url('inventory/aktainventory/edit_nasabah_akta/'.$ppat['id_u_inv_akta']) ?>" class="btn btn-success">
                            			Ubah
                            			</a>
                            			<a href="<?= base_url('inventory/aktainventory/delete_nasabah_akta/'.$ppat['id_u_inv_akta']) ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus ?');">
                            			Hapus
                            			</a>
                            		</td>
                            	</tr>
                            	<?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>


        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Inventory Sertifikat</h3>
          </div>
          <div class="box-body">
            <div class="row">
                <div class="col-lg-12 col-md-12">
			        <p>
			            <a href="<?php echo base_url('inventory/aktainventory/add_nasabah_sertifikat/'); ?>" class="btn btn-primary">Tambah Data</a>
			        </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                	<th>No.</th>
                                	<th>Nomor</th>
                                	<th>Nasabah</th>
									<th>Jenis Bank</th>
									<th>Jenis Sertifikat</th>
                                	<th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php foreach ($data_sertifikat as $key => $fidusia): ?>
                            	<tr>
                            		<td><?= $key+1 ?></td>
                            		<td><?= $fidusia['nomor'] ?></td>
                            		<td><?= $fidusia['nasabah_sertifikat'] ?></td>
                            		<td><?= $fidusia['jenis_bank'] ?></td>
                            		<td><?= $fidusia['jenis_sertifikat'] ?></td>
                            		<td><a href="<?= base_url('inventory/aktainventory/monitor_sertifikat/'.$fidusia['id_u_inv_sertifikat']) ?>" class="btn btn-info">
                            			Monitor
                            		</a>
                            			<a href="<?= base_url('inventory/aktainventory/edit_nasabah_sertifikat/'.$fidusia['id_u_inv_sertifikat']) ?>" class="btn btn-success">
                            			Ubah
                            			</a>
                            			<a href="<?= base_url('inventory/aktainventory/delete_nasabah_sertifikat/'.$fidusia['id_u_inv_sertifikat']) ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus ?');">
                            			Hapus
                            			</a></td>
                            	</tr>
                            	<?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
<?php $this->load->view('templates/footer') ?>