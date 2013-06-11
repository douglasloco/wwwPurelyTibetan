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
	foreach ($this->product->customfieldsSorted['sidebar'] as $field) {
		if ( $field->is_hidden ) 
			continue;
			if ($field->display) {?>
				<div class="quick-custom-field-position-sidebar product-field-type-<?php echo $field->field_type ?>">
					<?php echo JText::_($field->custom_title); ?>
				</div>
			<?php			
			}
	} 
}
?>