 <section class="box-typical section1"> 
                            <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">

                 <table  id='datable_2' class="table table-striped m-0 table-colored table-primary" style='width:100%'>
                                        <thead>
                                       <tr>
						<th class="table-check" style='width:1%'>
							No.
                        </th>
                        <th>Mahasiswa</th>
                        <th>Barang Pinjaman</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>#</th>
					</tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
</section>
     <section class="box-typical section2">
     <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
<div class="m-t-0 header-title" onclick='section1();return false;'>
	<button type="button" class="btn btn-danger btn-bordered waves-effect waves-light m-b-20" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i><i class="ti-arrow-left"></i></span> <span class="btn-text">Kembali</span></button>
	</div>
    <div class="box-typical-body">
        <div class='container'>
        <form id='formx'>
        <input type="hidden" id="id" name="id" value="">
        <div class="form-group row">

            <div class="form-group row">
                <label class="col-sm-3   form-control-label text-left">Nama Rak</label>
                <div class="col-sm-8">
                    <p class="form-control-static"><input type="text" class="form-control" id="kode_rak" name='kode_rak' placeholder=""></p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3   form-control-label text-left">Keterangan</label>
                <div class="col-sm-8">
                    <p class="form-control-static"><textarea type="text" class="form-control" id="keterangan" name='keterangan' placeholder=""></textarea></p>
                </div>
            </div>
        </form>
        </div>
    </div>

    <div class="m-t-0 header-title text-center">
    	<button type="button" class="btn btn-primary btn-bordered waves-effect waves-light m-b-20" id='simpan'><i class="ti-save"></i> Simpan</button>
	
	</div>
</section>
<script src="assets/admin/js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>
<script src="assets/admin/js-tr/master/pinjaman.js"></script>
<script type="text/javascript">
	function tabel(){
		$('#datable_2').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax":{
				"url": "load/list_data_pinjaman",
				"dataType": "json",
				"type": "POST",
				"data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
			},
			"columns": [
				{ "data": "no", "className": "text-left"},
				{ "data": "1", "className": "text-left"},
                { "data": "2", "className": "text-left"},
                { "data": "3", "className": "text-left"},
                { "data": "4", "className": "text-left"},
				{ "data": "aksi"},
			]
		}); 
	}
</script>


