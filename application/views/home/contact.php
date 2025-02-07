<!--start pricing-->
<section class="section pricing mt-4" id="pricing">
    <div class="container">
        <!--end row-->
        <div class="row justify-content-center">
        	<div class="col-lg-12 col-12">
                <div class="card" style="border: 2px solid #f59121;">
                    <div class="card-header text-center" style="border-bottom: 2px solid #f59121; background-color: #f59121; color: #fff;">
                    	<h5><?= ucwords(strtolower(web()->name)) ?></h5>  
                    </div>
                    <div class="card-body">
                        <!-- <div class="text-center">
                            <img src="<?= web()->logo ?>" alt="Logo" width="40%">
                        </div> -->
                        <div class="row justify-content-center">
                            <h6 class="col-4">No. Telepon</h6>
                            <h6 class="col-8"><?= web()->phone ?></h6>

                            <h6 class="col-4">Email</h6>
                            <h6 class="col-8"><?= web()->email ?></h6>

                            <h6 class="col-4">Alamat</h6>
                            <h6 class="col-8"><?= web()->address ?></h6>

                            <div class="col-8">
                                <?= web()->address_link ?>
                            </div>

                        </div>
                    </div>
                </div>
        	</div>
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!--end pricing-->
