var table;

$(document).ready(function() {
	tabel();
	section1();
	$('#simpan').click(function(data){
		if($('#nm_lengkap').val()==''){
			swal("Maaf!", "Nama lengkap masih kosong", "error");
			return false;
		}
		if($('#email').val()==''){
			swal("Maaf!", "Email masih kosong", "error");
			return false;
		}
		if($('#no_hp').val()==''){
			swal("Maaf!", "Nomor HP masih kosong", "error");
			return false;
		}
		if($('#group').val()==''){
			swal("Maaf!", "Group masih kosong", "error");
			return false;
		}
		if($('#username').val()==''){
			swal("Maaf!", "Username masih kosong", "error");
			return false;
		}
		if($('#password').val()==''){
			swal("Maaf!", "Password masih kosong", "error");
			return false;
		}
		if($('#u_password').val() != $('#password').val()){
			swal("Maaf!", "Password tidak sama", "error");
			return false;
		}
		var formdata = new FormData($('#formx')[0]);
		formdata.append("status", status);
		formdata.append("id", id);
		$.ajax({
			data : formdata,
			beforeSend : function(data){
				document.getElementById("simpan").disabled = true;
				$('#simpan').html('Tunggu Sebentar...');
			},
			cache: false,
			processData: false,
			contentType: false,
			url : "simpan/simpan_data_user",
			dataType : "json",
			type : "POST",
			success : function(data){
				document.getElementById("simpan").disabled = false;
				$('#simpan').html('<i class="fa fa-save"></i> Tambah');
				if(data.status=='1'){
					tambah();
					section1();
					$('#datable_2').DataTable().ajax.reload();
					swal({
						title: "Selamat!",
						text: "Anda berhasil menyimpan data",
						type: "success",
						confirmButtonClass: "btn-success",
						confirmButtonText: "Success"
					});
				}else if(data.status=='2'){
					tambah();
					section1();
					$('#datable_2').DataTable().ajax.reload();
					swal({
						title: "Selamat!",
						text: "Anda berhasil mengupdate data",
						type: "success",
						confirmButtonClass: "btn-success",
						confirmButtonText: "Success"
					});
				}else{
					swal('username, email atau no handphone telah terdaftar', data.message, "error");
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
function edit(){
	$.ajax({
		data		: ({id}),
		type 		: 'POST',
		dataType	: 'json',
		url			: 'edit/edit_master_user',
		success		: function(data){
			status  = 'edit';
			id = id;
			document.getElementById('nm_lengkap').value=data.nm_lengkap;
			document.getElementById('email').value=data.email;
			document.getElementById('no_hp').value=data.no_hp;
			document.getElementById('group').value=data.group;
			document.getElementById('username').value=data.username;
			section2();
		}
	})
}
function hapus(){
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
				data 		: ({id,field:'id',table:'users'}),
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
	document.getElementById('nm_lengkap').value='';
	document.getElementById('email').value='';
	document.getElementById('no_hp').value='';
	document.getElementById('group').value='';
	document.getElementById('username').value='';
	document.getElementById('password').value='';
	document.getElementById('u_password').value='';
}
function section1(){
	$('.section1').show(500);
	$('.section2').hide(500);
}
function section2(){
	$('.section1').hide(500);
	$('.section2').show(500);
}
