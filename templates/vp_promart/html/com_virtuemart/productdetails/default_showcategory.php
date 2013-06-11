<?php defined ( '_JEXEC' ) or die ( 'Restricted access' );
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.4
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/
if ($this->category->haschildren) {
  $iCol = 1;
  $iCategory = 1;
  $categories_per_row = VmConfig::get('categories_per_row', 3);
  $category_cellwidth = ' span' . floor(12 / $categories_per_row);
  $verticalseparator = " vertical-separator";
?>
	<section class="category-view sub-categories-in-product">
	<h4 class="related-item-title"><?php echo JText::_('COM_VIRTUEMART_SUBCATEGORIES') ?></h4>
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
	if ($iCol != 1) { ?>
	<div class="clear"></div>
	</div>
	<?php } ?>
	</section>
 <?php } ?>