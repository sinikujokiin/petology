<!DOCTYPE html>
<html lang="en"> 
<head>
    <title><?= web()->name ?> | <?= $title ?></title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="<?= web()->seo_description ?>">
    <meta name="author" content="<?= web()->name ?>">    
    <link rel="shortcut icon" href="<?= web()->icon ?>"> 
    
    <!-- FontAwesome JS-->
    <script defer src="<?= base_url() ?>assets/plugins/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <style type="text/css">
    	i.bi {
    		font-size: 1.3rem !important;
    	}
    </style>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?= base_url() ?>assets/css/portal.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js" type="text/javascript" charset="utf-8"></script>

</head> 

<body class="app">   	
    <header class="app-header fixed-top">	   	            
        <div class="app-header-inner">  
	        <div class="container-fluid py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
			        
				    <div class="col-auto">
					    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
						    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
					    </a>
				    </div><!--//col-->
		            <div class="search-mobile-trigger d-sm-none col">
			            <!-- <i class="search-mobile-trigger-icon fas fa-search"></i> -->
			        </div><!--//col-->
		            <div class="app-search-box col">
		            	<?= web()->name ?>
		            </div><!--//app-search-box-->
		            
		            <div class="app-utilities col-auto">
			            
			            <div class="app-utility-item app-user-dropdown dropdown">
				            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
				            	<?= user()->fullname ?>
				            </a>
				            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
								<li><a class="dropdown-item" href="<?= base_url('account') ?>">Akun</a></li>
								<li><a class="dropdown-item" href="<?= base_url('settings') ?>">Pengaturan</a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="<?= base_url('logout') ?>">Keluar</a></li>
							</ul>
			            </div><!--//app-user-dropdown--> 
		            </div><!--//app-utilities-->
		        </div><!--//row-->
	            </div><!--//app-header-content-->
	        </div><!--//container-fluid-->
        </div><!--//app-header-inner-->
        <div id="app-sidepanel" class="app-sidepanel"> 
	        <div id="sidepanel-drop" class="sidepanel-drop"></div>
	        <div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		        <div class="app-branding text-center">
		            <a class="app-logo" href="<?= base_url('dashboard') ?>">
		            	<img class="" style="width: 75%; height:75px" src="<?= base_url(web()->logo) ?>" alt="logo"></a>
	
		        </div><!--//app-branding-->  
		        
			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
					    <li class="nav-item">
					        <a class="nav-link <?= $title == 'Dashboard' ? 'active' : '' ?>" href="<?= base_url('dashboard') ?>">
						        <span class="nav-icon">
						        	<i class="bi bi-house"></i>
						         </span>
		                         <span class="nav-link-text">Dashboard</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    <li class="nav-item">
					        <a class="nav-link <?= $title == 'Penyakit' ? 'active' : '' ?>" href="<?= base_url('diseases') ?>">
						        <span class="nav-icon">
						        	<i class="bi bi-hospital"></i>
						         </span>
		                         <span class="nav-link-text">Penyakit</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    <li class="nav-item">
					        <a class="nav-link <?= $title == 'Gejala' ? 'active' : '' ?>" href="<?= base_url('symptoms') ?>">
						        <span class="nav-icon">
						        	<i class="bi bi-virus"></i>
						         </span>
		                         <span class="nav-link-text">Gejala</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    <li class="nav-item">
					        <a class="nav-link <?= $title == 'Aturan' ? 'active' : '' ?>" href="<?= base_url('rules') ?>">
						        <span class="nav-icon">
						        	<i class="bi bi-file-ruled"></i>
						         </span>
		                         <span class="nav-link-text">Aturan</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    <li class="nav-item">
					        <a class="nav-link <?= $title == 'Alur Aturan' ? 'active' : '' ?>" href="<?= base_url('rule_flows') ?>">
						        <span class="nav-icon">
						        	<i class="bi bi-diagram-3"></i>
						         </span>
		                         <span class="nav-link-text">Alur Aturan</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    <!-- <li class="nav-item">
					        <a class="nav-link <?= $title == 'Analisa' ? 'active' : '' ?>" href="<?= base_url('dashboard/analisa') ?>">
						        <span class="nav-icon">
						        	<i class="bi bi-diagram-3"></i>
						         </span>
		                         <span class="nav-link-text">Analisa</span>
					        </a>
					    </li> -->
					    <li class="nav-item">
					        <a class="nav-link <?= $title == 'Riwayat' ? 'active' : '' ?>" href="<?= base_url('histories') ?>">
						        <span class="nav-icon">
						        	<i class="bi bi-clock-history"></i>
						         </span>
		                         <span class="nav-link-text">Riwayat</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    <li class="nav-item">
					        <a class="nav-link <?= $title == 'Pengguna' ? 'active' : '' ?>" href="<?= base_url('users') ?>">
						        <span class="nav-icon">
						        	<i class="bi bi-person-gear"></i>
						         </span>
		                         <span class="nav-link-text">Pengguna</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->

					    <li class="nav-item">
					        <a class="nav-link <?= $title == 'Kritik & Saran' ? 'active' : '' ?>" href="<?= base_url('suggestions') ?>">
						        <span class="nav-icon">
						        	<i class="bi bi-chat-square-dots"></i>
						         </span>
		                         <span class="nav-link-text">Kritik & Saran</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
			    </nav><!--//app-nav-->
			    <div class="app-sidepanel-footer">
				    <nav class="app-nav app-nav-footer">
					    <ul class="app-menu footer-menu list-unstyled">
						    <li class="nav-item">
					        <a class="nav-link <?= $title == 'Pengaturan' ? 'active' : '' ?>" href="<?= base_url('settings') ?>">
							        <span class="nav-icon">
							        <i class="bi bi-gear"></i>
							        </span>
			                        <span class="nav-link-text">Pengaturan</span>
						        </a><!--//nav-link-->
						    </li><!--//nav-item-->
					    </ul><!--//footer-menu-->
				    </nav>
			    </div><!--//app-sidepanel-footer-->
		       
	        </div><!--//sidepanel-inner-->
	    </div><!--//app-sidepanel-->
    </header><!--//app-header-->
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">					
				<?= $contents ?>
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    <div class="modal fade" id="modal-delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	      <div class="modal-dialog modal-dialog-centered">
	        <div class="modal-content">
	          <div class="modal-body text-center">
	          	<span style="font-size: 20px; font-weight: bold;">
	          		Yakin ingin menghapus data ?
	          	</span>
	          	<p>Data yang sudah dihapus tidak bisa dikembalikan lagi.</p>
	          </div>
	          <div class="modal-footer text-center">
	            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
	            <a href="#" title="Hapus Data" class="btn app-btn-primary" id="btn-submit-delete">Ya</a>
	          </div>
	        </div>
	      </div>
	    </div>
	    <!-- <footer class="app-footer fixed-bottom" style="bottom: 0;">
		    <div class="container text-center py-3">
            <small class="copyright">&copy;<?= web()->name.' '.date('Y') ?> </small>
		       
		    </div>
	    </footer> -->
	    
    </div><!--//app-wrapper-->    	
    
 
    <!-- Javascript -->          
    <script src="<?= base_url() ?>assets/plugins/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

   
    
    <!-- Page Specific JS -->
    <script src="<?= base_url() ?>assets/js/app.js"></script> 
    <script>
    	window.setTimeout(function(){
          $('.alert').fadeTo(500, 0).slideUp(500,function(){
            $(this).remove();
          });
        }, 3000);

       	function showModalDelete(dt)
       	{
       		var href = $(dt).data('href');

       		$("#modal-delete").modal('show')
       		$("#btn-submit-delete").attr('href', href);

       	}
    </script>

</body>
</html> 

