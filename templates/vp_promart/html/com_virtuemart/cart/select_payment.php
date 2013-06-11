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
defined('_JEXEC') or die('Restricted access');
?>

<?php
if (VmConfig::get('oncheckout_show_steps', 1)) {
    echo '<div class="checkoutStep" id="checkoutStep3">' . JText::_('COM_VIRTUEMART_USER_FORM_CART_STEP3') . '</div>';
}
?>
<form method="post" id="paymentForm" name="choosePaymentRate" action="<?php echo JRoute::_('index.php'); ?>" class="form-validate">
<?php
	echo '<h1 class="payment-method-page">'.JText::_('COM_VIRTUEMART_CART_SELECT_PAYMENT').'</h1>';
	if($this->cart->getInCheckOut()){
		$buttonclass = 'button vm-button-correct btn';
	} else {
		$buttonclass = 'default btn';
	}
?>

<?php if ($this->found_payment_method) {
	echo "<fieldset>";
	foreach ($this->paymentplugins_payments as $paymentplugin_payments) {
		if (is_array($paymentplugin_payments)) {
			foreach ($paymentplugin_payments as $paymentplugin_payment) {
				echo $paymentplugin_payment.'<br />';
			}
		}
	}
	echo "</fieldset>";?>
	<div class="buttonBar-center">
		<button class="<?php echo $buttonclass ?>" type="submit"><?php echo JText::_('COM_VIRTUEMART_SAVE'); ?></button>
     &nbsp;
		<button class="<?php echo $buttonclass ?>" type="reset" onClick="window.location.href='<?php echo JRoute::_('index.php?option=com_virtuemart&view=cart'); ?>'" ><?php echo JText::_('COM_VIRTUEMART_CANCEL'); ?></button>
	</div>
<?php } else {
	echo '<div class="alert alert-error payment">'.$this->payment_not_found_text.'</div>'; ?>	 
	<div class="buttonBar-center">
			<button class="<?php echo $buttonclass ?>" type="reset" onClick="window.location.href='<?php echo JRoute::_('index.php?option=com_virtuemart&view=cart'); ?>'" ><?php echo JText::_('COM_VIRTUEMART_CANCEL'); ?></button>
	</div>
<?php } ?>

  <input type="hidden" name="option" value="com_virtuemart" />
  <input type="hidden" name="view" value="cart" />
  <input type="hidden" name="task" value="setpayment" />
  <input type="hidden" name="controller" value="cart" />
</form>