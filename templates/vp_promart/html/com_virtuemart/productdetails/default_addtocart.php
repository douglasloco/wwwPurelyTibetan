<?php defined('_JEXEC') or die('Restricted access');
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.6
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
<div class="addtocart-area">
	<form method="post" class="product js-recalculate" action="index.php" >
		<?php // Product custom_fields
		if (!empty($this->product->customfieldsCart)) { ?>
		<div class="product-fields">
			<?php foreach ($this->product->customfieldsCart as $field) { 
				if ($field->field_type == 'M' or $field->field_type == 'S') { ?>
		    	<div class="product-field product-field-type-<?php echo $field->field_type ?>">
						<div class="product-fields-title-group">
							<span class="product-fields-title title-tip" <?php if ($field->custom_tip) {?> rel="tooltip" title="<?php echo $field->custom_tip ?>"<?php } ?> ><?php echo JText::_($field->custom_title).':' ?></span>							
						</div>
						<div class="product-field-display"><?php echo $field->display ?></div>
						<?php 
						if (!empty($field->custom_field_desc)) {
							if (strpos($field->custom_field_desc,'||') !== false and strpos($field->custom_field_desc,'[') !== false and strpos($field->custom_field_desc,']') !== false ) {
								list($fieldDesc, $newPostion) = explode('||', $this->escape($field->custom_field_desc)); 
								if (!empty($fieldDesc)) {
									echo '<div class="product-field-desc">'.$fieldDesc.'</div>';
								}
								if (!empty($newPostion)) {
									$newPostion = trim($newPostion, " ,],[");
									if (!empty($this->product->customfieldsSorted[$newPostion])) {
										$fieldCount = 1;
	    							foreach ($this->product->customfieldsSorted[$newPostion] as $field1) {
	    								if ( $field1->is_hidden ) 
	    									continue;
											if ($field1->display) {?>
												<div class="new-postion custom-field-position-<?php echo $newPostion ?> product-field-type-<?php echo $field1->field_type ?>">
													<a href="#myModal-<?php echo $field->field_type ?>-<?php echo $fieldCount ?>" class="new-field-title" data-toggle="modal" ><?php echo JText::_($field1->custom_title); ?></a>
													
													<div class="boot-modal fade" id="myModal-<?php echo $field->field_type ?>-<?php echo $fieldCount ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  													<div class="modal-header">
   			 											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    														<h3 id="myModalLabel"><?php echo jText::_($field1->custom_field_desc) ?></h3>
  													</div>
  													<div class="modal-body">
    													<p><?php echo $field1->display ?></p>
  													</div>
  													<div class="modal-footer">
    													<button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo JText::_('JLIB_HTML_BEHAVIOR_CLOSE'); ?></button>    													
  													</div>
													</div>
												</div>
											<?php
											$fieldCount++;
											}
	    							} 
		    		 			} 							
								}
							}
							if (strpos($field->custom_field_desc,'||') == false and strpos($field->custom_field_desc,'[') !== false and strpos($field->custom_field_desc,']') !== false ) {
								if (!empty($field->custom_field_desc)) {
									$newPostion = trim($field->custom_field_desc, " ,],[");
									if (!empty($this->product->customfieldsSorted[$newPostion])) {
										$fieldCount = 1;
	    							foreach ($this->product->customfieldsSorted[$newPostion] as $field1) {
	    								if ( $field1->is_hidden ) 
	    									continue;
											if ($field1->display) {?>
												<div class="new-postion custom-field-position-<?php echo $newPostion ?> product-field-type-<?php echo $field1->field_type ?>">
													<a href="#myModal-<?php echo $field->field_type ?>-<?php echo $fieldCount ?>" class="new-field-title" data-toggle="modal" ><?php echo JText::_($field1->custom_title); ?></a>
													
													<div class="boot-modal fade" id="myModal-<?php echo $field->field_type ?>-<?php echo $fieldCount ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  													<div class="modal-header">
   			 											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    														<h3 id="myModalLabel"><?php echo jText::_($field1->custom_field_desc) ?></h3>
  													</div>
  													<div class="modal-body">
    													<p><?php echo $field1->display ?></p>
  													</div>
  													<div class="modal-footer">
    													<button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo JText::_('JLIB_HTML_BEHAVIOR_CLOSE'); ?></button>    													
  													</div>
													</div>
												</div>
											<?php
											$fieldCount++;
											}
	    							} 
		    		 			} 							
								}
							}
							if (strpos($field->custom_field_desc,'||') == false and strpos($field->custom_field_desc,'[') == false and strpos($field->custom_field_desc,']') == false ) {								
								if (!empty($field->custom_field_desc)) {
									echo '<span class="add-on product-field-desc">'.$field->custom_field_desc.'</span>';
								}
							}						
						}	?>					
		    </div>
			<?php } 
				elseif ($field->field_type == 'V') { ?>
		    	<div class="product-field product-field-type-<?php echo $field->field_type ?>">
						<div class="product-fields-title-group">
							<span class="product-fields-title title-tip" <?php if ($field->custom_tip) {?> rel="tooltip" title="<?php echo $field->custom_tip ?>"<?php } ?> ><?php echo JText::_($field->custom_title).':' ?></span>
						</div>
						<div class="product-field-display input-append">						
							<?php echo $field->display;						 
						if (empty($field->custom_field_desc)) {
							echo '</div>';
						}
						if (!empty($field->custom_field_desc)) {
							if (strpos($field->custom_field_desc,'||') !== false and strpos($field->custom_field_desc,'[') !== false and strpos($field->custom_field_desc,']') !== false ) {
								list($fieldDesc, $newPostion) = explode('||', $this->escape($field->custom_field_desc)); 
								if (empty($fieldDesc)) {
									echo '</div>';
								}								
								if (!empty($fieldDesc)) {
									echo '<span class="add-on product-field-desc">'.$fieldDesc.'</span>';
									echo '</div>';
								}
								if (!empty($newPostion)) {
									$newPostion = trim($newPostion, " ,],[");
									if (!empty($this->product->customfieldsSorted[$newPostion])) {
										$fieldCount = 1;
	    							foreach ($this->product->customfieldsSorted[$newPostion] as $field1) {
	    								if ( $field1->is_hidden ) 
	    									continue;
											if ($field1->display) {?>
												<div class="new-postion custom-field-position-<?php echo $newPostion ?> product-field-type-<?php echo $field1->field_type ?>">
													<a href="#myModal-<?php echo $field->field_type ?>-<?php echo $fieldCount ?>" class="new-field-title" data-toggle="modal" ><?php echo JText::_($field1->custom_title); ?></a>
													
													<div class="boot-modal fade" id="myModal-<?php echo $field->field_type ?>-<?php echo $fieldCount ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  													<div class="modal-header">
   			 											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    														<h3 id="myModalLabel"><?php echo jText::_($field1->custom_field_desc) ?></h3>
  													</div>
  													<div class="modal-body">
    													<p><?php echo $field1->display ?></p>
  													</div>
  													<div class="modal-footer">
    													<button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo JText::_('JLIB_HTML_BEHAVIOR_CLOSE'); ?></button>    													
  													</div>
													</div>
												</div>
											<?php
											$fieldCount++;
											}
	    							} 
		    		 			} 							
								}
							}
							if (strpos($field->custom_field_desc,'||') == false and strpos($field->custom_field_desc,'[') !== false and strpos($field->custom_field_desc,']') !== false ) {								
								if (!empty($field->custom_field_desc)) {
									echo '</div>';
									$newPostion = trim($field->custom_field_desc, " ,],[");
									if (!empty($this->product->customfieldsSorted[$newPostion])) {
										$fieldCount = 1;
	    							foreach ($this->product->customfieldsSorted[$newPostion] as $field1) {
	    								if ( $field1->is_hidden ) 
	    									continue;
											if ($field1->display) {?>
												<div class="new-postion custom-field-position-<?php echo $newPostion ?> product-field-type-<?php echo $field1->field_type ?>">
													<a href="#myModal-<?php echo $field->field_type ?>-<?php echo $fieldCount ?>" class="new-field-title" data-toggle="modal" ><?php echo JText::_($field1->custom_title); ?></a>
													
													<div class="boot-modal fade" id="myModal-<?php echo $field->field_type ?>-<?php echo $fieldCount ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  													<div class="modal-header">
   			 											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    														<h3 id="myModalLabel"><?php echo jText::_($field1->custom_field_desc) ?></h3>
  													</div>
  													<div class="modal-body">
    													<p><?php echo $field1->display ?></p>
  													</div>
  													<div class="modal-footer">
    													<button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo JText::_('JLIB_HTML_BEHAVIOR_CLOSE'); ?></button>    													
  													</div>
													</div>
												</div>
											<?php
											$fieldCount++;
											}
	    							} 
		    		 			} 							
								}
							}
							if (strpos($field->custom_field_desc,'||') == false and strpos($field->custom_field_desc,'[') == false and strpos($field->custom_field_desc,']') == false ) {								
								if (!empty($field->custom_field_desc)) {
									echo '<span class="add-on product-field-desc">'.$field->custom_field_desc.'</span></div>';
								}
							}						
						}	?>					
		    </div>
			<?php } 
			elseif ($field->field_type == 'A' ) { ?>
		    <div class="product-field product-field-type-<?php echo $field->field_type ?>">
					<span class="product-fields-title title-tip" <?php if ($field->custom_tip) {?> rel="tooltip" title="<?php echo $field->custom_tip ?>"<?php } ?> ><?php echo JText::_($field->custom_title).':' ?></span>
					<span class="product-field-display"><?php echo $field->display ?></span>
					<span class="product-field-desc"><?php echo $field->custom_field_desc ?></span>
		    </div><br />
			<?php } else { ?>
			<div class="product-field product-field-type-<?php echo $field->field_type ?>">
				<div class="product-fields-title-group">
					<span class="product-fields-title" ><?php echo JText::_($field->custom_title) ?></span>
					<?php if ($field->custom_tip)
				    	echo JHTML::tooltip($field->custom_tip, JText::_($field->custom_title), 'tooltip.gif'); ?>
				</div>
				<span class="product-field-display"><?php echo $field->display ?></span>
				<span class="product-field-desc"><?php echo $field->custom_field_desc ?></span>
		  </div><br />
		    <?php }
		}
		?>
    	</div>
	<?php
	}
	/* Product custom Childs
	 * to display a simple link use $field->virtuemart_product_id as link to child product_id
	 * custom_value is relation value to child
	 */

	if (!empty($this->product->customsChilds)) {
	    ?>
    	<div class="product-fields">
    <?php foreach ($this->product->customsChilds as $field) { ?>
		    <div class="product-field product-field-type-<?php echo $field->field->field_type ?>">
			<span class="product-fields-title" ><strong><?php echo JText::_($field->field->custom_title) ?></strong></span>
			<span class="product-field-desc"><?php echo JText::_($field->field->custom_value) ?></span>
			<span class="product-field-display"><?php echo $field->display ?></span>

		    </div><br />
		<?php } ?>
    	</div>
<?php } ?>

	<div class="addtocart-bar">

<?php // Display the quantity box

    $stockhandle = VmConfig::get('stockhandle', 'none');
    if (($stockhandle == 'disableit' or $stockhandle == 'disableadd') and ($this->product->product_in_stock - $this->product->product_ordered) < 1) {
 ?>
		<a href="<?php echo JRoute::_('index.php?option=com_virtuemart&view=productdetails&layout=notify&virtuemart_product_id='.$this->product->virtuemart_product_id); ?>" class="notify btn btn-info"><?php echo JText::_('COM_VIRTUEMART_CART_NOTIFY') ?></a>

<?php } else { ?>
			
		<div id="qaunity-selector" class="input-prepend input-append <?php if($templateparams->get('quantity-selector')==0) echo 'hide';?>">
  		<span class="add-on quantity-controls js-recalculate"><a href="javascript:void(0);" class="quantity-controls quantity-minus" ><i class="icon-chevron-down"></i></a></span>		
			<input type="text" class="quantity-input js-recalculate" id="appendedPrependedInput" name="quantity[]" value="<?php if (isset($this->product->min_order_level) && (int) $this->product->min_order_level > 0) {
    			echo $this->product->min_order_level;
				} else {
    			echo '1';
				} ?>" />			
			<span class="add-on quantity-controls js-recalculate"><a href="javascript:void(0);" class="quantity-controls quantity-plus" ><i class="icon-chevron-up"></i></a></span>
		</div>			

	    <?php // Display the quantity box END ?>

	    <?php
	    // Display the add to cart button
	    ?>
		<span class="addtocart-button btn btn-large btn-primary">
			<?php echo shopFunctionsF::getAddToCartButton($this->product->orderable); ?>
		</span>
<?php } ?>

	    <div class="clear"></div>
	</div>

	<?php // Display the add to cart button END  ?>
	<input type="hidden" class="pname" value="<?php echo $this->product->product_name ?>" />
	<input type="hidden" name="option" value="com_virtuemart" />
	<input type="hidden" name="view" value="cart" />
	<noscript><input type="hidden" name="task" value="add" /></noscript>
	<input type="hidden" name="virtuemart_product_id[]" value="<?php echo $this->product->virtuemart_product_id ?>" />
    </form>

    <div class="clear"></div>
</div>
