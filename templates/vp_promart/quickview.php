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
$app = JFactory::getApplication();

$app = JFactory::getApplication();
$params = $app->getParams();
if($this->params->get('script_optimize', 1)) {
	require_once JPATH_ROOT . DS . 'templates' . DS . $this->template . DS . 'head' . DS . 'headOptimized.php';
} 
else {
	require_once JPATH_ROOT . DS . 'templates' . DS . $this->template . DS . 'head' . DS . 'headNormal.php';
}
$doc->addScriptDeclaration("
jQuery(document).ready(function(){
	jQuery(document).bind('afterReveal.facebox', function() {
		jQuery('#facebox .showcart, #facebox .continue').attr('target','_parent').wrapAll('<div class=\"continue-showcart\"></div>');
		jQuery('.showcart').addClass('btn btn-primary btn-small').removeClass('floatright');
		jQuery('.continue').addClass('btn btn-inverse btn-small');
		jQuery('#facebox .content > div > div:eq(1)').addClass('okay-message');
	});	
	jQuery('html').addClass('overflow-hidden');
});
");
?>
<body class="promart style-<?php echo $style; ?> quickview <?php echo $pageclass; ?>">
	<div id="modal-overall">
		<div id="main-site">
			<jdoc:include type="message" />
			<jdoc:include type="component" />
		</div>
</body>
</html>

