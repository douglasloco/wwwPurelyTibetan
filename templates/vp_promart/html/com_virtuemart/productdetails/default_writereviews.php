<?php defined ('_JEXEC') or die ('Restricted access');
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.5
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
	} ?>





	<div class="customer-reviews">
		<form method="post" action="<?php echo JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $this->product->virtuemart_product_id . '&virtuemart_category_id=' . $this->product->virtuemart_category_id); ?>" name="reviewForm" id="reviewform">
	<?php
}

if ($this->showReview) {
		$review_editable = TRUE;
		$reviews_published = 0;

	if ($this->allowReview) { 
		?>
		<div class="write-reviews">

			<?php // Show Review Length While Your Are Writing
			$reviewJavascript = "
			function check_reviewform() {
				var form = document.getElementById('reviewform');

				var ausgewaehlt = false;

				// for (var i=0; i<form.vote.length; i++) {
					// if (form.vote[i].checked) {
						// ausgewaehlt = true;
					// }
				// }
					// if (!ausgewaehlt)  {
						// alert('" . JText::_ ('COM_VIRTUEMART_REVIEW_ERR_RATE', FALSE) . "');
						// return false;
					// }
					//else
					if (form.comment.value.length < " . VmConfig::get ('reviews_minimum_comment_length', 100) . ") {
						alert('" . addslashes (JText::sprintf ('COM_VIRTUEMART_REVIEW_ERR_COMMENT1_JS', VmConfig::get ('reviews_minimum_comment_length', 100))) . "');
						return false;
					}
					else if (form.comment.value.length > " . VmConfig::get ('reviews_maximum_comment_length', 2000) . ") {
						alert('" . addslashes (JText::sprintf ('COM_VIRTUEMART_REVIEW_ERR_COMMENT2_JS', VmConfig::get ('reviews_maximum_comment_length', 2000))) . "');
						return false;
					}
					else {
						return true;
					}
				}

				function refresh_counter() {
					var form = document.getElementById('reviewform');
					form.counter.value= form.comment.value.length;
				}
				jQuery(function($) {
					var steps = " . $maxrating . ";
					var parentPos= $('.write-reviews .ratingbox').position();
					var boxWidth = $('.write-reviews .ratingbox').width();// nbr of total pixels
					var starSize = (boxWidth/steps);
					var ratingboxPos= $('.write-reviews .ratingbox').offset();

					$('.write-reviews .ratingbox').mousemove( function(e){
						var span = $(this).children();
						var dif = e.pageX-ratingboxPos.left; // nbr of pixels
						difRatio = Math.floor(dif/boxWidth* steps )+1; //step
						span.width(difRatio*starSize);
						$('#vote').val(difRatio);
						//console.log('note = ', difRatio);
					});
				});


				";
			$document = JFactory::getDocument ();
			$document->addScriptDeclaration ($reviewJavascript);

			if ($this->showRating) {
				if ($this->allowRating && $review_editable) {
					?>
					<h4><?php echo JText::_ ('COM_VIRTUEMART_WRITE_REVIEW')  ?><span><?php echo JText::_ ('COM_VIRTUEMART_WRITE_FIRST_REVIEW') ?></span></h4>
					<span class="step"><?php echo JText::_ ('COM_VIRTUEMART_RATING_FIRST_RATE') ?></span>
					<div class="rating">
						<label for="vote"><?php echo $stars[$maxrating]; ?></label>
						<input type="hidden" id="vote" value="<?php echo $maxrating ?>" name="vote">
					</div>

					<?php

				}
			}
			if ($review_editable) {
				?>
				<span class="step"><?php echo JText::sprintf ('COM_VIRTUEMART_REVIEW_COMMENT', VmConfig::get ('reviews_minimum_comment_length', 100), VmConfig::get ('reviews_maximum_comment_length', 2000)); ?></span>
				<br/>
				<textarea class="virtuemart span8" title="<?php echo JText::_ ('COM_VIRTUEMART_WRITE_REVIEW') ?>" class="inputbox" id="comment" onblur="refresh_counter();" onfocus="refresh_counter();" onkeyup="refresh_counter();" name="comment" rows="5" cols="60"><?php if (!empty($this->review->comment)) {
					echo $this->review->comment;
				} ?></textarea>
				<br/>
				<span><?php echo JText::_ ('COM_VIRTUEMART_REVIEW_COUNT') ?>
					<input type="text" value="0" size="4" class="review-counter" name="counter" maxlength="4" readonly="readonly"/>
				</span>
				<br/><br/>
				<input class="btn " type="submit" onclick="return( check_reviewform());" name="submit_review" title="<?php echo JText::_ ('COM_VIRTUEMART_REVIEW_SUBMIT')  ?>" value="<?php echo JText::_ ('COM_VIRTUEMART_REVIEW_SUBMIT')  ?>"/>
				<?php
			} else {
				echo '<strong>' . JText::_ ('COM_VIRTUEMART_DEAR') . $this->user->name . ',</strong><br />';
				echo JText::_ ('COM_VIRTUEMART_REVIEW_ALREADYDONE');
			}
			?></div><?php
	}
}

if ($this->allowRating || $this->showReview) {
	?>
	<input type="hidden" name="virtuemart_product_id" value="<?php echo $this->product->virtuemart_product_id; ?>"/>
	<input type="hidden" name="option" value="com_virtuemart"/>
	<input type="hidden" name="virtuemart_category_id" value="<?php echo JRequest::getInt ('virtuemart_category_id'); ?>"/>
	<input type="hidden" name="virtuemart_rating_review_id" value="0"/>
	<input type="hidden" name="task" value="review"/>
		</form>
	</div>
	<?php
}
