<?php defined('_JEXEC') or die;
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.4
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/
?>
<div class="pathway row-fluid">
	<ul class="breadcrumb span12<?php echo $moduleclass_sfx; ?>">
	<?php if ($params->get('showHere', 1))
		{
			echo '<span class="showHere">' .JText::_('MOD_BREADCRUMBS_HERE').'</span>';
		}
	?>
	<?php for ($i = 0; $i < $count; $i ++) :
		// Workaround for duplicate Home when using multilanguage
		if ($i == 1 && !empty($list[$i]->link) && !empty($list[$i-1]->link) && $list[$i]->link == $list[$i-1]->link) {
			continue;
		}
		// If not the last item in the breadcrumbs add the separator
		if ($i < $count -1) {
			if (!empty($list[$i]->link)) {
				echo '<li><a href="'.$list[$i]->link.'" class="pathway">'.$list[$i]->name.'</a></li>';
			} else {
				echo '<li class="active">';
				echo $list[$i]->name;
				echo '</li>';
			}
			if($i < $count -2){
				echo ' '.$separator.' ';
			}
		}  elseif ($params->get('showLast', 1)) { // when $i == $count -1 and 'showLast' is true
			if($i > 0){
				echo '<span class="divider">'.$separator.'</span>';
			}
			 echo '<li class="active">';
			echo $list[$i]->name;
			  echo '</li>';
		}
	endfor; ?>
	</ul>
</div>