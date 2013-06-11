<?php defined ('_JEXEC') or die('Restricted access');
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.5
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
<div class="vm-simple-product-slideshow flexslider carousel visible-desktop <?php echo $params->get ('moduleclass_sfx') ?>">
  <!-- Carousel items -->
  <ul class="slides vp-slideshow-inner <?php echo $params->get ('moduleclass_sfx'); ?>">
		<?php foreach ($products as $product) { ?>
    	<li>	
				<div class="vp-slideshow-product-image">		
					<?php
					if (!empty($product->images[$product_image_number])) {
						$image = $product->images[$product_image_number]->displayMediaFull ('class="featuredProductImage" border="0"', FALSE);
					} else {
						$image = '';
					}
					echo JHTML::_ ('link', JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id), $image, array('title' => $product->product_name));
					?>
				</div>
				<div class="vp-slideshow-product-details">
					<div class="vp-slideshow-product-details-inner">
						<?php					
						$url = JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' .$product->virtuemart_category_id); ?>
						
						<a class="vp-slideshow-product-title" href="<?php echo $url ?>">
							<?php 
							if(strpos($product->product_name,' ') !== false) {
								list($name1, $name2) = explode(' ', $product->product_name, 2);?>						
								<h4><span><?php echo $name1 ?>&nbsp</span><?php echo $name2 ?></h4>
							<?php } else {?>
								<h4><?php echo $product->product_name ?></h4>
							<?php } ?>
						</a>
						<p class="vp-slideshow-product-s-desc">
							<?php echo $product->product_s_desc ?>
						</p>
						<div class="vp-slideshow-product-price">
						<?php
						if ($show_price) {
							// 		echo $currency->priceDisplay($product->prices['salesPrice']);
							if (!empty($product->prices['salesPrice'])) {
								echo $currency->createPriceDiv ('salesPrice', '', $product->prices, FALSE, FALSE, 1.0, TRUE);
							}
							$SalesPrice = number_format((float)$product->prices['salesPrice'], 2, '.', '');
							$BasePrice = number_format((float)$product->prices['basePriceWithTax'], 2, '.', '');
							$DiscountAmount = $product->prices['discountAmount'];
							$ActualPrice = $product->prices['salesPrice'] + $product->prices['discountAmount'];
							if ($ActualPrice > 0) {
								$Discount = $DiscountAmount / $ActualPrice * 100;
							}	else {
								$Discount = 0;
							}						
							$Discount = number_format((float)$Discount, 2, '.', '').'%';
														
							if ($SalesPrice !== $BasePrice and $Discount > 0) {
								echo '<span class="vp-slideshow-before-discount">'.$currency->createPriceDiv( 'basePriceWithTax', '', $product->prices ).'</span>';
							}
							if ($SalesPrice !== $BasePrice and $Discount > 0 and $templateparams->get('discount')) {
								echo '<div class="vp-slideshow-discount-percent">('.JText::_('COM_VIRTUEMART_CART_SUBTOTAL_DISCOUNT_AMOUNT').': '.$Discount.')</div>';
							}						
						}
						?>
						</div>
						<div class="vp-slideshow-details-cont">
							<a class="vp-slideshow-details-button btn btn-inverse" href="<?php echo $url ?>">
								<?php echo JText::_('COM_VIRTUEMART_PRODUCT_DETAILS') ?>
							</a>
						</div>
					</div>
				</div>
			</li>
		<?php } ?>
  </ul>
</div>

<div class="vm-simple-product-slideshow flexslider carousel hidden-desktop <?php echo $params->get ('moduleclass_sfx') ?>">
  <!-- Carousel items -->
  <ul class="slides vp-slideshow-inner <?php echo $params->get ('moduleclass_sfx'); ?>">
		<?php foreach ($products as $product) { ?>
    	<li>	
				<?php					
				$url = JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' .$product->virtuemart_category_id); ?>
				<a class="vp-slideshow-product-title" href="<?php echo $url ?>">
					<?php 
					if(strpos($product->product_name,' ') !== false) {
						list($name1, $name2) = explode(' ', $product->product_name, 2);?>						
						<h4><span><?php echo $name1 ?>&nbsp</span><?php echo $name2 ?></h4>
					<?php } else {?>
						<h4><?php echo $product->product_name ?></h4>
					<?php } ?>
				</a>
				<div class="vp-slideshow-product-image">		
					<?php
					if (!empty($product->images[$product_image_number])) {
						$image = $product->images[$product_image_number]->displayMediaFull ('class="featuredProductImage" border="0"', FALSE);
					} else {
						$image = '';
					}
					echo JHTML::_ ('link', JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id), $image, array('title' => $product->product_name));
					?>
				</div>
				<div class="vp-slideshow-product-details">
					<p class="vp-slideshow-product-s-desc">
						<?php echo $product->product_s_desc ?>
					</p>
				</div>
			</li>
		<?php } ?>
  </ul>
</div>