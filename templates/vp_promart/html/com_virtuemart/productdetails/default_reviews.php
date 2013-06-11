<?php defined ('_JEXEC') or die ('Restricted access');
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.4
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/
// Customer Reviews
if ($this->allowRating || $this->showReview) {
	$maxrating = VmConfig::get ('vm_maximum_rating_scale', 5);
	$ratingsShow = VmConfig::get ('vm_num_ratings_show', 3); // TODO add  vm_num_ratings_show in vmConfig
	$stars = array();
	$showall = JRequest::getBool ('showall', FALSE);
	$ratingWidth = $maxrating * 24;
	for ($num = 0; $num <= $maxrating; $num++) {
		$stars[] = '
				<span title="' . (JText::_ ("COM_VIRTUEMART_RATING_TITLE") . $num . '/' . $maxrating) . '" class="vmicon ratingbox" style="display:inline-block;width:' . 24 * $maxrating . 'px;">
					<span class="stars-color" style="width:' . (24 * $num) . 'px">
					</span>
				</span>';
	}	
}
if ($this->showReview) {?>
	<div class="list-reviews hReview">
		<?php
		$i = 0;
		$review_editable = TRUE;
		$reviews_published = 0;
		if ($this->rating_reviews) {
			foreach ($this->rating_reviews as $review) {
				if ($i % 2 == 0) {
					$color = 'normal';
				} else {
					$color = 'highlight';
				}

				/* Check if user already commented */
				// if ($review->virtuemart_userid == $this->user->id ) {
				if ($review->created_by == $this->user->id && !$review->review_editable) {
					$review_editable = FALSE;
				}
				?>

				<?php // Loop through all reviews
				if (!empty($this->rating_reviews) && $review->published) {
					$reviews_published++;
					?>
					<div class="<?php echo $color ?>">
						<span class="date"><?php echo JHTML::date ($review->created_on, JText::_ ('DATE_FORMAT_LC')); ?></span>
						<span class="vote"><?php echo $stars[(int)$review->vote] ?></span>
						<blockquote>
							<p><?php echo $review->comment; ?></p>
							<small><?php echo $review->customer ?></small>							
						</blockquote>
					</div>
					<?php
				}
				$i++;
				if ($i == $ratingsShow && !$showall) {
					/* Show all reviews ? */
					if ($reviews_published >= $ratingsShow) {
						$attribute = array('class'=> 'details', 'title'=> JText::_ ('COM_VIRTUEMART_MORE_REVIEWS'));
						echo JHTML::link ($this->more_reviews, JText::_ ('COM_VIRTUEMART_MORE_REVIEWS'), $attribute);
					}
					break;
				}
			}

		} else {
			// "There are no reviews for this product"
			?>
			<span class="step"><?php echo JText::_ ('COM_VIRTUEMART_NO_REVIEWS') ?></span>
			<?php
		}  ?>
		<div class="clear"></div>
	</div>
	<?php 
}?>

