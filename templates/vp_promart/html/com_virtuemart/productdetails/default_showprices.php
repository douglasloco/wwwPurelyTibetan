<?php defined('_JEXEC') or die('Restricted access');
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.6r
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/
$app = JFactory::getApplication();
$templateparams	= $app->getTemplate(true)->params;
?>
<div class="price-container" id="productPrice<?php echo $this->product->virtuemart_product_id ?>">
	<?php if (empty($this->product->prices['salesPrice']) and VmConfig::get ('askprice', 1) and isset($this->product->images[0]) and !$this->product->images[0]->file_is_downloadable) {?>
		<a class="ask-a-question btn btn-link" href="<?php echo $this->askquestion_url ?>"><?php echo JText::_ ('COM_VIRTUEMART_PRODUCT_ASKPRICE') ?></a>
		<?php
	} else {?>
		<div class="price-pop-up">		
			<div class="price">
				<div class="price-inner">	
					<div class="price-popup-top-arrow"></div>								
		    	<?php 
					if ($this->showBasePrice) {
						echo $this->currency->createPriceDiv('basePrice', 'COM_VIRTUEMART_PRODUCT_BASEPRICE', $this->product->prices);
						echo $this->currency->createPriceDiv('basePriceVariant', 'COM_VIRTUEMART_PRODUCT_BASEPRICE_VARIANT', $this->product->prices);
		    	}
			    echo $this->currency->createPriceDiv('variantModification', 'COM_VIRTUEMART_PRODUCT_VARIANT_MOD', $this->product->prices);
			    echo $this->currency->createPriceDiv('basePriceWithTax', 'COM_VIRTUEMART_PRODUCT_BASEPRICE_WITHTAX', $this->product->prices);
			    echo $this->currency->createPriceDiv('discountedPriceWithoutTax', 'COM_VIRTUEMART_PRODUCT_DISCOUNTED_PRICE', $this->product->prices);
			    echo $this->currency->createPriceDiv('salesPriceWithDiscount', 'COM_VIRTUEMART_PRODUCT_SALESPRICE_WITH_DISCOUNT', $this->product->prices);
			    echo $this->currency->createPriceDiv('salesPrice', 'COM_VIRTUEMART_PRODUCT_SALESPRICE', $this->product->prices);
			    echo $this->currency->createPriceDiv('priceWithoutTax', 'COM_VIRTUEMART_PRODUCT_SALESPRICE_WITHOUT_TAX', $this->product->prices);
			    echo $this->currency->createPriceDiv('discountAmount', 'COM_VIRTUEMART_PRODUCT_DISCOUNT_AMOUNT', $this->product->prices);
			    echo $this->currency->createPriceDiv('taxAmount', 'COM_VIRTUEMART_PRODUCT_TAX_AMOUNT', $this->product->prices);
		    	?>
				</div>
			</div>
		</div>
    <?php
		if (!empty($this->product->prices)){
			if (!empty($this->product->prices['salesPrice'])) { ?>
				<div class="price-class-move">
					<?php echo $this->currency->createPriceDiv('salesPrice', 'COM_VIRTUEMART_PRODUCT_SALESPRICE', $this->product->prices); ?>
					<?php 
					$SalesPrice = number_format((float)$this->product->prices['salesPrice'], 2, '.', '');
					$BasePrice = number_format((float)$this->product->prices['basePriceWithTax'], 2, '.', '');
					if ($SalesPrice !== $BasePrice and $this->product->prices['discountAmount'] > 0) { ?>
					<span class="price-before-dicount">
						<?php echo $this->currency->createPriceDiv( 'basePriceWithTax', '', $this->product->prices ); ?>
					</span>
					<?php } ?>
					<div class="product-discount">
					<?php 
					$SalesPrice = number_format((float)$this->product->prices['salesPrice'], 2, '.', '');
					$BasePrice = number_format((float)$this->product->prices['basePriceWithTax'], 2, '.', '');
					if ($SalesPrice !== $BasePrice and $this->product->prices['discountAmount'] > 0) {
						if($templateparams->get('discount')==1) {
							$DiscountAmount = $this->product->prices['discountAmount'];
							$ActualPrice = $this->product->prices['priceWithoutTax'] + $this->product->prices['discountAmount'];
							$Discount = $DiscountAmount / $ActualPrice * 100;
							$Discount = number_format((float)$Discount, 2, '.', '').'%';
							echo '('.JText::_('COM_VIRTUEMART_CART_SUBTOTAL_DISCOUNT_AMOUNT').': '; echo $Discount.')';
						} if($templateparams->get('discount')==2) {
							$DiscountAmount = $this->product->prices['discountAmount'];
							$ActualPrice = $this->product->prices['salesPrice'] + $this->product->prices['discountAmount'];
							$Discount = $DiscountAmount / $ActualPrice * 100;
							$Discount = number_format((float)$Discount, 2, '.', '').'%';
							echo '('.JText::_('COM_VIRTUEMART_CART_SUBTOTAL_DISCOUNT_AMOUNT').': '; echo $Discount.')';
						} 						 
					} ?>								
					</div>						
				</div>
				<span class="final-price-class-restore final-price"></span>
				<?php if ($this->product->prices['discountAmount'] > 0 ) {?>
				<span class="price-before-dicount-class-restore"></span>
				<div class="product-discount-class-restore"></div>
				<?php }?>
			<?php } 
		}
	}?>
</div>