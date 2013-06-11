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

// Status Of Delimiter
$closeDelimiter = false;
$openTable = true;
$hiddenFields = '';

// Output: Userfields
foreach($this->userFields['fields'] as $field) {

	if($field['type'] == 'delimiter') {

		// For Every New Delimiter
		// We need to close the previous
		// table and delimiter
		if($closeDelimiter) { ?>
			</table>
		</fieldset>
		<?php
		} ?>

		<fieldset>
			<div class="userfields_info"><?php echo $field['title'] ?></div>

		<?php
		$closeDelimiter = true;
		$openTable = true;

	} elseif ($field['hidden'] == true) {

		// We collect all hidden fields
		// and output them at the end
		$hiddenFields .= $field['formcode'] . "\n";

	} else {

		// If we have a new delimiter
		// we have to start a new table
		if($openTable) {
			$openTable = false;
			?>

			<table  class="adminForm user-details">

		<?php
		}

		// Output: Userfields
		?>
				<tr>
					<td class="key" title="<?php echo $field['description'] ?>" >
						<label class="<?php echo $field['name'] ?>" for="<?php echo $field['name'] ?>_field">
							<?php echo $field['title'] . ($field['required'] ? ' *' : '') ?>
						</label>
					</td>
					<td>
						<?php echo $field['formcode'] ?>
					</td>
				</tr>
	<?php
	}

}

// At the end we have to close the current
// table and delimiter ?>

			</table>
		</fieldset>

<?php // Output: Hidden Fields
echo $hiddenFields
?>