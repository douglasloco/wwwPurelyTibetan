<?php 
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.5
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/

defined( '_JEXEC' ) or die; 

// variables
$tpath = $this->baseurl.'/templates/'.$this->template;

?><!doctype html>
<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->

<head>
  <title><?php echo $this->error->getCode().' - '.$this->title; ?></title>
  <link rel="stylesheet" href="<?php echo $tpath; ?>/css/error.css?v=1.0.7" type="text/css" />
  <link href="<?php echo $tpath; ?>/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" /> <!-- favicon -->
</head>

<body>
  <div align="center">
    <div id="error">      
      <?php 
        echo '<h1>'.$this->error->getCode().'</h1>' ;
        if (($this->error->getCode()) == '404') {
          echo '<h2>';
          echo JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND');
					echo '</h2>';
        }
      ?>
      <p><?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>: 
      <a href="<?php echo $this->baseurl; ?>/"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a></p>
    </div>
  </div>
</body>

</html>
