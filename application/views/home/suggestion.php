<style type="text/css">
    .contact-form{
        margin-bottom: unset !important;
    }
</style>
<!-- contact section -->
<section class="contact overflow-hidden mt-4" id="contact">
    <!-- start container -->
    <div class="container">
        <div class="row align-items-center justify-content-center">
             <div class="col-lg-12">
                <div class="sec-hd" style="margin-bottom: 50px; margin-top: 50px;">
                    <span class="heading"></span>
                    <h2 class="sec-title">Kritik & Saran</h2>
                    <span class="heading"></span>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="contact-box">
                    <?php 
                    $error = $this->session->flashdata('error');
                    if ($this->session->flashdata('alert')): ?>
                        <?= $this->session->flashdata('alert'); ?>
                    <?php endif; ?>
                    <div class="custom-form mt-4">
                        <form method="post" action="">
                            <p id="error-msg" style="opacity: 1;"> </p>
                            <div id="simple-msg"></div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mt-3">
                                        <input name="name" id="name" type="text"
                                            class="form-control contact-form" placeholder="Nama Lengkap">
                                        <?= isset($error) ? $error['name'] : '' ?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mt-3">
                                        <input name="email" id="email" type="email"
                                            class="form-control contact-form" placeholder="Email">
                                        <?= isset($error) ? $error['email'] : '' ?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mt-3">
                                        <input name="phone" id="phone" type="text"
                                            class="form-control contact-form" placeholder="No. Telpon">
                                        <?= isset($error) ? $error['phone'] : '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mt-3">
                                        <textarea class="form-control contact-form" name="message" id="message"
                                            placeholder="Isi Pesan"></textarea>
                                        <?= isset($error) ? $error['message'] : '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-3">
                                <div class="col-lg-6">
                                    <div class="text-center">
                                        <button type="submit" class="submitBnt btn btn-rounded bg-gradiant">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end section -->