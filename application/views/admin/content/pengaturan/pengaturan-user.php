
<script src="assets/admin/js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>
 <div class="row">
                            <div class="col-sm-12">
                                <!-- <div class="card-box"> -->
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <div class="text-center card-box">
                                                <div class="member-card">
                                                    <div class="thumb-xl member-thumb m-b-10 center-block">
                                                        <img src="<?=user_foto();?>" class="img-square img-thumbnail" alt="profile-image">
                                            
                                                    </div>
                                                    	<br><br>
                                                    <div class="">
                                                        <h4 class="m-b-5"><?=user_name();?></h4>
                                                        <p class="text-muted"><?=user_data('username');?></p>
                                                    </div>


                                                   
                                                    <div class="text-left">
                                                       
                                                    </div>

                                                    

                                                </div>

                                            </div> <!-- end card-box -->

                                        </div> <!-- end col -->


	<div class="col-lg-8 col-xs-12">
		<div class="panel panel-default card-view pa-0">
			<div class="panel-wrapper collapse in">
				<div  class="panel-body pb-0">
					<div  class="tab-struct custom-tab-1">
					<ul class="nav nav-tabs tabs-bordered">
                                        <li class="active">
                                            <a href="#home-b1" data-toggle="tab" aria-expanded="false">
                                                <span class="visible-xs"><i class="fa fa-home"></i></span>
                                                <span class="hidden-xs">Ubah Profile </span>
                                            </a>
                                        </li>
					</ul>

						<div class="tab-content" id="myTabContent_8">
							<div  id="settings_8" class="tab-pane fade active in" role="tabpanel">
								<!-- Row -->
								<div class="row">
									<div class="col-lg-12">
										<div class="">
											<div class="panel-wrapper collapse in">
												<div class="panel-body pa-0">
													<div class="col-sm-12 col-xs-12">
														<div class="form-wrap">
															<form id="form">
																<div class="form-body overflow-hide">
																	<div class="form-group">
																		<label class="control-label mb-10" for="nama">Nama lengkap</label>
																		<div class="input-group">
																			  <span class="input-group-addon"><i class="fa fa-user"></i></span>

																			<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?=user_name();?>">
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label mb-10" for="email">Email address</label>
																		<div class="input-group">
																			  <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>

																			<input type="email" class="form-control" id="email" name="email" placeholder="xyz@gmail.com" value="<?=user_email();?>" readonly>
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label mb-10" for="phone">Contact number</label>
																		<div class="input-group">
																			 <span class="input-group-addon"><i class="fa fa-phone"></i></span>
																			<input type="number" class="form-control" id="phone" name="phone" placeholder="+62 9388333" value="<?=user_data('phone');?>">
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label mb-10" for="password">Password</label>
																		<div class="input-group">
																			 <span class="input-group-addon"><i class="fa fa-lock"></i></span>
																			<input type="password" class="form-control" id="password" name="password" placeholder="Isi jika ingin mengubah password Anda">
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label mb-10" for="cpassword">Konfirmasi Password</label>
																		<div class="input-group">
																			 <span class="input-group-addon"><i class="fa fa-lock"></i></span>
																			<input type="password" class="form-control" id="cpassword" placeholder="Masukkan ulang password Anda">
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label mb-10 text-left">Foto Profile</label>
																		<div class="input-group">
																			 <span class="input-group-addon"><i class="ion-images"></i></span>
																			 <input type="file" name="photo" class="filestyle" data-buttonname="btn-primary">

																		</div>
																</div>
																<br>
																<div class="form-group">	
																<center><button type="button" onclick="simpan_profil()" class="btn btn-primary btn-bordered waves-effect waves-light m-b-20"><i class='fa fa-save'></i> Simpan</button></center>		
																	
																</div>				
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
							</div>
 </div>
 
<!-- /Row -->

<script type="text/javascript">
function simpan_profil(){
	var formData = new FormData($('#form')[0]);
	var pass = $("#password").val();
	var cpass = $("#cpassword").val();
	if(pass != cpass){
		swal('Warning','Password dan konfirmasi password tidak sesuai','error');
	}else{
		$.ajax({
			type : "POST",
			url : '<?=base_url('pengaturan/simpan_profile');?>', 
			data : formData,
			contentType : false,
			processData : false,
			dataType: "JSON",
			success	: function (data){
				if(data.status == true){
					swal({
						title: 'Tersimpan',
						text: data.message,
						confirmButtonClass: 'btn btn-success btn-bordered',
						type: "success",
						showConfirmButton: true,
					},function () {
						location.reload();
					});
				}else{
					swal('Gagal', data.message, "error");
				}
			}
		});
	}
}
</script>