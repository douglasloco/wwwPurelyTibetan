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
defined('_JEXEC') or die('Restricted access');

?>

<?php
if (VmConfig::get('oncheckout_show_steps', 1)) {
    echo '<div class="checkoutStep" id="checkoutStep2">' . JText::_('COM_VIRTUEMART_USER_FORM_CART_STEP2') . '</div>';
}
?>
<form method="post" id="userForm" name="chooseShipmentRate" action="<?php echo JRoute::_('index.php'); ?>" class="form-validate">
<?php

	echo '<h1 class="shipping-method-page">'.JText::_('COM_VIRTUEMART_CART_SELECT_SHIPMENT').'</h1>';
	if($this->cart->getInCheckOut()){
		$buttonclass = 'button vm-button-correct btn';
	} else {
		$buttonclass = 'default btn';
	}
	?>

<?php if ($this->found_shipment_method) {
	echo "<fieldset>\n";
    foreach ($this->shipments_shipment_rates as $shipment_shipment_rates) {
			if (is_array($shipment_shipment_rates)) {
				foreach ($shipment_shipment_rates as $shipment_shipment_rate) {
					echo $shipment_shipment_rate."<br />\n";
		    }
			}
	   }
	   echo "</fieldset>\n"; ?>
		<div class="buttonBar-center">
			<button class="<?php echo $buttonclass ?>" type="submit" ><?php echo JText::_('COM_VIRTUEMART_SAVE'); ?></button>  &nbsp;
			<button class="<?php echo $buttonclass ?>" type="reset" onClick="window.location.href='<?php echo JRoute::_('index.php?option=com_virtuemart&view=cart'); ?>'" ><?php echo JText::_('COM_VIRTUEMART_CANCEL'); ?></button>
		</div>			
<?php } else {
		echo '<div class="alert alert-error shipping">'.$this->shipment_not_found_text.'</div>'; ?>
		<div class="buttonBar-center">
			<button class="<?php echo $buttonclass ?>" type="reset" onClick="window.location.href='<?php echo JRoute::_('index.php?option=com_virtuemart&view=cart'); ?>'" ><?php echo JText::_('COM_VIRTUEMART_CANCEL'); ?></button>
		</div>	 
<?php } ?>

  <input type="hidden" name="option" value="com_virtuemart" />
  <input type="hidden" name="view" value="cart" />
  <input type="hidden" name="task" value="setshipment" />
  <input type="hidden" name="controller" value="cart" />
</form>
