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
//JHTML::stylesheet ( 'menucss.css', 'modules/mod_virtuemart_category/css/', false );

/* ID for jQuery dropdown */
$ID = str_replace('.', '_', substr(microtime(true), -8, 8));

?>

<ul class="VM-menu<?php echo $class_sfx ?>" id="<?php echo "promart-VMmenu".$ID ?>" >
	<?php foreach ($categories as $category) {
	$active_menu = 'inactive';
	$parent_menu = ' parent';
	$caturl = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$category->virtuemart_category_id);
	$cattext = $category->category_name;
	//if ($active_category_id == $category->virtuemart_category_id) $active_menu = 'class="active"';
	if (in_array( $category->virtuemart_category_id, $parentCategories)) $active_menu = 'active';
	?>
	<li class="<?php echo $active_menu; if ($category->childs) echo $parent_menu; ?>">
		<?php echo JHTML::link($caturl, $cattext);
		if ($category->childs) { ?>
		<ul class="submenu level-1 <?php echo $class_sfx; ?>">
			<?php
			foreach ($category->childs as $child) {
			$caturl = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$child->virtuemart_category_id);
			$cattext = $child->category_name;
			$parent_menu = ' parent';
			$active_menu = 'inactive';
			if (in_array( $child->virtuemart_category_id, $parentCategories)) $active_menu = 'active';
      $child->childs = $cache->call( array( 'VirtueMartModelCategory', 'getChildCategoryList' ),$vendorId, $child->virtuemart_category_id );	?>
				<li class="<?php echo $active_menu; if ($child->childs) echo $parent_menu; ?>" >
					<?php echo JHTML::link($caturl, $cattext); 
					if ($child->childs) { ?>
					<ul class="submenu level-2 <?php echo $class_sfx; ?>">
						<?php
						foreach ($child->childs as $secondchild) {
						$caturl = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$secondchild->virtuemart_category_id);
						$cattext = $secondchild->category_name;
						$parent_menu = ' parent';
						$active_menu = 'inactive';
						if (in_array( $secondchild->virtuemart_category_id, $parentCategories)) $active_menu = 'active';
			      $secondchild->childs = $cache->call( array( 'VirtueMartModelCategory', 'getChildCategoryList' ),$vendorId, $secondchild->virtuemart_category_id ); ?>
						<li class="<?php echo $active_menu; if ($secondchild->childs) echo $parent_menu; ?>" >
							<?php echo JHTML::link($caturl, $cattext); 												
							if ($secondchild->childs) { ?>
							<ul class="submenu level-3 <?php echo $class_sfx; ?>">
								<?php
								foreach ($secondchild->childs as $thirdchild) {
								$caturl = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$thirdchild->virtuemart_category_id);
								$cattext = $thirdchild->category_name;
								$parent_menu = ' parent';
								$active_menu = 'inactive';
								if (in_array( $thirdchild->virtuemart_category_id, $parentCategories)) $active_menu = 'active';
					      $thirdchild->childs = $cache->call( array( 'VirtueMartModelCategory', 'getChildCategoryList' ),$vendorId, $thirdchild->virtuemart_category_id ); ?>
								<li class="<?php echo $active_menu; if ($thirdchild->childs) echo $parent_menu; ?>" >
									<?php echo JHTML::link($caturl, $cattext); ?>
								</li>
								<?php } ?>
							</ul>
							<?php } ?>							
						</li>
						<?php } ?>
					</ul>
					<?php } ?>
				</li>
			<?php	} ?>
		</ul>
		<?php } ?>
	</li>
	<?php	} ?>
</ul>
