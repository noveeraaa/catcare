<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700|Chewy&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>style.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>css/dark.css" type="text/css" />

	<!-- Pet Demo Specific Stylesheet -->
	<link rel="stylesheet" href="<?= base_url(); ?>demos/pet/pet.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>demos/pet/css/fonts.css" type="text/css" />

	<link rel="stylesheet" href="<?= base_url(); ?>css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="<?= base_url(); ?>css/custom.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="<?= base_url(); ?>css/colors.php?color=f0a540" type="text/css" /> 

	<!-- Document Title
	============================================= -->
	<title>Pet </title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="transparent-header dark" data-sticky-class="not-dark">
			<div id="header-wrap">
				<div class="container">
					<div class="header-row">

						<!-- Logo
						============================================= -->
						<div id="logo">
							<!-- <a href="index.html" class="standard-logo" data-dark-logo="demos/pet/images/logo-dark.png"><img src="demos/pet/images/logo.png" alt="Canvas Logo"></a>
							<a href="index.html" class="retina-logo" data-dark-logo="demos/pet/images/logo-dark@2x.png"><img src="demos/pet/images/logo@2x.png" alt="Canvas Logo"></a> -->
						</div><!-- #logo end -->

						<div id="primary-menu-trigger">
							<svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
						</div>

						<!-- Primary Navigation
						============================================= -->
						<nav class="primary-menu not-dark">

							<ul class="menu-container">
								
								<li class="menu-item bg-color"><a class="menu-link" href="<?= base_url('home/login') ?>"><div>Login</div></a></li>
							</ul>

						</nav><!-- #primary-menu end -->

					</div>
				</div>
			</div>
			<div class="header-wrap-clone"></div>
		</header><!-- #header end -->

		<!-- Slider
		============================================= -->
		<section id="slider" class="slider-element min-vh-60 min-vh-md-100 include-header" style="background: url('demos/pet/images/hero-image.jpg') center right no-repeat; background-size: cover;">
			<div class="slider-inner">

				<div class="vertical-middle">
					<div class="container py-5">
						<div class="emphasis-title dark m-0">

							<h2 style="font-size: 40px; line-height: 1.4; font-weight: 600; text-shadow: 1px 1px 1px rgba(0,0,0,0.5);">Selamat datang di CatCare.com <br> Pemeliharaan Kucing Terpercaya!</h2><br>
							<p class="font-weight-light d-none d-md-block" style="font-size: 16px; opacity: .7;">CatCare.com adalah website yang didedikasikan untuk memberikan informasi lengkap <br> dan berguna mengenai pemeliharaan kucing. Kami percaya bahwa kucing adalah sahabat <br> yang setia dan memberikan kebahagiaan dalam kehidupan kita.</p>
						

						</div>
					</div>
				</div>

			</div>
		</section>

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap pt-0 clearfix">

				<div class="section m-0 clearfix" style="background-color: #eef2f5;">
					<div class="container clearfix">




					<div class="section m-0 bg-transparent clearfix">
					<div class="container clearfix">
						<div class="heading-block center border-bottom-0 mx-auto" style="max-width: 640px">
							<h3 class="nott font-secondary font-weight-normal" style="font-size: 36px;">Produk Makanan Kami</h3>
							<span>Catlovers ini merupakan pilihan makanan kesukaan kucing lho dan pastinya kucing kita akan lebih lucu. Setujukan lovers buruan check it out!!! </span>
						</div>
						<div class="row topmargin clearfix">
							<div class="col-lg-12 col-md-12">
								<div class="row clearfix">
									
										
									<?php foreach($makanan as $m) : ?>


									<div class="col-md-3 col-6">
										<div class="product">
											<div class="product-image shadow-none">
												<a href="#"><img src="<?= base_url($m->foto)  ?>" alt="High-Heel Girl's Sandals"></a>
											</div>
											<div class="product-desc center">
												<div class="product-title"><h3><a href="#"><?= $m->nama_makanan ?></a></h3></div>
												<div class="product-price"><ins><?= $m->harga ?></ins></div>
											</div>
										</div>
									</div>


									<?php endforeach; ?>

								</div>
							</div>
						</div>
					</div>
				</div>






						<div class="heading-block center border-bottom-0 bottommargin topmargin-sm mx-auto" style="max-width: 640px">
							<h3 class="nott font-secondary font-weight-normal" style="font-size: 36px;">Jenis Ras Kucing</h3>
							<span>Bagi Parents para pemilik Anabul alias anak bulu, wajib tahu, nih, ada jenis kucing apa saja yang jadi favorit sebagai peliharaan.</span>
						</div>

						<div class="row clearfix">
							<!-- Features colomns
							============================================= -->
							<div class="row clearfix">
								
							<?php foreach($kucing as $k) : ?>	

								<div class="col-lg-3 col-md-6 bottommargin-sm">
									<div class="feature-box media-box fbox-bg">
										<div class="fbox-media">
											<a href="#"><img src="<?php echo base_url($k->foto) ?>" alt="Featured Box Image"></a>
										</div>
										<div class="fbox-content border-0">
											<h3 class="nott ls0 font-weight-semibold"><?php echo $k->nama_kucing ?><span class="subtitle font-weight-light ls0"><?php echo $k->deskripsi ?></span></h3>
											<a href="#" class="button-link border-0 color">Read More</a>
											<p id="description" style="display: none;">Deskripsi kucing Ragdoll: [Isi dengan penjelasan tentang kucing Ragdoll]</p>
										</div>
									</div>
								</div>
							
							<?php endforeach; ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">
			<div class="container clearfix">
				
			</div>

			<div class="line m-0"></div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">
				<div class="container">

					<div class="row justify-content-between align-items-center col-mb-30">
						<div class="col-12 col-lg-auto text-center text-lg-left">
							Copyrights &copy; 2023 All Rights Reserved by Cat Care.
						</div>

						<div class="col-12 col-lg-auto text-center text-lg-right">
							<a href="#" class="social-icon inline-block si-small si-borderless si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="#" class="social-icon inline-block si-small si-borderless si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

							<a href="#" class="social-icon inline-block si-small si-borderless si-gplus">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a href="#" class="social-icon inline-block si-small si-borderless si-pinterest">
								<i class="icon-pinterest"></i>
								<i class="icon-pinterest"></i>
							</a>

							<a href="#" class="social-icon inline-block si-small si-borderless si-vimeo">
								<i class="icon-vimeo"></i>
								<i class="icon-vimeo"></i>
							</a>

							<a href="#" class="social-icon inline-block si-small si-borderless si-github">
								<i class="icon-github"></i>
								<i class="icon-github"></i>
							</a>

							<a href="#" class="social-icon inline-block si-small si-borderless si-yahoo">
								<i class="icon-yahoo"></i>
								<i class="icon-yahoo"></i>
							</a>

							<a href="#" class="social-icon inline-block si-small si-borderless si-linkedin">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>
						</div>
					</div>

				</div>
			</div><!-- #copyrights end -->
		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="<?= base_url() ?>js/jquery.js"></script>
	<script src="<?= base_url() ?>js/plugins.min.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="<?= base_url() ?>js/functions.js"></script>

</body>
</html>