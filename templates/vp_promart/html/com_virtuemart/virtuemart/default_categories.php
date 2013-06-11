<?php
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.6
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/
defined('_JEXEC') or die('Restricted access');

// Category and Columns Counter
$iCol = 1;
$iCategory = 1;

// Calculating Categories Per Row
$categories_per_row = VmConfig::get('homepage_categories_per_row', 3);
$category_cellwidth = ' span' . floor(12 / $categories_per_row);

// Separator
$verticalseparator = " vertical-separator";
?>

<section class="category-view">
	<div class="row-fluid">
		<h4 class="span12 front-page-titles">
			<?php echo JText::_('COM_VIRTUEMART_CATEGORIES') ?>
		</h4>
	</div>
	<?php
	foreach ($this->categories as $category) {
		if ($iCol == 1) {?>
			<div class="row-fluid">
	    <?php
	    }
		if ($iCategory == $categories_per_row or $iCategory % $categories_per_row == 0) {
			$show_vertical_separator = ' ';
		} else {
			$show_vertical_separator = $verticalseparator;
		}
		$caturl = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id=' . $category->virtuemart_category_id);?>
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
	$iCategory++;
	if ($iCol == $categories_per_row) {?>
	    </div>
	<?php
	$iCol = 1;
    } else {
	$iCol++;
    }
}
// Do we need a final closing row tag?
if ($iCol != 1) {
    ?>
        <div class="clear"></div>
    </div>
    <?php
}
?>
</section>