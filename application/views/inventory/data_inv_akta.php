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
            <h3 class="box-title">Inventory PPAT</h3>
            &nbsp;
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
                        <a href="<?php echo base_url('inventory/aktainventory/add_inv_akta/'.$id); ?>" class="btn btn-primary">Tambah Data</a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                	<th>No.</th>
                                	<th>Nasabah</th>
                                	<th>No. Akta</th>
                                    <th>Jenis Akta</th>
                                    <th>Tanggal Akta</th>
                                	<th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php foreach ($data_inv as $key => $ppat): ?>
                            	<tr>
                            		<td><?= $key+1 ?></td>
                            		<td><?= $ppat['nasabah_akta'] ?></td>
                            		<td><?= $ppat['no_akta'] ?></td>
                            		<td><?= $ppat['jenis_akta'] ?></td>
                            		<td><?= $ppat['tgl_akta'] ?></td>
                            		<td>
                            			<a href="<?= base_url('inventory/aktainventory/edit_inv_akta/'.$ppat['id_u_inv_akta'].'/'.$ppat['id_inv_akta']) ?>" class="btn btn-success">
                            			Ubah
                            			</a>
                            			<a href="<?= base_url('inventory/aktainventory/delete_nasabah_akta/'.$ppat['id_u_inv_akta'].'/'.$ppat['id_inv_akta']) ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus ?');">
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
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
<?php $this->load->view('templates/footer') ?>