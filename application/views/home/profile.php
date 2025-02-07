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
                        <div class="text-center">
                            <img src="<?= base_url(web()->logo) ?>" alt="Logo" width="40%">
                        </div>
                        <p style="text-align: justify;"><?= web()->text_profile ?></p>
                    </div>
                </div>
        	</div>
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!--end pricing-->
