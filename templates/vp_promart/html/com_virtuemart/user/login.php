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

if(!class_exists('shopFunctionsF')) require(JPATH_VM_SITE.DS.'helpers'.DS.'shopfunctionsf.php');
$comUserOption=shopfunctionsF::getComUserOption();
if (empty($this->url)){
	$uri = JFactory::getURI();
	$url = $uri->toString(array('path', 'query', 'fragment'));
} else{
	$url = $this->url;
}

$user = JFactory::getUser();
if(!isset($this->show)) $this->show = true;
if ($this->show and $user->id == 0  ) {
JHtml::_('behavior.formvalidation');
JHTML::_ ( 'behavior.modal' );


//$uri = JFactory::getURI();
//$url = $uri->toString(array('path', 'query', 'fragment'));


	//Extra login stuff, systems like openId and plugins HERE
    if (JPluginHelper::isEnabled('authentication', 'openid')) {
        $lang = JFactory::getLanguage();
        $lang->load('plg_authentication_openid', JPATH_ADMINISTRATOR);
        $langScript = 'var JLanguage = {};' .
                ' JLanguage.WHAT_IS_OPENID = \'' . JText::_('WHAT_IS_OPENID') . '\';' .
                ' JLanguage.LOGIN_WITH_OPENID = \'' . JText::_('LOGIN_WITH_OPENID') . '\';' .
                ' JLanguage.NORMAL_LOGIN = \'' . JText::_('NORMAL_LOGIN') . '\';' .
                ' var comlogin = 1;';
        $document = JFactory::getDocument();
        $document->addScriptDeclaration($langScript);
        JHTML::_('script', 'openid.js');
    }

    $html = '';
    JPluginHelper::importPlugin('vmpayment');
    $dispatcher = JDispatcher::getInstance();
    $returnValues = $dispatcher->trigger('plgVmDisplayLogin', array($this, &$html, $this->from_cart));

    if (is_array($html)) {
		foreach ($html as $login) {
		    echo $login.'<br />';
		}
    }
    else {
		echo $html;
    }

    //end plugins section

    //anonymous order section
    if ($this->order  ) {
    	?>

	    <div class="order-view">

	    <h1><?php echo JText::_('COM_VIRTUEMART_ORDER_ANONYMOUS') ?></h1>

	    <form action="<?php echo JRoute::_( 'index.php', true, 0); ?>" method="post" name="com-login" >

	    	<div class="width30 floatleft" id="com-form-order-number">
	    		<label for="order_number"><?php echo JText::_('COM_VIRTUEMART_ORDER_NUMBER') ?></label><br />
	    		<input type="text" id="order_number" name="order_number" class="inputbox" size="18" alt="order_number" />
	    	</div>
	    	<div class="width30 floatleft" id="com-form-order-pass">
	    		<label for="order_pass"><?php echo JText::_('COM_VIRTUEMART_ORDER_PASS') ?></label><br />
	    		<input type="text" id="order_pass" name="order_pass" class="inputbox" size="18" alt="order_pass" value="p_"/>
	    	</div>
	    	<div class="width30 floatleft" id="com-form-order-submit">
	    		<input type="submit" name="Submitbuton" class="button" value="<?php echo JText::_('COM_VIRTUEMART_ORDER_BUTTON_VIEW') ?>" />
	    	</div>
	    	<div class="clr"></div>
	    	<input type="hidden" name="option" value="com_virtuemart" />
	    	<input type="hidden" name="view" value="orders" />
	    	<input type="hidden" name="layout" value="details" />
	    	<input type="hidden" name="return" value="" />

	    </form>

	    </div>

<?php   }

    ?>
<section class="vm-login-panel row-fluid">
	<form action="<?php echo JRoute::_('index.php'); ?>" method="post" name="com-login" class="form-horizontal">
		<?php if (!$this->from_cart ) { ?>
		<div>
			<h2 class="span12 login-title"><?php echo JText::_('COM_VIRTUEMART_ORDER_CONNECT_FORM'); ?></h2>
		</div>
		<?php } else { ?>
		<div class="span12 title"><?php echo JText::_('COM_VIRTUEMART_ORDER_CONNECT_FORM'); ?></div>
		<?php } ?>
		<div class="row-fluid">
			<div class="span12">
				<div class="input-prepend" id="com-form-login-username">
					<span class="add-on"><i class="icon-user"></i></span>
					<input type="text" name="username" class="inputbox input-medium" size="18" alt="<?php echo JText::_('COM_VIRTUEMART_USERNAME'); ?>" value="<?php echo JText::_('COM_VIRTUEMART_USERNAME'); ?>" onblur="if(this.value=='') this.value='<?php echo addslashes(JText::_('COM_VIRTUEMART_USERNAME')); ?>';" onfocus="if(this.value=='<?php echo addslashes(JText::_('COM_VIRTUEMART_USERNAME')); ?>') this.value='';" />			
				</div>
				<div class="input-prepend add-margin" id="com-form-login-password">
					<span class="add-on"><i class="icon-lock"></i></span>
						<?php if ( JVM_VERSION===1 ) { ?>
					  <input type="password" id="passwd" name="passwd input-medium" class="inputbox" size="18" alt="<?php echo JText::_('COM_VIRTUEMART_PASSWORD'); ?>" value="<?php echo JText::_('COM_VIRTUEMART_PASSWORD'); ?>" onblur="if(this.value=='') this.value='<?php echo addslashes(JText::_('COM_VIRTUEMART_PASSWORD')); ?>';" onfocus="if(this.value=='<?php echo addslashes(JText::_('COM_VIRTUEMART_PASSWORD')); ?>') this.value='';" />
						<?php } else { ?>
						<input id="modlgn-passwd" type="password" name="password" class="inputbox input-medium" size="18" alt="<?php echo JText::_('COM_VIRTUEMART_PASSWORD'); ?>" value="<?php echo JText::_('COM_VIRTUEMART_PASSWORD'); ?>" onblur="if(this.value=='') this.value='<?php echo addslashes(JText::_('COM_VIRTUEMART_PASSWORD')); ?>';" onfocus="if(this.value=='<?php echo addslashes(JText::_('COM_VIRTUEMART_PASSWORD')); ?>') this.value='';" />	
						<?php } ?>
				</div>
				<input type="submit" name="Submit" class="default btn" value="<?php echo JText::_('COM_VIRTUEMART_LOGIN') ?>" />
				<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
				<label for="remember" class="checkbox inline">			
					<input type="checkbox" id="remember" name="remember" class="inputbox" value="yes" alt="Remember Me" />
					<?php echo $remember_me = JVM_VERSION===1? JText::_('Remember me') : JText::_('JGLOBAL_REMEMBER_ME') ?>
				</label>
				<?php endif; ?>
				<div class="row-fluid username-password-recovery">
					<div class="span12">
			      <span>
		          <a href="<?php echo JRoute::_('index.php?option='.$comUserOption.'&view=remind'); ?>">
		          <?php echo JText::_('COM_VIRTUEMART_ORDER_FORGOT_YOUR_USERNAME'); ?></a>
			      </span>
						&nbsp;<span>/</span>&nbsp;
			      <span>
		          <a href="<?php echo JRoute::_('index.php?option='.$comUserOption.'&view=reset'); ?>">
		          <?php echo JText::_('COM_VIRTUEMART_ORDER_FORGOT_YOUR_PASSWORD'); ?></a>
			      </span>	
					</div>		
				</div>
	    <?php if ( JVM_VERSION===1 ) { ?>
	    <input type="hidden" name="task" value="login" />
	    <?php } else { ?>
	<input type="hidden" name="task" value="user.login" />
	    <?php } ?>
	    <input type="hidden" name="option" value="<?php echo $comUserOption ?>" />
	    <input type="hidden" name="return" value="<?php echo base64_encode($url) ?>" />
	    <?php echo JHTML::_('form.token'); ?>
			</div>
		</div>
	</form>
</section>

<?php  } else 
if ($user->id  ){ ?>
<section class="vm-login-panel">
	<form action="<?php echo JRoute::_('index.php'); ?>" method="post" name="login" id="form-login">
		<?php echo JText::sprintf( 'COM_VIRTUEMART_HINAME', $user->name ); ?>
		<input type="submit" name="Submit" class="button btn" value="<?php echo JText::_( 'COM_VIRTUEMART_BUTTON_LOGOUT'); ?>" />
    <input type="hidden" name="option" value="<?php echo $comUserOption ?>" />
    <?php if ( JVM_VERSION===1 ) { ?>
        <input type="hidden" name="task" value="logout" />
    <?php } else { ?>
        <input type="hidden" name="task" value="user.logout" />
    <?php } ?>
    <?php echo JHtml::_('form.token'); ?>
		<input type="hidden" name="return" value="<?php echo base64_encode($url) ?>" />
    </form>
</section>
<?php }

?>

