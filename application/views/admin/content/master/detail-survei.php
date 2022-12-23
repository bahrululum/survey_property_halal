<section class="box-typical section2">
     <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
<div class="m-t-0 header-title">
	<a href="<?=base_url();?>data-survei" class="btn btn-danger btn-bordered waves-effect waves-light m-b-20" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i><i class="ti-arrow-left"></i></span> <span class="btn-text">Kembali</span></a>
	</div>
    <div class="box-typical-body">
        <div class='container'>
                        <form id="form">
                            <h2>Informasi data diri</h2>
                            <?php
                            foreach ($user->result_array() as $data_u) {
                            ?>
                            <div class="row">
                                <div class="form-group col-12 col-sm-12">
                                    <label style="font-weight: bold;">Nama Lengkap :</label>
                                    <input type="text" class="form-control" value="<?=$data_u['nama_lengkap'];?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-sm-6">
                                     <label style="font-weight: bold;">Jenis Kelamin :</label>
                                    <input type="text" class="form-control" value="<?=$data_u['jenis_kelamin'];?>">
                                </div>
                             <div class="form-group col-12 col-sm-6">
                                     <label style="font-weight: bold;">Status Pernikahan :</label>
                                    <input type="text" class="form-control" value="<?=$data_u['status_pernikahan'];?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-sm-6">
                                     <label style="font-weight: bold;">Usia :</label>
                                    <input type="text" class="form-control" value="<?=$data_u['usia'];?>">
                                </div>
                                <div class="form-group col-12 col-sm-6">
                                     <label style="font-weight: bold;">Pekerjaan :</label>
                                    <input type="text" class="form-control" value="<?=$data_u['pekerjaan'];?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                     <label style="font-weight: bold;">Alamat :</label>
                                    <textarea class="form-control"><?=$data_u['alamat_domisili'];?></textarea>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                        </form>
                        <hr>
                        <form id="form">
                            <h2>Pertanyaan & Jawaban</h2>
                        <?php
                            $i  = 1;
                            foreach ($survei->result_array() as $data_s) {
                                $pertanyaan = $data_s['id_pertanyaan'];
                        ?>
                            <div class="row">
                                <div class="form-group col-12">
                                     <label style="font-weight: bold;"><?=$i;?>. <?=$pertanyaan;?></label>
                                    <textarea class="form-control" placeholder="Jawaban Anda" name="jawaban_<?=$i;?>"><?=$data_s['jawaban'];?></textarea>
                                </div>
                            </div>
                        <?php
                           $i++; }
                        ?>
                        </form>
        </div>
    </div>
</section>


