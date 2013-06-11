<?php defined ( '_JEXEC' ) or die ( 'Restricted access' );
?>


<form method="post" action="<?php echo JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id='.$this->product->virtuemart_product_id.'&virtuemart_category_id='.$this->product->virtuemart_category_id) ; ?>" name="notifyform" id="notifyform" class="form-search">
	<div class="alert alert-info">
  <h4><?php echo JText::_('COM_VIRTUEMART_CART_NOTIFY') ?></h4><br/>
	<p class="list-reviews">
		<?php echo JText::sprintf('COM_VIRTUEMART_CART_NOTIFY_DESC', $this->product->product_name); ?>
	</p>	
	</div>
	
	<div class="control-group">
  <div class="controls">
    <div class="input-prepend">
      <span class="add-on"><i class="icon-envelope"></i></span>
      <input type="text" name="notify_email" value="<?php echo $this->user->email; ?>" />
    </div>
		<input type="submit" name="notifycustomer"  class="btn btn-info notify-button" value="<?php echo JText::_('COM_VIRTUEMART_CART_NOTIFY') ?>" title="<?php echo JText::_('COM_VIRTUEMART_CART_NOTIFY') ?>" />
  </div>
</div>
	
	
	
	
	
	<input type="hidden" name="virtuemart_product_id" value="<?php echo $this->product->virtuemart_product_id; ?>" />
	<input type="hidden" name="option" value="com_virtuemart" />
	<input type="hidden" name="virtuemart_category_id" value="<?php echo JRequest::getInt('virtuemart_category_id'); ?>" />
	<input type="hidden" name="virtuemart_user_id" value="<?php echo $this->user->id; ?>" />
	<input type="hidden" name="task" value="notifycustomer" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>


