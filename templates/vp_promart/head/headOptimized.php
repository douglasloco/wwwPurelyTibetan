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
$config = new JConfig();
if($config->sef_rewrite) {
	$templateJS_url = $tpath.'/js/template.min.js?v='.$TmplVer;
	$templateCSS_url = $tpath.'/css/template.min.css?s='.$style.'&amp;v='.$TmplVer;
} else {
	$templateJS_url = $tpath.'/js/template.js.php?v='.$TmplVer;
	$templateCSS_url = $tpath.'/css/template.css.php?s='.$style.'&amp;v='.$TmplVer;
} 

unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools-core.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/core.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/caption.js']);
?>
<!doctype html>
<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->
 <head>
  <link rel="stylesheet" href="<?php echo $templateCSS_url ?>" type="text/css"/>
<?php if (!empty($custom_css_file) and file_exists(JPATH_SITE.DS.$custom_css_file)) : ?>
  <link rel="stylesheet" href="<?php echo $baseURL.'/'.$custom_css_file ?>" type="text/css" />
<?php endif;?>
  <script src="<?php echo $templateJS_url ?>" type="text/javascript"></script>
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