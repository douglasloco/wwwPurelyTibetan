<?php  
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.7
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/
defined( '_JEXEC' ) or die; 
require_once dirname(__FILE__) . DS . 'headParams.php';
?>
<!doctype html>
<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->
 <head>
  <link rel="stylesheet" href="<?php echo $tpath.'/css/bootstrap.min.css'; ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo $tpath.'/css/template.css?v='.$TmplVer; ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo $tpath.'/css/virtuemart.css?v='.$TmplVer; ?>" type="text/css" />	
  <link rel="stylesheet" href="<?php echo $tpath.'/css/product-image-gallery.css?v='.$TmplVer; ?>" type="text/css" />	
  <link rel="stylesheet" href="<?php echo $tpath.'/css/prettyPhoto.css' ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo $tpath.'/css/jquery.jscrollpane.css' ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo $tpath.'/css/style'.$style.'.css?v='.$TmplVer; ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo $tpath.'/css/bootstrap-responsive.min.css?v='.$TmplVer; ?>" type="text/css" />		
  <link rel="stylesheet" href="<?php echo $tpath.'/css/promart-reponsive.css?v='.$TmplVer; ?>" type="text/css" />	 
  <link rel="stylesheet" href="<?php echo $this->baseurl.'/media/system/css/system.css'; ?>" type="text/css" /> 
  <link rel="stylesheet" href="<?php echo $this->baseurl.'/templates/system/css/system.css'; ?>" type="text/css" /> 
  <link rel="stylesheet" href="<?php echo $this->baseurl.'/templates/system/css/general.css'; ?>" type="text/css" /> 
<?php if (!empty($custom_css_file) and file_exists(JPATH_SITE.DS.$custom_css_file)) : ?>
  <link rel="stylesheet" href="<?php echo $baseURL.'/'.$custom_css_file ?>" type="text/css" />
<?php endif;?>
  <script src="<?php echo $tpath.'/js/jquery-1.7.2.min.js'; ?>" type="text/javascript"></script>
  <script src="<?php echo $tpath.'/js/jquery-ui-1.8.19.custom.min.js'; ?>" type="text/javascript"></script>
  <script src="<?php echo $tpath.'/js/bootstrap.min.js'; ?>" type="text/javascript"></script>
  <script src="<?php echo $tpath.'/js/jquery.prettyPhoto.js'; ?>" type="text/javascript"></script>
  <script src="<?php echo $tpath.'/js/jquery.hoverIntent.minified.js'; ?>" type="text/javascript"></script>
  <script src="<?php echo $tpath.'/js/cloud-zoom.1.0.2.min.js'; ?>" type="text/javascript"></script>
  <script src="<?php echo $tpath.'/js/jquery.mousewheel.js'; ?>" type="text/javascript"></script>
  <script src="<?php echo $tpath.'/js/jquery.jscrollpane.min.js'; ?>" type="text/javascript"></script>
  <script src="<?php echo $tpath.'/js/custom.js?v='.$TmplVer; ?>" type="text/javascript"></script>  
<jdoc:include type="head" />
  <script src="<?php echo $tpath.'/js/modernizr.js'; ?>" type="text/javascript"></script>
  <!--[if lt IE 9]>
   <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]--> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" /> <!-- mobile viewport -->
  <link rel="apple-touch-icon-precomposed" href="<?php echo $tpath; ?>/apple-touch-icon-57x57.png"> <!-- iphone, ipod, android -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $tpath; ?>/apple-touch-icon-72x72.png"> <!-- ipad -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $tpath; ?>/apple-touch-icon-114x114.png"> <!-- iphone retina -->
  <!--[if lte IE 8]>
   <style> 
    {behavior:url(<?php echo $tpath; ?>/js/PIE.htc);}
   </style>
  <![endif]-->
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans">
<?php if(!empty($custom_head_codes)) {
  echo 
  '<!-- Start: Custom Codes to Head -->'."\n".
	$custom_head_codes .
  "\n".'<!-- End: Custom Codes to Head -->'."\n";	
}	?>	 
</head>