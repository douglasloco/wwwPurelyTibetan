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
JHTML::_( 'behavior.modal' );
$templateparams	= $app->getTemplate(true)->params;
$col = 1;
$cellwidth = ' span' . floor (12 / $products_per_row);
?>
<div class="vm-product-module<?php echo $params->get ('moduleclass_sfx') ?>">
	<?php if ($headerText) { ?>
	<div class="vm-product-module-header"><?php echo $headerText ?></div>
	<?php
	}
	if ($display_style == "div") { ?>
	<div class="vm-product-module <?php echo $params->get ('moduleclass_sfx'); ?> product-listing">
		<?php foreach ($products as $product) { 
			if ($col == 1) { ?>
			<div class="row-fluid">
			<?php }
			$db = JFactory::getDBO();
			$mid = $product->virtuemart_manufacturer_id;
			$query = "SELECT virtuemart_media_id FROM #__virtuemart_manufacturer_medias WHERE virtuemart_manufacturer_id = '$mid' ;";
			$db->setQuery($query);
			if ($db->loadResultArray()== NULL) {
				$file_url_thumb = '';
				$manThumbImage = $product->mf_name;
			} else {
				$column= $db->loadResultArray();
				$mediaid = $column[0];
				$query = "SELECT file_url_thumb FROM #__virtuemart_medias WHERE virtuemart_media_id = '$mediaid' ;";
				$db->setQuery($query);
				$column= $db->loadResultArray();
				$file_url_thumb = $column[0];

				$alt= $product->mf_name;
				$manThumbImageUrl = JURI::root().$file_url_thumb; 
				$manThumbImage = "<img src=\"$manThumbImageUrl\" alt=\"$alt\" class='man-thumb-image' />";
			}				
			?>
			<div class="product product-hover<?php echo $cellwidth ?>">			
			
				<div class="quick-view-cont">
					<?php if($templateparams->get('enable_quicklook')==1) { ?>
					<div class="visible-desktop">				
						<a class="modal btn btn-inverse" rel="{handler: 'iframe', size: {x: 890, y: 550}}" href="<?php echo JRoute::_ ( 'index.php?option=com_virtuemart&view=productdetails&prolayout=promart:quickview&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id .'&tmpl=quickview')?>"><?php echo JText::_ ( 'TPL_PROMART_VIRTUEMART_QUICK_LOOK' )?></a>
					</div>
					<?php } ?>
				</div>
				<article class="spacer hproduct">
					<?php if($templateparams->get('show_manufacturer')==1) { ?>
					<div class="manufacturer-logo-cont-product-list">
						<?php echo $manThumbImage;?>
					</div>
					<?php } ?>
					<div class="image-cont">
					<?php // Product Image
					if ($product->images) {
						echo JHTML::link ( JRoute::_ ( 'index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id ), $product->images[0]->displayMediaThumb( 'class="featuredProductImage" border="0"',false ) );
					}
					?>
					</div>
					<h3 class="cat-product-title">
					<?php // Product Name
					echo JHTML::link ( JRoute::_ ( 'index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id ), $product->product_name, array ('title' => $product->product_name ) ); ?>
					</h3>

					<?php
					if (VmConfig::get ( 'show_prices' ) == '1') {
						if (!empty($product->prices)){
							if (!empty($product->prices['salesPrice'])) { ?>							
							<a href="<?php echo JRoute::_ ( 'index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id )?>" >			
								<div class="product-price price">
									<div class="price-class">
										<?php echo $currency->createPriceDiv ('salesPrice', '', $product->prices, FALSE, FALSE, 1.0, TRUE);; ?>
										<?php 
										$SalesPrice = number_format((float)$product->prices['salesPrice'], 2, '.', '');
										$BasePrice = number_format((float)$product->prices['basePriceWithTax'], 2, '.', '');
										if ($SalesPrice !== $BasePrice and $product->prices['discountAmount'] > 0) { ?>
										<span class="price-before-dicount">
											<?php echo $currency->createPriceDiv( 'basePriceWithTax', '', $product->prices ); ?>
										</span>
										<?php } ?>
										<div class="product-discount">
										<?php 										
										$SalesPrice = number_format((float)$product->prices['salesPrice'], 2, '.', '');
										$BasePrice = number_format((float)$product->prices['basePriceWithTax'], 2, '.', '');
										if ($SalesPrice !== $BasePrice and $product->prices['discountAmount'] > 0) {
											if($templateparams->get('discount')==1) {
												$DiscountAmount = $product->prices['discountAmount'];
												$ActualPrice = $product->prices['priceWithoutTax'] + $product->prices['discountAmount'];
												$Discount = $DiscountAmount / $ActualPrice * 100;
												$Discount = number_format((float)$Discount, 2, '.', '').'%';
												echo '('.JText::_('COM_VIRTUEMART_CART_SUBTOTAL_DISCOUNT_AMOUNT').': '; echo $Discount.')';
											} if($templateparams->get('discount')==2) {
												$DiscountAmount = $product->prices['discountAmount'];
												$ActualPrice = $product->prices['salesPrice'] + $product->prices['discountAmount'];
												$Discount = $DiscountAmount / $ActualPrice * 100;
												$Discount = number_format((float)$Discount, 2, '.', '').'%';
												echo '('.JText::_('COM_VIRTUEMART_CART_SUBTOTAL_DISCOUNT_AMOUNT').': '; echo $Discount.')';
											}					 						 
										} ?>								
										</div>						
									</div>
								</div>
							</a>
							<?php } 
						}
					} ?>
				</article>		
			</div>
		<?php	if ($col == $products_per_row) { ?>
		<div class="clear"></div>
		</div>
			<?php
			$col = 1;
				} else {
			$col ++;
			}		
 	} 
	if ($col != 1) { ?>
		<div class="clear"></div>
		</div>
	<?php } ?>
	</div>
	
<?php } else { ?>	
	<div class="alert alert-error">
  	<strong>Oh snap!</strong> Promart does not support List based ul>li style Product Listing. Please change the Display style to DIV based in VM Product Module to see the products.	
	</div>
	
<?php
}
	if ($footerText) : ?>
		<div class="vm-product-module-footer<?php echo $params->get ('moduleclass_sfx') ?>">
			<?php echo $footerText ?>
		</div>
		<?php endif; ?>
		
</div>