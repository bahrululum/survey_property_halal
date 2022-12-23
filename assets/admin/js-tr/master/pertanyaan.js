var table;

$(document).ready(function() {
	tabel();
	section1();
	$('#simpan').click(function(data){
		var formdata = new FormData($('#formx')[0]);
		formdata.append("status", status);
		$.ajax({
			data : formdata,
			beforeSend : function(data){
				document.getElementById("simpan").disabled = true;
				$('#simpan').html('Tunggu Sebentar...');
			},
			cache: false,
			processData: false,
			contentType: false,
			url : "simpan/simpan_pertanyaan",
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
function tambah(){
	kosong();
	status 	= 'tambah'; 
	section2();
}
function edit(id){
	$.ajax({
		data		: ({id}),
		type 		: 'POST',
		dataType	: 'json',
		url			: 'edit/edit_pertanyaan',
		success		: function(data){
			status  = 'edit';
			document.getElementById('id').value=data.id;
			document.getElementById('pertanyaan').value=data.pertanyaan;
			section2();
		}

	})
}
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
				data		: ({id,field:'id',table:'m_pertanyaan'}),
				dataType 	: 'json',
				type 		: 'POST',
				url 		: 'hapus/hapus_master',
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
function kosong(){
	id='';
	document.getElementById('pertanyaan').value='';
}

function status_a(id){
	swal({
		title: "Aktifkan",
		text: "Apakah Anda ingin mengaktifkan pertanyaan?",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Iya",
		cancelButtonText: "Tidak",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm) {
		if (isConfirm) {
			$.ajax({
				data		: ({id,field:'id',table:'tbl_pertanyaan'}),
				dataType 	: 'json',
				type 		: 'POST',
				url 		: 'simpan/pertanyaan_aktif',
				success		: function(data){
					if(data.status==1){
						swal({
							title: "Proses",
							text: "Pertanyaan berhasil di aktifkan",
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
				title: "Gagal",
				text: "Silahkan coba lagi",
				type: "error",
				confirmButtonClass: "btn-danger"
			});
		}
	});
}

function status_n(id){
	swal({
		title: "Non aktifkan",
		text: "Apakah Anda ingin menonaktifkan pertanyaan?",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Iya",
		cancelButtonText: "Tidak",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm) {
		if (isConfirm) {
			$.ajax({
				data		: ({id,field:'id',table:'tbl_pertanyaan'}),
				dataType 	: 'json',
				type 		: 'POST',
				url 		: 'simpan/pertanyaan_nonaktif',
				success		: function(data){
					if(data.status==1){
						swal({
							title: "Proses",
							text: "Pertanyaan berhasil di non aktifkan",
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
				title: "Gagal",
				text: "Silahkan coba lagi",
				type: "error",
				confirmButtonClass: "btn-danger"
			});
		}
	});
}
function section1(){
	$('.section1').fadeIn(300);
	$('.section2').fadeOut(300);
}
function section2(){
	$('.section1').fadeOut(300);
	$('.section2').fadeIn(300);
}
