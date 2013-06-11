<?php
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.7
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/
defined('_JEXEC') or die('Restricted access');

if($this->format == 'pdf'){
	$widthTable = '100';
	$widtTitle = '27';
} else {
	$widthTable = '100';
	$widtTitle = '30';
}

?>
<table width="<?php echo $widthTable ?>%" cellspacing="0" cellpadding="0" border="0" class="table table-bordered table-condensed order-item" style="font-size:11px;">
	<tr align="left" class="sectiontableheader">
		<th align="left" width="5%" class="col-sku"><?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_SKU') ?></th>
		<th align="left" colspan="2" width="<?php echo $widtTitle ?>%" class="col-name"><?php echo JText::_('COM_VIRTUEMART_PRODUCT_NAME_TITLE') ?></th>
		<th align="center" width="19%" class="col-sku"><?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_PRODUCT_STATUS') ?></th>
		<th align="right" width="10%" class="col-price"><?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_PRICE') ?></th>
		<th align="right" width="5%" class="col-qty"><?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_QTY') ?></th>
		<?php if ( VmConfig::get('show_tax')) { ?>
		<th align="right" width="10%" class="col-tax"><?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_PRODUCT_TAX') ?></th>
		  <?php } ?>
		<th align="right" width="11%" class="col-discount"><?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_SUBTOTAL_DISCOUNT_AMOUNT') ?></th>
		<th align="right" width="10%" class="col-total"><?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_TOTAL') ?></th>
	</tr>
<?php
	foreach($this->orderdetails['items'] as $item) {
		$qtt = $item->product_quantity ;
		$_link = JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_category_id=' . $item->virtuemart_category_id . '&virtuemart_product_id=' . $item->virtuemart_product_id);
?>
		<tr valign="top">
			<td align="left" class="col-sku">
				<?php echo $item->order_item_sku; ?>
			</td>
			<td align="left" colspan="2" class="col-name">
				<a href="<?php echo $_link; ?>"><?php echo $item->order_item_name; ?></a>
				<?php
// 				vmdebug('tmpl details_item $item',$item);
					if (!empty($item->product_attribute)) {
							if(!class_exists('VirtueMartModelCustomfields'))require(JPATH_VM_ADMINISTRATOR.DS.'models'.DS.'customfields.php');
							$product_attribute = VirtueMartModelCustomfields::CustomsFieldOrderDisplay($item,'FE');
						echo $product_attribute;
					}
				?>
			</td>
			<td align="center" class="col-sku">
				<?php echo $this->orderstatuses[$item->order_status]; ?>
			</td>
			<td align="right" class="priceCol col-price" >
			    <?php echo '<span >'.$this->currency->priceDisplay($item->product_item_price,$this->currency) .'</span><br />'; ?>
			</td>
			<td align="right" class="col-qty">
				<?php echo $qtt; ?>
			</td>
			<?php if ( VmConfig::get('show_tax')) { ?>
				<td align="right" class="priceCol col-tax"><?php echo "<span  class='priceColor2'>".$this->currency->priceDisplay($item->product_tax ,$this->currency, $qtt)."</span>" ?></td>
                                <?php } ?>
			<td align="right" class="priceCol col-discount" >
				<?php echo  $this->currency->priceDisplay( $item->product_subtotal_discount,$this->currency );  //No quantity is already stored with it ?>
			</td>
			<td align="right"  class="priceCol col-total">
				<?php
				$item->product_basePriceWithTax = (float) $item->product_basePriceWithTax;
				$class = '';
				if(!empty($item->product_basePriceWithTax) && $item->product_basePriceWithTax != $item->product_final_price ) {
					echo '<span class="line-through" >'.$this->currency->priceDisplay($item->product_basePriceWithTax,$this->currency,$qtt) .'</span><br />' ;
				}

				echo $this->currency->priceDisplay(  $item->product_subtotal_with_tax ,$this->currency); //No quantity or you must use product_final_price ?>
			</td>
		</tr>

<?php
	}
?>
 <tr class="sectiontableentry1">
			<td colspan="6" align="right" class="col-total"><?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_PRODUCT_PRICES_TOTAL'); ?></td>

                        <?php if ( VmConfig::get('show_tax')) { ?>
			<td align="right" class="col-total"><?php echo "<span  class='priceColor2'>".$this->currency->priceDisplay($this->orderdetails['details']['BT']->order_tax,$this->currency)."</span>" ?></td>
                        <?php } ?>
			<td align="right" class="col-total"><?php echo "<span  class='priceColor2'>".$this->currency->priceDisplay($this->orderdetails['details']['BT']->order_discountAmount,$this->currency)."</span>" ?></td>
			<td align="right" class="col-total"><?php echo $this->currency->priceDisplay($this->orderdetails['details']['BT']->order_salesPrice,$this->currency) ?></td>
		  </tr>
<?php
if ($this->orderdetails['details']['BT']->coupon_discount <> 0.00) {
    $coupon_code=$this->orderdetails['details']['BT']->coupon_code?' ('.$this->orderdetails['details']['BT']->coupon_code.')':'';
	?>
	<tr>
		<td align="right" class="pricePad col-total" colspan="5"><?php echo JText::_('COM_VIRTUEMART_COUPON_DISCOUNT').$coupon_code ?></td>
			<td align="right">&nbsp;</td>

			<?php if ( VmConfig::get('show_tax')) { ?>
				<td align="right" class="col-total">&nbsp;</td>
                                <?php } ?>
		<td align="right" class="col-total"><?php echo '- '.$this->currency->priceDisplay($this->orderdetails['details']['BT']->coupon_discount,$this->currency); ?></td>
		<td align="right" class="col-total">&nbsp;</td>
	</tr>
<?php  } ?>


	<?php
		foreach($this->orderdetails['calc_rules'] as $rule){
			if ($rule->calc_kind== 'DBTaxRulesBill') { ?>
			<tr >
				<td colspan="6"  align="right" class="pricePad col-total"><?php echo $rule->calc_rule_name ?> </td>

                                   <?php if ( VmConfig::get('show_tax')) { ?>
				<td align="right" class="col-total"> </td>
                                <?php } ?>
				<td align="right" class="col-total"> <?php echo  $this->currency->priceDisplay($rule->calc_amount,$this->currency);  ?></td>
				<td align="right" class="col-total"><?php echo  $this->currency->priceDisplay($rule->calc_amount,$this->currency);  ?> </td>
			</tr>
			<?php
			} elseif ($rule->calc_kind == 'taxRulesBill') { ?>
			<tr >
				<td colspan="6"  align="right" class="pricePad col-total"><?php echo $rule->calc_rule_name ?> </td>
				<?php if ( VmConfig::get('show_tax')) { ?>
				<td align="right" class="col-total"><?php echo $this->currency->priceDisplay($rule->calc_amount,$this->currency); ?> </td>
				 <?php } ?>
				<td align="right" class="col-total"><?php    ?> </td>
				<td align="right" class="col-total"><?php echo $this->currency->priceDisplay($rule->calc_amount,$this->currency);   ?> </td>
			</tr>
			<?php
			 } elseif ($rule->calc_kind == 'DATaxRulesBill') { ?>
			<tr >
				<td colspan="6"   align="right" class="pricePad"><?php echo $rule->calc_rule_name ?> </td>
				<?php if ( VmConfig::get('show_tax')) { ?>
				<td align="right" class="col-total"> </td>
				 <?php } ?>
				<td align="right" class="col-total"><?php  echo   $this->currency->priceDisplay($rule->calc_amount,$this->currency);  ?> </td>
				<td align="right" class="col-total"><?php echo $this->currency->priceDisplay($rule->calc_amount,$this->currency);  ?> </td>
			</tr>

			<?php
			 }

		}
		?>


	<tr>
		<td align="right" class="pricePad col-total" colspan="6"><?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_SHIPPING') ?></td>
			<?php if ( VmConfig::get('show_tax')) { ?>
				<td align="right" class="col-total"><?php echo "<span  class='priceColor2'>".$this->currency->priceDisplay($this->orderdetails['details']['BT']->order_shipment_tax,$this->currency)."</span>" ?></td>
                                <?php } ?>
				<td align="right" class="col-total">&nbsp;</td>
				<td align="right" class="col-total"><?php echo $this->currency->priceDisplay($this->orderdetails['details']['BT']->order_shipment+ $this->orderdetails['details']['BT']->order_shipment_tax,$this->currency); ?></td>

	</tr>

<tr>
		<td align="right" class="pricePad col-total" colspan="6"><?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_PAYMENT') ?></td>

			<?php if ( VmConfig::get('show_tax')) { ?>
				<td align="right" class="col-total"><?php echo "<span  class='priceColor2'>".$this->currency->priceDisplay($this->orderdetails['details']['BT']->order_payment_tax,$this->currency)."</span>" ?></td>
                                <?php } ?>
				<td align="right" class="col-total">&nbsp;</td>
				<td align="right" class="col-total"><?php echo $this->currency->priceDisplay($this->orderdetails['details']['BT']->order_payment+ $this->orderdetails['details']['BT']->order_payment_tax,$this->currency); ?></td>


	</tr>

	<tr>
		<td align="right" class="pricePad col-total" colspan="6"><strong><?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_TOTAL') ?></strong></td>

		 <?php if ( VmConfig::get('show_tax')) {  ?>
		<td align="right" class="col-total"><span  class='priceColor2'><?php echo $this->currency->priceDisplay($this->orderdetails['details']['BT']->order_billTaxAmount,$this->currency); ?></span></td>
		 <?php } ?>
		<td align="right" class="col-total"><span  class='priceColor2'><?php echo $this->currency->priceDisplay($this->orderdetails['details']['BT']->order_billDiscountAmount,$this->currency); ?></span></td>
		<td align="right" class="col-total"><strong><?php echo $this->currency->priceDisplay($this->orderdetails['details']['BT']->order_total,$this->currency); ?></strong></td>
	</tr>

</table>
