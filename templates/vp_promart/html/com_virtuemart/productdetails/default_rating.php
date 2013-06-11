<?php defined('_JEXEC') or die('Restricted access');
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.4
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/
if ($this->showRating) {
	$maxrating = VmConfig::get('vm_maximum_rating_scale', 5);
	if (empty($this->rating)) {?>
		<div class="vote">
			<?php echo JText::_('COM_VIRTUEMART_RATING') . ' ' . JText::_('COM_VIRTUEMART_UNRATED') ?>
		</div>
	<?php
	} else {
		$ratingwidth = $this->rating->rating * 24;?>
		<div class="vote">
				<span class="rating-title"><?php echo JText::_('COM_VIRTUEMART_RATING')?></span><br/>
				<span title=" <?php echo (JText::_("COM_VIRTUEMART_RATING_TITLE") . round($this->rating->rating) . '/' . $maxrating) ?>" class="ratingbox">
					<span class="stars-color" style="width:<?php echo $ratingwidth.'px'; ?>">
					</span>
				</span>
		</div>
	<?php
	}
}
?>