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
?>
<div class="login<?php echo $this->pageclass_sfx?>">
	<?php if ($this->params->get('show_page_heading')) : ?>
	<legend>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	</legend>
	<?php endif; ?>

	<?php if (($this->params->get('logindescription_show') == 1 && str_replace(' ', '', $this->params->get('login_description')) != '') || $this->params->get('login_image') != '') : ?>
	<div class="login-description">
	<?php endif ; ?>

		<?php if($this->params->get('logindescription_show') == 1) : ?>
			<?php echo $this->params->get('login_description'); ?>
		<?php endif; ?>

		<?php if (($this->params->get('login_image')!='')) :?>
			<img src="<?php echo $this->escape($this->params->get('login_image')); ?>" class="login-image" alt="<?php echo JTEXT::_('COM_USER_LOGIN_IMAGE_ALT')?>"/>
		<?php endif; ?>

	<?php if (($this->params->get('logindescription_show') == 1 && str_replace(' ', '', $this->params->get('login_description')) != '') || $this->params->get('login_image') != '') : ?>
	</div>
	<?php endif ; ?>

	<form action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post" class="form-horizontal">
		<fieldset>
			<?php foreach ($this->form->getFieldset('credentials') as $field): ?>
				<div class="control-group add-control-label">
					<?php if (!$field->hidden): ?>
						<?php echo $field->label; ?>
						<div class="controls">
							<?php echo $field->input; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
			<div class="control-group">
			<?php if (JPluginHelper::isEnabled('system', 'remember')) { ?>
				<div class="controls">
					<label id="remember-lbl" for="remember" class="checkbox">
						<input id="remember" type="checkbox" name="remember" class="inputbox" value="yes"  alt="<?php echo JText::_('JGLOBAL_REMEMBER_ME') ?>" /><?php echo JText::_('JGLOBAL_REMEMBER_ME') ?>
					</label>
					<button type="submit" class="btn"><?php echo JText::_('JLOGIN'); ?></button>
				</div>
			<?php } else { ?>
				<div class="controls">
					<button type="submit" class="btn"><?php echo JText::_('JLOGIN'); ?></button>
				</div>
			<?php } ?>
			</div>
			<input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('login_redirect_url', $this->form->getValue('return'))); ?>" />
			<?php echo JHtml::_('form.token'); ?>
		</fieldset>
		<div class="control-group">
			<ul class="controls">
				<li>
					<a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">
					<?php echo JText::_('COM_USERS_LOGIN_RESET'); ?></a>
				</li>
				<li>
					<a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">
					<?php echo JText::_('COM_USERS_LOGIN_REMIND'); ?></a>
				</li>
				<?php
				$usersConfig = JComponentHelper::getParams('com_users');
				if ($usersConfig->get('allowUserRegistration')) : ?>
				<li>
					<a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">
						<?php echo JText::_('COM_USERS_LOGIN_REGISTER'); ?></a>
				</li>
				<?php endif; ?>
			</ul>
		</div>		
	</form>
</div>

