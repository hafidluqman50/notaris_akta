$(function(){
	tinymce.init({selector:'#template',
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
	        editor.insertContent('{tgl_lahir_persetujuan}&nbsp;');
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
});