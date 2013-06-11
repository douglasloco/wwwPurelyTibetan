<?php
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.4
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/

// Check to ensure this file is included in Joomla!
defined ( '_JEXEC' ) or die ( 'Restricted access' );
?>
<div class="product-related-products row-fluid">
	<h4 class="related-item-title span12"><?php echo JText::_('COM_VIRTUEMART_RELATED_PRODUCTS'); ?></h4>
	<div class="row-fluid">
		<?php
		foreach ($this->product->customfieldsRelatedProducts as $field) {?>
		<div class="product-field product-field-type-<?php echo $field->field_type ?> span3">
			<span class="product-field-display"><?php echo $field->display ?></span>
			<span class="product-field-desc"><?php echo jText::_($field->custom_field_desc) ?></span>
		</div>
		<?php } ?>
	</div>
</div>
