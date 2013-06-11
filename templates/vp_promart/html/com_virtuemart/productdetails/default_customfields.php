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

// Check to ensure this file is included in Joomla!
defined ( '_JEXEC' ) or die ( 'Restricted access' );
?>
<div class="ontop-product-fields">
	<?php
	$custom_title = null;
	foreach ($this->product->customfieldsSorted[$this->position] as $field) {
	if ( $field->is_hidden ) //OSP http://forum.virtuemart.net/index.php?topic=99320.0
		continue;
	if ($field->display) {
	?><div class="ontop-product-field ontop-product-field-type-<?php echo $field->field_type ?>">
	    <div class="product-field-display"><?php echo $field->display ?></div>
	    <div class="product-field-desc"><?php echo jText::_($field->custom_field_desc) ?></div>
	</div>
	  <?php
	}
	}
	?>
</div>
