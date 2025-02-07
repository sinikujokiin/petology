<!--start pricing-->
<section class="section pricing mt-4" id="pricing">
    <div class="container">
        <!--end row-->
        <div class="row justify-content-center">
        	<div class="col-12">
                <div class="card" style="border: 2px solid #f59121;">
                    <div class="card-header text-center" style="border-bottom: 2px solid #f59121; background-color: #f59121; color: #fff;">
                        <h5>Form Konsultasi</h5>
                    </div>
                    <div class="card-body">
                        <?php 
                        $error = $this->session->userdata('error');
                        echo $this->session->userdata('alert');
                        if ($this->session->userdata('data_konsultasi')): ?>
                            <form action="" method="post">
                            <?php foreach ($flow as $value): ?>
                                <div class="mb-3">
                                    <label for="" class="form-label"><?= $value->symptom->code ?> - <?= $value->symptom->question ? $value->symptom->question : $value->symptom->name ?></label> <br>
                                    <input type="hidden" name="id" value="<?= $value->id ?>">
                                    <label for="yes">
                                        <input type="radio" name="next" id="yes" required  value="yes-<?= $value->yes ?>">Ya
                                    </label>
                                    <label for="no">
                                        <input type="radio" name="next" id="no" value="no-<?= $value->no ?>">Tidak
                                    </label>

                                    <?php if ($value->disease_id): ?>
                                        <input type="hidden" name="disease_id" value="<?= $value->disease_id ?>">
                                    <?php endif ?>
                                    <?php if ($value->symptom_id): ?>
                                        <input type="hidden" name="symptom_id" value="<?= $value->symptom_id ?>">
                                    <?php endif ?>
                                </div>
                            <?php endforeach ?>
                                <button type="submit" class="btn btn-primary btn-sm">Selanjutnya</button>
                            </form>


                        <?php else: ?> 
                            <form action="" method="post">
                                <div class="row">
                                    <div class="mt-3 col-4 text-end">
                                        <label for="owner"><b>Nama Pemilik<span class="text-danger">*</span></b></label>
                                    </div>
                                    <div class="mt-3 col-8">
                                        <input type="text" name="owner" id="owner"  class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mt-3 col-4 text-end">
                                        <label for="pet_name"><b>Nama Hewan<span class="text-danger">*</span></b></label>
                                    </div>
                                    <div class="mt-3 col-8">
                                        <input type="text" name="pet_name" id="pet_name" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mt-3 col-4 text-end">
                                        <label for="pet_gender"><b>Jenis Kelamin Hewan<span class="text-danger">*</span></b></label>
                                    </div>
                                    <div class="mt-3 col-8">
                                        <label for="jantan">
                                            <input type="radio" name="pet_gender" id="jantan" value="Jantan" class="">
                                            Jantan
                                        </label>
                                        <label for="betina">
                                            <input type="radio" name="pet_gender" id="betina" value="Betina" class="">
                                            Betina
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mt-3 col-4 text-end">
                                        <label for="phone"><b>No. Telepon<span class="text-danger">*</span></b></label>
                                    </div>
                                    <div class="mt-3 col-8">
                                        <input type="text" name="phone" id="phone" class="form-control">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mt-3 col-4 text-end">
                                        <label for="address"><b>Alamat<span class="text-danger">*</span></b></label>
                                    </div>
                                    <div class="mt-3 col-8">
                                        <textarea name="address" id="address" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 text-end">
                                        <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Proses</button>
                                    </div>
                                </div>
                            </form>
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
