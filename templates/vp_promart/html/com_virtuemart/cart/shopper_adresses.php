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

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
?>
<table width="100%">
  <tr>
    <td width="50%" bgcolor="#ccc">
		<?php echo JText::_('COM_VIRTUEMART_USER_FORM_BILLTO_LBL'); ?>
	</td>
	<td width="50%" bgcolor="#ccc">
		<?php echo JText::_('COM_VIRTUEMART_USER_FORM_SHIPTO_LBL'); ?>
	</td>
  </tr>
  <tr>
    <td width="50%">

		<?php 	foreach($this->BTaddress['fields'] as $item){
					if(!empty($item['value'])){
						echo $item['title'].': '.$this->escape($item['value']).'<br/>';
					}
				} ?>

	</td>
    <td width="50%">
			<?php
			if(!empty($this->STaddress['fields'])){
				foreach($this->STaddress['fields'] as $item){
					if(!empty($item['value'])){
						echo $item['title'].': '.$this->escape($item['value']).'<br/>';
					}
				}
			} else {
				foreach($this->BTaddress['fields'] as $item){
					if(!empty($item['value'])){
						echo $item['title'].': '.$this->escape($item['value']).'<br/>';
					}
				}
			} ?>
	</td>
  </tr>
</table>