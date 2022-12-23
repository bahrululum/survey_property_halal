var table;

$(document).ready(function() {
	load_lokasi();
	load_cabang();
	$(".select2").select2();
	tabel();
	section1();
	$('#simpan').click(function(data){
		if($('#id_cabang').val()==''){
			swal("Maaf!", "cabang masih kosong", "error");
			return false;
		}
		if($('#kode_area').val()==''){
			swal("Maaf!", "kode area masih kosong", "error");
			return false;
		}
		if($('#nama_area').val()==''){
			swal("Maaf!", "nama area masih kosong", "error");
			return false;
		}
		if($('#lokasi_area').val()==''){
			swal("Maaf!", "lokasi area masih kosong", "error");
			return false;
		}
		if($('#penanggung_jawab').val()==''){
			swal("Maaf!", "penanggung jawab masih kosong", "error");
			return false;
		}
		if($('#jk').val()==''){
			swal("Maaf!", "jenis kelamin masih kosong", "error");
			return false;
		}
		if($('#email').val()==''){
			swal("Maaf!", "email aktif masih kosong", "error");
			return false;
		}
		if($('#phone').val()==''){
			swal("Maaf!", "no handphone masih kosong", "error");
			return false;
		}
		if($('#alamat').val()==''){
			swal("Maaf!", "alamat masih kosong", "error");
			return false;
		}
		var formdata = new FormData($('#formx')[0]);
		formdata.append("status", status);
		// formdata.append("id", id);
		$.ajax({
			data : formdata,
			beforeSend : function(data){
				document.getElementById("simpan").disabled = true;
				$('#simpan').html('Tunggu Sebentar...');
			},
			cache: false,
			processData: false,
			contentType: false,
			url : "simpan/simpan_data_area",
			dataType : "json",
			type : "POST",
			success : function(data){
				document.getElementById("simpan").disabled = false;
				$('#simpan').html('<i class="fa fa-save"></i> Tambah');
				$('#datable_2').DataTable().ajax.reload();
				if(data.status=='1'){
					section1();
					swal({
						title: "Selamat!",
						text: "Anda berhasil menyimpan data",
						type: "success",
						confirmButtonClass: "btn-success",
						confirmButtonText: "Success"
					});
					$('#datable_2').DataTable().ajax.reload();
				}else if(data.status=='2'){
					section1();
					swal({
						title: "Selamat!",
						text: "Anda berhasil mengupdate data",
						type: "success",
						confirmButtonClass: "btn-success",
						confirmButtonText: "Success"
						
					});
					$('#datable_2').DataTable().ajax.reload();
				}
			}
		});
	});
});
function hapus(id){
	swal({
		title: "Apakah anda yakin?",
		text: "Data anda akan terhapus.",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Yes, delete it!",
		cancelButtonText: "No, cancel plx!",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm) {
		if (isConfirm) {
			$.ajax({
				data		: ({id,field:'id',table:'tbl_lupa_password'}),
				dataType 	: 'json',
				type 		: 'POST',
				url 		: 'hapus/hapus_area',
				success		: function(data){
					if(data.status==1){
						swal({
							title: "Terhapus!",
							text: "Data anda berhasil di hapus.",
							type: "success",
							confirmButtonClass: "btn-success"
						});
						$('#datable_2').DataTable().ajax.reload();
					}else{
						swal("Maaf!", "Terjadi kesalahan, coba lagi", "error");
						return false;
					}					
				}
			})
		} else {
			swal({
				title: "Cancelled",
				text: "Your imaginary file is safe :)",
				type: "error",
				confirmButtonClass: "btn-danger"
			});
		}
	});
}
function verif(id){
	swal({
		title: "Apakah anda yakin?",
		text: "Proses Permintaan Password Baru Sudah Di Verifikasi",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Iya",
		cancelButtonText: "Batal",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm) {
		if (isConfirm) {
			$.ajax({
				data		: ({id,field:'id',table:'tbl_lupa_password'}),
				dataType 	: 'json',
				type 		: 'POST',
				url 		: 'pengaturan/verfifikasi_permintaan_password',
				success		: function(data){
					if(data.status==1){
						swal({
							title: "Terverifikasi!",
							text: "Permintaan Password Baru Telah Dibuat.",
							type: "success",
							confirmButtonClass: "btn-success"
						});
						$('#datable_2').DataTable().ajax.reload();
					}else{
						swal("Maaf!", "Terjadi kesalahan, coba lagi", "error");
						return false;
					}					
				}
			})
		} else {
			swal({
				title: "Dibatalkan",
				text: "Silahkan Datanya DiCek Ulang ",
				type: "error",
				confirmButtonClass: "btn-danger"
			});
		}
	});
}
function kosong(){
	id='';
	document.getElementById('id_cabang').value='';
	document.getElementById('kode_area').value='';
	document.getElementById('nama_area').value='';
	document.getElementById('lokasi_area').value='';
	document.getElementById('penanggung_jawab').value='';
	document.getElementById('jk').value='';
	document.getElementById('email').value='';
	document.getElementById('phone').value='';
	document.getElementById('alamat').value='';
}
function section1(){
	$('.section1').fadeIn(300);
	$('.section2').fadeOut(300);
}
function section2(){
	$('.section1').fadeOut(300);
	$('.section2').fadeIn(300);
}
function load_lokasi(){
	$.ajax({
	type:'POST',
	url:'auto/load_lokasi',    
	success: function(data){                 
	 $('#lokasi_area').html(data);
   }  
   });
}
function load_cabang(){
	$.ajax({
	type:'POST',
	url:'auto/load_cabang',    
	success: function(data){                 
	 $('#id_cabang').html(data);
   }  
   });
}
