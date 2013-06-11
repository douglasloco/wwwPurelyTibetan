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

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$tpath = $this->baseurl.'/templates/'.$this->template;

$this->setGenerator(null);

// load sheets and scripts
$doc->addStyleSheet($tpath.'/css/offline.css?v=1.0.7'); 
$doc->addStyleSheet($tpath.'/css/bootstrap.css?v=1.0.7'); 
$doc->addStyleSheet($tpath.'/css/template.css?v=1.0.7'); 
$doc->addStyleSheet($tpath.'/css/bootstrap-responsive.min.css?v=1.0.7'); 
$doc->addStyleSheet('media/system/css/system.css?v=1.0.7'); 
$doc->addScript($tpath.'/js/modernizr.js');

?><!doctype html>
<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->

<head>
  <jdoc:include type="head" />
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" /> <!-- mobile viewport optimized -->
  <link rel="apple-touch-icon-precomposed" href="<?php echo $tpath; ?>/apple-touch-icon-57x57.png"> <!-- iphone, ipod, android -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $tpath; ?>/apple-touch-icon-72x72.png"> <!-- ipad -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $tpath; ?>/apple-touch-icon-114x114.png"> <!-- iphone retina -->
  <link href="<?php echo $tpath; ?>/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" /> <!-- favicon -->
</head>

<body class="promart offline">
	<div class="container"><div class="row-fluid">
  <jdoc:include type="message" />
  <div id="frame" class="outline">
    <?php if ($app->getCfg('offline_image')) : ?>
      <img class="offline-logo" src="<?php echo $app->getCfg('offline_image'); ?>" alt="<?php echo $app->getCfg('sitename'); ?>" />
    <?php endif; ?>
		<div class="offline-message">
	    <?php if ($app->getCfg('display_offline_message', 1) == 1 && str_replace(' ', '', $app->getCfg('offline_message')) != ''): ?>
			<p><?php echo $app->getCfg('offline_message'); ?></p>
	    <?php elseif ($app->getCfg('display_offline_message', 1) == 2 && str_replace(' ', '', JText::_('JOFFLINE_MESSAGE')) != ''): ?>
			<p><?php echo JText::_('JOFFLINE_MESSAGE'); ?></p>		
			<?php endif; ?>
		</div>
    <form action="<?php echo JRoute::_('index.php', true); ?>" method="post" name="login" id="form-login" class="form-horizontal">
      <fieldset class="input">
				<div class="control-group">
			    <label class="control-label" for="username"><?php echo JText::_('JGLOBAL_USERNAME'); ?></label>
			    <div class="controls">
			      <input type="text" name="username" id="username" class="input-medium" placeholder="<?php echo JText::_('JGLOBAL_USERNAME'); ?>"/>
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="passwd"><?php echo JText::_('JGLOBAL_PASSWORD'); ?></label>
			    <div class="controls">
			      <input type="password" name="password" id="password" class="input-medium" placeholder="<?php echo JText::_('JGLOBAL_PASSWORD'); ?>"/>
			    </div>
			  </div>
			  <div class="control-group">
			    <div class="controls">
			      <label class="checkbox" for="remember">
			        <input type="checkbox" name="remember" value="yes" alt="<?php echo JText::_('JGLOBAL_REMEMBER_ME'); ?>" id="remember"> <?php echo JText::_('JGLOBAL_REMEMBER_ME'); ?>
			      </label><div class="clear"></div>
			      <input type="submit" name="Submit" class="button btn" value="<?php echo JText::_('JLOGIN'); ?>" />
			    </div>
			  </div>
      </fieldset>
      <input type="hidden" name="option" value="com_users" />
      <input type="hidden" name="task" value="user.login" />
      <input type="hidden" name="return" value="<?php echo base64_encode(JURI::base()); ?>" />
      <?php echo JHTML::_( 'form.token' ); ?>
    </form>
  </div>
	</div></div>
</body>

</html>