<!doctype html>
<html <?php language_attributes(); ?> class="no-js video-gallery">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' | '; } ?> <?php bloginfo('name'); ?></title>
		<link href="//www.google-analytics.com" rel="dns-prefetch">

		<!-- Favicons -->
		<!-- Main Favicon -->
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<!-- Opera Speed Dial Favicon -->
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/inc/img/favicon-160.png" />
		<!-- Standard Favicon -->
		<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri();?>/inc/img/favicon.png" />
		<!-- For iPhone 4 Retina display: -->
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri();?>/inc/img/favicon-114.png">
		<!-- For iPad: -->
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri();?>/inc/img/favicon-72.png">
		<!-- For iPhone: -->
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri();?>/inc/img/favicon-57.png">

		<meta property="og:title" content="<?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' | '; } ?> <?php bloginfo('name'); ?>" />
		<meta property="og:description" content="<?php bloginfo('description'); ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?php bloginfo('description'); ?>" />
		<meta property="og:image" content="<?php echo get_stylesheet_directory_uri();?>/inc/img/nomad-live-screenshot.png"/>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="twitter:widgets:csp" content="on"> 

		<?php wp_enqueue_script("jquery");?>
		<?php wp_enqueue_script("froogaloop2","//f.vimeocdn.com/js/froogaloop2.min.js");?>
		<?php wp_enqueue_script("modernizr",get_template_directory_uri()."/inc/js/modernizr.min.js");?>
		<?php wp_enqueue_script("nomadlive_custom",get_template_directory_uri()."/inc/js/custom.js");?>

		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css">

		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-48251511-1', 'auto');
		  ga('send', 'pageview');

		</script>


		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>

		<div class="form-overlay">
			<div class="form-overlay-container">	
				<div class="form-close"><img src="<?php echo get_template_directory_uri();?>/inc/img/close.png"/></div>
				<div class="form-title"><?php echo __("Take part to NOMAD livecast");?></div>
				<?php echo do_shortcode('[contact-form-7 id="41" title="Join NOMAD"]');?>
		   </div>
		</div>

		<!-- wrapper -->
		<div class="wrapper">

