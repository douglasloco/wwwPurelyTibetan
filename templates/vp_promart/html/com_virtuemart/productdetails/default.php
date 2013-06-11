<?php defined('_JEXEC') or die('Restricted access');
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.7
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/
$get=JRequest::get('get');
if (array_key_exists ( 'prolayout' , $get )) {
	$arr_layout=preg_split("/:/",$get['prolayout']); 
	$templateName=$arr_layout[0];
	$layoutName=$arr_layout[1];
	$layoutPath=JPATH_BASE."/templates/vp_promart/html/com_virtuemart/productdetails/".$layoutName.".php";
	if ("default"!=$layoutName AND file_exists($layoutPath)) 
		require $layoutPath;
} else {
$app = JFactory::getApplication();
$templateparams	= $app->getTemplate(true)->params;
JHTML::_('behavior.modal');
$url = JRoute::_('index.php?option=com_virtuemart&view=productdetails&task=askquestion&virtuemart_product_id=' . $this->product->virtuemart_product_id . '&virtuemart_category_id=' . $this->product->virtuemart_category_id . '&tmpl=modal');
$document = JFactory::getDocument();
$document->addScriptDeclaration("
	jQuery(document).ready(function($) {
		$('a.ask-a-question').click( function(){
			$.facebox({
				iframe: '" . $url . "',
				rev: 'iframe|550|550'
			});
			return false ;
		});
	/*	$('.additional-images a').mouseover(function() {
			var himg = this.href ;
			var extension=himg.substring(himg.lastIndexOf('.')+1);
			if (extension =='png' || extension =='jpg' || extension =='gif') {
				$('.main-image img').attr('src',himg );
			}
			console.log(extension)
		});*/
	});
");
/* Let's see if we found the product */
if (empty($this->product)) {
    echo JText::_('COM_VIRTUEMART_PRODUCT_NOT_FOUND');
    echo '<br /><br />  ' . $this->continue_link_html;
    return;
}
?>
<section id="product-details-page">
	<article id="product-details" class="hproduct row-fluid">
		<div class="span5 hidden-phone">
			<?php echo $this->loadTemplate('gallery');?>
			<?php echo $this->loadTemplate('rating');?>
			<div class="navigate">		
				<?php echo $this->loadTemplate('navigation');?>
				<?php echo $this->loadTemplate('categoryback');?>
				<?php echo $this->loadTemplate('askquestion');?>
				<?php if($templateparams->get('social-buttons')==1) { ?>
				<div class="social-button-container">
					<!-- AddThis Button BEGIN -->
					<span class="addthis_toolbox addthis_default_style addthis_32x32_style">
					<a class="addthis_button_preferred_1"></a>
					<a class="addthis_button_preferred_2"></a>
					<a class="addthis_button_preferred_3"></a>
					<a class="addthis_button_preferred_4"></a>
					<a class="addthis_button_compact"></a>
					<a class="addthis_counter addthis_bubble_style" ></a>
					</span>
					<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-51248e2f36739f60"></script>
					<!-- AddThis Button END -->
				</div>
				<?php } ?>
				<?php if (is_array($this->productDisplayShipments)) {
		    	foreach ($this->productDisplayShipments as $productDisplayShipment) {
						echo $productDisplayShipment . '<br />';
		    	}
				}
				if (is_array($this->productDisplayPayments)) {
		    	foreach ($this->productDisplayPayments as $productDisplayPayment) {
						echo $productDisplayPayment . '<br />';
		    	}
				}
				if (!empty($this->product->customfieldsSorted['ontop'])) { 
					$this->position = 'ontop';
					echo $this->loadTemplate('customfields');
				} ?>
			</div>	
		</div>
		<div class="span7">
			<div class="row-fluid top-content-area">
				<div class="span8 brief-info">
					<h5 class="sku">
						<?php echo JText::_('COM_VIRTUEMART_CART_SKU') .': '. $this->product->product_sku ?>
					</h5>
					<header>
						<h1><?php echo $this->product->product_name ?></h1>
		    		<?php echo $this->product->event->afterDisplayTitle ?>
		    		<?php echo $this->edit_link ?>	
					</header>	
					<div class="row-fluid visible-phone">
					<?php echo $this->loadTemplate('images');	?>
					<?php echo $this->loadTemplate('rating');?>
					</div>					
					<?php if ($this->show_prices and (empty($this->product->images[0]) or $this->product->images[0]->file_is_downloadable == 0)) {
		    		 echo $this->loadTemplate('showprices');		
					} ?>
					<?php if (!VmConfig::get('use_as_catalog', 0) and !empty($this->product->prices)) {
		    		echo $this->loadTemplate('addtocart');
					}?>
					
				</div>
				
				<div class="span4">
					<aside class="product-side-bar">
						<div class="width-50">
							<?php if (VmConfig::get('show_manufacturers', 1) && !empty($this->product->virtuemart_manufacturer_id)) {
			    			echo $this->loadTemplate('manufacturer');
							}?>
						</div>
						<div class="other-info width-50">
						<?php echo $this->loadTemplate('availability');?>
						<?php if (!empty($this->product->customfieldsSorted['sidebar'])) { 
							$this->position = 'sidebar';
							echo $this->loadTemplate('sidebarcustomfields');
						}?>		
						</div>
						<div class="clear"></div>				
					</aside>										
				</div>		
			</div>
			<?php echo $this->product->event->beforeDisplayContent; ?>
			<div class="row-fuid">
				<div class="span12 tabular-content-area">				
					<ul class="nav nav-tabs" id="PromartTab">
						<?php if (!empty($this->product->product_desc)) { ?>
	  				<li class="active"><a href="#p_description" data-toggle="tab"><?php echo JText::_('COM_VIRTUEMART_PRODUCT_DESC_TITLE') ?></a></li>
						<?php } 						
						if (!empty($this->product->customfieldsSorted['normal'])) { 
							$this->position = 'normal';
							echo $this->loadTemplate('customfieldstitle');
						} 
						$product_packaging = '';
						if ($this->product->packaging || $this->product->box) {?>
		 				<li><a href="#packaging"  data-toggle="tab"><?php echo JText::_('COM_VIRTUEMART_PRODUCT_PACKAGING') ?></a></li>			 
						<?php }
						if ($this->showReview) {?>
		 				<li><a href="#cust-reviews"  data-toggle="tab"><?php echo JText::_ ('COM_VIRTUEMART_REVIEWS') ?></a></li>			 
						<?php }?>	
					</ul>	 
					<div class="tab-content">
						<?php if (!empty($this->product->product_desc)) { ?>
	  				<div class="tab-pane fade in active scroll-pane" id="p_description"><?php echo $this->product->product_desc;?></div>
						<?php } 
						if (!empty($this->product->customfieldsSorted['normal'])) { 
							$this->position = 'normal';
							echo $this->loadTemplate('customfieldscontent');
						} 						
						$product_packaging = '';
						if ($this->product->packaging || $this->product->box) {?>			
						<div class="tab-pane fade in" id="packaging">
    				<?php 
						if ($this->product->packaging) {
							$product_packaging .= JText::_('COM_VIRTUEMART_PRODUCT_PACKAGING1') . $this->product->packaging;
							if ($this->product->box)
		    				$product_packaging .= '<br />';
	    				}
	    				if ($this->product->box)
								$product_packaging .= JText::_('COM_VIRTUEMART_PRODUCT_PACKAGING2') . $this->product->box;
	    					echo str_replace("{unit}", $this->product->product_unit ? $this->product->product_unit : JText::_('COM_VIRTUEMART_PRODUCT_FORM_UNIT_DEFAULT'), $product_packaging); ?>
						</div>
						<?php }
						if ($this->showReview) {?>
						<div class="tab-pane fade in" id="cust-reviews">
							<?php echo $this->loadTemplate('reviews');?>
						</div>						
						<?php }?>
					</div>				
				</div>			
			</div>		
		</div>
		<div class="phone-product-nav row-fluid visible-phone">
			<div class="navigate span12">		
				<?php echo $this->loadTemplate('navigation');?>
				<?php echo $this->loadTemplate('categoryback');?>
				<?php echo $this->loadTemplate('askquestion');?>
				<?php if($templateparams->get('social-buttons')==1) { ?>
				<div class="social-button-container">
					<!-- AddThis Button BEGIN -->
					<span class="addthis_toolbox addthis_default_style addthis_32x32_style">
					<a class="addthis_button_preferred_1"></a>
					<a class="addthis_button_preferred_2"></a>
					<a class="addthis_button_preferred_3"></a>
					<a class="addthis_button_preferred_4"></a>
					<a class="addthis_button_compact"></a>
					</span>
					<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-51248e2f36739f60"></script>
					<!-- AddThis Button END -->
				</div>
				<?php } ?>
			</div>			
		</div>		
	</article>
	<?php
	if (!empty($this->product->customfieldsRelatedProducts)) {
		echo $this->loadTemplate('relatedproducts');
    } 
	if (!empty($this->product->customfieldsRelatedCategories)) {
		echo $this->loadTemplate('relatedcategories');
	} 
	if (VmConfig::get('showCategory', 1)) {
		echo $this->loadTemplate('showcategory');
	}
	if (!empty($this->product->customfieldsSorted['onbot'])) {
		$this->position='onbot';
		echo $this->loadTemplate('customfields');
	} 
  ?>	
	<?php echo $this->product->event->afterDisplayContent; 
	if ($this->allowReview) {?>
	<div class="write-edit-review row-fluid">
		<div class="span12">
			<?php echo $this->loadTemplate('writereviews');?>
		</div>
	</div>
	<?php } ?>
</section>
<?php } ?>
