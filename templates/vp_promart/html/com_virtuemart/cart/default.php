<?php defined ('_JEXEC') or die('Restricted access');
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.6
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/

JHtml::_ ('behavior.formvalidation');
$document = JFactory::getDocument ();

$cartProductCount = count($this->cart->products);
?>

<div class="cart-view row-fluid">
	<div class="span12">
		<h1 class="cart-page-title"><?php echo JText::_ ('COM_VIRTUEMART_CART_TITLE'); ?>&nbsp;<span class="septa">/</span>&nbsp;<span><?php echo JText::sprintf('COM_VIRTUEMART_CART_X_PRODUCTS', $cartProductCount); ?></span></h1> 
		<?php echo shopFunctionsF::getLoginForm ($this->cart, FALSE); ?>
	</div>
	<div>
		<?php if (VmConfig::get ('oncheckout_show_steps', 1) && $this->checkout_task === 'confirm') {
		vmdebug ('checkout_task', $this->checkout_task);
		echo '<div class="checkoutStep" id="checkoutStep4">' . JText::_ ('COM_VIRTUEMART_USER_FORM_CART_STEP4') . '</div>';
	} ?>
	</div>
	<?php echo $this->loadTemplate ('pricelist');
	if ($this->checkout_task) {
		$taskRoute = '&task=' . $this->checkout_task;
	}
	else {
		$taskRoute = '';
	} ?>
	<form method="post" id="checkoutForm" name="checkoutForm" action="<?php echo JRoute::_ ('index.php?option=com_virtuemart&view=cart' . $taskRoute, $this->useXHTML, $this->useSSL); ?>">	
		<div id="checkout-advertise-box">
		<?php if (!empty($this->checkoutAdvertise)) {
			foreach ($this->checkoutAdvertise as $checkoutAdvertise) { ?>
				<div class="checkout-advertise">
					<?php echo $checkoutAdvertise; ?>
				</div>
			<?php }
		}?>
		</div>
		<div class="customer-comment">
			<span class="comment"><?php echo JText::_ ('COM_VIRTUEMART_COMMENT_CART'); ?></span><br/>
			<textarea class="customer-comment span12" name="customer_comment" cols="60" rows="3"><?php echo $this->cart->customer_comment; ?></textarea>
		</div>
		<div class="checkout-button-top">
			<?php if (!class_exists ('VirtueMartModelUserfields')) {
				require(JPATH_VM_ADMINISTRATOR . DS . 'models' . DS . 'userfields.php');
			}
			$userFieldsModel = VmModel::getModel ('userfields');
			if ($userFieldsModel->getIfRequired ('agreed')) {	?>
			<label for="tosAccepted" class="checkbox">
				<?php if (!class_exists ('VmHtml')) {
						require(JPATH_VM_ADMINISTRATOR . DS . 'helpers' . DS . 'html.php');
					}
					echo VmHtml::checkbox ('tosAccepted', $this->cart->tosAccepted, 1, 0, 'class="terms-of-service"');
					if (VmConfig::get ('oncheckout_show_legal_info', 1)) { ?>
					<a href="#full-tos" class="terms-of-service" data-toggle="modal">
						<?php echo JText::_ ('COM_VIRTUEMART_CART_TOS_READ_AND_ACCEPTED'); ?>
					</a>
					<div class="boot-modal fade" id="full-tos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h3 id="myModalLabel"><?php echo JText::_ ('COM_VIRTUEMART_CART_TOS'); ?></h3>
						</div>
						<div class="modal-body">
							<p><?php echo $this->cart->vendor->vendor_terms_of_service; ?></p>
						</div>
					</div>					
				<?php } ?>
			</label>
			<?php } ?>
			<div class="row-fluid continue-checkout-box">
				<div class="span6 continue-cont">
					<?php if ($this->continue_link_html != '') {
						echo $this->continue_link_html;
					} ?>
				</div>
				<div class="span6 checkout-cont">
					<?php echo $this->checkout_link_html; ?>
				</div>			
			</div>				
		</div>
		<input type='hidden' name='task' value='<?php echo $this->checkout_task; ?>'/>
		<input type='hidden' name='option' value='com_virtuemart'/>
		<input type='hidden' name='view' value='cart'/>
	</form>
</div>
