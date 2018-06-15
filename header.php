<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <?php rta() ?>
	<title><?php wp_title(); ?> <?php bloginfo( 'name' ); ?></title>
    <meta name="description" content="Watch <?php wp_title(); ?> free porn video on <?php bloginfo( 'name' ); ?>" />
    <?php echo get_option('prHeadCode'); ?>
    <?php wp_head(); ?>
    <?php if(get_option(roundCorners) == 1){ echo '<link id="themeroundedcorners" rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/roundedcorners.css">'; } ?>
    <?php
	switch(get_option( 'colorTheme', 'red' )){
		case 'red': echo '<link id="themecolor" rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/colors/red.css"><link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/style.css"><link  id="themecolorres" rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/colors/red_res.css">';
		break;
		case 'white': echo '<link id="themecolor" rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/colors/white.css"><link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/style.css"><link  id="themecolorres" rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/colors/white_res.css">';
		break;
		case 'blue': echo '<link id="themecolor" rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/colors/blue.css"><link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/style.css"><link  id="themecolorres" rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/colors/blue_res.css">';
		break;
		default: echo '<link id="themecolor" rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/colors/red.css"><link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/style.css"><link id="themecolorres" rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/colors/red_res.css">';
	}
	?>
    <?php if(get_option(boxShadows) == 1){ echo '<link id="themeshadow" rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/shadows.css">'; } ?>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
    <?php echo get_option( 'googleAnalytics' ); ?>
</head>
<body class="<?php if(get_option(whiteBackground) == 1){ echo 'white'; } ?>">
<header id="headerBox">
	<div id="header">
		<div id="logo">
            <h1><a href="<?php echo home_url() ?>/"><?php echo get_option( 'logoFirstPart', 'AWP' ); ?><?php if(get_option( 'logoSecondPart' )){ $boxed = 'class=""'; if(get_option('logoStyle') == 2){ $boxed = 'class="boxed"'; } echo '<span id="logosecondpart" '.$boxed.'>'.get_option( 'logoSecondPart', 'TUBE' ).'</span>'; }; ?></a></h1>
            <?php if(get_option( 'logoSlogan' )){ echo '<h2>'.get_option( 'logoSlogan', 'In Porn We Trust' ).'</h2>'; }; ?>
        </div>
        <div id="mobile-nav" class="mobile-nav-open">Menu</div>
        <nav id="top-nav" class="hide-nav">
			<?php get_sidebar('horizontal'); ?>
		</nav>
	</div>
</header>