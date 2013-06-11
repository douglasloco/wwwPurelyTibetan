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
$ipath = $this->baseurl;
$app = JFactory::getApplication();
$templateparams	= $app->getTemplate(true)->params;
?>
<?php if($templateparams->get('enable_cloud_zoom')==1) { ?>
<div class="product-image-gallery quick-view row-fluid">
	<?php if (fopen($this->product->images[0]->file_url, 'r') and !empty($this->product->images[0]) and count($this->product->images)<2 ) { ?>
	<div class="large-image-container span12" >	
		<a href="<?php echo $ipath.'/'; echo $this->product->images[0]->file_url;?>" class="cloud-zoom" id="zoom1" rel="position: 'inside', adjustX: 0, adjustY:0">
			<img class="large-images single" src="<?php echo $ipath.'/'; echo $this->product->images[0]->file_url;?>" />
		</a>					
	</div>
	<?php } 
	elseif (fopen($this->product->images[0]->file_url, 'r') and !empty($this->product->images) and count($this->product->images)>1) { ?>
	<div class="span2">
		<div class="thumbnails-container">
			<?php 
			$i=0;
			foreach ($this->product->images as $image) {?>
			<div class="image-thumbnails">
				<a href="<?php echo $ipath.'/'; echo $image->file_url; ?>" class="cloud-zoom-gallery<?php if($i==0) { echo ' active';} ?>" title="<?php echo $image->file_description; ?>" rel="useZoom: 'zoom1', smallImage: '<?php echo $ipath.'/'; echo $image->file_url; ?>'">
					<img class="thumbnail-image" src="<?php echo $ipath.'/'; echo $image->file_url_thumb; ?>" alt = "Thumbnail 1"/>
				</a>
			</div>
			<?php 
			$i++;
			}?>	
		</div>	
	</div>		
	<div class="span10 larger-image-top-wrap"><div>
		<div class="large-image-container" >			
			<a href="<?php echo $ipath.'/'; echo $this->product->images[0]->file_url;?>" class="cloud-zoom" id="zoom1" rel="position: 'inside', adjustX: 0, adjustY:0">
				<img id="quick-enlarged" class="quick-large-images" src="<?php echo $ipath.'/'; echo $this->product->images[0]->file_url;?>" />
			</a>					
		</div>
	</div>
	</div>
	<?php } else  {
		echo $this->product->images[0]->displayMediaThumb( 'class="featuredProductImage" border="0"',false );
	} ?> 
</div>
<?php } else {?>
<div class="product-image-gallery quick-view row-fluid">
	<?php if (fopen($this->product->images[0]->file_url, 'r') and !empty($this->product->images[0]) and count($this->product->images)<2 ) { ?>
	<div class="large-image-container span12" >					
			<img class="large-images single" src="<?php echo $this->product->images[0]->file_url; ?>" />		
	</div>
	<?php } 
	elseif (fopen($this->product->images[0]->file_url, 'r') and !empty($this->product->images) and count($this->product->images)>1) { ?>
	<div class="span2">
		<div class="thumbnails-container">
			<?php 
			$i=0;
			foreach ($this->product->images as $image) {?>
			<div class="image-thumbnails">
				<a href="<?php echo $ipath.'/'; echo $image->file_url; ?>" class="quick-gallery<?php if($i==0) { echo ' active';} ?>" title="<?php echo $image->file_description; ?>" >
					<img class="thumbnail-image" src="<?php echo $ipath.'/'; echo $image->file_url_thumb; ?>" alt = "Thumbnail-<?php echo $i ?>"/>
				</a>
			</div>
			<?php 
			$i++;
			}?>	
		</div>	
	</div>		
	<div class="span10 larger-image-top-wrap"><div>
		<div class="large-image-container" >			
			<img id="quick-enlarged" class="quick-large-images" src="<?php echo $ipath.'/'; echo $this->product->images[0]->file_url;?>" alt="<?php echo $this->product->product_name ?>"/>					
		</div>
	</div>
	</div>
	<?php } else  {
		echo $this->product->images[0]->displayMediaThumb( 'class="featuredProductImage" border="0"',false );
	} ?> 
</div>	
<?php } ?>

