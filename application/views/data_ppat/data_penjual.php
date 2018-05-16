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
            <h3 class="box-title">Data Debitur</h3>
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
                        <a href="<?php echo base_url('ppat/aktappat/add_penjual/'); ?>" class="btn btn-primary">Tambah Data</a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Identitas</th>
                                    <th>Nama Penjual</th>
                                    <th>Kota</th>
                                    <th>Buat Akta</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php foreach ($data_penjual as $key => $ppat): ?>
                                <tr>
                                	<td><?= $key+1 ?></td>
                                	<td><?= $ppat['nomor_identitas_penjual'] ?></td>
                                	<td><?= $ppat['nama_penjual'] ?></td>
                                	<td><?= $ppat['nama_kota_penjual'] ?></td>
                                	<td><div class="btn-group">
                                		<a href="<?= base_url('ppat/aktappat/data_skmht/'.$ppat['id_ppat']) ?>" class="btn btn-warning">Akta SKMHT</a>
                                		<a href="<?= base_url('ppat/aktappat/data_apht/'.$ppat['id_ppat']) ?>" class="btn btn-warning">Akta APHT</a>
                                		<a href="<?= base_url('ppat/aktappat/data_ajb/'.$ppat['id_ppat']) ?>" class="btn btn-warning">Akta AJB</a>
                                	</div></td>
                                	<td><div class="btn-group">
                                		<a href="<?= base_url('ppat/aktappat/edit_penjual/'.$ppat['id_ppat']) ?>" class="btn btn-success">Ubah</a>
                                		<a href="<?= base_url('ppat/aktappat/delete_penjual/'.$ppat['id_ppat']) ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus?');">Hapus</a><!-- 
                                		<a href="<?= base_url('ppat/aktappat/cetak_skmht_bri/'.$ppat['id_ppat']) ?>" class="btn btn-info">Cetak SKMHT BRI</a>
                                    <a href="<?= base_url('ppat/aktappat/cetak_skmht_bni/'.$ppat['id_ppat']) ?>" class="btn btn-info">Cetak SKMHT BNI</a> -->
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