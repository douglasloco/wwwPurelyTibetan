<?php 
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.6
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/
define('FILE_PATH', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
// Request for Specifix Style CSS
if(isset($_REQUEST['s'])) {
	$style = $_REQUEST['s']; 
} else {
	$style = '1'; // Else Load default style css file i.e. style1.css
}
//initialize ob_gzhandler to send and compress data
ob_start ("ob_gzhandler");
//initialize compress function for whitespace removal
ob_start("compress");
//required header info and character set
header("Content-type:text/css; charset=UTF-8");
//cache control to process
header("Cache-Control:must-revalidate");
//Last Modified Header format
if(is_readable(FILE_PATH . DS . 'template.css')) {
	// Set Actual Cache File Time as last modified time 
	$lastUpdate = "Last-Modified:" . gmdate("D, d M Y H:i:s", filemtime(FILE_PATH . DS . 'template.css')) . " GMT";
} else {
	// Set Current Time as last modified time 
	$lastUpdate = time();
}
// send cache modified header to broswer
header($lastUpdate);
//duration of cached content (60 days)
$offset = 60 * 24 * 60 * 60 ;
//expiration header format
$ExpStr = "Expires: " . gmdate("D, d M Y H:i:s",time() + $offset) . " GMT";
//send cache expiration header to broswer
header($ExpStr);
//Begin function compress
function compress($buffer) {
	//remove comments
	$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
	//remove tabs, spaces, new lines, etc.        
	$buffer = str_replace(array("\r\n","\r","\n","\t",'  ','    ','    '),'',$buffer);
	//remove unnecessary spaces        
	$buffer = str_replace('{ ', '{', $buffer);
	$buffer = str_replace(' }', '}', $buffer);
	$buffer = str_replace('; ', ';', $buffer);
	$buffer = str_replace(', ', ',', $buffer);
	$buffer = str_replace(' {', '{', $buffer);
	$buffer = str_replace('} ', '}', $buffer);
	$buffer = str_replace(': ', ':', $buffer);
	$buffer = str_replace(' ,', ',', $buffer);
	$buffer = str_replace(' ;', ';', $buffer);
	$buffer = str_replace(';}', '}', $buffer);
	
	return $buffer;
}

require('bootstrap.min.css');
require('template.css');
require('virtuemart.css');
require('product-image-gallery.css');
require('prettyPhoto.css');
require('jquery.jscrollpane.css');
if ($style==1) require('style1.css');
if ($style==2) require('style2.css');
if ($style==3) require('style3.css');
if ($style==4) require('style4.css');
if ($style==5) require('style5.css');
if ($style==6) require('style6.css');
require('bootstrap-responsive.min.css');
require('promart-reponsive.css');
require('../../../media/system/css/system.css');
require('../../system/css/system.css');
require('../../system/css/general.css');
?>