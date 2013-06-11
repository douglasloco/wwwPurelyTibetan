<?php defined('_JEXEC') or die('Restricted access');
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.4
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/
$document =& JFactory::getDocument();
if ( VmConfig::get('show_tax')) { 
	$document->addStyleDeclaration("
		@media (max-width: 767px) {
			.cart-p-list td:nth-of-type(1):before { content: '".JText::_('COM_VIRTUEMART_CART_NAME')."'; }
			.cart-p-list td:nth-of-type(2):before { content: '".JText::_('COM_VIRTUEMART_CART_SKU')."'; }
			.cart-p-list td:nth-of-type(3):before { content: '".JText::_('COM_VIRTUEMART_CART_PRICE')."'; }
			.cart-p-list td:nth-of-type(4):before { content: '".JText::_('COM_VIRTUEMART_CART_QUANTITY'). '/' .JText::_('COM_VIRTUEMART_CART_ACTION')."'; }
			.cart-p-list td:nth-of-type(5):before { content: '".JText::_('COM_VIRTUEMART_CART_SUBTOTAL_TAX_AMOUNT')."'; }
			.cart-p-list td:nth-of-type(6):before { content: '".JText::_('COM_VIRTUEMART_CART_SUBTOTAL_DISCOUNT_AMOUNT')."'; }
			.cart-p-list td:nth-of-type(7):before { content: '".JText::_('COM_VIRTUEMART_CART_TOTAL')."'; }
			.cart-sub-total td:nth-of-type(1):before { content: ''; }
			.cart-sub-total td:nth-of-type(2):before { content: '".JText::_('COM_VIRTUEMART_CART_SUBTOTAL_TAX_AMOUNT')."'; }
			.cart-sub-total td:nth-of-type(3):before { content: '".JText::_('COM_VIRTUEMART_CART_SUBTOTAL_DISCOUNT_AMOUNT')."'; }
			.cart-sub-total td:nth-of-type(4):before { content: '".JText::_('COM_VIRTUEMART_CART_TOTAL')."'; }
			.tax-per-bill td:nth-of-type(1):before { content: ''; }
			.tax-per-bill td:nth-of-type(2):before { content: '".JText::_('COM_VIRTUEMART_CART_SUBTOTAL_TAX_AMOUNT')."'; }
			.tax-per-bill td:nth-of-type(3):before { content: '".JText::_('COM_VIRTUEMART_CART_TOTAL')."'; }	
			.grand-total td:nth-of-type(1):before { content: ''; }
			.grand-total td:nth-of-type(2):before { content: '".JText::_('COM_VIRTUEMART_CART_SUBTOTAL_TAX_AMOUNT')."'; }
			.grand-total td:nth-of-type(3):before { content: '".JText::_('COM_VIRTUEMART_CART_SUBTOTAL_DISCOUNT_AMOUNT')."'; }
			.grand-total td:nth-of-type(4):before { content: '".JText::_('COM_VIRTUEMART_CART_TOTAL')."'; }			
			.grand-total-p-currency td:nth-of-type(1):before { content: ''; }
			.grand-total-p-currency td:nth-of-type(2):before { content: '".JText::_('COM_VIRTUEMART_CART_TOTAL')."'; }						
		}	
	");
	if (!empty($this->cart->cartData['couponCode'])) {	
		$document->addStyleDeclaration("
			@media (max-width: 767px) {
				.cart-coupon-row td:nth-of-type(1):before { content: ''; }
				.cart-coupon-row td:nth-of-type(2):before { content: '".JText::_('COM_VIRTUEMART_CART_SUBTOTAL_TAX_AMOUNT')."'; }
				.cart-coupon-row td:nth-of-type(3):before { content: '".JText::_('COM_VIRTUEMART_CART_TOTAL')."'; }
			}	
		");
	} else {
		$document->addStyleDeclaration("
			@media (max-width: 767px) {
				.cart-coupon-row td:nth-of-type(1):before { content: ''; }
				.cart-coupon-row td:nth-of-type(2) { display:none; }
				.cart-coupon-row td:nth-of-type(3) { display:none; }
			}	
		");
	}
	if(!empty($this->cart->pricesUnformatted['salesPriceShipment'])) {
		$document->addStyleDeclaration("
			@media (max-width: 767px) {
				.shipping-row td:nth-of-type(1):before { content: ''; }
				.shipping-row td:nth-of-type(2):before { content: '".JText::_('COM_VIRTUEMART_CART_SUBTOTAL_TAX_AMOUNT')."'; }
				.shipping-row td:nth-of-type(3):before { content: '".JText::_('COM_VIRTUEMART_CART_TOTAL')."'; }
			}	
		");	
	} else {
		$document->addStyleDeclaration("
			@media (max-width: 767px) {
				.shipping-row td:nth-of-type(1):before { content: ''; }
				.shipping-row td:nth-of-type(2) { display:none; }
				.shipping-row td:nth-of-type(3) { display:none; }
			}	
		");
	}
	
	if(!empty($this->cart->pricesUnformatted['salesPricePaymentt'])) {
		$document->addStyleDeclaration("
			@media (max-width: 767px) {
				.payment-row td:nth-of-type(1):before { content: ''; }
				.payment-row td:nth-of-type(2):before { content: '".JText::_('COM_VIRTUEMART_CART_SUBTOTAL_TAX_AMOUNT')."'; }
				.payment-row td:nth-of-type(3):before { content: '".JText::_('COM_VIRTUEMART_CART_TOTAL')."'; }
			}	
		");	
	} else {
		$document->addStyleDeclaration("
			@media (max-width: 767px) {
				.payment-row td:nth-of-type(1):before { content: ''; }
				.payment-row td:nth-of-type(2) { display:none; }
				.payment-row td:nth-of-type(3) { display:none; }
			}	
		");
	}	
} else {
	$document->addStyleDeclaration("
		@media (max-width: 767px) {
			.cart-p-list td:nth-of-type(1):before { content: '".JText::_('COM_VIRTUEMART_CART_NAME')."'; }
			.cart-p-list td:nth-of-type(2):before { content: '".JText::_('COM_VIRTUEMART_CART_SKU')."'; }
			.cart-p-list td:nth-of-type(3):before { content: '".JText::_('COM_VIRTUEMART_CART_PRICE')."'; }
			.cart-p-list td:nth-of-type(4):before { content: '".JText::_('COM_VIRTUEMART_CART_QUANTITY'). '/' .JText::_('COM_VIRTUEMART_CART_ACTION')."'; }
			.cart-p-list td:nth-of-type(5):before { content: '".JText::_('COM_VIRTUEMART_CART_SUBTOTAL_DISCOUNT_AMOUNT')."'; }
			.cart-p-list td:nth-of-type(6):before { content: '".JText::_('COM_VIRTUEMART_CART_TOTAL')."'; }
			.cart-sub-total td:nth-of-type(1):before { content: ''; }
			.cart-sub-total td:nth-of-type(2):before { content: '".JText::_('COM_VIRTUEMART_CART_SUBTOTAL_DISCOUNT_AMOUNT')."'; }
			.cart-sub-total td:nth-of-type(3):before { content: '".JText::_('COM_VIRTUEMART_CART_TOTAL')."'; }
			.tax-per-bill td:nth-of-type(1):before { content: ''; }
			.tax-per-bill td:nth-of-type(2):before { content: '".JText::_('COM_VIRTUEMART_CART_TOTAL')."'; }	
			.grand-total td:nth-of-type(1):before { content: ''; }
			.grand-total td:nth-of-type(2):before { content: '".JText::_('COM_VIRTUEMART_CART_SUBTOTAL_DISCOUNT_AMOUNT')."'; }
			.grand-total td:nth-of-type(3):before { content: '".JText::_('COM_VIRTUEMART_CART_TOTAL')."'; }			
			.grand-total-p-currency td:nth-of-type(1):before { content: ''; }
			.grand-total-p-currency td:nth-of-type(2):before { content: '".JText::_('COM_VIRTUEMART_CART_TOTAL')."'; }						
		}	
	");
	if (!empty($this->cart->cartData['couponCode'])) {	
		$document->addStyleDeclaration("
			@media (max-width: 767px) {
				.cart-coupon-row td:nth-of-type(1):before { content: ''; }
				.cart-coupon-row td:nth-of-type(2):before { content: '".JText::_('COM_VIRTUEMART_CART_TOTAL')."'; }
			}	
		");
	} else {
		$document->addStyleDeclaration("
			@media (max-width: 767px) {
				.cart-coupon-row td:nth-of-type(1):before { content: ''; }
				.cart-coupon-row td:nth-of-type(2) { display:none; }
				.cart-coupon-row td:nth-of-type(3) { display:none; }
			}	
		");
	}
	if(!empty($this->cart->pricesUnformatted['salesPriceShipment'])) {
		$document->addStyleDeclaration("
			@media (max-width: 767px) {
				.shipping-row td:nth-of-type(1):before { content: ''; }
				.shipping-row td:nth-of-type(2):before { content: '".JText::_('COM_VIRTUEMART_CART_TOTAL')."'; }
			}	
		");	
	} else {
		$document->addStyleDeclaration("
			@media (max-width: 767px) {
				.shipping-row td:nth-of-type(1):before { content: ''; }
				.shipping-row td:nth-of-type(2) { display:none; }
				.shipping-row td:nth-of-type(3) { display:none; }
			}	
		");
	}
	
	if(!empty($this->cart->pricesUnformatted['salesPricePaymentt'])) {
		$document->addStyleDeclaration("
			@media (max-width: 767px) {
				.payment-row td:nth-of-type(1):before { content: ''; }
				.payment-row td:nth-of-type(2):before { content: '".JText::_('COM_VIRTUEMART_CART_TOTAL')."'; }
			}	
		");	
	} else {
		$document->addStyleDeclaration("
			@media (max-width: 767px) {
				.payment-row td:nth-of-type(1):before { content: ''; }
				.payment-row td:nth-of-type(2) { display:none; }
				.payment-row td:nth-of-type(3) { display:none; }
			}	
		");
	}	
}

?>
<section class="billto-shipto row-fluid">
	<div class="vm-billto span6">
		<div class="billto-shipto-header">
			<?php echo JText::_('COM_VIRTUEMART_USER_FORM_BILLTO_LBL'); ?>
		</div>
		<div class="output-billto">
		<?php
		foreach($this->cart->BTaddress['fields'] as $item){
			if(!empty($item['value'])){
				if($item['name']==='agreed'){
					$item['value'] =  ($item['value']===0) ? JText::_('COM_VIRTUEMART_USER_FORM_BILLTO_TOS_NO'):JText::_('COM_VIRTUEMART_USER_FORM_BILLTO_TOS_YES');
				}
				?><!-- span class="titles"><?php echo $item['title'] ?></span -->
				<span class="values vm2<?php echo '-'.$item['name'] ?>" ><?php echo $this->escape($item['value']) ?></span>
				<?php if ($item['name'] != 'title' and $item['name'] != 'first_name' and $item['name'] != 'middle_name' and $item['name'] != 'zip') { ?>
				<br class="clear" />
				<?php
				}
			}
		} ?>
		</div>
		<a class="details btn" href="<?php echo JRoute::_('index.php?option=com_virtuemart&view=user&task=editaddresscart&addrtype=BT',$this->useXHTML,$this->useSSL) ?>">
			<i class="icon-edit"></i><?php echo JText::_('COM_VIRTUEMART_USER_FORM_EDIT_BILLTO_LBL'); ?>
		</a>
		<input type="hidden" name="billto" value="<?php echo $this->cart->lists['billTo']; ?>"/>
	</div>

	<div class="vm-shipto span6">
		<div class="billto-shipto-header">
			<?php echo JText::_('COM_VIRTUEMART_USER_FORM_SHIPTO_LBL'); ?>
		</div>
		<div class="output-shipto">
		<?php
		if(empty($this->cart->STaddress['fields'])){
			echo JText::sprintf('COM_VIRTUEMART_USER_FORM_EDIT_BILLTO_EXPLAIN',JText::_('COM_VIRTUEMART_USER_FORM_ADD_SHIPTO_LBL') );
		} else {
			if(!class_exists('VmHtml'))require(JPATH_VM_ADMINISTRATOR.DS.'helpers'.DS.'html.php');
			echo JText::_('COM_VIRTUEMART_USER_FORM_ST_SAME_AS_BT');
			echo VmHtml::checkbox('STsameAsBT',$this->cart->STsameAsBT).'<br />';
			foreach($this->cart->STaddress['fields'] as $item){
				if(!empty($item['value'])){ ?>
					<!-- <span class="titles"><?php echo $item['title'] ?></span> -->
					<?php
					if ($item['name'] == 'first_name' || $item['name'] == 'middle_name' || $item['name'] == 'zip') { ?>
						<span class="values<?php echo '-'.$item['name'] ?>" ><?php echo $this->escape($item['value']) ?></span>
					<?php } else { ?>
						<span class="values" ><?php echo $this->escape($item['value']) ?></span>
						<br class="clear" />
					<?php
					}
				}
			}
		}
 		?>		
		</div>
		<?php if(!isset($this->cart->lists['current_id'])) $this->cart->lists['current_id'] = 0; ?>
		<a class="details btn" href="<?php echo JRoute::_('index.php?option=com_virtuemart&view=user&task=editaddresscart&addrtype=ST&virtuemart_user_id[]='.$this->cart->lists['current_id'],$this->useXHTML,$this->useSSL) ?>">
			<i class="icon-edit"></i><?php echo JText::_('COM_VIRTUEMART_USER_FORM_ADD_SHIPTO_LBL'); ?>
		</a>
	</div>
</section>
<fieldset>
	<table class="cart-summary table table-striped table-hover" >		
		<thead>
			<tr>
				<th class="col-name" align="left"><?php echo JText::_('COM_VIRTUEMART_CART_NAME') ?></th>
				<th class="col-sku" align="left"><?php echo JText::_('COM_VIRTUEMART_CART_SKU') ?></th>
				<th class="col-price" align="center"><?php echo JText::_('COM_VIRTUEMART_CART_PRICE') ?></th>
				<th class="col-qty" align="right"><?php echo JText::_('COM_VIRTUEMART_CART_QUANTITY') ?> / <?php echo JText::_('COM_VIRTUEMART_CART_ACTION') ?></th>
				<?php if ( VmConfig::get('show_tax')) { ?>
	      <th class="col-tax" align="right"><?php  echo JText::_('COM_VIRTUEMART_CART_SUBTOTAL_TAX_AMOUNT') ?></th>
				<?php } ?>
				<th class="col-discount" align="right"><?php echo JText::_('COM_VIRTUEMART_CART_SUBTOTAL_DISCOUNT_AMOUNT') ?></th>
				<th class="col-total" align="right"><?php echo JText::_('COM_VIRTUEMART_CART_TOTAL') ?></th>
			</tr>
		</thead>
		<tbody>
		<?php
		$i=1;
		foreach( $this->cart->products as $pkey =>$prow ) { ?>
			<tr valign="top" class="sectiontableentry<?php echo $i ?> cart-p-list">
				<td class="col-name" align="left" >
					<?php if ( $prow->virtuemart_media_id) {  ?>
						<div class="row-fluid">
							<div class="span4 cart-images">
								<?php if(!empty($prow->image)) echo $prow->image->displayMediaThumb('',false); ?>
							</div>
							<div class="span8">
								<?php echo JHTML::link($prow->url, $prow->product_name).$prow->customfields; ?>
							</div>
						</div>
					<?php } else { 
						echo JHTML::link($prow->url, $prow->product_name).$prow->customfields; 
					}?>
				</td>
				<td class="col-sku" align="left" ><?php  echo $prow->product_sku ?></td>
				<td class="col-price" align="center" >
					<?php echo $this->currencyDisplay->createPriceDiv('basePriceVariant','', $this->cart->pricesUnformatted[$pkey],false);?>
				</td>
				<td class="col-qty cart-p-qty" align="right" >
					<form action="<?php echo JRoute::_('index.php'); ?>" method="post" class="inline">
						<div class="input-append">
							<input type="hidden" name="option" value="com_virtuemart" />
							<input type="text" title="<?php echo  JText::_('COM_VIRTUEMART_CART_UPDATE') ?>" class="inputbox input-ultra-mini" size="3" maxlength="4" name="quantity" value="<?php echo $prow->quantity ?>" />
							<input type="hidden" name="view" value="cart" />
							<input type="hidden" name="task" value="update" />
							<input type="hidden" name="cart_virtuemart_product_id" value="<?php echo $prow->cart_item_id  ?>" />
							<button type="submit" class="vmicon vm2-add_quantity_cart btn" name="update" title="<?php echo  JText::_('COM_VIRTUEMART_CART_UPDATE') ?>" ><i class="icon-refresh"></i></button>
						</div>
				  </form>
					<a class="vmicon vm2-remove_from_cart btn" title="<?php echo JText::_('COM_VIRTUEMART_CART_DELETE') ?>" align="middle" href="<?php echo JRoute::_('index.php?option=com_virtuemart&view=cart&task=delete&cart_virtuemart_product_id='.$prow->cart_item_id  ) ?>"><i class="icon-trash"></i></a>
				</td>
				<?php if ( VmConfig::get('show_tax')) { ?>
				<td class="col-tax" align="right">
					<?php echo "<span class='priceColor2'>".$this->currencyDisplay->createPriceDiv('taxAmount','', $this->cart->pricesUnformatted[$pkey],false,false,$prow->quantity)."</span>" ?>
				</td>
        <?php } ?>
				<td class="col-discount" align="right">
					<?php echo "<span class='priceColor2'>".$this->currencyDisplay->createPriceDiv('discountAmount','', $this->cart->pricesUnformatted[$pkey],false,false,$prow->quantity)."</span>" ?>
				</td>
				<td class="col-total" colspan="1" align="right">
				<?php
				if (VmConfig::get('checkout_show_origprice',1) && !empty($this->cart->pricesUnformatted[$pkey]['basePriceWithTax']) && $this->cart->pricesUnformatted[$pkey]['basePriceWithTax'] != $this->cart->pricesUnformatted[$pkey]['salesPrice'] ) {
					echo '<span class="line-through">'.$this->currencyDisplay->createPriceDiv('basePriceWithTax','', $this->cart->pricesUnformatted[$pkey],true,false,$prow->quantity) .'</span><br />' ;
				}
				echo $this->currencyDisplay->createPriceDiv('salesPrice','', $this->cart->pricesUnformatted[$pkey],false,false,$prow->quantity) ?>
				</td>
			</tr>
		<?php
			$i = 1 ? 2 : 1;
		} ?>
		
		<!--Begin of SubTotal, Tax, Shipment, Coupon Discount and Total listing -->
    <?php if ( VmConfig::get('show_tax')) { $colspan=3; } else { $colspan=2; } ?>
		<tr class="blank-row">
			<td colspan="4">&nbsp;</td>
			<td colspan="<?php echo $colspan ?>"></td>
		</tr>
		<tr class="cart-sub-total">
			<td class="sub-headings" colspan="4" align="right"><?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_PRODUCT_PRICES_TOTAL'); ?></td>
			<?php if ( VmConfig::get('show_tax')) { ?>
			<td class="col-tax" align="right"><?php echo $this->currencyDisplay->createPriceDiv('taxAmount','', $this->cart->pricesUnformatted,false)?></td>
			<?php } ?>
			<td class="col-discount" align="right"><?php echo $this->currencyDisplay->createPriceDiv('discountAmount','', $this->cart->pricesUnformatted,false) ?></td>
			<td class="col-total" align="right"><?php echo $this->currencyDisplay->createPriceDiv('salesPrice','', $this->cart->pricesUnformatted,false) ?></td>
		</tr>
		<?php if (VmConfig::get('coupons_enable')) { ?>
			<tr class="cart-coupon-row">
				<td class="coupon-form-col" colspan="4" align="left">
					<?php if(!empty($this->layoutName) && $this->layoutName=='default') {
					    echo $this->loadTemplate('coupon');
				    } ?>
					<?php if (!empty($this->cart->cartData['couponCode'])) { 		
						echo '<span>';			 
						echo $this->cart->cartData['couponCode'] ;
						echo $this->cart->cartData['couponDescr'] ? (' (' . $this->cart->cartData['couponDescr'] . ')' ): '';
						echo '</span>';	
					} ?>
				</td>
				<?php if (!empty($this->cart->cartData['couponCode'])) {
					if ( VmConfig::get('show_tax')) { ?>
						<td class="col-tax" align="right">
							
						</td>
					<?php } ?>
						<td colspan="2" class="col-total" align="right">
							<?php echo $this->currencyDisplay->createPriceDiv('salesPriceCoupon','', $this->cart->pricesUnformatted['salesPriceCoupon'],false); ?> 
						</td>
					<?php } else { ?>
						<td colspan="6" align="left">&nbsp;</td>
					<?php }	?>
			</tr>
		<?php } ?>
		<?php
		foreach($this->cart->cartData['DBTaxRulesBill'] as $rule){ ?>
			<tr class="sectiontableentry<?php echo $i ?> tax-per-bill">
				<td class="sub-headings" colspan="4" align="right"><?php echo $rule['calc_name'] ?> </td>
				<?php if ( VmConfig::get('show_tax')) { ?>
				<td class="col-tax" align="right"><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'].'Diff','', $this->cart->pricesUnformatted[$rule['virtuemart_calc_id'].'Diff'],false); ?></td>				
				<?php } ?>
				<td colspan="2" class="col-total" align="right"><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'].'Diff','', $this->cart->pricesUnformatted[$rule['virtuemart_calc_id'].'Diff'],false); ?> </td>
			</tr>
			<?php
			if($i) $i=1; else $i=0;
		} 
		
		foreach($this->cart->cartData['taxRulesBill'] as $rule){ ?>
			<tr class="sectiontableentry<?php echo $i ?> tax-per-bill">
				<td class="sub-headings" colspan="4" align="right"><?php echo $rule['calc_name'] ?> </td>
				<?php if ( VmConfig::get('show_tax')) { ?>
				<td class="col-tax" align="right"><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'].'Diff','', $this->cart->pricesUnformatted[$rule['virtuemart_calc_id'].'Diff'],false); ?> </td>
				 <?php } ?>
				<td colspan="2" class="col-total" align="right"><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'].'Diff','', $this->cart->pricesUnformatted[$rule['virtuemart_calc_id'].'Diff'],false); ?> </td>
			</tr>
			<?php
			if($i) $i=1; else $i=0;
		}

		foreach($this->cart->cartData['DATaxRulesBill'] as $rule){ ?>
			<tr class="sectiontableentry<?php echo $i ?> tax-per-bill">
				<td class="sub-headings" colspan="4" align="right"><?php echo   $rule['calc_name'] ?> </td>
				<?php if ( VmConfig::get('show_tax')) { ?>
				<td class="col-tax" align="right"><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'].'Diff','', $this->cart->pricesUnformatted[$rule['virtuemart_calc_id'].'Diff'],false); ?>  </td>		
				<?php } ?>		
				<td colspan="2" class="col-total" align="right"><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'].'Diff','', $this->cart->pricesUnformatted[$rule['virtuemart_calc_id'].'Diff'],false); ?> </td>
			</tr>
			<?php
			if($i) $i=1; else $i=0;
		} ?>

			<tr class="sectiontableentry1 shipping-row">
      	<?php if (!$this->cart->automaticSelectedShipment) { ?>
				<td class="shipping-payment-heading" colspan="4" align="left">
					<?php echo $this->cart->cartData['shipmentName']; ?>
					<br />
					<?php if(!empty($this->layoutName) && $this->layoutName=='default' && !$this->cart->automaticSelectedShipment  )
						echo JHTML::_('link', JRoute::_('index.php?view=cart&task=edit_shipment',$this->useXHTML,$this->useSSL), $this->select_shipment_text,'class=""');
					else {
				    echo JText::_('COM_VIRTUEMART_CART_SHIPPING');
					} ?>
				</td>
				<?php } else { ?>
        <td class="shipping-payment-heading" colspan="4" align="left">
					<?php echo $this->cart->cartData['shipmentName']; ?>
				</td>
        <?php } ?>
				<?php if(!empty($this->cart->pricesUnformatted['salesPriceShipment'])) {
					if ( VmConfig::get('show_tax')) { ?>
					<td class="col-tax" align="right">
						<?php echo $this->currencyDisplay->createPriceDiv('shipmentTax','', $this->cart->pricesUnformatted['shipmentTax'],false); ?>
					</td>
					<?php } ?>
					<td class="col-total" colspan="2" align="right">
						<?php echo $this->currencyDisplay->createPriceDiv('salesPriceShipment','', $this->cart->pricesUnformatted['salesPriceShipment'],false); ?> 
					</td>
				<?php } else { ?>
					<td colspan="3"></td>
				<?php } ?>
			</tr>
			
			<tr class="sectiontableentry1 payment-row">
			<?php if (!$this->cart->automaticSelectedPayment) { ?>
				<td class="shipping-payment-heading" colspan="4" align="left">
					<?php echo $this->cart->cartData['paymentName']; ?>
					<br />
					<?php if(!empty($this->layoutName) && $this->layoutName=='default') echo JHTML::_('link', JRoute::_('index.php?view=cart&task=editpayment',$this->useXHTML,$this->useSSL), $this->select_payment_text,'class=""'); else JText::_('COM_VIRTUEMART_CART_PAYMENT'); ?> 
				</td>
				<?php } else { ?>
					<td class="shipping-payment-heading" colspan="4" align="left"><?php echo $this->cart->cartData['paymentName']; ?> </td>
				<?php } ?>
				<?php if(!empty($this->cart->pricesUnformatted['salesPricePayment'])) {
					if ( VmConfig::get('show_tax')) { ?>
						<td class="col-tax" align="right"><?php echo $this->currencyDisplay->createPriceDiv('paymentTax','', $this->cart->pricesUnformatted['paymentTax'],false) ?> </td>
					<?php } ?>
					<td class="col-total" colspan="2" align="right"><?php  echo $this->currencyDisplay->createPriceDiv('salesPricePayment','', $this->cart->pricesUnformatted['salesPricePayment'],false); ?> </td>
				<?php } else { ?>
					<td colspan="3"></td>
				<?php } ?>
			</tr>
			
		  <tr class="blank-row">
				<td colspan="4">&nbsp;</td>
				<td colspan="<?php echo $colspan ?>"></td>
		  </tr>
			
		  <tr class="sectiontableentry2 grand-total">
				<td class="sub-headings" colspan="4" align="right"><?php echo JText::_('COM_VIRTUEMART_CART_TOTAL') ?>: </td>
				<?php if ( VmConfig::get('show_tax')) { ?>
					<td class="col-tax" align="right"> <?php echo $this->currencyDisplay->createPriceDiv('billTaxAmount','', $this->cart->pricesUnformatted['billTaxAmount'],false) ?> </td>
				<?php } ?>
				<td class="col-discount" align="right"> <?php echo $this->currencyDisplay->createPriceDiv('billDiscountAmount','', $this->cart->pricesUnformatted['billDiscountAmount'],false) ?> </td>
				<td class="col-total" align="right"><?php echo $this->currencyDisplay->createPriceDiv('billTotal','', $this->cart->pricesUnformatted['billTotal'],false); ?></td>
			</tr>
			
			<?php if ( $this->totalInPaymentCurrency) { ?>
			<tr class="sectiontableentry2 grand-total-p-currency">
				<td class="sub-headings" colspan="4" align="right"><?php echo JText::_('COM_VIRTUEMART_CART_TOTAL_PAYMENT') ?>: </td>
				<td class="col-total" <?php if ( VmConfig::get('show_tax')) { echo 'colspan="3"'; } else { echo 'colspan="2"'; } ?> align="right"><span class="PricesalesPrice"><?php echo $this->totalInPaymentCurrency; ?></span></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</fieldset>
