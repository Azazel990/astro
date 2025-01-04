<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo !empty($page_title) ? $page_title : "Astro" ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo url('assets/images/favicon.ico') ?>" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="<?php echo url('assets/css/style.css') ?>">
</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar  ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="<?php echo url('assets/images/user/avatar-2.jpg') ?>" alt="User-Profile-Image">
						<div class="user-details">
							<span><?php echo ucwords(getLoggedInUserName()); ?></span>
							<div id="more-details">UX Designer<i class="fa fa-chevron-down m-l-5"></i></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							<li class="list-group-item"><a href="<?php echo route('profile') ?>"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
							<li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
							<li class="list-group-item"><a onclick="logMeOut()"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
						</ul>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						<label>Navigation</label>
					</li>
					<li class="nav-item">
					    <a href="<?php echo route('dashboard') ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Page layouts</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="layout-vertical.html" target="_blank">Vertical</a></li>
					        <li><a href="layout-horizontal.html" target="_blank">Horizontal</a></li>
					    </ul>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>UI Element</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Basic</span></a>
						<ul class="pcoded-submenu">
							<li><a href="bc_alert.html">Alert</a></li>
							<li><a href="bc_button.html">Button</a></li>
							<li><a href="bc_badges.html">Badges</a></li>
							<li><a href="bc_breadcrumb-pagination.html">Breadcrumb & paggination</a></li>
							<li><a href="bc_card.html">Cards</a></li>
							<li><a href="bc_collapse.html">Collapse</a></li>
							<li><a href="bc_carousel.html">Carousel</a></li>
							<li><a href="bc_grid.html">Grid system</a></li>
							<li><a href="bc_progress.html">Progress</a></li>
							<li><a href="bc_modal.html">Modal</a></li>
							<li><a href="bc_spinner.html">Spinner</a></li>
							<li><a href="bc_tabs.html">Tabs & pills</a></li>
							<li><a href="bc_typography.html">Typography</a></li>
							<li><a href="bc_tooltip-popover.html">Tooltip & popovers</a></li>
							<li><a href="bc_toasts.html">Toasts</a></li>
							<li><a href="bc_extra.html">Other</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-menu-caption">
					    <label>Forms &amp; table</label>
					</li>
					<li class="nav-item">
					    <a href="form_elements.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Forms</span></a>
					</li>
					<li class="nav-item">
					    <a href="tbl_bootstrap.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Bootstrap table</span></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Chart & Maps</label>
					</li>
					<li class="nav-item">
					    <a href="chart-apex.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Chart</span></a>
					</li>
					<li class="nav-item">
					    <a href="map-google.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Maps</span></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Pages</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Authentication</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="auth-signup.html" target="_blank">Sign up</a></li>
					        <li><a href="auth-signin.html" target="_blank">Sign in</a></li>
					    </ul>
					</li>
					<li class="nav-item"><a href="sample-page.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Sample page</span></a></li>

				</ul>
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
		
			
				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
					<a href="<?php echo route("dashboard") ?>" class="b-brand">
						<!-- ========   change your logo hear   ============ -->
						<img src="<?php echo url('assets/images/logo.png') ?>" alt="" class="logo">
						<img src="<?php echo url('assets/images/logo-icon.png') ?>" alt="" class="logo-thumb">
					</a>
					<a href="#!" class="mob-toggler">
						<i class="feather icon-more-vertical"></i>
					</a>
				</div>

	</header>
	<!-- [ Header ] end -->
	
	


<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">

						<!-- Toast start -->
						<div style="position:absolute;right: 40px">
							<div class="toast hide toast-right" role="alert" aria-live="assertive" data-delay="1000" aria-atomic="true">
								<div class="toast-header">
									<img src="<?php echo url('assets/images/favicon.ico') ?>" alt="" class="img-fluid m-r-5" style="width:20px;">
									<strong class="mr-auto">Bootstrap</strong>
									<small class="text-muted">11 mins ago</small>
									<button type="button" class="m-l-5 mb-1 mt-1 close" data-dismiss="toast" aria-label="Close">
										<span>&times;</span>
									</button>
								</div>
								<div class="toast-body">
									Hello, world! This is a toast message.
								</div>
							</div>
						</div>
						<!-- <button class="btn  btn-primary" onclick="$('.toast-right').toast('show')">Right</button> -->
							<!-- Toast end -->
							

						<!-- Alert Msg start -->
						<?php 
							if(session("flash")){
								$type = session()->get("flash-type");
								$msg = session()->get("flash-msg");
								?>	
									<x-alert_msg type="<?php echo $type; ?>" msg="<?php echo $msg; ?>" />
								<?php
							}
							?>
						<!-- Alert Msg end -->
						
                        <div class="page-header-title">
                            <h5 class="m-b-10"><?php echo $page_title; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        
        <!-- [ Main Content ] start -->
        @extends($main_view)
        @section('content') 

        <!-- [ Main Content ] end -->
    </div>
</div>
</body>

</html>

@endsection 

<!-- Required Js -->
<script defer src="<?php echo url('assets/js/vendor-all.min.js') ?>"></script>
<script defer src="<?php echo url('assets/js/plugins/bootstrap.min.js') ?>"></script>
<script defer src="<?php echo url('assets/js/pcoded.min.js') ?>"></script>
<script src="<?php echo url('assets/js/common.js') ?>" defer></script>
<script src="<?php echo url('assets/js/plugins/jquery-ui.min.js') ?>" defer></script>

<script>
	function logMeOut() {

		if(!window.confirm("Are you sure you want to logout ?")) return;

		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

		$.ajax({
			type : "POST",
			url : "<?php echo route('logout') ?>",
			success : function(data){
				location.reload();
			}
		})
	}

</script>