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
?>
<figure class="product-image-mobile-gallery quick-view">
	<?php if (fopen($this->product->images[0]->file_url, 'r') and !empty($this->product->images[0]) and count($this->product->images)<2 ) { ?>
	<div class="large-image-container span12" >					
			<img class="large-images single" src="<?php echo $this->product->images[0]->file_url; ?>" />		
	</div>
	<?php } 
	elseif (fopen($this->product->images[0]->file_url, 'r') and !empty($this->product->images) and count($this->product->images)>1) { ?>
	<div class="span12 large-image-container" >			
			<img id="quick-enlarged" class="quick-large-images" src="<?php echo $ipath.'/'; echo $this->product->images[0]->file_url;?>" alt="<?php echo $this->product->product_name ?>"/>					
	</div>
	<div class="row-fluid">
		<div class="thumbnails-container span12">
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
	<?php } else  {
		echo $this->product->images[0]->displayMediaThumb( 'class="featuredProductImage" border="0"',false );
	} ?> 
</figure>