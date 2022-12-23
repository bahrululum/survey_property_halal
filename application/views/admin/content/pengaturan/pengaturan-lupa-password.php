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
                        <th>Otoritas</th>
                        <th>Kode Otoritas</th>
                        <th>Nama Penanggung Jawab</th>
                        <th>Kontak</th>
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
<script src="assets/admin/js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>
<script src="assets/admin/js-tr/pengaturan/lupa-password.js"></script>
<script type="text/javascript">
	function tabel(){
		$('#datable_2').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax":{
				"url": "load/list_permintaan_password",
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
                { "data": "5", "className": "text-left"},
                { "data": "aksi", "className": "text-center"},
                 
			]
		}); 
	}
</script>


