var table;

$(document).ready(function() {
	tabel();
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
				data		: ({id,field:'id',table:'tbl_user_survei'}),
				dataType 	: 'json',
				type 		: 'POST',
				url 		: 'hapus/hapus_survei',
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
