<?php defined ( '_JEXEC' ) or die ( 'Restricted access' );
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.6
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/
if ($this->position == "normal") { 
	$i=1;
    foreach ($this->product->customfieldsSorted[$this->position] as $field) {
    	if ( $field->is_hidden ) //OSP http://forum.virtuemart.net/index.php?topic=99320.0
    		continue;
		if ($field->display) { ?>
			<div class="tab-pane fade in" id="custom-field-<?php echo $i ?>">
				<p><?php echo $field->display ?></p><br/>
				<p><?php echo jText::_($field->custom_field_desc) ?></p>
				</div>						
	    <?php 	
			$i++;    
		}		
    }
} 
?>
