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
			url : "simpan/simpan_data_rak",
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
		url			: 'edit/edit_master_rak',
		success		: function(data){
			status  = 'edit';
			document.getElementById('id').value=data.id;
			document.getElementById('kode_rak').value=data.kode_rak;
			document.getElementById('keterangan').value=data.keterangan;
			section2();
		}

	})
}
function pinjam(id){
	swal({
		title: "Permintaan Peminjaman Aset",
		text: "Apakah Anda setuju dengan syarat mengajukan pinjaman?",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Saya setuju",
		cancelButtonText: "Batal pinjam",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm) {
		if (isConfirm) {
			$.ajax({
				data		: ({id,field:'id',table:'tbl_pinjaman'}),
				dataType 	: 'json',
				type 		: 'POST',
				url 		: 'simpan/permintaan_pinjaman',
				success		: function(data){
					if(data.status==1){
						swal({
							title: "Proses Verifikasi Peminjaman",
							text: "Data anda berhasil di ajukan, sialahkan tunggu proses verifikasi pada menu riwayat pinjaman",
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
				title: "Permintaan Gagal",
				text: "Silahkan mengajukan permintaan lagi",
				type: "error",
				confirmButtonClass: "btn-danger"
			});
		}
	});
}
function kosong(){
	id='';
	document.getElementById('kode_rak').value='';
	document.getElementById('keterangan').value='';
}
function section1(){
	$('.section1').fadeIn(300);
	$('.section2').fadeOut(300);
}
function section2(){
	$('.section1').fadeOut(300);
	$('.section2').fadeIn(300);
}
