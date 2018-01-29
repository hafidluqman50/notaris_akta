<?php $this->load->view('templates/header') ?>

  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Akta PPAT
          <!-- <small>Example 2.0</small> -->
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Data APHT</h3>
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
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Akta</th>
                                    <th>Tanggal Akta</th>
                                   	<th>Jenis Kepemilikan</th>
                                    <th>Nama Penjual Tanah</th>
                                    <th>Kota</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php foreach ($data_skmht as $key => $ppat): ?>
                                <tr>
                                	<td><?= $key+1 ?></td>
                                	<td><?= $ppat['nomor_akta_skmht'] ?></td>
                                	<td><?= humanDate($ppat['tanggal_akta_skmht']) ?></td>
                                	<td><?= $ppat['jenis_kepemilikan'] ?></td>
                                	<td><?= $ppat['nama_penjual'] ?></td>
                                	<td><?= $ppat['nama_kota_penjual'] ?></td>
                                	<td><div class="btn-group">
                                		<a href="<?= base_url('fidusia/akta/form_apht/'.$ppat['id_skmht']) ?>" class="btn btn-success">Lengkapi Form</a>
                                		<a href="<?= base_url('fidusia/akta/cetak_apht/'.$ppat['id_skmht']) ?>" class="btn btn-warning">Cetak APHT</a>
                                	</div></td>
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