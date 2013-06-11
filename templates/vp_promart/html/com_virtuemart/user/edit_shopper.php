<?php
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.7
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

?>

<?php if( $this->userDetails->virtuemart_user_id!=0)  {
    echo $this->loadTemplate('vmshopper');
    } ?>
<?php echo $this->loadTemplate('address_userfields'); ?>



<?php if ($this->userDetails->JUser->get('id') ) {
  echo $this->loadTemplate('address_addshipto');
  }
  ?>
<?php if(!empty($this->virtuemart_userinfo_id)){
	echo '<input type="hidden" name="virtuemart_userinfo_id" value="'.(int)$this->virtuemart_userinfo_id.'" />';
}
?>
<?php if(!$this->userDetails->user_is_vendor){ ?>
<div class="buttonBar-right">
	<button class="button btn" type="submit" onclick="javascript:return myValidator(userForm, 'saveUser');" ><?php echo $this->button_lbl ?></button>
	&nbsp;
	<button class="button btn" type="reset" onclick="window.location.href='<?php echo JRoute::_('index.php?option=com_virtuemart&view=user'); ?>'" ><?php echo JText::_('COM_VIRTUEMART_CANCEL'); ?></button>

</div>
<?php } ?>
<input type="hidden" name="task" value="<?php echo $this->fTask; // I remember, we removed that, but why?   ?>" />
<input type="hidden" name="address_type" value="BT" />


