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
define('FILE_PATH', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
// initialize ob_gzhandler to send and compress data
ob_start ("ob_gzhandler");
// initialize compress function for whitespace removal
header("Content-type: application/x-javascript");
// cache control to process
header("Cache-Control: must-revalidate");
//Last Modified Header format
if(is_readable(FILE_PATH . DS . 'custom.js')) {
	// Set Actual Cache File Time as last modified time 
	$lastUpdate = "Last-Modified:" . gmdate("D, d M Y H:i:s", filemtime(FILE_PATH . DS . 'custom.js')) . " GMT";
} else {
	// Set Current Time as last modified time 
	$lastUpdate = time();
}
// send cache modified header to broswer
header($lastUpdate);
// duration of cached content (60 days)
$offset = 60 * 24 * 60 * 60 ;
// expiration header format
$ExpStr = "Expires: " . gmdate("D, d M Y H:i:s",time() + $offset) . " GMT";
// send cache expiration header to broswer
header($ExpStr);

require('jquery-1.7.2.min.js');
require('jquery-ui-1.8.19.custom.min.js');
require('bootstrap.min.js');
require('jquery.prettyPhoto.js');
require('jquery.hoverIntent.minified.js');
require('cloud-zoom.1.0.2.min.js');
require('jquery.mousewheel.js');
require('jquery.jscrollpane.min.js');
require('custom.js');
require('../../../media/system/js/mootools-core.js');
require('../../../media/system/js/core.js');
require('../../../media/system/js/caption.js');
?>