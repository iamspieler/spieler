			<link rel="canonical" href="">
			<? while(list($key, $val) = each($lang_array)): ?>
					<li><?= SpHTML::anchor(URL::base('http').$key.'/blog/', HTML::chars($val)); ?></li>
			   <?php endwhile; ?>
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
		    <div class="news_full">
			       <div class="news_date"><?= Date::formatted_time($blog_list['item_publish_date'], 'd.m.Y'); ?></div>
			       <br />
				   <? if($blog_list['item_picture'] != '') { ?><img src="img/w400-h250-c/media/blog/<?=$blog_list['item_picture_dir'];?>/<?=$blog_list['item_picture'];?>"><? } ?>
			       <h5><?= $blog_list['item_title_'.LANG]; ?></h5>
			       <div class="news_info"> 
				    <?= $blog_list['item_text_'.LANG]; ?>
			       </div>
			       <div class="clearer"></div>
			       <div>
				    <?= $blog_list['item_text_full_'.LANG]; ?>				    
			       </div>
			       <div> </div>
			       <div class="left">
			       <?= SpHTML::anchor(
				       URL::base('http').LANG_SUBURL.$mod_url.'/',
				       __('Blog'),
				       $attributes = array());
			       ?>
			      </div>
				  <p>
					   <? if((isset($blog_list['sect_ids'])) and (isset($blog_list['sect_names']))) { $sect_list = array_combine(explode("::::", $blog_list['sect_ids']), explode("::::", $blog_list['sect_names']));?>
					   <?php foreach($sect_list as $key => $value): ?>
						 <?= $sections = SpHTML::anchor(URL::base('http').LANG_SUBURL.$mod_url.'/sections/'.$key.'/', $value); ?>
					   <?php endforeach; } ?> 
				  </p>
				  <p>
					   <? if(!empty($tags_list)) {
							foreach($tags_list as $tags): ?>
								<? $tag_links[] = SpHTML::anchor(URL::base('http').LANG_SUBURL.'tags/'.$tags['tag_url'].'/', HTML::chars($tags['tag_title_'.LANG])); ?>
							<?php endforeach; 
							echo implode(', ', $tag_links);
						}
					   ?>
				  </p>
		    </div>