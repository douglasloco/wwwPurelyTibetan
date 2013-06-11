<?php 
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.5
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/
defined('_JEXEC') or die('Restricted access'); ?>

<!-- Currency Selector Module -->
<?php echo $text_before ?>
<div class="current-mod">
		<form action="<?php echo JURI::getInstance()->toString(); ?>" method="post" class="currency-form">			
			<?php echo JHTML::_('select.genericlist', $currencies, 'virtuemart_currency_id', 'class="inputbox select" onchange="this.form.submit()"', 'virtuemart_currency_id', 'currency_txt', $virtuemart_currency_id) ; ?>
		</form>
</div>
