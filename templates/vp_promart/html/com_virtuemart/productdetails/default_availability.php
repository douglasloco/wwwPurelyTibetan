<?php defined('_JEXEC') or die('Restricted access');
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.6
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/
$stockhandle = VmConfig::get('stockhandle', 'none');
?>

<div class="availability">
<?php 
if (($this->product->product_in_stock - $this->product->product_ordered) <= 0)
	echo '<div class="stock"><span class="label label-warning">'.JText::_('COM_VIRTUEMART_CART_PRODUCT_OUT_OF_STOCK').'</span></div>';
if (($this->product->product_in_stock - $this->product->product_ordered) > 0)
	echo'<div class="stock">'.JText::_('COM_VIRTUEMART_PRODUCT_IN_STOCK').'</div>';
	
?>	
	<div class="more-on-availability">
	<?php
		if (($this->product->product_in_stock - $this->product->product_ordered) > 1) {
		if (!empty($this->product->product_availability)) { 	
			echo (file_exists(JPATH_BASE . DS . VmConfig::get('assets_general_path') . 'images/availability/' . $this->product->product_availability)) ? JHTML::image(JURI::root() . VmConfig::get('assets_general_path') . 'images/availability/' . $this->product->product_availability, $this->product->product_availability, array('class' => 'availability')) : $this->product->product_availability; 
		}
		} 
		else 
	if (($this->product->product_in_stock - $this->product->product_ordered) < 1) {
		if ($stockhandle == 'risetime' and VmConfig::get('rised_availability') and empty($this->product->product_availability)) { 	
			echo (file_exists(JPATH_BASE . DS . VmConfig::get('assets_general_path') . 'images/availability/' . VmConfig::get('rised_availability'))) ? JHTML::image(JURI::root() . VmConfig::get('assets_general_path') . 'images/availability/' . VmConfig::get('rised_availability', '7d.gif'), VmConfig::get('rised_availability', '7d.gif'), array('class' => 'availability')) : VmConfig::get('rised_availability'); 
		} 
		else if (!empty($this->product->product_availability)) {
			echo (file_exists(JPATH_BASE . DS . VmConfig::get('assets_general_path') . 'images/availability/' . $this->product->product_availability)) ? JHTML::image(JURI::root() . VmConfig::get('assets_general_path') . 'images/availability/' . $this->product->product_availability, $this->product->product_availability, array('class' => 'availability')) : $this->product->product_availability; 
		}	
	}
	?>
	</div>
</div>