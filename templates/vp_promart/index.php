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
$app = JFactory::getApplication();
$params = $app->getParams();
if($this->params->get('script_optimize', 1)) {
	require_once JPATH_ROOT . DS . 'templates' . DS . $this->template . DS . 'head' . DS . 'headOptimized.php';
} 
else {
	require_once JPATH_ROOT . DS . 'templates' . DS . $this->template . DS . 'head' . DS . 'headNormal.php';
}
?>	
<body class="promart style-<?php echo $style; ?> <?php echo $pageclass; ?>">
<?php if(!empty($custom_body_codes)) {
  echo '<!-- Start: Custom Codes to Body -->'."\n"
	. $custom_body_codes;
  echo "\n".'<!-- End: Custom Codes to Body -->'."\n";	
}	?>
	<div id="overall">
		<?php if ($this->countModules('currency') or $this->countModules('top-menu') or $this->countModules('language')):?>
		<div id="top" class="top-bar container">
			<div class="row-fluid">
				<div class="span12 top-bar-cont">				
					<?php if ($this->countModules('top-menu')): ?>
					<div class="top-menu">
						<jdoc:include type="modules" name="top-menu" style="raw"/>
					</div>
					<?php endif; ?>	
					<div class="language-currency-mod">
						<?php if ($this->countModules('language')): ?>
						<div class="language-selector">
							<jdoc:include type="modules" name="language" style="raw"/>
						</div>	
						<?php endif; ?>							
						<?php if ($this->countModules('currency')): ?>
						<div class="currency-selector">
							<jdoc:include type="modules" name="currency" style="raw"/>
						</div>	
						<?php endif; ?>	
					</div>
				</div>
				<div class="show-cart visible-phone">
					<?php	
					$carturl = JRoute::_ ('index.php?option=com_virtuemart&view=cart'); 
					$showCartTitle = JText::_('COM_VIRTUEMART_CART_SHOW');
					?>
					<i class="icon-shopping-cart"></i><a class="phone-show-cart" href="<?php echo $carturl ?>" title="<?php echo $showCartTitle ?>"><?php echo $showCartTitle ?></a>
				</div>					
			</div>
		</div>
		<?php endif; ?>		
		<header id="header" class="container">
			<div class="row-fluid branding-header-module">
				<div class="span4 branding">
					<a class="logo-link" href="<?php echo $this->baseurl ?>"><?php echo $app->getCfg('sitename'); ?></a>
				</div>	
				<div class="header-modules span8 hidden-phone">			
					<jdoc:include type="modules" name="mini-cart" style="raw"/>				
				</div>						
			</div>
			<?php if ($this->countModules('menu') or $this->countModules('search')): ?>
			<div class="row-fluid">
				<div class="navbar navbar-inverse span12">
    			<div class="navbar-inner">       
	        	<!-- .btn-navbar is used to toogle  collapsed navbar content -->
	        	<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	          	<span class="icon-bar"></span>
	          	<span class="icon-bar"></span>
	          	<span class="icon-bar"></span>
	        	</a>
						<div class="pull-right">
							<jdoc:include type="modules" name="search" style="raw"/>
						</div>						            
        		<!-- Everything you want hidden at 940px or less, place within here -->
        		<div class="nav-collapse">
							<div class="pull-left visible-desktop">
  							<jdoc:include type="modules" name="menu" style="raw" />
							</div>
							<div class="hidden-desktop">
							  <jdoc:include type="modules" name="menu" style="raw"/>							  
							</div>
        		</div>      
    			</div>
  			</div>
			</div>
			<?php endif; ?>		
		</header>
		<div class="main-wrap">
			<div id="main-site" class="container">
				<?php if ($this->countModules('banner')): ?>
				<div class="top-banner">
					<jdoc:include type="modules" name="banner" style="raw"/>
				</div>	
				<?php endif; ?>
				<?php if ($this->countModules('top')): ?>
				<div class="top-modules row-fluid">
					<jdoc:include type="modules" name="top" style="autowidth" />
				</div>	
				<?php endif; ?>				
				<?php if ($this->countModules('breadcrumbs')): ?>
					<jdoc:include type="modules" name="breadcrumbs" style="raw"/>
				<?php endif; ?>					
				<div class="row-fluid">
					<?php if ($showLeftMods): ?>
					<div class="span3 left-mod hidden-phone">
						<jdoc:include type="modules" name="left" style="container" />
					</div>
					<?php endif; ?>	
					<div class="<?php echo $mainColumnClass ?> main-column">
						<?php if ($this->countModules('main-top')): ?>
						<div class="row-fluid">
							<jdoc:include type="modules" name="main-top" style="autowidth" />
						</div>
						<?php endif; ?>	
						<jdoc:include type="message" />
						<jdoc:include type="component" />
						<?php if ($this->countModules('main-bottom')): ?>
						<div class="row-fluid">					
							<jdoc:include type="modules" name="main-bottom" style="autowidth" />
						</div>
						<?php endif; ?>							
					</div>	
					<?php if ($showLeftMods): ?>
					<div class="span3 left-mod visible-phone">
						<jdoc:include type="modules" name="left" style="container" />
					</div>
					<?php endif; ?>					
					<?php if ($showRightMods): ?>
					<div class="span3 right-mod">
						<jdoc:include type="modules" name="right" style="container" />
					</div>
					<?php endif; ?>					
				</div>
				<?php if ($this->countModules('bottom-1')): ?>
				<div class="bottom1-modules row-fluid">
					<jdoc:include type="modules" name="bottom-1" style="autowidth" />
				</div>	
				<?php endif; ?>					
			</div>
		</div>
		<div class="vp-navigation-top container">
			<div id="scroll-top" title="Back to top">Top</div>
		</div>				
		<?php if ($this->countModules('bottom')): ?>
		<section id="bottom">
			<div class="container">
				<div class="inner-container">
					<div class="row-fluid">
						<jdoc:include type="modules" name="bottom" style="autowidth" />
					</div>	
				</div>		
			</div>		
		</section>
		<?php endif; ?>	
		<footer id="footer">
			<div class="container">
				<div class="inner-container">
					<div class="row-fluid">
						<jdoc:include type="modules" name="footer" style="raw"/>
					</div>	
				</div>		
			</div>			
		</footer>	
	</div>
	<jdoc:include type="modules" name="debug" />
</body>
</html>