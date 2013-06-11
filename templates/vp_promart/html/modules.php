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

defined('_JEXEC') or die;
jimport( 'joomla.application.module.helper' );
function modChrome_slider($module, &$params, &$attribs) {
	echo JHtml::_('sliders.panel',JText::_($module->title),'module'.$module->id);
	echo $module->content;
}
function modChrome_raw($module, &$params, &$attribs) {
	echo $module->content;
}

function modChrome_mystyle($module, &$params, &$attribs) { ?>
	<div class="moduletable <?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?>">
		<div class="bghelper">
			<h3><?php echo JText::_( $module->title ); ?></h3>
			<div class="modulcontent"><?php echo $module->content; ?></div>
		</div>
	</div>	
	<?php 
}
function modChrome_container($module, &$params, &$attribs) { ?>
	<div class="moduletable <?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?>">
		<div class="mods">
			<div class="bghelper">
				<?php if ($module->showtitle) : ?>
					<h3><?php echo JText::_( $module->title ); ?></h3>
				<?php endif; ?>
				<div class="modulcontent"><?php echo $module->content; ?></div>
			</div>
		</div>
	</div>
	<?php }
	
function modChrome_autowidth($module, &$params, &$attribs) { 
	$modPosition=$attribs['name'];
	$modCount=count(JModuleHelper::getModules($modPosition));
	$modWidth = " span".floor(12/$modCount);
?>	
	<div class="moduletable <?php echo htmlspecialchars($params->get('moduleclass_sfx')); echo $modWidth; ?>">	
		<div class="mods">	
			<div class="bghelper">
				<?php if ($module->showtitle) : ?>
					<h3><?php echo JText::_( $module->title ); ?></h3>
				<?php endif; ?>
				<div class="modulcontent"><?php echo $module->content; ?></div>
			</div>
		</div>
	</div>
	<?php }	
	
function modChrome_bots($module, &$params, &$attribs)
{

   $headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
   if (!empty ($module->content)) : ?>
      <div class="moduletable<?php echo $params->get('moduleclass_sfx'); ?><?php echo ' bots'.count(JModuleHelper::getModules('main-top')); ?>">
         <?php if ($module->showtitle) : ?>
            <h<?php echo $headerLevel; ?>><?php echo $module->title; ?></h>>
         <?php endif; ?>
         <?php echo $module->content; ?>
      </div>
   <?php endif;
}		


?>
