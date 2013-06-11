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

$min = VmConfig::get('asks_minimum_comment_length', 50);
$max = VmConfig::get('asks_maximum_comment_length', 2000) ;
vmJsApi::JvalideForm();
$document = JFactory::getDocument();
$document->addScriptDeclaration('
	jQuery(function($){
			$("#askform").validationEngine("attach");
			$("#comment").keyup( function () {
				var result = $(this).val();
					$("#counter").val( result.length );
			});
	});
');
/* Let's see if we found the product */
if (empty ( $this->product )) {
	echo JText::_ ( 'COM_VIRTUEMART_PRODUCT_NOT_FOUND' );
	echo '<br /><br />  ' . $this->continue_link_html;
} else { ?>

<div id="ask-question" class="ask-a-question-view">
	<div class="modal-header">
		<h1><?php echo JText::_('COM_VIRTUEMART_PRODUCT_ASK_QUESTION')  ?></h1>
	</div>
	<div class="modal-body">
	<div class="ask-product-name row-fluid">
		<div class="span12">
			<h2><?php echo $this->product->product_name ?></h2>
		</div>
	</div>
	<div class="form-field">
		<form method="post" class="form-validate form-horizontal form-inline" action="<?php echo JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id='.$this->product->virtuemart_product_id.'&virtuemart_category_id='.$this->product->virtuemart_category_id.'&tmpl=modal') ; ?>" name="askform" id="askform">
			<div class="input-prepend">
  			<span class="add-on"><i class="icon-user"></i></span><input type="text" class="validate[required,minSize[4],maxSize[64]]" value="<?php echo $this->user->name ?>" name="name" id="name" size="30" validation="required name" placeholder="<?php echo JText::_('COM_VIRTUEMART_USER_FORM_NAME')  ?>"/>
			</div><br/>
			<div class="input-prepend ask-email-box">
  			<span class="add-on"><i class="icon-envelope"></i></span><input type="text" class="validate[required,custom[email]]" value="<?php echo $this->user->email ?>" name="email" id="email" size="30"  validation="required email" placeholder="<?php echo JText::_('COM_VIRTUEMART_USER_FORM_EMAIL')  ?>"/>
			</div>
			<label class="comment-box">
				<div class="ask-text span12">
					<?php
					$ask_comment = JText::sprintf('COM_VIRTUEMART_ASK_COMMENT', $min, $max);
					echo $ask_comment;
					?>
				</div>
				<textarea title="<?php echo $ask_comment ?>" class="span12 validate[required,minSize[<?php echo $min ?>],maxSize[<?php echo $max ?>]] field" id="comment" name="comment" rows="8" ></textarea>
			</label>
			<div class="form-inline align-left">
			  <div class="control-group align-left">
    			<label class="control-label align-left" for="counter"><?php echo JText::_('COM_VIRTUEMART_ASK_COUNT')  ?></label>
    			<div class="controls">
      			<input class="input-small" type="text" value="0" size="4" class="counter" id="counter" name="counter" maxlength="4" readonly="readonly" />
    			</div>					
 				</div>
			</div>			
		</div>
	</div>		
	<div class="submit">		
		<input class="highlight-button btn" type="submit" name="submit_ask" title="<?php echo JText::_('COM_VIRTUEMART_ASK_SUBMIT')  ?>" value="<?php echo JText::_('COM_VIRTUEMART_ASK_SUBMIT')  ?>" />
	</div>
	<input type="hidden" name="virtuemart_product_id" value="<?php echo JRequest::getInt('virtuemart_product_id',0); ?>" />
	<input type="hidden" name="tmpl" value="component" />
	<input type="hidden" name="view" value="productdetails" />
	<input type="hidden" name="option" value="com_virtuemart" />
	<input type="hidden" name="virtuemart_category_id" value="<?php echo JRequest::getInt('virtuemart_category_id'); ?>" />
	<input type="hidden" name="task" value="mailAskquestion" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
</div>
<?php } ?>