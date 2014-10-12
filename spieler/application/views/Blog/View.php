			<link rel="canonical" href="">
			<h3><?= $breadcrumbs; ?></h3>
			<ul>
			   <? foreach($sections_list as $sections): ?>
			   <li><?= SpHTML::anchor(Kohana::$config->load('global.site_url').'/'.$mod_url.'/sections/'.$sections['section_url'], HTML::chars($sections['section_title'])); ?></li>
			   <?php endforeach; ?>
			</ul>
		    <div class="news_full">
			       <div class="news_date"><?= Date::formatted_time($blog_list['item_publish_date'], 'd.m.Y'); ?></div>
			       <br />
				   <? if($blog_list['item_picture'] != '') { ?><img src="img/w400-h250-c/media/upload/<?=$blog_list['item_picture'];?>"><? } ?>
			       <h5><?= $blog_list['item_title']; ?></h5>
			       <div class="news_info"> 
				    <?= $blog_list['item_text']; ?>
			       </div>
			       <div class="clearer"></div>
			       <div>
				    <?= $blog_list['item_text_full']; ?>				    
			       </div>
			       <div> </div>
			       <div class="left">
			       <?= SpHTML::anchor(
				       URL::base('http').$mod_url.'/',
				       __('Blog'),
				       $attributes = array());
			       ?>
			      </div>
				  
		    </div>