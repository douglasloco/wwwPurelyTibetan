<?php defined('_JEXEC') or die;
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.4
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/
JHtml::_('behavior.keepalive');
if ($type == 'logout') : ?>
<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form">
    <?php if ($params->get('greeting')) : ?>
    <p class="login-greeting">
        <?php if ($params->get('name') == 0) : {
        echo JText::sprintf('MOD_LOGIN_HINAME', htmlspecialchars($user->get('name')));
    } else : {
        echo JText::sprintf('MOD_LOGIN_HINAME', htmlspecialchars($user->get('username')));
    } endif; ?>
    </p>
    <?php endif; ?>
    <input type="submit" name="Submit" class="logout-button btn" value="<?php echo JText::_('JLOGOUT'); ?>" />
    <input type="hidden" name="option" value="com_users" />
    <input type="hidden" name="task" value="user.logout" />
    <input type="hidden" name="return" value="<?php echo $return; ?>" />
    <?php echo JHtml::_('form.token'); ?>
</form>
<?php else : ?>
<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form">
    <?php if ($params->get('pretext')): ?>
    <p class="pretext"><?php echo $params->get('pretext'); ?></p>
    <?php endif; ?>
    <fieldset class="userdata">
			<div class="control-group">
        <label id="form-login-username" for="modlgn-username"><?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?></label>
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-user"></i></span>
						<input id="modlgn-username" type="text" name="username" class="span8" size="18" />
					</div>
				</div>
        <label id="form-login-password" for="modlgn-passwd"><?php echo JText::_('JGLOBAL_PASSWORD') ?></label>
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-lock"></i></span>
						<input id="modlgn-passwd" type="password" name="password" class="span8" size="18" />
					</div>
				</div>				

        <?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
        <label id="form-login-remember" class="checkbox inline" for="modlgn-remember">
            <input id="modlgn-remember" type="checkbox" name="remember" class="inputbox" value="yes" />
						<?php echo JText::_('MOD_LOGIN_REMEMBER_ME') ?>
        </label>
        <?php endif; ?>
				<div class="clear"></div>
        <input type="submit" name="Submit" class="login-button btn btn-small" value="<?php echo JText::_('JLOGIN') ?>" />
        <input type="hidden" name="option" value="com_users" />
        <input type="hidden" name="task" value="user.login" />
        <input type="hidden" name="return" value="<?php echo $return; ?>" />
        <?php echo JHtml::_('form.token'); ?>
			</div>
    </fieldset>
    <ul>
        <li>
            <a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">
                <?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_PASSWORD'); ?></a>
        </li>
        <li>
            <a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">
                <?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_USERNAME'); ?></a>
        </li>
        <?php
        $usersConfig = JComponentHelper::getParams('com_users');
        if ($usersConfig->get('allowUserRegistration')) : ?>
            <li>
                <a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">
                    <?php echo JText::_('MOD_LOGIN_REGISTER'); ?></a>
            </li>
            <?php endif; ?>
    </ul>
    <?php if ($params->get('posttext')): ?>
    <p class="posttext"><?php echo $params->get('posttext'); ?></p>
    <?php endif; ?>
</form>
<?php endif;

