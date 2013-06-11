<?php
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.1
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
?>

<div class="vendor-details-view">
	<h1><?php echo JText::_('COM_VIRTUEMART_VENDOR_TOS').$this->vendor->vendor_store_name;
	if (!empty($this->vendor->images[0])) { ?>
		<div class="vendor-image">
		<?php echo $this->vendor->images[0]->displayMediaThumb('',false); ?>
		</div>
	<?php
	}
?>	</h1></div>


	<?php // vendor Description
	if(!empty($this->vendor->vendor_terms_of_service  )) { ?>
		<div class="vendor-description">
			<?php echo $this->vendor->vendor_terms_of_service   ?>
		</div>
	<?php } ?>

	<div class="clear"></div>


	<br class="clear" />
	<?php echo $this->linkdetails ?>

	<br class="clear" />

	<?php echo $this->linkcontact ?>

	<br class="clear" />