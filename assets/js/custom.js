$(function(){
	// $.noConflict();
	tinymce.init({selector:'#debitur',
		height: 1500,
	  theme: 'modern',
	  plugins: [
	    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
	    'searchreplace wordcount visualblocks visualchars code fullscreen',
	    'insertdatetime media nonbreaking save table contextmenu directionality',
	    'emoticons template paste textcolor colorpicker textpattern imagetools'
	  ],
	  advlist_number_styles: "upper-alpha",
	  toolbar1: 'insertfile undo redo | styleselect | fontselect fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons |',
	  toolbar2: 'Nomor_Akta Hari Tanggal_Akta Tanggal_Akta_Terbilang Waktu Waktu_Terbilang Gelar_Debitur Nama_Debitur Kota_Lahir_Debitur Tgl_Lahir_Debitur',
	  toolbar3: 'Tgl_Lahir_Debitur_Terbilang Kewarganegaraan_Debitur Pekerjaan_Debitur Alamat_Debitur Rt_Debitur Rw_Debitur Kelurahan_Debitur Nama_Kelurahan_Debitur', 
	  toolbar4: 'Kecamatan_Debitur Kota_Debitur Nama_Kota_Debitur No_Identitas_Debitur Jenis_Identitas_Debitur Tgl_Sk_Penerima_Fidusia Tgl_Sk_Terbilang',
	  toolbar5: 'Gelar_Persetujuan Nama_Persetujuan Kota_Lahir_Persetujuan Tgl_Lahir_Persetujuan Tgl_Lahir_Persetujuan_Terbilang Warga_Persetujuan', 
	  toolbar6: 'Pekerjaan_Persetujuan Alamat_Persetujuan Rt_Persetujuan Kelurahan_Persetujuan Nama_Kelurahan_Persetujuan Kecamatan_Persetujuan Kota_Persetujuan',
	  toolbar7: 'Nama_Kota_Persetujuan No_Identitas_Persetujan Jenis_Identitas_Persetujuan No_Sk_Penerima_Fidusia Nilai_Hutang Nilai_Hutang_Terbilang',
	  toolbar8: 'Nilai_Penjaminan Nilai_Penjaminan_Terbilang Merk Type Thn_Buat Warna No_Polisi Bukti_Hak Bpkb_Atas_Nama Nilai_Obyek Nilai_Obyek_Terbilang',
	  image_ahun: true,
	  templates: [
	    { title: 'Test template 1', content: 'Test 1' },
	    { title: 'Test template 2', content: 'Test 2' },
	  ],
	  setup: function (editor) {
	    editor.addButton('Nomor_Akta', {
	      text: 'Nomor Akta',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{no_akta}&nbsp;');
	      }
	    }),
	    editor.addButton('Hari',{
	    	text:'Hari',
	    	icon:false,
	    	onclick:function(){
	    		editor.insertContent('{hari}&nbsp;');
	    	}
	    }),
	    editor.addButton('Tanggal_Akta',{
	    	text:'Tanggal Akta',
	    	icon:false,
	    	onclick:function(){
	    		editor.insertContent('{tanggal_akta}&nbsp;');
	    	}
	    }),
	    editor.addButton('Tanggal_Akta_Terbilang', {
	      text: 'Tanggal Akta Terbilang',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{tanggal_akta_terbilang}&nbsp;');
	      }
	    }),
	    editor.addButton('Waktu', {
	      text: 'Waktu',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{waktu}&nbsp;');
	      }
	    }),
	    editor.addButton('Waktu_Terbilang', {
	      text: 'Waktu Terbilang',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{waktu_terbilang}&nbsp;');
	      }
	    }),
	    editor.addButton('Gelar_Debitur', {
	      text: 'Gelar_Debitur',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{gelar_debitur}&nbsp;');
	      }
	    }),
	    editor.addButton('Nama_Debitur', {
	      text: 'Nama Debitur',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{nama_debitur}&nbsp;');
	      }
	    }),
	    editor.addButton('Kota_Lahir_Debitur', {
	      text: 'Kota Lahir Debitur',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{kota_lahir_debitur}&nbsp;');
	      }
	    }),
	    editor.addButton('Tgl_Lahir_Debitur', {
	      text: 'Tanggal Lahir Debitur',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{tgl_lahir_debitur}&nbsp;');
	      }
	    }),
	    editor.addButton('Jenis_Identitas_Debitur', {
	    	text: 'Jenis Identitas Debitur',
	    	icon: false,
	    	onclick: function () {
	    		editor.insertContent('{jenis_identitas_debitur}&nbsp;');
	    	}
	    }),
	    editor.addButton('Tgl_Lahir_Debitur_Terbilang', {
	      text: 'Tanggal Lahir Debitur Terbilang',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{tgl_lhr_dbt_terbilang}&nbsp;');
	      }
	    }),
	    editor.addButton('Kewarganegaraan_Debitur',{
	    	text:'Kewarganegaraan Debitur',
	    	icon:false,
	    	onclick:function() {
	    		editor.inserContent('{warga_debitur}&nbsp;');
	    	}
	    }),
	    editor.addButton('Pekerjaan_Debitur', {
	      text: 'Pekerjaan Debitur',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{pekerjaan_debitur}&nbsp;');
	      }
	    }),
	    editor.addButton('Alamat_Debitur', {
	      text: 'Alamat Debitur',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{alamat_debitur}&nbsp;');
	      }
	    }),
	    editor.addButton('Rt_Debitur', {
	      text: 'Rt Debitur',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{rt_debitur}&nbsp;');
	      }
	    }),
	    editor.addButton('Rw_Debitur', {
	      text: 'Rw Debitur',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{rw_debitur}&nbsp;');
	      }
	    }),
	    editor.addButton('Kelurahan_Debitur', {
	      text: 'Kelurahan Debitur',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{kelurahan_debitur}&nbsp;');
	      }
	    }),
	    editor.addButton('Nama_Kelurahan_Debitur', {
	      text: 'Nama Kelurahan Debitur',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{nama_kelurahan_debitur}&nbsp;');
	      }
	    }),
	    editor.addButton('Kecamatan_Debitur', {
	      text: 'Kecamatan Debitur',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{kecamatan_debitur}&nbsp;');
	      }
	    }),
	    editor.addButton('Kota_Debitur',{
	    	text:'Kota Debitur',
	    	icon:false,
	    	onclick: function() {
	    		editor.insertContent('{kota_debitur}&nbsp;');
	    	}
	    }),
	    editor.addButton('Nama_Kota_Debitur', {
	      text: 'Nama Kota Debitur',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{nama_kota_debitur}&nbsp;');
	      }
	    }),
	    editor.addButton('No_Identitas_Debitur', {
	      text: 'No Identitas Debitur',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{no_identitas_debitur}&nbsp;');
	      }
	    }),
	    editor.addButton('Tgl_Sk_Penerima_Fidusia', {
	      text: 'Tanggal SK Penerima Fidusia',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{tgl_sk_penerima_fidusia}&nbsp;');
	      }
	    }),
	    editor.addButton('Tgl_Sk_Terbilang',{
	    	text: 'Tanggal SK Terbilang',
	    	icon: false,
	    	onclick: function() {
	    		editor.insertContent('{tgl_sk_terbilang}&nbsp;');
	    	}
	    }),
	    editor.addButton('Gelar_Persetujuan', {
	      text: 'Gelar Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{gelar_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Nama_Persetujuan', {
	      text: 'Nama Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{nama_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Kota_Lahir_Persetujuan', {
	      text: 'Kota Lahir Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{tanggal_akta_terbilang}&nbsp;');
	      }
	    }),
	    editor.addButton('Tgl_Lahir_Persetujuan', {
	      text: 'Tanggal Lahir Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{tgl_lhr_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Tgl_Lahir_Persetujuan_Terbilang', {
	      text: 'Tanggal Lahir Persetujuan Terbilang',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{tgl_lhr_persetujuan_terbilang}&nbsp;');
	      }
	    }),
	    editor.addButton('Warga_Persetujuan', {
	      text: 'Warga Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{warga_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Pekerjaan_Persetujuan', {
	      text: 'Pekerjaan Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{pekerjaan_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Alamat_Persetujuan', {
	      text: 'Alamat Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{alamat_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Rt_Persetujuan', {
	      text: 'Rt Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{rt_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Kelurahan_Persetujuan', {
	      text: 'Kelurahan Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{kelurahan_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Nama_Kelurahan_Persetujuan', {
	      text: 'Nama Kelurahan Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{nama_kelurahan_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Kecamatan_Persetujuan', {
	      text: 'Kecamatan Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{kecamatan_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Kota_Persetujuan', {
	      text: 'Kota Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{kota_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Nama_Kota_Persetujuan', {
	      text: 'Nama Kota Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{nama_kota_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('No_Identitas_Persetujan', {
	      text: 'No Identitas Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{no_identitas_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Jenis_Identitas_Persetujuan', {
	    	text: 'Jenis Identitas Persetujuan',
	    	icon: false,
	    	onclick: function () {
	    		editor.insertContent('{jenis_identitas_persetujuan}&nbsp;');
	    	}
	    }),
	    editor.addButton('No_Sk_Penerima_Fidusia', {
	      text: 'No Surat Kuasa Penerima Fidusia',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{no_sk_penerima_fidusia}&nbsp;');
	      }
	    }),
	    editor.addButton('Nilai_Hutang',{
	    	text: 'Nilai Hutang',
	    	icon:false,
	    	onclick: function() {
	    		editor.insertContent('{nilai_hutang}&nbsp;');
	    	}
	    }),
	    editor.addButton('Nilai_Hutang_Terbilang',{
	    	text: 'Nilai Hutang Terbilang',
	    	icon:false,
	    	onclick: function() {
	    		editor.insertContent('{nilai_hutang_terbilang}&nbsp;');
	    	}
	    }),
	    editor.addButton('Nilai_Penjaminan', {
	      text: 'Nilai Penjaminan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{nilai_penjaminan}&nbsp;');
	      }
	    }),
	    editor.addButton('Nilai_Penjaminan_Terbilang', {
	      text: 'Nilai Penjaminan Terbilang',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{nilai_penjaminan_terbilang}&nbsp;');
	      }
	    }),
	    editor.addButton('Merk', {
	      text: 'Merk',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{merk}&nbsp;');
	      }
	    }),
	    editor.addButton('Type', {
	      text: 'Type',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{type}&nbsp;');
	      }
	    }),
	    editor.addButton('Thn_Buat', {
	      text: 'Tahun Buat',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{thn_buat}&nbsp;');
	      }
	    }),
	    // editor.addButton('Thn_Rakit', {
	    //   text: 'Tahun Rakit',
	    //   icon: false,
	    //   onclick: function () {
	    //     editor.insertContent('{thn_rakit}&nbsp;');
	    //   }
	    // }),
	    editor.addButton('Warna', {
	      text: 'Warna',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{warna}&nbsp;');
	      }
	    }),
	    editor.addButton('No_Rangka', {
	      text: 'Nomor Rangka',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{no_rangka}&nbsp;');
	      }
	    }),
	    editor.addButton('No_Mesin', {
	      text: 'Nomor Mesin',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{no_mesin}&nbsp;');
	      }
	    }),
	    editor.addButton('No_Polisi', {
	      text: 'Nomor Polisi',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{no_polisi}&nbsp;');
	      }
	    }),
	    editor.addButton('Bukti_Hak', {
	      text: 'Bukti Hak',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{bukti_hak}&nbsp;');
	      }
	    }),
	    editor.addButton('Bpkb_Atas_Nama', {
	      text: 'Atas Nama BPKB',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{bpkb_atas_nama}&nbsp;');
	      }
	    }),
	    editor.addButton('Nilai_Obyek', {
	      text: 'Nilai Obyek',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{nilai_obyek}&nbsp;');
	      }
	    }),
	    editor.addButton('Nilai_Obyek_Terbilang', {
	      text: 'Nilai Obyek Terbilang',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{nilai_obyek_terbilang}&nbsp;');
	      }
	    })
	    }
	  });
	
	$('.table').DataTable();

	tinymce.init({selector:'#ppat',
		height: 2000,
	  theme:'modern',
	  plugins: [
	    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
	    'searchreplace wordcount visualblocks visualchars code fullscreen',
	    'insertdatetime media nonbreaking save table contextmenu directionality',
	    'emoticons template paste textcolor colorpicker textpattern imagetools'
	  ],
	  advlist_number_styles: "upper-alpha",
	  toolbar: ['insertfile undo redo | styleselect | fontselect fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons |',
	  'Nomor_Akta Nomor_Akta_SKMHT Tanggal_Akta_SKMHT Tanggal_Akta_SKMHT_Terbilang Hari Tanggal_Akta Tanggal_Akta_Terbilang Bulan Tahun',
	  'Tahun_Terbilang Gelar_Penjual Nama_Penjual Kota_Lahir_Penjual Tgl_Lahir_Penjual Tgl_Lahir_Penjual_Terbilang Pekerjaan_Penjual Alamat_Penjual', 
	  'Rt_Penjual Kelurahan_Penjual Nama_Kelurahan_Penjual Kecamatan_Penjual Kota_Penjual Nama_Kota_Penjual No_Identitas_Penjual Kedudukan_Keluarga_Penjual',
	  'Gelar_Persetujuan Nama_Persetujuan Kota_Lahir_Persetujuan Tgl_Lahir_Persetujuan Tgl_Lahir_Persetujuan_Terbilang Pekerjaan_Persetujuan',
	  'Alamat_Persetujuan Rt_Persetujuan Kelurahan_Persetujuan Nama_Kelurahan_Persetujuan Kecamatan_Persetujuan Kota_Persetujuan',
	  'Nama_Kota_Persetujuan No_Identitas_Persetujuan Gelar_Pembeli Nama_Pembeli Kota_Lahir_Pembeli Tgl_Lahir_Pembeli Tgl_Lahir_Penjual_Terbilang',
	  'Pekerjaan_Pembeli Alamat_Pembeli Rt_Pembeli Kelurahan_Pembeli Nama_Kelurahan_Pembeli Kecamatan_Pembeli Kota_Pembeli Nama_Kota_Pembeli',
	  'No_Identitas_Pembeli Nilai_Perjanjian Nilai_Perjanjian_Terbilang Nomor_Perjanjian_Kredit Tanggal_Perjanjian Tanggal_Perjanjian_Terbilang',
	  'Peringkat_Tanggungan Nilai_Tanggungan Nilai_Tanggungan_Terbilang Jenis_Kepemilikan Nomor_Kepemilikan Nomor_Surat_Ukur Tanggal_Surat_Ukur',
	  'Tanggal_Surat_Ukur_Terbilang Luas_Tanah Luas_Tanah_Terbilang Nomor_NIB Nomor_SPPTPBB Kecamatan_Tanah Nama_Kelurahan_Tanah',
	  'Luas_Bangunan Luas_Bangunan_Terbilang Rt_Bangunan Alamat_Bangunan Kelurahan_Bangunan Nama_Kelurahan_Bangunan Kecamatan_Bangunan',
	  'Kota_Bangunan Nama_Kota_Bangunan Nilai_Beli Nilai_Beli_Terbilang Tanggal_Dibuat_APHT Tanggal_Dibuat_APHT_Terbilang'
	  ],
	  image_ahun: true,
	  templates: [
	    { title: 'Test template 1', content: 'Test 1' },
	    { title: 'Test template 2', content: 'Test 2' },
	  ],
	  setup: function (editor) {
	    editor.addButton('Nomor_Akta', {
	      text: 'Nomor Akta',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{no_akta}&nbsp;');
	      }
	    }),
	    editor.addButton('Nomor_Akta_SKMHT',{
	    	text:'Nomor Akta SKMHT',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{nomor_akta_skmht}&nbsp;');
	    	}
	    }),
	    editor.addButton('Tanggal_Akta_SKMHT',{
	    	text:'Tanggal Akta SKMHT',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{tanggal_akta_skmht}&nbsp;');
	    	}
	    }),
	    editor.addButton('Tanggal_Akta_SKMHT_Terbilang',{
	    	text:'Tanggal Akta SKMHT Terbilang',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{tanggal_akta_skmht_terbilang}&nbsp;');
	    	}
	    }),
	    editor.addButton('Hari',{
	    	text:'Hari',
	    	icon:false,
	    	onclick:function(){
	    		editor.insertContent('{hari}&nbsp;');
	    	}
	    }),
	    editor.addButton('Tanggal_Akta',{
	    	text:'Tanggal Akta',
	    	icon:false,
	    	onclick:function(){
	    		editor.insertContent('{tanggal_akta}&nbsp;');
	    	}
	    }),
	    editor.addButton('Tanggal_Akta_Terbilang', {
	      text: 'Tanggal Akta Terbilang',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{tanggal_akta_terbilang}&nbsp;');
	      }
	    }),
	    editor.addButton('Bulan',{
	    	text:'Bulan',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{bulan}&nbsp;');
	    	}
	    }),
	    editor.addButton('Waktu', {
	      text: 'Waktu',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{waktu}&nbsp;');
	      }
	    }),
	    editor.addButton('Waktu_Terbilang', {
	      text: 'Waktu Terbilang',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{waktu_terbilang}&nbsp;');
	      }
	    }),
	    editor.addButton('Tahun',{
	    	text:'Tahun',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{tahun}&nbsp;');
	    	}
	    }),
	    editor.addButton('Tahun_Terbilang',{
	    	text:'Tahun Terbilang',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{tahun_terbilang}&nbsp;');
	    	}
	    }),
	    editor.addButton('Gelar_Penjual', {
	      text: 'Gelar Penjual',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{gelar_penjual}&nbsp;');
	      }
	    }),
	    editor.addButton('Nama_Penjual', {
	      text: 'Nama Penjual',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{nama_penjual}&nbsp;');
	      }
	    }),
	    editor.addButton('Kota_Lahir_Penjual', {
	      text: 'Kota Lahir Penjual',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{kota_lahir_penjual}&nbsp;');
	      }
	    }),
	    editor.addButton('Tgl_Lahir_Penjual', {
	      text: 'Tanggal Lahir Penjual',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{tgl_lhr_penjual}&nbsp;');
	      }
	    }),
	    editor.addButton('Tgl_Lahir_Penjual_Terbilang', {
	      text: 'Tanggal Lahir Penjual Terbilang',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{tgl_lhr_penjual_terbilang}&nbsp;');
	      }
	    }),
	    editor.addButton('Pekerjaan_Penjual', {
	      text: 'Pekerjaan Penjual',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{pekerjaan_penjual}&nbsp;');
	      }
	    }),
	    editor.addButton('Alamat_Penjual', {
	      text: 'Alamat Penjual',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{alamat_penjual}&nbsp;');
	      }
	    }),
	    editor.addButton('Rt_Penjual', {
	      text: 'Rt Penjual',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{rt_penjual}&nbsp;');
	      }
	    }),
	    editor.addButton('Kelurahan_Penjual', {
	      text: 'Kelurahan Penjual',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{kelurahan_penjual}&nbsp;');
	      }
	    }),
	    editor.addButton('Nama_Kelurahan_Penjual', {
	      text: 'Nama Kelurahan Penjual',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{nama_kelurahan_penjual}&nbsp;');
	      }
	    }),
	    editor.addButton('Kecamatan_Penjual', {
	      text: 'Kecamatan Penjual',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{kecamatan_penjual}&nbsp;');
	      }
	    }),
	    editor.addButton('Kota_Penjual',{
	    	text:'Kota Penjual',
	    	icon:false,
	    	onclick: function() {
	    		editor.insertContent('{kota_penjual}&nbsp;');
	    	}
	    }),
	    editor.addButton('Nama_Kota_Penjual', {
	      text: 'Nama Kota Penjual',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{nama_kota_penjual}&nbsp;');
	      }
	    }),
	    editor.addButton('No_Identitas_Penjual', {
	      text: 'No Identitas Penjual',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{no_identitas_penjual}&nbsp;');
	      }
	    }),
	    editor.addButton('Kedudukan_Keluarga_Penjual', {
	    	text: 'Kedudukan Keluarga Penjual',
	    	icon: false,
	    	onclick: function () {
	    		editor.insertContent('{kedudukan_keluarga_penjual}&nbsp;');
	    	}
	    }),
	    editor.addButton('Gelar_Persetujuan', {
	    	text: ' Gelar Persetujuan',
	    	icon: false,
	    	onclick: function() {
	    		editor.insertContent('{gelar_persetujuan}&nbsp;');
	    	}
	    }),editor.addButton('Nama_Persetujuan', {
	      text: 'Nama Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{nama_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Kota_Lahir_Persetujuan', {
	      text: 'Kota Lahir Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{kota_lahir_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Tgl_Lahir_Persetujuan', {
	      text: 'Tanggal Lahir Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{tgl_lhr_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Tgl_Lahir_Persetujuan_Terbilang', {
	      text: 'Tanggal Lahir Persetujuan Terbilang',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{tgl_lhr_persetujuan_terbilang}&nbsp;');
	      }
	    }),
	    editor.addButton('Pekerjaan_Persetujuan', {
	      text: 'Pekerjaan Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{pekerjaan_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Alamat_Persetujuan', {
	      text: 'Alamat Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{alamat_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Rt_Persetujuan', {
	      text: 'Rt Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{rt_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Kelurahan_Persetujuan', {
	      text: 'Kelurahan Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{kelurahan_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Nama_Kelurahan_Persetujuan', {
	      text: 'Nama Kelurahan Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{nama_kelurahan_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Kecamatan_Persetujuan', {
	      text: 'Kecamatan Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{kecamatan_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Kota_Persetujuan',{
	    	text:'Kota Persetujuan',
	    	icon:false,
	    	onclick: function() {
	    		editor.insertContent('{kota_persetujuan}&nbsp;');
	    	}
	    }),
	    editor.addButton('Nama_Kota_Persetujuan', {
	      text: 'Nama Kota Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{nama_kota_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('No_Identitas_Persetujuan', {
	      text: 'No Identitas Persetujuan',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{no_identitas_persetujuan}&nbsp;');
	      }
	    }),
	    editor.addButton('Gelar_Pembeli', {
	    	text: ' Gelar Pembeli',
	    	icon: false,
	    	onclick: function() {
	    		editor.insertContent('{gelar_pembeli}&nbsp;');
	    	}
	    }),editor.addButton('Nama_Pembeli', {
	      text: 'Nama Pembeli',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{nama_pembeli}&nbsp;');
	      }
	    }),
	    editor.addButton('Kota_Lahir_Pembeli', {
	      text: 'Kota Lahir Pembeli',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{kota_lahir_pembeli}&nbsp;');
	      }
	    }),
	    editor.addButton('Tgl_Lahir_Pembeli', {
	      text: 'Tanggal Lahir Pembeli',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{tgl_lhr_pembeli}&nbsp;');
	      }
	    }),
	    editor.addButton('Tgl_Lahir_Pembeli_Terbilang', {
	      text: 'Tanggal Lahir Pembeli Terbilang',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{tgl_lhr_pembeli_terbilang}&nbsp;');
	      }
	    }),
	    editor.addButton('Pekerjaan_Pembeli', {
	      text: 'Pekerjaan Pembeli',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{pekerjaan_pembeli}&nbsp;');
	      }
	    }),
	    editor.addButton('Alamat_Pembeli', {
	      text: 'Alamat Pembeli',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{alamat_pembeli}&nbsp;');
	      }
	    }),
	    editor.addButton('Rt_Pembeli', {
	      text: 'Rt Pembeli',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{rt_pembeli}&nbsp;');
	      }
	    }),
	    editor.addButton('Kelurahan_Pembeli', {
	      text: 'Kelurahan Pembeli',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{kelurahan_pembeli}&nbsp;');
	      }
	    }),
	    editor.addButton('Nama_Kelurahan_Pembeli', {
	      text: 'Nama Kelurahan Pembeli',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{nama_kelurahan_pembeli}&nbsp;');
	      }
	    }),
	    editor.addButton('Kecamatan_Pembeli', {
	      text: 'Kecamatan Pembeli',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{kecamatan_pembeli}&nbsp;');
	      }
	    }),
	    editor.addButton('Kota_Pembeli',{
	    	text:'Kota Pembeli',
	    	icon:false,
	    	onclick: function() {
	    		editor.insertContent('{kota_pembeli}&nbsp;');
	    	}
	    }),
	    editor.addButton('Nama_Kota_Pembeli', {
	      text: 'Nama Kota Pembeli',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{nama_kota_pembeli}&nbsp;');
	      }
	    }),
	    editor.addButton('No_Identitas_Pembeli', {
	      text: 'No Identitas Pembeli',
	      icon: false,
	      onclick: function () {
	        editor.insertContent('{no_identitas_pembeli}&nbsp;');
	      }
	    }),
	    editor.addButton('Nilai_Perjanjian', {
	    	text: 'Nilai Perjanjian',
	    	icon: false,
	    	onclick: function() {
	    		editor.insertContent('{nilai_perjanjian}&nbsp;');
	    	}
	    }),
	    editor.addButton('Nilai_Perjanjian_Terbilang', {
	    	text: 'Nilai Perjanjian Terbilang',
	    	icon: false,
	    	onclick: function() {
	    		editor.insertContent('{nilai_perjanjian_terbilang}&nbsp;');
	    	}
	    }),
	    editor.addButton('Nomor_Perjanjian_Kredit',{
	    	text:'Nomor Perjanjian Kredit',
	    	icon:false,
	    	onclick: function() {
	    		editor.insertContent('{nomor_perjanjian_kredit}&nbsp;');
	    	}
	    }),
	    editor.addButton('Tanggal_Perjanjian',{
	    	text:'Tanggal Perjanjian',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{tanggal_perjanjian}&nbsp;');
	    	}
	    }),
	    editor.addButton('Tanggal_Perjanjian_Terbilang',{
	    	text:'Tanggal Perjanjian Terbilang',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{tanggal_perjanjian_terbilang}&nbsp;');
	    	}
	    }),
	    editor.addButton('Peringkat_Tanggungan',{
	    	text:'Peringkat Tanggungan',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{peringkat_tanggungan}&nbsp;');
	    	}
	    }),
	    editor.addButton('Nilai_Tanggungan',{
	    	text:'Nilai Tanggungan',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{nilai_tanggungan}&nbsp;');
	    	}
	    }),
	    editor.addButton('Nilai_Tanggungan_Terbilang',{
	    	text:'Nilai Tanggungan Terbilang',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{nilai_tanggungan_terbilang}&nbsp;');
	    	}
	    }),
	    editor.addButton('Jenis_Kepemilikan',{
	    	text:'Jenis Kepemilikan',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{jenis_kepemilikan}&nbsp;');
	    	}
	    }),
	    editor.addButton('Nomor_Kepemilikan',{
	    	text:'Nomor Kepemilikan',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{nomor_kepemilikan}&nbsp;');
	    	}
	    }),
	    editor.addButton('Nomor_Surat_Ukur',{
	    	text:'Nomor Surat Ukur',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{nomor_surat_ukur}&nbsp;');
	    	}
	    }),
	    editor.addButton('Tanggal_Surat_Ukur',{
	    	text:'Tanggal Surat Ukur',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{tanggal_surat_ukur}&nbsp;');
	    	}
	    }),
	    editor.addButton('Tanggal_Surat_Ukur_Terbilang',{
	    	text:'Tanggal Surat Ukur Terbilang',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{tanggal_surat_ukur_terbilang}&nbsp;');
	    	}
	    }),
	    editor.addButton('Luas_Tanah',{
	    	text:'Luas Tanah',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{luas_tanah}&nbsp;');
	    	}
	    }),
	    editor.addButton('Luas_Tanah_Terbilang',{
	    	text:'Luas Tanah Terbilang',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{luas_tanah_terbilang}&nbsp;');
	    	}
	    }),
	    editor.addButton('Nomor_NIB',{
	    	text:'Nomor NIB',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{nomor_nib}&nbsp;');
	    	}
	    }),
	    editor.addButton('Nomor_SPPTPBB',{
	    	text:'Nomor SPPTPBB',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{nomor_spptpbb}&nbsp;');
	    	}
	    }),
	    editor.addButton('Kecamatan_Tanah',{
	    	text:'Kecamatan Tanah',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{kecamatan_tanah}&nbsp;');
	    	}
	    }),
	    editor.addButton('Nama_Kota_Tanah',{
	    	text:'Nama Kota Tanah',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{nama_kota_tanah}&nbsp;');
	    	}
	    }),
	    editor.addButton('Nama_Kelurahan_Tanah',{
	    	text:'Nama Kelurahan Tanah',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{nama_kelurahan_tanah}&nbsp;');
	    	}
	    }),
	    editor.addButton('Luas_Bangunan',{
	    	text:'Luas Bangunan',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{luas_bangunan}&nbsp;');
	    	}
	    }),
	    editor.addButton('Luas_Bangunan_Terbilang',{
	    	text:'Luas Bangunan Terbilang',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{luas_bangunan_terbilang}&nbsp;');
	    	}
	    }),
	    editor.addButton('Alamat_Bangunan',{
	    	text:'Alamat Bangunan',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{alamat_bangunan}&nbsp;');
	    	}
	    }),
	    editor.addButton('Rt_Bangunan',{
	    	text:'RT Bangunan',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{rt_bangunan}&nbsp;');
	    	}
	    }),
	    editor.addButton('Kelurahan_Bangunan',{
	    	text:'Kelurahan Bangunan',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{kelurahan_bangunan}&nbsp;');
	    	}
	    }),
	    editor.addButton('Nama_Kelurahan_Bangunan',{
	    	text:'Nama Kelurahan Bangunan',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{nama_kelurahan_bangunan}&nbsp;');
	    	}
	    }),
	    editor.addButton('Kecamatan_Bangunan',{
	    	text:'Kecamatan Bangunan',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{kecamatan_bangunan}&nbsp;');
	    	}
	    }),
	    editor.addButton('Kota_Bangunan',{
	    	text:'Kota Bangunan',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{kota_bangunan}&nbsp;');
	    	}
	    }),
	    editor.addButton('Nama_Kota_Bangunan',{
	    	text:'Nama Kota Bangunan',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{nama_kota_bangunan}&nbsp;');
	    	}
	    }),
	    editor.addButton('Nilai_Beli',{
	    	text:'Nilai Beli',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{nilai_beli}&nbsp;');
	    	}
	    }),
	    editor.addButton('Nilai_Beli_Terbilang',{
	    	text:'Nilai Beli Terbilang',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{nilai_beli_terbilang}&nbsp;');
	    	}
	    }),
	    editor.addButton('Tanggal_Dibuat_APHT',{
	    	text:'Tanggal Dibuat APHT',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{tanggal_dibuat_apht}&nbsp;');
	    	}
	    }),
	    editor.addButton('Tanggal_Dibuat_APHT_Terbilang',{
	    	text:'Tanggal Dibuat APHT Terbilang',
	    	icon:false,
	    	onclick:function() {
	    		editor.insertContent('{tanggal_dibuat_apht_terbilang}&nbsp;');
	    	}
	    })
	  }
	});
});