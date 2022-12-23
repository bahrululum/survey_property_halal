 <section class="box-typical section1"> 
                            <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">

                 <table  id='datable_2' class="table table-striped" style='width:100%'>
                                        <thead>
                                       <tr>
						<th class="table-check" style='width:1%'>
							No.
                        </th>
                        <th>Referral</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                       <!--  <th>Kontak</th> -->
                        <th>keterangan 1</th>
                        <th>ketengaran 2</th>
                        <th>Detail</th>
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
<script src="assets/admin/js-tr/master/survei.js"></script>
<script type="text/javascript">
	function tabel(){
		$('#datable_2').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax":{
				"url": "load/list_survei",
				"dataType": "json",
				"type": "POST",
				"data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
			},
			"columns": [
				{ "data": "no", "className": "text-left"},
                { "data": "kode_s", "className": "text-left"},
				{ "data": "nama", "className": "text-left"},
                { "data": "alamat", "className": "text-left"},
                // { "data": "kontak", "className": "text-left"},
                { "data": "ket1", "className": "text-left"},
                { "data": "ket2", "className": "text-left"},
                { "data": "detail", "className": "text-left"},
				{ "data": "aksi"},
			]
		}); 
	}
</script>


