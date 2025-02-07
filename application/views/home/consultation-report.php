<!--start pricing-->
<section class="section pricing mt-4" id="pricing">
    <div class="container">
        <!--end row-->
        <div class="row justify-content-center">
        	<div class="col-lg-8 col-12">
        		<div class="card card-body" style="border: 2px solid #219dda !important; border-radius: 30px;">
                    <div class="px-4 mt-2 text-center">
                    	<h5><u>Hasil Diagnosis Penyakit</u></h5>
                    </div>
                    <div class="row px-4 py-2 mb-3">
                            
                            <div class="col-12">
                                <b>Data Pasien</b>
                            </div>
                            <div class="col-4">Nama Pemilik</div>
                            <div class="col-8"><?= $history->owner ?></div>
                            <div class="col-4">Nama Hewan</div>
                            <div class="col-8"><?= $history->pet_name ?></div>
                            <div class="col-4">Jenis Kelamin Hewan</div>
                            <div class="col-8"><?= $history->pet_gender ?></div>
                            <div class="col-4">Alamat</div>
                            <div class="col-8"><?= $history->address ?></div>

                            <div class="col-12 mt-2">
                                <hr>
                                <b>Hasil Diagnosis </b>
                            </div>

                            <?php if ($history->disease_id): ?>
                                <div class="col-4">Penyakit</div>
                                <div class="col-8"><?= $history->disease->name ?></div>
                                <div class="col-4">Gejala</div>
                                <div class="col-8">
                                    <ol>
                                        <?php foreach ($symptoms as $value):?>
                                            <li><?= $value->code. ' - ' .$value->name ?></li>
                                        <?php endforeach ?>
                                    </ol>
                                </div>
                                <div class="col-4">Penyebab</div>
                                <div class="col-8"><?= $history->disease->reason ?></div>
                                <div class="col-4">Solusi</div>
                                <div class="col-8"><?= $history->disease->solution ?></div>
                                <div class="col-12 text-center mt-3">
                                    <a href="<?= base_url('consultation-report-pdf/'.encrypt_decrypt('encrypt',$history->id)) ?> " target="_BLANK" title="Cetak Hasil Diagnosis" class="btn btn-primary btn-sm">
                                        Cetak Hasil
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="col-12">
                                    Mohon Maaf, sistem tidak dapat mendiagnosis penyakit hewan peliharaan Anda. Silahkan kirim pesan melalui kritik dan saran.
                                    <div class="text-center mt-3">
                                        <a href="<?= base_url('suggestion') ?>" title="Kritik & Saran" class="btn btn-primary btn-sm">
                                            Kritik & Saran
                                        </a>
                                        
                                    </div>
                                </div>
                            <?php endif ?>

                    </div>
                </div>
        	</div>
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!--end pricing-->
