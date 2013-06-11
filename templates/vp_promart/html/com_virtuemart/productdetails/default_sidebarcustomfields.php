<?php defined ( '_JEXEC' ) or die ( 'Restricted access' );
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.4
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/
if ($this->position == "sidebar") { 
	$fieldCount = 1;
	foreach ($this->product->customfieldsSorted['sidebar'] as $field) {
		if ( $field->is_hidden ) 
			continue;
			if ($field->display) {?>
				<div class="custom-field-position-sidebar product-field-type-<?php echo $field->field_type ?>">
					<div class="side-bar-link">
						<a href="#sidebar-fields-<?php echo $field->field_type ?>-<?php echo $fieldCount ?>" class="sidebar-field-title" data-toggle="modal" ><?php echo JText::_($field->custom_title); ?></a>		
					</div>			
					<div class="boot-modal fade" id="sidebar-fields-<?php echo $field->field_type ?>-<?php echo $fieldCount ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-<?php echo $field->field_type ?>-<?php echo $fieldCount ?>" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3 id="myModalLabel-<?php echo $field->field_type ?>-<?php echo $fieldCount ?>"><?php echo jText::_($field->custom_field_desc) ?></h3>
					</div>
					<div class="modal-body">
						<p><?php echo $field->display ?></p>
					</div>
					<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo JText::_('JLIB_HTML_BEHAVIOR_CLOSE'); ?></button>    													
					</div>
					</div>
				</div>
			<?php
			$fieldCount++;
			}
	} 
}
?>