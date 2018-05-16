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
                  <input type="number" class="form-control" placeholder="Masukkan No Akta" name="no_akta" value="<?php echo (isset($row)) ? $row['no_akta'] : '' ?>">
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
                  <input type="text" name="alias_debitur" class="form-control" placeholder="Ex: 75xxx" name="alias_debitur" value="<?php echo (isset($row)) ? $row['alias_debitur'] : '' ?>" required>
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
                  <input type="text" name="warga_debitur" class="form-control" placeholder="Masukkan Kewarganegaraan Debitur" name="warga_debitur" required value="<?php echo (isset($row)) ? $row['warga_debitur'] : '' ?>">
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
                  <input type="text" class="form-control" placeholder="Masukkan No Identitas Debitur" name="no_identitas_debitur" value="<?php echo (isset($row)) ? $row['no_identitas_debitur'] : '' ?>" required>
                </div>  
              </div>
              <hr>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Jenis Persetujuan</label>
                  <select name="jenis_persetujuan" class="form-control" required>
                    <option selected disabled>-----------------</option>
                    <option value="1" <?php echo (isset($row)) && $row['jenis_persetujuan'] == '1' ? 'selected' : '' ?>>Istri</option>
                    <option value="2" <?php echo (isset($row)) && $row['jenis_persetujuan'] == '2' ? 'selected' : '' ?>>Suami</option>
                    <option value="3" <?php echo (isset($row)) && $row['jenis_persetujuan'] == '3' ? 'selected' : '' ?>>Menikah, tapi pasangan tidak ikut</option>
                    <option value="Belum Menikah <?php echo (isset($row)) ? $row['jenis_persetujuan'] == "Belum Menikah" : '' ?>">Belum Menikah</option>
                    <option value="4" <?php echo (isset($row)) && $row['jenis_persetujuan'] == '4' ? 'selected' : '' ?>>Janda/Duda</option>
                    <option value="5" <?php echo (isset($row)) && $row['jenis_persetujuan'] == '5' ? 'selected' : '' ?>>Persetujuan PT</option>
                    <option value="6" <?php echo (isset($row)) && $row['jenis_persetujuan'] == '6' ? 'selected' : '' ?>>Persetujuan CV</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Gelar Persetujuan</label>
                  <select name="gelar_persetujuan" class="form-control" required>
                    <option selected disabled>===============</option>
                    <option value="Tuan" <?php echo(isset($row)) && $row['gelar_persetujuan'] == 'Tuan' ? 'selected' : '' ?>>Tuan</option>
                    <option value="Nyonya" <?php echo(isset($row)) && $row['gelar_persetujuan'] == 'Nyonya' ? 'selected' : '' ?>>Nyonya</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Nama Persetujuan</label>
                  <input type="text" name="nama_persetujuan" class="form-control" value="<?php echo(isset($row)) ? $row['nama_persetujuan'] : '' ?>" placeholder="Nama Persetujuan" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Alias Persetujuan</label>
                  <input type="text" name="alias_persetujuan" class="form-control" placeholder="Ex: 75xxx" value="<?php echo(isset($row)) ? $row['alias_persetujuan'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Pekerjaan Persetujuan</label>
                  <input type="text" name="pekerjaan_persetujuan" class="form-control" placeholder="Masukkan Pekerjaan Persetujuan" value="<?php echo(isset($row)) ? $row['pekerjaan_persetujuan'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Kota Lahir Persetujuan</label>
                  <input type="text" name="kota_lahir_persetujuan" class="form-control" placeholder="Masukkan Kota Lahir Persetujuan" value="<?php echo(isset($row)) ? $row['kota_lahir_persetujuan'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Tanggal Lahir Persetujuan</label>
                  <input type="date" name="tgl_lahir_persetujuan" class="form-control" placeholder="Masukkan Tanggal Lahir persetujuan" value="<?php echo(isset($row)) ? $row['tgl_lahir_persetujuan'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Kewarganegaraan Persetujuan</label>
                  <input type="text" name="warga_persetujuan" class="form-control" value="<?php echo(isset($row)) ? $row['warga_persetujuan'] : '' ?>" placeholder="Masukkan Kewarganegaraan Persetujuan">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Alamat Persetujuan</label>
                  <textarea name="alamat_persetujuan" class="form-control" cols="30" rows="10"><?php echo (isset($row)) ? $row['alamat_persetujuan'] : '' ?></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">RT Persetujuan</label>
                  <input type="text" name="rt_persetujuan" class="form-control" value="<?php echo(isset($row)) ? $row['rt_persetujuan'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">RW Persetujuan</label>
                  <input type="text" name="rw_persetujuan" class="form-control" value="<?php echo(isset($row)) ? $row['rw_persetujuan'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Jenis Kelurahan (Persetujuan)</label>
                  <select name="kelurahan_persetujuan" class="form-control" required>
                      <option>---------</option>
                      <option value="Kelurahan" <?php if (isset($row)) echo ($row['kelurahan_persetujuan'] == 'Kelurahan') ? 'selected' : '' ?>>Kelurahan</option>
                      <option value="Desa" <?php if (isset($row)) echo ($row['kelurahan_persetujuan'] == 'Desa') ? 'selected' : '' ?>>Desa</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Nama Kelurahan Persetujuan</label>
                  <input type="text" name="nama_kelurahan_persetujuan" class="form-control" value="<?php echo(isset($row)) ? $row['nama_kelurahan_persetujuan'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Nama Kecamatan Persetujuan</label>
                  <input type="text" class="form-control" name="kecamatan_persetujuan" value="<?php echo(isset($row)) ? $row['kecamatan_persetujuan'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Jenis Kota Persetujuan</label>
                  <select name="kota_persetujuan" class="form-control" required>
                      <option>---------</option>
                      <option value="Kota" <?php if (isset($row)) echo ($row['kota_persetujuan'] == 'Kota') ? 'selected' : '' ?>>Kota</option>
                      <option value="Kabupaten" <?php if (isset($row)) echo ($row['kota_persetujuan'] == 'Kabupaten') ? 'selected' : '' ?>>Kabupaten</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Nama Kota Persetujuan</label>
                  <input type="text" class="form-control" name="nama_kota_persetujuan" value="<?php echo(isset($row)) ? $row['nama_kota_persetujuan'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Jenis Identitas Persetujuan</label>
                  <select name="jenis_identitas_persetujuan" class="form-control" required>
                      <option>---------</option>
                      <option value="KTP" <?php if (isset($row)) echo ($row['jenis_identitas_persetujuan'] == 'KTP') ? 'selected' : '' ?>>KTP</option>
                      <option value="KITAS" <?php if (isset($row)) echo ($row['jenis_identitas_persetujuan'] == 'KITAS') ? 'selected' : '' ?>>KITAS</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Nomor Identitas Persetujuan</label>
                  <input type="text" class="form-control" name="no_identitas_persetujuan" value="<?php echo(isset($row)) ? $row['no_identitas_persetujuan'] : '' ?>" placeholder="Masukkan Nomor Identitas Persetujuan">
                </div>
              </div>
              <hr>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Gelar Pemilik</label>
                  <select name="gelar_pemilik" class="form-control" required>
                    <option selected disabled>==============</option>
                    <option value="Tuan" <?php echo(isset($row)) && $row['gelar_pemilik'] == 'Tuan' ? 'selected' : '' ?>>Tuan</option>
                    <option value="Nyonya" <?php echo(isset($row)) && $row['gelar_pemilik'] == 'Nyonya' ? 'selected' : '' ?>>Nyonya</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Nama Pemilik</label>
                  <input type="text" name="nama_pemilik" class="form-control" value="<?php echo(isset($row)) ? $row['nama_pemilik'] : '' ?>" placeholder="Nama pemilik" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Alias Pemilik</label>
                  <input type="text" name="alias_pemilik" class="form-control" placeholder="Ex: 75xxx" value="<?php echo(isset($row)) ? $row['alias_pemilik'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Pekerjaan Pemilik</label>
                  <input type="text" name="pekerjaan_pemilik" class="form-control" placeholder="Masukkan Pekerjaan Pemilik" value="<?php echo(isset($row)) ? $row['pekerjaan_pemilik'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Kota Lahir pemilik</label>
                  <input type="text" name="kota_lahir_pemilik" class="form-control" placeholder="Masukkan Kota Lahir Pemilik" value="<?php echo(isset($row)) ? $row['kota_lahir_pemilik'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Tanggal Lahir Pemilik</label>
                  <input type="date" name="tgl_lahir_pemilik" class="form-control" placeholder="Masukkan Tanggal Lahir persetujuan" value="<?php echo(isset($row)) ? $row['tgl_lahir_pemilik'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Alamat Pemilik</label>
                  <textarea name="alamat_pemilik" class="form-control" cols="30" rows="10"><?php echo (isset($row)) ? $row['alamat_pemilik'] : '' ?></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">RT Pemilik</label>
                  <input type="text" name="rt_pemilik" class="form-control" value="<?php echo(isset($row)) ? $row['rt_pemilik'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">RW Pemilik</label>
                  <input type="text" name="rw_pemilik" class="form-control" value="<?php echo(isset($row)) ? $row['rw_pemilik'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Jenis Kelurahan Pemilik</label>
                  <select name="kelurahan_pemilik" class="form-control" required>
                      <option>---------</option>
                      <option value="Kelurahan" <?php if (isset($row)) echo ($row['kelurahan_pemilik'] == 'Kelurahan') ? 'selected' : '' ?>>Kelurahan</option>
                      <option value="Desa" <?php if (isset($row)) echo ($row['kelurahan_pemilik'] == 'Desa') ? 'selected' : '' ?>>Desa</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Nama Kelurahan Pemilik</label>
                  <input type="text" name="nama_kelurahan_pemilik" class="form-control" value="<?php echo(isset($row)) ? $row['nama_kelurahan_pemilik'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Nama Kecamatan Pemilik</label>
                  <input type="text" class="form-control" name="kecamatan_pemilik" value="<?php echo(isset($row)) ? $row['kecamatan_pemilik'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Jenis Kota Pemilik</label>
                  <select name="kota_pemilik" class="form-control" required>
                      <option>---------</option>
                      <option value="Kota" <?php if (isset($row)) echo ($row['kota_pemilik'] == 'Kota') ? 'selected' : '' ?>>Kota</option>
                      <option value="Kabupaten" <?php if (isset($row)) echo ($row['kota_pemilik'] == 'Kabupaten') ? 'selected' : '' ?>>Kabupaten</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Nama Kota Pemilik</label>
                  <input type="text" class="form-control" name="nama_kota_pemilik" value="<?php echo(isset($row)) ? $row['nama_kota_pemilik'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Jenis Identitas Pemilik</label>
                  <select name="jenis_identitas_pemilik" class="form-control" required>
                      <option>---------</option>
                      <option value="KTP" <?php if (isset($row)) echo ($row['jenis_identitas_pemilik'] == 'KTP') ? 'selected' : '' ?>>KTP</option>
                      <option value="KITAS" <?php if (isset($row)) echo ($row['jenis_identitas_pemilik'] == 'KITAS') ? 'selected' : '' ?>>KITAS</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Nomor Identitas Pemilik</label>
                  <input type="text" class="form-control" name="no_identitas_pemilik" value="<?php echo(isset($row)) ? $row['no_identitas_pemilik'] : '' ?>" placeholder="Masukkan Nomor Identitas Persetujuan">
                </div>
              </div>
              <hr>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Nama PT/CV</label>
                  <input type="text" name="nama_cv" class="form-control" placeholder="Masukkan Nama PT/CV" value="<?php echo(isset($row)) ? $row['nama_cv'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Kedudukan PT/CV</label>
                  <input type="text" name="kedudukan_cv" class="form-control" value="<?php echo(isset($row)) ? $row['kedudukan_cv'] : '' ?>" placeholder="Masukkan Kedudukan PT/CV" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Cabang PT/CV</label>
                  <input type="text" class="form-control" name="cabang" value="<?php echo(isset($row)) ? $row['cabang'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Tanggal Akta Pendirian PT/CV</label>
                  <input type="date" name="tgl_akta_pendirian_cv" class="form-control" value="<?php echo(isset($row)) ? $row['tgl_akta_pendirian_cv'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">No. Akta Pendirian PT/CV</label>
                  <input type="text" name="no_akta_pendirian_cv" class="form-control" placeholder="Masukkan No. akta" value="<?php echo(isset($row)) ? $row['no_akta_pendirian_cv'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Notaris Akta Pendirian PT/Cv</label>
                  <input type="text" name="nota_akta_pendirian_cv" class="form-control" placeholder="Masukkan Notaris Akta" value="<?php echo(isset($row)) ? $row['nota_akta_pendirian_cv'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Tanggal Persetujuan PT/CV</label>
                  <input type="date" name="tgl_setuju_cv" class="form-control" value="<?php echo(isset($row)) ? $row['tgl_setuju_cv'] : '' ?>">
                </div>
              </div>
              <hr>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Tanggal PK</label>
                  <input type="date" name="tgl_pk" class="form-control" value="<?php echo(isset($row)) ? $row['tgl_pk'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">No. PK</label>
                  <input type="text" name="no_pk" class="form-control" value="<?php echo(isset($row)) ? $row['no_pk'] : '' ?>" placeholder="Masukkan No. PK">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Tanggal Surat Kuasa Fidusia Debitur</label>
                  <input type="date" name="tgl_sk_fidusia_debitur" class="form-control" value="<?php echo(isset($row)) ? $row['tgl_sk_fidusia_debitur'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">No. Langganan</label>
                  <input type="text" name="no_langganan" class="form-control" placeholder="Masukkan No. Langganan" value="<?php echo(isset($row)) ? $row['no_langganan'] : '' ?>">
                </div>
              </div>
              <hr>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Nilai Hutang</label>
                  <input type="number" name="nilai_hutang" class="form-control" value="<?php echo(isset($row)) ? $row['nilai_hutang'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Nilai Penjaminan</label>
                  <input type="number" name="nilai_penjaminan" class="form-control" value="<?php echo(isset($row)) ? $row['nilai_penjaminan'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Nilai Obyek</label>
                  <input type="number" class="form-control" name="nilai_obyek" value="<?php echo(isset($row)) ? $row['nilai_obyek'] : '' ?>">
                </div>
              </div>
              <hr>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">No. Kendaraan</label>
                  <input type="text" name="no_polisi" class="form-control" placeholder="Ex: KT 42xx RW" value="<?php echo(isset($row)) ? $row['no_polisi'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Merk Kendaraan</label>
                  <input type="text" class="form-control" name="merk" value="<?php echo(isset($row)) ? $row['merk'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Type Kendaraan</label>
                  <input type="text" class="form-control" name="type" value="<?php echo(isset($row)) ? $row['type'] : '' ?>" placeholder="Ex: X1B02Nxxxx">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Jenis Kendaraan</label>
                  <input type="number" class="form-control" name="jenis_kendaraan" value="<?php echo(isset($row)) ? $row['jenis_kendaraan'] : '' ?>" placeholder="Ex: 2 untuk roda 2">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Model Kendaraan</label>
                  <input type="text" name="model" class="form-control" value="<?php echo(isset($row)) ? $row['model'] : '' ?>" placeholder="Masukkan Model Kendaraan">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Tahun Buat Kendaraan</label>
                  <input type="text" name="thn_buat" class="form-control" value="<?php echo(isset($row)) ? $row['thn_buat'] : '' ?>" placeholder="Ex: 2015" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Tahun Rakit Kendaraan</label>
                  <input type="text" name="thn_rakit" class="form-control" placeholder="Masukkan Tahun rakit kendaraan" value="<?php echo(isset($row)) ? $row['thn_rakit'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Silinder</label>
                  <input type="text" name="silinder" class="form-control" placeholder="Masukkan Silinder" value="<?php echo(isset($row)) ? $row['silinder'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Warna Kendaraan</label>
                  <input type="text" name="warna" class="form-control" placeholder="Masukkan Warna Kendaraan" value="<?php echo(isset($row)) ? $row['warna'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">No. Rangka</label>
                  <input type="text" name="no_rangka" class="form-control" placeholder="Masukkan Nomor Rangka Kendaraan" value="<?php echo(isset($row)) ? $row['no_rangka'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">No. Mesin</label>
                  <input type="text" name="no_mesin" class="form-control" value="<?php echo(isset($row)) ? $row['no_mesin'] : '' ?>" placeholder="Masukkan Nomor Mesin">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Nomor BPKB</label>
                  <input type="text" name="bpkb_nmr" class="form-control" value="<?php echo(isset($row)) ? $row['bpkb_nmr'] : '' ?>" placeholder="Masukkan Nomor BPKB">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Atas Nama BPKB</label>
                  <input type="text" name="bpkb_atas_nama" class="form-control" value="<?php echo(isset($row)) ? $row['bpkb_atas_nama'] : '' ?>" placeholder="Masukkan Atas Nama BPKB">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Tanggal BPKB</label>
                  <input type="date" name="bpkb_tanggal" class="form-control" value="<?php echo(isset($row)) ? $row['bpkb_tanggal'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">BPKB Dikeluarkan Oleh</label>
                  <input type="text" name="bpkb_dikeluarkan_oleh" class="form-control" value="<?php echo(isset($row)) ? $row['bpkb_dikeluarkan_oleh'] : '' ?>" placeholder="Masukkan Nama Mengeluarkan BPKB">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Sumbu</label>
                  <input type="number" name="sumbu" class="form-control" value="<?php echo(isset($row)) ? $row['sumbu'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Roda</label>
                  <input type="number" class="form-control" name="roda" value="<?php echo(isset($row)) ? $row['roda'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Kondisi</label>
                  <select name="kondisi" class="form-control" required>
                      <option>---------</option>
                      <option value="Baru" <?php if (isset($row)) echo ($row['kondisi'] == 'Baru') ? 'selected' : '' ?>>Kota</option>
                      <option value="Bekas" <?php if (isset($row)) echo ($row['kota_persetujuan'] == 'Bekas') ? 'selected' : '' ?>>Kabupaten</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Bukti Hak</label>
                  <select name="bukti_hak" class="form-control" required>
                      <option>---------</option>
                      <option value="BPKB" <?php if (isset($row)) echo ($row['bukti_hak'] == 'BPKB') ? 'selected' : '' ?>>BPKB</option>
                      <option value="SPB" <?php if (isset($row)) echo ($row['bukti_hak'] == 'SPB') ? 'selected' : '' ?>>SPB</option>
                      <option value="Kwitansi" <?php if (isset($row)) echo ($row['bukti_hak'] == 'Kwitansi' ? 'selected' : '') ?>>Kwitansi</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Tanggal SPB</label>
                  <input type="date" name="tgl_spb" class="form-control" value="<?php echo(isset($row)) ? $row['tgl_spb'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Tanggal Kwitansi</label>
                  <input type="date" class="form-control" name="tgl_kwitansi" value="<?php echo(isset($row)) ? $row['tgl_kwitansi'] : '' ?>">
                </div>
              </div>
              <hr>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Nama Pengadilan Negeri</label>
                  <input type="text" name="peradilan_negeri" class="form-control" value="<?php echo(isset($row)) ? $row['peradilan_negeri'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Tujuan Penerima Fidusia</label>
                  <input type="text" name="penerima_fidusia" class="form-control" value="<?php echo(isset($row)) ? $row['penerima_fidusia'] : '' ?>" placeholder="Masukkan Tujuan Penerima Fidusia" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Kedudukan</label>
                  <input type="text" name="kedudukan" class="form-control" placeholder="Masukkan Kedudukan" value="<?php echo(isset($row)) ? $row['kedudukan'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Alamat Fidusia</label>
                  <textarea name="alamat_penerima_fidusia" class="form-control" cols="30" rows="10">
                    <?php echo(isset($row)) ? $row['alamat_penerima_fidusia'] : '' ?>
                  </textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Nama Penerima Fidusia</label>
                  <input type="text" name="nama_penerima_fidusia" class="form-control" placeholder="Masukkan Nama Penerima Fidusia" value="<?php echo(isset($row)) ? $row['nama_penerima_fidusia'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Jabatan Penerima Fidusia</label>
                  <input type="text" name="jabatan_penerima_fidusia" class="form-control" placeholder="Masukkan Jabatan Penerima Fidusia" value="<?php echo(isset($row)) ? $row['jabatan_penerima_fidusia'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Tanggal Surat Kuasa Penerima Fidusia</label>
                  <input type="date" name="tgl_sk_penerima_fidusia" class="form-control" value="<?php echo(isset($row)) ? $row['tgl_sk_penerima_fidusia'] : '' ?>" placeholder="Masukkan Kewarganegaraan Persetujuan">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">No. Surat Kuasa Penerima Fidusia</label>
                  <input type="text" name="no_sk_penerima_fidusia" class="form-control" value="<?php echo(isset($row)) ? $row['no_sk_penerima_fidusia'] : '' ?>">
                </div>
              </div>
              <hr>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Kanwil</label>
                  <input type="text" name="kanwil" class="form-control" value="<?php echo(isset($row)) ? $row['kanwil'] : '' ?>" placeholder="Masukkan Kanwil">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Alamat Kanwil</label>
                  <textarea name="alamat_kanwil" class="form-control" cols="30" rows="10"><?php echo(isset($row)) ? $row['alamat_kanwil'] : '' ?></textarea>
                </div>
              </div>
              <hr>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">No. Surat Pengantar</label>
                  <input type="text" class="form-control" name="no_surat_pengantar" value="<?php echo(isset($row)) ? $row['no_surat_pengantar'] : '' ?>" placeholder="Masukkan Nomor Surat Pengantar">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Tanggal Surat Pengantar</label>
                  <input type="date" name="tgl_surat_pengantar" class="form-control" value="<?php echo(isset($row)) ? $row['tgl_surat_pengantar'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Tanggal Surat Kuasa Notaris</label>
                  <input type="date" class="form-control" name="tgl_sk_notaris" value="<?php echo(isset($row)) ? $row['tgl_sk_notaris'] : '' ?>">
                </div>
              </div>
              <hr>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Kode Costumer</label>
                  <input type="text" name="kode_customer" class="form-control" value="<?php echo(isset($row)) ? $row['kode_customer'] : '' ?>" placeholder="Masukkan Kode Costumer">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Nama Costumer</label>
                  <input type="text" class="form-control" name="nama_customer" value="<?php echo(isset($row)) ? $row['nama_customer'] : '' ?>" placeholder="Masukkan Nama Costumer">
                </div>
              </div>
              <hr>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">PNBP</label>
                  <input type="number" name="pnbp" class="form-control" value="<?php echo(isset($row)) ? $row['pnbp'] : '' ?>" placeholder="Masukkan PNBP">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Biaya Admin Bank</label>
                  <input type="number" class="form-control" name="admin_bank" value="<?php echo(isset($row)) ? $row['admin_bank'] : '' ?>" placeholder="Masukkan Biaya Admin Bank">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Materai</label>
                  <input type="number" class="form-control" name="materai" value="<?php echo(isset($row)) ? $row['materai'] : '' ?>" placeholder="Masukkan Materai">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Admin dan biaya operasional</label>
                  <input type="number" name="admin_dan_operasional" class="form-control" value="<?php echo(isset($row)) ? $row['admin_dan_operasional'] : '' ?>" placeholder="Masukkan Admin Dan Biaya Operasional" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Jumlah</label>
                  <input type="number" name="jumlah" class="form-control" placeholder="Masukkan Jumlah" value="<?php echo(isset($row)) ? $row['jumlah'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Biaya Akta</label>
                  <input type="number" name="biaya_akta" class="form-control" placeholder="Masukkan Biaya Akta" value="<?php echo(isset($row)) ? $row['biaya_akta'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">No. Sertifikat</label>
                  <input type="text" name="no_sertifikat" class="form-control" placeholder="Masukkan Nomor Sertifikat" value="<?php echo(isset($row)) ? $row['no_sertifikat'] : '' ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">No. Bukti setoran</label>
                  <input type="text" name="no_bukti_setoran" class="form-control" value="<?php echo(isset($row)) ? $row['no_bukti_setoran'] : '' ?>" placeholder="Masukkan Nomor Bukti Setoran">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Tanggal Setor</label>
                  <input type="date" name="tgl_setor" class="form-control" value="<?php echo(isset($row)) ? $row['tgl_setor'] : '' ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="">Nama Karyawan</label>
                  <input type="text" name="nama_karyawan" class="form-control" value="<?php echo(isset($row)) ? $row['nama_karyawan'] : '' ?>" placeholder="Masukkan Nama Karyawan">
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
              <input type="hidden" name="id_fidusia" value="<?php echo (!empty($row)) ? $row['id_fidusia'] : '' ?>">
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