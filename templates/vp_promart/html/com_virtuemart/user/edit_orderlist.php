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
defined('_JEXEC') or die('Restricted access'); ?>

<div id="editcell">
	<table class="adminlist table table-striped">
	<thead>
	<tr>
		<th>
			<?php echo JText::_('COM_VIRTUEMART_ORDER_LIST_ORDER_NUMBER'); ?>
		</th>
		<th>
			<?php echo JText::_('COM_VIRTUEMART_ORDER_LIST_CDATE'); ?>
		</th>
		<th>
			<?php echo JText::_('COM_VIRTUEMART_ORDER_LIST_MDATE'); ?>
		</th>
		<th>
			<?php echo JText::_('COM_VIRTUEMART_ORDER_LIST_STATUS'); ?>
		</th>
		<th>
			<?php echo JText::_('COM_VIRTUEMART_ORDER_LIST_TOTAL'); ?>
		</th>
	</thead>
	<?php
		$k = 0;
		foreach ($this->orderlist as $i => $row) {
			$editlink = JRoute::_('index.php?option=com_virtuemart&view=orders&layout=details&order_number=' . $row->order_number);
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td align="left">
					<a href="<?php echo $editlink; ?>"><?php echo $row->order_number; ?></a>
				</td>
				<td align="left">
					<?php echo JHTML::_('date', $row->created_on); ?>
				</td>
				<td align="left">
					<?php echo JHTML::_('date', $row->modified_on); ?>
				</td>
				<td align="left">
					<?php echo ShopFunctions::getOrderStatusName($row->order_status); ?>
				</td>
				<td align="left">
					<?php echo $this->currency->priceDisplay($row->order_total); ?>
				</td>
			</tr>
	<?php
			$k = 1 - $k;
		}
	?>
	</table>
</div>
