<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?= web()->name ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= web()->seo_description ?>" />
    <meta name="keywords" content="<?= web()->seo_tag ?>" />
    <meta content="<?= web()->name ?>" name="author" />

    <link rel="shortcut icon" href="<?= base_url(web()->icon) ?>">

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/bootstrap.min.css" type="text/css" id="bootstrap-style" />

    <!-- Tobi  -->
    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/tobii.min.css">

    <!-- animation -->
    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/aos.css" />

    <!-- Material Icon Css -->
    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/materialdesignicons.min.css" type="text/css" />

    <!-- Unicon Css -->
    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/line.css" />

    <!-- boxi icon -->
    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/boxicons.min.css">

    <!-- Swiper Css -->
    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/tiny-slider.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>swiper@8.4.5/swiper-bundle.min.css" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/style.min.css" type="text/css" />

    <!-- colors -->
    <link href="<?= base_url('assets/home/') ?>css/colors/default.css" rel="stylesheet" type="text/css" id="color-opt" />
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript" charset="utf-8"></script>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="71">


    <!-- topbar -->
    <section class="tagline d-none d-md-block" style="position: fixed;">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex">
                        <div class="phone">
                            <i class="mdi mdi-phone"></i> <?= web()->phone ?>
                        </div>
                        <div class="email ms-3">
                            <a href="mailto:<?= web()->phone ?>" class="text-dark">
                                <i class="mdi mdi-email-open-outline"></i> <?= web()->email ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="top_socials d-flex list-unstyled justify-content-end mb-0">
                        <?php if (web()->fb_name && web()->fb_link): ?>
                          <li class="entry">
                              <a href="<?= web()->fb_link ?>">
                                  <i class="bx bxl-facebook-circle"></i> <?= web()->fb_name ?>
                              </a>
                          </li>
                        <?php endif ?>
                        <?php if (web()->ig_name && web()->ig_link): ?>
                        <li class="entry">
                            <a href="javascript: void(0);">
                                <i class="bx bxl-instagram"></i> <?= web()->ig_name ?>
                            </a>
                        </li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </section>
    <!-- end topbar -->

    <!-- START  NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-light" style="background-color: #219dda !important;;" id="navbar">
        <div class="container-fluid">

            <!-- LOGO -->
            <a class="navbar-brand logo text-uppercase" href="<?= base_url('') ?>">
              <span style="font-size: 1.2rem; color: #ffff !important">
                <?= web()->name ?>
              </span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" style="color: #ffff !important" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="mdi mdi-menu"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navbarCollapse">
                <ul class="navbar-nav ms-auto" id="navbar-navlist">
                    <li class="nav-item">
                        <a class="nav-link" style="color: #ffff !important" href="<?= base_url('consultation') ?>">Konsultasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #ffff !important" href="<?= base_url('suggestion') ?>">Kritik & Saran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #ffff !important" href="<?= base_url('profile') ?>">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #ffff !important" href="<?= base_url('contact') ?>">Kontak</a>
                    </li>
                </ul>
                <div class="ms-auto">
                    <a href="<?= base_url('login') ?>" class="btn bg-gradiant">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- END NAVBAR -->

    <div class="overflow-hidden-x">
        <?= $contents ?>
    </div>
    <!--Bootstrap Js-->
    <script src="<?= base_url('assets/home/') ?>js/bootstrap.bundle.min.js"></script>

    <!-- animation -->
    <script src="<?= base_url('assets/home/') ?>js/aos.js"></script>

    <!-- Slider Js -->
    <script src="<?= base_url('assets/home/') ?>js/tiny-slider.js"></script>

    <script src="<?= base_url('assets/home/') ?>/swiper@8.4.5/swiper-bundle.min.js"></script>

    <script src="<?= base_url('assets/home/') ?>js/tobii.min.js"></script>

    <script src="<?= base_url('assets/home/') ?>js/tobii.js"></script>

    <!-- App Js -->
    <!-- <script src="<?= base_url('assets/home/') ?>js/app.js"></script> -->

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        window.setTimeout(function(){
          $('.alert').fadeTo(500, 0).slideUp(500,function(){
            $(this).remove();
          });
        }, 3000);



    </script>

</body>

</html>