<?php
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.0
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>
<div class="registration<?php echo $this->pageclass_sfx?>">
	<form id="member-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" method="post" class="form-validate form-horizontal">
		<?php foreach ($this->form->getFieldsets() as $fieldset): // Iterate through the form fieldsets and display each one.?>
			<?php $fields = $this->form->getFieldset($fieldset->name);?>
			<?php if (count($fields)):?>
				<?php if (isset($fieldset->label)):?>
					<legend><?php echo JText::_($fieldset->label);?></legend>
				<?php endif;?>
				<?php foreach($fields as $field):// Iterate through the fields in the set and display them.?>
					<?php if ($field->hidden):// If the field is hidden, just display the input.?>
						<?php echo $field->input;?>
					<?php else:?>
						<div class="control-group add-control-label">
							<?php echo $field->label; ?>
							<?php if (!$field->required && $field->type!='Spacer'): ?>
								<span class="optional"><?php echo JText::_('COM_USERS_OPTIONAL'); ?></span>
							<?php endif; ?>
							<div class="controls"><?php echo ($field->type!='Spacer') ? $field->input : "&#160;"; ?></div>
						</div>
					<?php endif;?>
				<?php endforeach;?>
			<?php endif;?>
		<?php endforeach;?>
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="validate btn"><?php echo JText::_('JREGISTER');?></button>			
				<?php echo JText::_('COM_USERS_OR');?>
				<a class="btn" href="<?php echo JRoute::_('');?>" title="<?php echo JText::_('JCANCEL');?>"><?php echo JText::_('JCANCEL');?></a>
			</div>
			<input type="hidden" name="option" value="com_users" />
			<input type="hidden" name="task" value="registration.register" />
			<?php echo JHtml::_('form.token');?>
		</div>
	</form>
</div>
