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
defined('_JEXEC') or die('Restricted access');
?>

<table width="100%" cellspacing="0" cellpadding="0" border="0" class="table table-condensed order-details">
    <tr>
	<td   class="orders-key"><?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_PO_NUMBER') ?></td>
	<td class="orders-key" align="left">
	    <?php echo $this->orderdetails['details']['BT']->order_number; ?>
	</td>
    </tr>
    <tr>
	<td class=""><?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_PO_DATE') ?></td>
	<td align="left"><?php echo vmJsApi::date($this->orderdetails['details']['BT']->created_on, 'LC4', true); ?></td>
    </tr>
    <tr>
	<td class=""><?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_PO_STATUS') ?></td>
	<td align="left"><?php echo $this->orderstatuses[$this->orderdetails['details']['BT']->order_status]; ?></td>
    </tr>
    <tr>
	<td class=""><?php echo JText::_('COM_VIRTUEMART_LAST_UPDATED') ?></td>
	<td align="left"><?php echo vmJsApi::date($this->orderdetails['details']['BT']->modified_on, 'LC4', true); ?></td>
    </tr>
    <tr>
	<td class=""><?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_SHIPMENT_LBL') ?></td>
	<td align="left"><?php
	    echo $this->shipment_name;
	    ?></td>
    </tr>
    <tr>
	<td class=""><?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_PAYMENT_LBL') ?></td>
	<td align="left"><?php echo $this->payment_name; ?>
	</td>
    </tr>

	 <tr>
    <td><?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_CUSTOMER_NOTE') ?></td>
    <td valign="top" align="left" width="50%"><?php echo $this->orderdetails['details']['BT']->customer_note; ?></td>
</tr>

     <tr>
	<td class="orders-key"><?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_TOTAL') ?></td>
	<td class="orders-key" align="left"><?php echo $this->currency->priceDisplay($this->orderdetails['details']['BT']->order_total); ?></td>
    </tr>

    <tr>
	<td colspan="2"> &nbsp;</td>
    </tr>
    <tr>
	<td valign="top"><strong>
	    <?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_BILL_TO_LBL') ?></strong> <br/>
	    <table border="0"><?php
	    foreach ($this->userfields['fields'] as $field) {
		if (!empty($field['value'])) {
		    echo '<tr><td class="key">' . $field['title'] . '</td>'
		    . '<td>' . $field['value'] . '</td></tr>';
		}
	    }
	    ?></table>
	</td>
	<td valign="top" ><strong>
	    <?php echo JText::_('COM_VIRTUEMART_ORDER_PRINT_SHIP_TO_LBL') ?></strong><br/>
	    <table border="0"><?php
	    foreach ($this->shipmentfields['fields'] as $field) {
		if (!empty($field['value'])) {
		    echo '<tr><td class="key">' . $field['title'] . '</td>'
		    . '<td>' . $field['value'] . '</td></tr>';
		}
	    }
	    ?></table>
	</td>
    </tr>
</table>
