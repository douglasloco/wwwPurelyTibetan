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

/* Let's see if we found the product */
if (empty($this->product)) {
    echo JText::_('COM_VIRTUEMART_PRODUCT_NOT_FOUND');
    echo '<br /><br />  ' . $this->continue_link_html;
    return;
}

?>
<div id="product-details" class="row-fluid quick-product-info">
	<div class="span6 hidden-phone">
		<?php echo $this->loadTemplate('quickgallery');?>
		<?php echo $this->loadTemplate('rating');?>
		<div class="navigate"></div>	
	</div>
		<div class="span6">
			<div class="row-fluid top-content-area">
				<div class="span12 brief-info">
					<h5 class="sku">
						<?php echo JText::_('COM_VIRTUEMART_CART_SKU') .': '. $this->product->product_sku ?>
					</h5>
					<h1><?php echo $this->product->product_name ?></h1>
		    	<?php echo $this->product->event->afterDisplayTitle ?>
		    	<?php echo $this->edit_link ?>	
					<?php if (!empty($this->product->product_s_desc)) { ?>
					<div class="product-short-text">
			   			<?php echo nl2br($this->product->product_s_desc); ?>
		      </div>
					<?php } ?>					
					<?php if ($this->show_prices and (empty($this->product->images[0]) or $this->product->images[0]->file_is_downloadable == 0)) {
		    		 echo $this->loadTemplate('showprices');		
					} ?>
					<?php if (!VmConfig::get('use_as_catalog', 0) and !empty($this->product->prices)) {
		    		echo $this->loadTemplate('quickaddtocart');
					}?>
					
					<?php 
					echo JHTML::link ( JRoute::_ ( 'index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $this->product->virtuemart_product_id . '&virtuemart_category_id=' . $this->product->virtuemart_category_id ), JText::_ ( 'TPL_PROMART_VIRTUEMART_FULL_PRODUCT_DETAILS' ), array ('title' => $this->product->product_name, 'class' => 'full-product-details-link', 'target' => '_parent' ) );
					?>					
				</div>
			</div>	
	</div>
</div>
<div class="row-fluid quick-bottom-contents">
	<div class="span12">
		<?php echo $this->loadTemplate('availability');?>
		<?php if (!empty($this->product->customfieldsSorted['sidebar'])) { 
			$this->position = 'sidebar';
			echo $this->loadTemplate('quicksidebarcustomfields');
		}?>				
	</div>	
</div>




