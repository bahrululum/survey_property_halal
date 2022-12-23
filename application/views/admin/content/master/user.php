 <section class="box-typical section1"> 
                            <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
 <div class="m-t-0 header-title" onclick='tambah()'>
	<button type="button" class="btn btn-success btn-bordered waves-effect waves-light m-b-20" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i><i class="fa fa-plus-circle"></i></span> <span class="btn-text">Tambah</span></button>
	</div>

                                    <table  id='datable_2' class="table table-striped" style='width:100%'>
                                        <thead>
                                       <tr>
						<th style='width:1%'>
							No.
						</th>
						<th style="width:20%">Nama Lengkap</th>
						<th>Akses Login</th>
						<th>Kontak</th>
						<!-- <th>Create AKun</th> -->
						<th style="width: 6%">#</th>
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
			<div class="form-group row">
				<label class="col-sm-2 form-control-label text-right">Nama Lengkap</label>
				<div class="col-sm-10">
					<p class="form-control-static"><input type="text" class="form-control" id="nm_lengkap" name='nm_lengkap' placeholder="Masukkan Nama Lengkap"></p>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label text-right">Email Aktif</label>
				<div class="col-sm-10">
					<p class="form-control-static"><input type="text" class="form-control" id="email" name='email' placeholder="Masukkan Email Aktif"></p>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label text-right">Nomor HP/WA</label>
				<div class="col-sm-4">
					<p class="form-control-static"><input type="text" class="form-control" id="no_hp" name='no_hp' placeholder="Masukkan No Handphone Aktif"></p>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label text-right">Group</label>
				<div class="col-sm-5">
					<p class="form-control-static">
						<select id='group' name='group' class='form-control select2'>
							<option value='' disabled=''>Pilih Group</option>
						<?php
						$level = $this->session->userdata('group_id');
						if($level == 1){
                        $qg     = $this->db->query("SELECT * FROM groups");
                        foreach($qg->result() as $g){
                            echo "
                                <option value='".$g->id."'>".ucfirst($g->description)."</option>
                            ";
						}
						}else{
						$qg     = $this->db->query("SELECT * FROM groups WHERE id = '3'");
                        foreach($qg->result() as $g){
                            echo "
                                <option value='".$g->id."'>".ucfirst($g->description)."</option>
                            ";
						}
						}
						
                        ?>
						</select>
					</p>
				</div>
			</div>
			
		
			<div class="form-group row">
				<label class="col-sm-2 form-control-label text-right">NIM/NIP</label>
				<div class="col-sm-5">
					<p class="form-control-static"><input type="text" class="form-control" id="username" name='username'></p>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label text-right">Password</label>
				<div class="col-sm-5">
					<p class="form-control-static"><input type="password" class="form-control" id="password" name='password'></p>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label text-right">Ulangi Password</label>
				<div class="col-sm-5">
					<p class="form-control-static"><input type="password" class="form-control" id="u_password" name='u_password'></p>
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
<script src="assets/admin/js-tr/master/user.js"></script>
<script>
	function tabel(){
		$('#datable_2').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax":{
				"url": "load/list_master_user",
				"dataType": "json",
				"type": "POST",
				"data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
			},
			"columns": [
				{ "data": "no", "className": "text-center"},
				{ "data": "nama","className": "text-left" },
				{ "data": "akses","className": "text-left" },
				{ "data": "kontak" ,"className": "text-left"},
				// { "data": "created_on" , "className": "text-center"},
				{ "data": "aksi" , "className": "text-center"},
			]
		});
		var table = $('#datable_2').DataTable();
		$('#datable_2 tbody').on( 'click', 'tr', function () {
			if ( $(this).hasClass('selected') ) {
				$(this).removeClass('selected');
			}
			else {
				table.$('tr.selected').removeClass('selected');
				$(this).addClass('selected');
				var idx 	= table.cell('.selected', 0).index();
				var data 	= table.row( idx.row ).data();
				id 			= data.id;
			}
		} );
	}
</script>



















