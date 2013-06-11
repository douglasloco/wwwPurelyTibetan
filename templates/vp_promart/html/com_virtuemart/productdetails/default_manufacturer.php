<?php defined('_JEXEC') or die('Restricted access');
/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.4
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/
$app = JFactory::getApplication();
$templateparams	= $app->getTemplate(true)->params;

$db = JFactory::getDBO();
$mid = $this->product->virtuemart_manufacturer_id;
$query = "SELECT virtuemart_media_id FROM #__virtuemart_manufacturer_medias WHERE virtuemart_manufacturer_id = '$mid' ;";
$db->setQuery($query);
if ($db->loadResultArray()== NULL) {
	$file_url_thumb = '';
	$manThumbImage = '';
} else {
	$column= $db->loadResultArray();
	$mediaid = $column[0];
	$query = "SELECT file_url_thumb FROM #__virtuemart_medias WHERE virtuemart_media_id = '$mediaid' ;";
	$db->setQuery($query);
	$column= $db->loadResultArray();
	$file_url_thumb = $column[0];

	$alt= $this->product->mf_name;
	$manThumbImageUrl = $this->baseurl."/".$file_url_thumb; 
	$manThumbImage = "<img src=\"$manThumbImageUrl\" alt=\"$alt\" class='man-thumb-image' />";
}	
	$manufacturerProductsURL = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_manufacturer_id=' . $this->product->virtuemart_manufacturer_id);

	
if($templateparams->get('manufacturer-details')==1) { ?>
<div class="product-details-manifacturer-logo">
	<div class="man-inner">
		<?php if (!empty($file_url_thumb)){?>
			<a href="#Manucaturer" class="manufacturer-details-link" data-toggle="modal" ><?php echo $manThumbImage ?></a>
		<?php } else {?>
			<a href="#Manucaturer" class="manufacturer-details-link" data-toggle="modal" ><?php echo $this->product->mf_name ?></a>	
		<?php } ?>
	</div>
</div>
<div class="boot-modal hide fade" id="Manucaturer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"><?php echo $this->product->mf_name ?></h3>
  </div>
  <div class="modal-body">
		<div class="row-fuid">
			<?php if (!empty($manThumbImage)){?>
			<div class="span6">
				<?php echo $manThumbImage ?>
			</div>
			<?php }?>
			<div class="<?php if (empty($manThumbImage)) echo 'span12'; else echo 'span6';?>">
		    <p>
					<?php echo $this->product->mf_name ?><br/>
					<?php echo $this->product->mf_desc ?>			
				</p>
				<p>
					<?php if (!empty($this->product->mf_email)) echo JHtml::_('email.cloak', $this->product->mf_email,true,JText::_('COM_VIRTUEMART_EMAIL'),false) ?><br/>
					<a target="_blank" href="<?php echo $this->product->mf_url ?>"><?php echo JText::_('COM_VIRTUEMART_MANUFACTURER_PAGE') ?></a>	
				</p>			
			</div>
		</div>
  </div>
	<div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<a class="btn btn-primary" target="_top" href="<?php echo $manufacturerProductsURL; ?>"><?php echo JText::sprintf('COM_VIRTUEMART_PRODUCT_FROM_MF',$this->product->mf_name); ?></a>
  </div>
</div>
<?php } 
if($templateparams->get('manufacturer-details')==0) { ?>
<div class="product-details-manifacturer-logo">
	<div class="man-inner">
		<?php if (!empty($file_url_thumb)){
			echo $manThumbImage;
		}else {
			echo $this->product->mf_name;
		}?>
	</div>
</div>
<?php }	
?>

