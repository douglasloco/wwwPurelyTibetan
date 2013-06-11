<?php defined('_JEXEC') or die('Restricted access');
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.5
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/
vmdebug('$this->category '.$this->category->category_name);

$app = JFactory::getApplication();
JHTML::_( 'behavior.modal' );
$templateparams	= $app->getTemplate(true)->params;

$document = JFactory::getDocument();

if (empty($this->keyword) and !empty($this->category->category_description) ) {?>
<div class="category_description">
	<?php echo $this->category->category_description ; ?>
</div>
<?php
}

if ( VmConfig::get('showCategory',1) and empty($this->keyword)) {
	if ($this->category->haschildren) {
		$iCol = 1;
		$iCategory = 1;
		$categories_per_row = VmConfig::get ( 'categories_per_row', 4 );
		$category_cellwidth = ' span'.floor ( 12 / $categories_per_row );
		$verticalseparator = " vertical-separator";
		?>
		<section class="category-view">
		<?php 
		if(!empty($this->category->children)){
		foreach ( $this->category->children as $category ) {
			if ($iCol == 1) { ?>
			<div class="row-fluid sub-categories">
			<?php }
			if ($iCategory == $categories_per_row or $iCategory % $categories_per_row == 0) {
				$show_vertical_separator = ' ';
			} else {
				$show_vertical_separator = $verticalseparator;
			}
			$caturl = JRoute::_ ( 'index.php?option=com_virtuemart&view=category&virtuemart_category_id=' . $category->virtuemart_category_id );?>
		  	<div class="category <?php echo $category_cellwidth . $show_vertical_separator ?>">
					<div class="spacer">	
						<div class="image-cont">	    		
	    		    <a href="<?php echo $caturl ?>" title="<?php echo $category->category_name ?>">
		    			<?php 
		    			if (!empty($category->images)) {
								echo $category->images[0]->displayMediaThumb("", false);
		    			}?>
			    		</a>
						</div>
						<h2 class="cat-product-title">
							<a href="<?php echo $caturl ?>" title="<?php echo $category->category_name ?>">
								<?php echo $category->category_name ?>
							</a>
		    		</h2>
					</div>
  			</div>
			<?php
			$iCategory ++;
		if ($iCol == $categories_per_row) { ?>
		<div class="clear"></div>
		</div>
			<?php
			$iCol = 1;
		} else {
			$iCol ++;
		}
	}
	}
	// Do we need a final closing row tag?
	if ($iCol != 1) { ?>
		<div class="clear"></div>
		</div>
	<?php } ?>
</section>

<?php }
}
?>
<section id="product-list" class="browse-view product-listing">
<?php
if (!empty($this->keyword)) { ?>
	<h3><?php echo $this->keyword; ?></h3>
<?php } 
if ($this->search !==null ) { ?>
	<form action="<?php echo JRoute::_('index.php?option=com_virtuemart&view=category&limitstart=0&virtuemart_category_id='.$this->category->virtuemart_category_id ); ?>" method="get">
    <!--BEGIN Search Box -->
		<div class="virtuemart_search">
	    <?php echo $this->searchcustom ?>
	    <br />
	    <?php echo $this->searchcustomvalues ?>
	    <input name="keyword" class="inputbox" type="text" size="20" value="<?php echo $this->keyword ?>" />
	    <input type="submit" value="<?php echo JText::_('COM_VIRTUEMART_SEARCH') ?>" class="button" onclick="this.form.keyword.focus();"/>
    </div>
    <input type="hidden" name="search" value="true" />
    <input type="hidden" name="view" value="category" />
	</form>
	<!-- End Search Box -->
<?php } 

// Show Products
if (!empty($this->products)) { ?>
	<h1 class="category-page-title"><?php echo $this->category->category_name; ?></h1>
	<div class="product-counter"><?php echo $this->vmPagination->getResultsCounter();?></div>	
	
	<div class="orderby-displaynumber">
		<div class="product-sorting-cont">
			<div class="normal-sort">
				<?php echo $this->orderByList['orderby']; ?>
			</div>
			<div class="manufacturer-sort">
				<?php echo $this->orderByList['manufacturer']; ?>
			</div>
		</div>
	</div> <!-- end of orderby-displaynumber -->
	<div class="product-list-page">
	<?php
	$iBrowseCol = 1;
	$iBrowseProduct = 1;
	$BrowseProducts_per_row = $this->perRow;
	$Browsecellwidth = ' span'.floor ( 12 / $BrowseProducts_per_row );
	$verticalseparator = " vertical-separator";
	$BrowseTotalProducts = 0;
	foreach ( $this->products as $product ) {
	   $BrowseTotalProducts ++;
	}
	foreach ( $this->products as $product ) {
		if ($iBrowseCol == 1) { ?>
		<div class="row-fluid">
		<?php }
		if ($iBrowseProduct == $BrowseProducts_per_row or $iBrowseProduct % $BrowseProducts_per_row == 0) {
			$show_vertical_separator = ' ';
		} else {
			$show_vertical_separator = $verticalseparator;
		}
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
			$manThumbImageUrl = $this->baseurl."/".$file_url_thumb; 
			$manThumbImage = "<img src=\"$manThumbImageUrl\" alt=\"$alt\" class='man-thumb-image' />";
		}	?>
		
			<div class="product product-hover<?php echo $Browsecellwidth . $show_vertical_separator ?>">
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
										<?php echo $this->currency->createPriceDiv('salesPrice', 'COM_VIRTUEMART_PRODUCT_SALESPRICE', $product->prices); ?>
										<?php 
										$SalesPrice = number_format((float)$product->prices['salesPrice'], 2, '.', '');
										$BasePrice = number_format((float)$product->prices['basePriceWithTax'], 2, '.', '');
										if ($SalesPrice !== $BasePrice and $product->prices['discountAmount'] > 0) { ?>
										<span class="price-before-dicount">
											<?php echo $this->currency->createPriceDiv( 'basePriceWithTax', '', $product->prices ); ?>
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
	<?php
   if ($iBrowseCol == $BrowseProducts_per_row || $iBrowseProduct == $BrowseTotalProducts) {?>
   </div> <!-- end of row -->
      <?php
      $iBrowseCol = 1;
   } else {
      $iBrowseCol ++;
   }

   $iBrowseProduct ++;
} // end of foreach ( $this->products as $product )
// Do we need a final closing row tag?
if ($iBrowseCol != 1) { ?>
	<div class="clear"></div>

<?php
}
?>

	<div class="vm-pagination">	
		<div class="pagination span8">
			<?php echo $this->vmPagination->getPagesLinks(); ?>
		</div>	
		<div class="product-list-limit-box span4">			
			<?php echo $this->vmPagination->getLimitBox(); ?>
		</div>
		<div class="clear"></div>
	</div>	
<!-- /div removed valerie -->

<?php } elseif ($this->search !==null ) echo JText::_('COM_VIRTUEMART_NO_RESULT').($this->keyword? ' : ('. $this->keyword. ')' : '')
?>
</section><!-- end browse-view -->