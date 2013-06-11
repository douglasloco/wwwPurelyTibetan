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

$TmplVer = '1.0.7';

$style = $this->params->get('style');
$SlideShowBG = $this->params->get('slideshow-bg');
$TemplateBG = $this->params->get('template_bg');
$TemplateBGCSS = $this->params->get('template_bg_css');
$Logo = $this->params->get('logo');

$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx'); 
$baseURL = $this->baseurl;
$tpath = $this->baseurl.'/templates/'.$this->template;
$bodyLayout = dirname(dirname(__FILE__)) . DS . 'body' . DS;
$custom_css_file = $this->params->get('custom_css_file', '');
$custom_head_codes = $this->params->get('custom_head_codes', '');
$custom_body_codes = $this->params->get('custom_body_codes', '');

$doc->addStyleDeclaration(".vm-simple-product-slideshow.flexslider{background:$SlideShowBG;}");
if($TemplateBG==1){
	$doc->addStyleDeclaration(".promart #overall{background:$TemplateBGCSS}");
}
if($Logo!=='Default'){
	$doc->addStyleDeclaration(".promart .branding > .logo-link{background-image:url($baseURL/$Logo)}");
}

if ($this->params->get('hide_mods')==1 and JRequest::getCmd('option')=='com_virtuemart' and (JRequest::getCmd('view')=='productdetails' or JRequest::getCmd('view')=='cart')) {
	$showLeftMods = 0;
	$showRightMods = 0;
	$mainColumnClass='span12';
} else {
	if ($this->countModules('right')==0 and $this->countModules('left')==0) {
		$showLeftMods = 0;
		$showRightMods = 0;
		$mainColumnClass='span12';
	}
	elseif ($this->countModules('right')==0 and $this->countModules('left')) {
		$showLeftMods = 1;
		$showRightMods = 0;
		$mainColumnClass='span9';
	}
	elseif ($this->countModules('right') and $this->countModules('left')==0) {
		$showLeftMods = 0;
		$showRightMods = 1;
		$mainColumnClass='span9';
	}
	else {
		$showLeftMods = 1;
		$showRightMods = 1;
		$mainColumnClass='span6';
	}
}
$this->setGenerator(null);
?>