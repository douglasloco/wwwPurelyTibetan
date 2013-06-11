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
<figure class="product-image-gallery row-fluid">
	<?php if (fopen($this->product->images[0]->file_url, 'r') and !empty($this->product->images[0]) and count($this->product->images)<2 ) { ?>
	<div class="large-image-container span12" >			
		<a href="<?php echo $this->product->images[0]->file_url;?>" class="cloud-zoom" id="zoom1" rel="adjustX: 10, adjustY:-4">
			<img class="large-images single" src="<?php echo $this->product->images[0]->file_url; ?>" alt="<?php echo $this->product->product_name ?>"/>		
		</a>		
	</div>
	<span class="modal-zoom">
		<?php 
		$count = 1;
		foreach ($this->product->images as $image) {?>
			<a class="modal-zoom-link<?php if($count>1) echo ' hide'; else echo ' show';?>" href="<?php echo $ipath.'/'; echo $image->file_url; ?>" rel="prettyPhoto" ></a>
		<?php 
		$count++;
		}?>
	</span>
	<?php } 
	elseif (fopen($this->product->images[0]->file_url, 'r') and !empty($this->product->images) and count($this->product->images)>1) { ?>
	<div class="span2">
		<div class="thumbnails-container">
			<?php 
			$i=0;
			foreach ($this->product->images as $image) {?>
			<div class="image-thumbnails">
				<a href="<?php echo $ipath.'/'; echo $image->file_url; ?>" class="cloud-zoom-gallery<?php if($i==0) { echo ' active';} ?>" title="<?php echo $image->file_description; ?>" rel="useZoom: 'zoom1', smallImage: '<?php echo $ipath.'/'; echo $image->file_url; ?>'">
					<img class="thumbnail-image" src="<?php echo $ipath.'/'; echo $image->file_url_thumb; ?>" alt = "<?php echo $this->product->product_name ?> Image <?php echo $i ?>"/>
				</a>
			</div>
			<?php 
			$i++;
			}?>	
		</div>	
	</div>		
	<div class="span10 larger-image-top-wrap">
	<div>
		<div class="large-image-container" >			
			<a href="<?php echo $ipath.'/'; echo $this->product->images[0]->file_url;?>" class="cloud-zoom" id="zoom1" rel="adjustX: 10, adjustY:-4">
				<img class="large-images" src="<?php echo $ipath.'/'; echo $this->product->images[0]->file_url;?>"  alt="<?php echo $this->product->product_name ?>" />
			</a>		
		</div>
	</div>
	</div>
	<span class="modal-zoom">
		<?php 
		$count = 1;
		foreach ($this->product->images as $image) {?>
			<a class="modal-zoom-link<?php if($count>1) echo ' hide'; else echo ' show';?>" href="<?php echo $ipath.'/'; echo $image->file_url; ?>" rel="prettyPhoto[gal1]" ></a>
		<?php 
		$count++;
		}?>
	</span>
	<?php } else  {
		echo $this->product->images[0]->displayMediaThumb( 'class="featuredProductImage" border="0"',false );
	} ?> 
</figure>
<?php } else {?>
<figure class="product-image-gallery row-fluid simple-gallery">
	<?php if (fopen($this->product->images[0]->file_url, 'r') and !empty($this->product->images[0]) and count($this->product->images)<2 ) { ?>
	<div class="large-image-container span12" >				
		<img id="simple-large-image" class="large-images single" src="<?php echo $this->product->images[0]->file_url; ?>" alt="<?php echo $this->product->product_name ?>"/>	
	</div>
	<span class="modal-zoom">
		<?php 
		$count = 1;
		foreach ($this->product->images as $image) {?>
			<a class="modal-zoom-link<?php if($count>1) echo ' hide'; else echo ' show';?>" href="<?php echo $ipath.'/'; echo $image->file_url; ?>" rel="prettyPhoto" ></a>
		<?php 
		$count++;
		}?>
	</span>	
	<?php } 
	elseif (fopen($this->product->images[0]->file_url, 'r') and !empty($this->product->images) and count($this->product->images)>1) { ?>
	<div class="span2">
		<div class="thumbnails-container">
			<?php 
			$i=0;
			foreach ($this->product->images as $image) {?>
			<div class="image-thumbnails">
				<a href="<?php echo $ipath.'/'; echo $image->file_url; ?>" class="simple-zoom-gallery<?php if($i==0) { echo ' active';} ?>" title="<?php echo $image->file_description; ?>">
					<img class="thumbnail-image" src="<?php echo $ipath.'/'; echo $image->file_url_thumb; ?>" alt = "<?php echo $this->product->product_name ?> Image <?php echo $i ?>"/>
				</a>
			</div>
			<?php 
			$i++;
			}?>	
		</div>	
	</div>		
	<div class="span10 larger-image-top-wrap"><div>
		<div class="large-image-container" >			
			<img id="simple-large-image" class="large-images" src="<?php echo $ipath.'/'; echo $this->product->images[0]->file_url;?>" />	
		</div>
	</div>
	</div>
	<span class="modal-zoom">
		<?php 
		$count = 1;
		foreach ($this->product->images as $image) {?>
			<a class="modal-zoom-link<?php if($count>1) echo ' hide'; else echo ' show';?>" href="<?php echo $ipath.'/'; echo $image->file_url; ?>" rel="prettyPhoto[gal1]" ></a>
		<?php 
		$count++;
		}?>
	</span>
	<?php } else  {
		echo $this->product->images[0]->displayMediaThumb( 'class="featuredProductImage" border="0"',false );
	} ?> 
</figure>	
<?php } ?>

