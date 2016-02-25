<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

	  
      <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	  
	  
	  <!-- Google Fonts -->
	  <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,300,200,500,700,700italic' rel='stylesheet' type='text/css'>
      <!-- Bootstrap -->
      <link href="<?php echo get_template_directory_uri();?>/css/bootstrap.min.css" rel="stylesheet">
	  <!-- Wordpress -->
	  <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" />
      <!-- CSS -->
      <link href="<?php echo get_template_directory_uri();?>/css/style-template.css" rel="stylesheet">
	  <link href="<?php echo get_template_directory_uri();?>/css/animate.css" rel="stylesheet">
	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	  
	  
	  <!-- Wordpress Head-->
	  <?php wp_head(); ?>
	  
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
	  
   </head>
   
   <body <?php body_class( $class ); ?>>
   <div class="wrapper">
   <!-- Display Header on homepage-->
   <?php if(is_home()) { ?>
      <header class="home"></header>
   <?php } ?>  
	  <!-- Menu -->
      <nav id="menu" class="navbar <?php if( !is_home() ){ echo 'navbar-fixed-top'; } ?>">
         <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="<?php bloginfo('url')?>"><img src="https://placeholdit.imgix.net/~text?txtsize=13&bg=E3473E&txtclr=FFFFFF&txt=LOGO&w=150&h=50" alt=""></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
               <!--<ul class="nav navbar-nav">
                  <li><a href="#">Boutique</a></li>
                  <li><a href="#">Offres</a></li>
                  <li><a href="#">Événement</a></li>
               </ul>-->
			    <?php /* Primary navigation */
wp_nav_menu( array(
  'menu' => '',
  'depth' => 2,
  'container' => false,
  'menu_class' => 'nav navbar-nav',
  //Process nav menu using our custom nav walker
  'walker' => new wp_bootstrap_navwalker())
);
?>
            </div>
         </div>
      </nav>
	 