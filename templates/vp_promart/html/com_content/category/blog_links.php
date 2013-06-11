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

// no direct access
defined('_JEXEC') or die;
$params =& $this->item->params;
$app = JFactory::getApplication();
$templateparams =$app->getTemplate(true)->params;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
?>

<div class="items-more">
<h3><?php echo JText::_('COM_CONTENT_MORE_ARTICLES'); ?></h3>

<ol>

<?php
	foreach ($this->link_items as &$item) :
?>
		 <li>
		  		<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid)); ?>">
			<?php echo $item->title; ?></a>
		</li>
<?php endforeach; ?>
	</ol>
</div>

