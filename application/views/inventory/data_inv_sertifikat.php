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
            <h3 class="box-title">Inventory Sertifikat</h3>
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
                        <a href="<?php echo base_url('inventory/aktainventory/add_inv_sertifikat/'.$id); ?>" class="btn btn-primary">Tambah Data</a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                	<th>No.</th>
                                	<th>Nasabah</th>
                                	<th>Order</th>
                                  <th>Tgl Masuk</th>
                                  <th>Tgl Keluar</th>
                                	<th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php foreach ($data_inv as $key => $fidusia): ?>
                            	<tr>
                            		<td><?= $key+1 ?></td>
                                <td><?= $fidusia['nasabah_sertifikat'] ?></td>
                            		<td><?= $fidusia['ket_order'] ?></td>
                                <td><?= humanDate($fidusia['masuk']) ?></td>
                                <td><?= humanDate($fidusia['keluar']) ?></td>
                            		<td>
                            			<a href="<?= base_url('inventory/aktainventory/edit_inv_sertifikat/'.$fidusia['id_u_inv_sertifikat'].'/'.$fidusia['id_inv_sertifikat']) ?>" class="btn btn-success">
                            			Ubah
                            			</a>
                            			<a href="<?= base_url('inventory/aktainventory/delete_inv_sertifikat/'.$fidusia['id_u_inv_sertifikat'].'/'.$fidusia['id_inv_sertifikat']) ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus ?');">
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