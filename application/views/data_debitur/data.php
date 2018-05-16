<?php $this->load->view('templates/header') ?>

  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Akta Fidusia
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
                        <a href="<?php echo base_url('fidusia/akta/add_debitur/'); ?>" class="btn btn-primary">Tambah Data</a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>No Akta</th>
                                    <th>Jenis Fidusia</th>
                                    <th>Nama Debitur</th>
                                    <th>Kota</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($baris as $i => $row): ?>
                                <tr>
                                    <td><?php echo $i+1; ?></td>
                                    <td><?php echo humanDate($row['tanggal_akta']); ?></td>
                                    <td><?php echo $row['no_akta'] ?></td>
                                    <td><?php echo getJenisFidusia($row['jenis_fidusia']) ?></td>
                                    <td><?php echo $row['nama_debitur'] ?></td>
                                    <td><?php echo $row['nama_kota_debitur']; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo base_url('fidusia/akta/edit_debitur/'.$row['id_fidusia']); ?>" class="btn btn-success">Ubah</a>
                                            <a href="<?php echo base_url('fidusia/akta/cetak_debitur/'.$row['id_fidusia']); ?>" class="btn btn-warning">Cetak</a>
                                            <a href="<?php echo base_url('fidusia/akta/hapus_debitur/'.$row['id_fidusia']); ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus?');">Hapus</a>
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
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
<?php $this->load->view('templates/footer') ?>