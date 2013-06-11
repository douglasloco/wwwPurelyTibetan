<?php
defined('_JEXEC') or die('');
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.1
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/

echo JText::sprintf('COM_VIRTUEMART_WELCOME_VENDOR', $this->vendor->vendor_store_name) . "\n" . "\n";
echo JText::_('COM_VIRTUEMART_QUESTION_ABOUT') . ' '. $this->product->product_name."\n" . "\n";
echo JText::sprintf('COM_VIRTUEMART_QUESTION_MAIL_FROM', $this->user->name, $this->user->email) . "\n";
 
echo $this->comment. "\n";
