			   <ul>
			   <? while(list($key, $val) = each($lang_array)): ?>
					<li><?= SpHTML::anchor(URL::base('http').$key.'/blog/', HTML::chars($val)); ?></li>
			   <?php endwhile; ?>
			   </ul>
			   
			   <h3><?= $breadcrumbs; ?></h3>
			   <ul>
			   <? foreach($sections_list as $sections): ?>
					<li><?= SpHTML::anchor(URL::base('http').LANG_SUBURL.$mod_url.'/sections/'.$sections['section_url'].'/', HTML::chars($sections['section_title_'.LANG])); ?></li>
			   <?php endforeach; ?>
			   </ul>
			   <? foreach($blog_list as $blog): ?>
			   <?
						switch ($url_type) {
							case 0:
								$entry_url = 'item/'.HTML::chars($blog['id_item']);
								break;
							case 1:
								$entry_url = HTML::chars($blog['item_url']);
								break;
							case 2:
								$entry_url = substr(HTML::chars($blog['item_publish_date']),0,4).'/'.substr(HTML::chars($blog['item_publish_date']),5,2).'/'.substr(HTML::chars($blog['item_publish_date']),8,2).'/'.HTML::chars($blog['item_url']);
								break;
							default:
								$entry_url = 'item/'.HTML::chars($blog['id_item']);
						}
			   
			   
			   ?>
			   <div>
					<h2><?= SpHTML::anchor(URL::base('http').LANG_SUBURL.$mod_url.'/'.$entry_url.'/', HTML::chars($blog['item_title_'.LANG])); ?></h2>
					<div class="news_date"><?= Date::formatted_time($blog['item_publish_date'], 'd.m.Y'); ?></div>
					<?= SpHTML::unchars($blog['item_text_'.LANG]); ?> 
					<?php if(isset($photos_list))
					foreach($photos_list as $photo): ?>
					     <div id="gallery">
						  <div id="photo_main">
						       <div id="photo_img">
							     <img src="media/photo/<?= $photo['photo_medium'];?>" class="img-responsive looping" alt="...">
						       </div>
						       <div id="caption">
							    <span id="title"></span>
							    <div id="description">
							    </div>
						       </div>
						  </div>
						  <div class="thumbnails">
						       <a href="#" rel="media/photo/<?= $photo['photo_medium'];?>" rev="165" title="" content="" class="gthumb">
							  <img src="media/photo/<?= $photo['photo_small'];?>" id="tm165" class="thumb" alt="" />
						       </a>
						  </div>
					     </div>
					     <?php endforeach; ?>
					<?= SpHTML::unchars($blog['item_text_full_'.LANG]); ?> 
					<p>
					   <? if((isset($blog['sect_ids'])) and (isset($blog['sect_names']))) { $sect_list = array_combine(explode("::::", $blog['sect_ids']), explode("::::", $blog['sect_names']));?>
					   <?php foreach($sect_list as $key => $value): ?>
						 <?= $sections = SpHTML::anchor(URL::base('http').$mod_url.'/sections/'.$key.'/', $value); ?>
					   <?php endforeach; } ?> 
					</p>
			   </div>
			    <?php endforeach; ?>
				<div>
					<?= $pagination; ?>
				</div>
	       