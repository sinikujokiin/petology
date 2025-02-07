<?php $web = Setting::first() ?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title><?= $title ?></title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="<?= base_url() ?>assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?= base_url() ?>assets/css/portal.css">

</head> 

<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper">
    	<div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">
		    </div>
		    <!-- <div class="auth-background-mask"></div> -->
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <!-- <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				    <div class="overlay-content p-3 p-lg-4 rounded">
					    <h5 class="mb-3 overlay-title">Explore Portal Admin Template</h5>
					    <div>Portal is a free Bootstrap 5 admin dashboard template. You can download and view the template license <a href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">here</a>.</div>
				    </div>
				</div> -->
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4">
				    	<a class="app-logo" href="<?= base_url() ?>"><img class="logo-icon me-2" src="<?= base_url($web->icon) ?>" alt="logo"></a>
					<h4 class="text-center mb-5"><?= $web->name ?></h4>
				    </div>
			        <div class="auth-form-container text-start">
			        	<?php if ($this->session->flashdata('alert')): ?>
			        		<?= $this->session->flashdata('alert'); ?>
			        	<?php endif ?>
						<form class="auth-form login-form" method="POST">         
							<div class="email mb-3">
								<label class="sr-only" for="username">Username</label>
								<input id="username" name="username" value="<?= set_value('username') ?>" type="text" class="form-control username" placeholder="Username" required="required">
							</div><!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="password">Password</label>
								<input id="password" name="password" type="password" class="form-control password" placeholder="Password" required="required">
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Masuk</button>
							</div>
						</form>
						
						<!-- <div class="auth-option text-center pt-5">No Account? Sign up <a class="text-link" href="signup.html" >here</a>.</div> -->
					</div><!--//auth-form-container-->	

			    </div><!--//auth-body-->
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    
    
    </div><!--//row-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript" charset="utf-8"></script>


    <script>
    		window.setTimeout(function(){
    	      $('.alert').fadeTo(500, 0).slideUp(500,function(){
    	        $(this).remove();
    	      });
    	    }, 3000);
    </script>
</body>
</html> 

