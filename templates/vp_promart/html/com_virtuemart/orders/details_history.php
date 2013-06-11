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

<table class="table table-striped">
	<tr align="left" class="sectiontableheader">
		<th align="left" ><?php echo JText::_('COM_VIRTUEMART_DATE') ?></th>
		<th align="left" ><?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_PO_STATUS') ?></th>
		<th align="left" ><?php echo JText::_('COM_VIRTUEMART_ORDER_COMMENT') ?></th>
	</tr>
<?php
	foreach($this->orderdetails['history'] as $_hist) {
		if (!$_hist->customer_notified) {
			continue;
		}
?>
		<tr valign="top">
			<td align="left">
				<?php echo vmJsApi::date($_hist->created_on,'LC2',true); ?>
			</td>
			<td align="left" >
				<?php echo $this->orderstatuses[$_hist->order_status_code]; ?>
			</td>
			<td align="left" >
				<?php echo $_hist->comments; ?>
			</td>
		</tr>
<?php
	}
?>
</table>
