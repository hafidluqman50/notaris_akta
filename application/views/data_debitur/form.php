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
            <h3 class="box-title">Form Data Debitur</h3>
          </div>
          <form role="form" method="post" action="<?php echo base_url('fidusia/akta/save_debitur') ?>">
            <div class="box-body">
              <div class="form-group row">
                <div class="col-md-2">
                  <label>No Akta</label>
                  <input type="text" class="form-control" placeholder="Masukkan No Akta" name="no_akta" value="<?php echo (isset($row)) ? $row['no_akta'] : '' ?>">
                </div>  
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label>Tanggal Akta</label>
                  <input type="date" name="tanggal_akta" class="form-control" placeholder="Masukkan Tanggal" value="<?php echo (isset($row)) ? $row['tanggal_akta'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label>Jam Akta</label>
                  <input type="time" name="jam_akta" class="form-control" placeholder="Masukkan Jam Akta" value="<?php echo (isset($row)) ? $row['jam_akta'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label>Jam Selesai Akta</label>
                  <input type="time" name="jam_selesai_akta" class="form-control" placeholder="Masukkan Jam Selesai Akta" value="<?php echo (isset($row)) ? $row['jam_selesai_akta'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label>Jenis Fidusia</label>
                  <select name="jenis_fidusia" class="form-control" required>
                      <option>---------</option>
                      <option value="1" <?php if (isset($row)) echo ($row['jenis_fidusia'] == '1') ? 'selected' : '' ?>>Fidusia A/N Sendiri</option>
                      <option value="2" <?php if (isset($row)) echo ($row['jenis_fidusia'] == '2') ? 'selected' : '' ?>>Fidusia A/N Istri/Suami</option>
                      <option value="4" <?php if (isset($row)) echo ($row['jenis_fidusia'] == '4') ? 'selected' : '' ?>>Fidusia A/N Orang Lain</option>
                      <option value="5" <?php if (isset($row)) echo ($row['jenis_fidusia'] == '5') ? 'selected' : '' ?>>Fidusia A/N PT/CV</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label>Gelar Debitur</label>
                  <select name="gelar_debitur" class="form-control" required>
                      <option>---------</option>
                      <option value="Tuan" <?php if (isset($row)) echo ($row['gelar_debitur'] == 'Tuan') ? 'selected' : '' ?>>Tuan</option>
                      <option value="Nyonya" <?php if (isset($row)) echo ($row['gelar_debitur'] == 'Nyonya') ? 'selected' : '' ?>>Nyonya</option>
                  </select>
                </div>  
              </div>
              <div class="form-group row">
                <div class="col-md-5">
                  <label>Nama Debitur</label>
                  <input type="text" class="form-control" placeholder="Masukkan Nama Debitur" name="nama_debitur" value="<?php echo (isset($row)) ? $row['nama_debitur'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <label>Alias Debitur</label>
                  <input type="text" class="form-control" placeholder="Ex: 75xxx" name="alias_debitur" value="<?php echo (isset($row)) ? $row['alias_debitur'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-5">
                  <label>Pekerjaan Debitur</label>
                  <input type="text" class="form-control" placeholder="Masukkan Pekerjaan Debitur" name="pekerjaan_debitur" value="<?php echo (isset($row)) ? $row['pekerjaan_debitur'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label>Kota Lahir Debitur</label>
                  <input type="text" class="form-control" placeholder="Masukkan Kota Kelahiran" name="kota_lahir_debitur" value="<?php echo (isset($row)) ? $row['kota_lahir_debitur'] : '' ?>" required>
                </div>  
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label>Tanggal Lahir Debitur</label>
                  <input type="date" name="tanggal_lahir" class="form-control" placeholder="Masukkan Tanggal Kelahiran" value="<?php echo (isset($row)) ? $row['tgl_lahir_debitur'] : '' ?>" required>
                </div>  
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label>Kewarganegaraan</label>
                  <input type="text" class="form-control" placeholder="Masukkan Kewarganegaraan Debitur" name="warga_debitur" required value="<?php echo (isset($row)) ? $row['warga_debitur'] : '' ?>">
                </div>  
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label>Alamat Debitur</label>
                  <textarea class="form-control" placeholder="Masukkan Alamat" name="alamat_debitur" required><?php echo (isset($row)) ? $row['alamat_debitur'] : '' ?></textarea>
                </div>  
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label>Lokasi RT Debitur</label>
                  <input type="text" class="form-control" placeholder="Masukkan No RT Debitur" name="rt_debitur" value="<?php echo (isset($row)) ? $row['rt_debitur'] : '' ?>">
                </div>  
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label>Lokasi RW Debitur</label>
                  <input type="text" class="form-control" placeholder="Masukkan No RW Debitur" name="rw_debitur" value="<?php echo (isset($row)) ? $row['rw_debitur'] : '' ?>">
                </div>  
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label>Jenis Lurah Debitur</label>
                  <select name="lurah_debitur" class="form-control" required>
                      <option>---------</option>
                      <option value="Kelurahan" <?php if (isset($row)) echo ($row['kelurahan_debitur'] == 'Kelurahan') ? 'selected' : '' ?>>Kelurahan</option>
                      <option value="Desa" <?php if (isset($row)) echo ($row['kelurahan_debitur'] == 'Desa') ? 'selected' : '' ?>>Desa</option>
                  </select>
                </div>  
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label>Nama Kelurahan Debitur</label>
                  <input type="text" class="form-control" placeholder="Masukkan Nama Kelurahan Debitur" name="nama_lurah_debitur" value="<?php echo (isset($row)) ? $row['nama_kelurahan_debitur'] : '' ?>">
                </div>  
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label>Nama Kecamatan Debitur</label>
                  <input type="text" class="form-control" placeholder="Masukkan Nama Kecamatan Debitur" name="kecamatan_debitur" value="<?php echo (isset($row)) ? $row['kecamatan_debitur'] : '' ?>">
                </div>  
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label>Jenis Kota Debitur</label>
                  <select name="kota_debitur" class="form-control" required>
                      <option>---------</option>
                      <option value="Kota" <?php if (isset($row)) echo ($row['kota_debitur'] == 'Kota') ? 'selected' : '' ?>>Kota</option>
                      <option value="Kabupaten" <?php if (isset($row)) echo ($row['kota_debitur'] == 'Kabupaten') ? 'selected' : '' ?>>Kabupaten</option>
                  </select>
                </div>  
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label>Nama Kota Debitur</label>
                  <input type="text" class="form-control" placeholder="Masukkan Nama Kota Debitur" name="nama_kota_debitur" value="<?php echo (isset($row)) ? $row['nama_kota_debitur'] : '' ?>">
                </div>  
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label>Jenis Identitas Debitur</label>
                  <select name="jenis_identitas_debitur" class="form-control" required>
                      <option>---------</option>
                      <option value="KTP" <?php if (isset($row)) echo ($row['jenis_identitas_debitur'] == 'KTP') ? 'selected' : '' ?>>KTP</option>
                      <option value="KITAS" <?php if (isset($row)) echo ($row['jenis_identitas_debitur'] == 'KITAS') ? 'selected' : '' ?>>KITAS</option>
                  </select>
                </div>  
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label>No Identitas Debitur</label>
                  <input type="text" class="form-control" placeholder="Masukkan No Identitas Debitur" name="no_identitas_debitur" value="<?php echo (isset($row)) ? $row['no_identitas_debitur'] : '' ?>">
                </div>  
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label>Status Akta</label>
                  <select name="status_akta" class="form-control">
                      <option>---------</option>
                      <option value="OK" <?php if (isset($row)) echo ($row['status_akta'] == 'OK') ? 'selected' : '' ?>>OK</option>
                      <option value="Pending" <?php if (isset($row)) echo ($row['status_akta'] == 'Pending') ? 'selected' : '' ?>>Pending</option>
                      <option value="Batal" <?php if (isset($row)) echo ($row['status_akta'] == 'Batal') ? 'selected' : '' ?>>Batal</option>
                  </select>
                </div>  
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <input type="hidden" name="id" value="<?php echo (!empty($row)) ? $row['id'] : '' ?>">
              <button type="submit" class="btn btn-primary" name="process" value="takis">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
<?php $this->load->view('templates/footer') ?>