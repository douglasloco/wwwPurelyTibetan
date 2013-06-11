<?php
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.4
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/
defined('_JEXEC') or die('Restricted access');

$iColumn = 1;
$iManufacturer = 1;

$manufacturerPerRow = 3;
if ($manufacturerPerRow != 1) {
	$manufacturerCellWidth = ' span'.floor ( 12 / $manufacturerPerRow );
} else {
	$manufacturerCellWidth = '';
}

$verticalSeparator = " vertical-separator";
$horizontalSeparator = '<div class="horizontal-separator"></div>';

if (!empty($this->manufacturers)) { ?>
<section class="manufacturer-view-default">
	<h1 class="front-page-titles"><?php echo JText::_('COM_VIRTUEMART_SEARCH_SELECT_ALL_MANUFACTURER') ?></h1>
	<?php foreach ( $this->manufacturers as $manufacturer ) {
		if ($iColumn == 1) { ?>
		<div class="row-fluid">
		<?php }
		if ($iManufacturer == $manufacturerPerRow or $iManufacturer % $manufacturerPerRow == 0) {
			$showVerticalSeparator = ' ';
		} else {
			$showVerticalSeparator = $verticalSeparator;
		}
		$manufacturerURL = JRoute::_('index.php?option=com_virtuemart&view=manufacturer&virtuemart_manufacturer_id=' . $manufacturer->virtuemart_manufacturer_id);
		$manufacturerIncludedProductsURL = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_manufacturer_id=' . $manufacturer->virtuemart_manufacturer_id);
		$manufacturerImage = $manufacturer->images[0]->displayMediaThumb("",false); ?>
		<div class="manufacturer<?php echo $manufacturerCellWidth . $showVerticalSeparator ?>">
			<div class="spacer">
				<div class="image-cont">	    		
					<a href="<?php echo $manufacturerIncludedProductsURL; ?>" title="<?php echo $manufacturer->mf_name; ?>">
						<?php echo $manufacturerImage;?>
					</a>
				</div>				
				<h2 class="cat-product-title">
					<a href="<?php echo $manufacturerIncludedProductsURL; ?>" title="<?php echo $manufacturer->mf_name; ?>">
						<?php echo $manufacturer->mf_name; ?>
					</a>
    		</h2>
			</div>
		</div>
		<?php
		$iManufacturer ++;
		if ($iColumn == $manufacturerPerRow) {
			echo '<div class="clear"></div></div>';
			$iColumn = 1;
		} else {
			$iColumn ++;
		}
	}
	if ($iColumn != 1) { ?>
		<div class="clear"></div>
	</div>
	<?php } ?>
</section>
<?php
}
?>