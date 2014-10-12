	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    
		    <div>
			 <?= Form::open(URL::base('http').Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/'.$mod_action.'/', array('method' => 'POST', 'name' => 'news_form', 'enctype' => 'multipart/form-data', 'id' => 'form_news', 'class' => 'well p_form')); ?>

			      <div class="alert alert-info hide" id="i_form_saved">
				   <?= __('Autosave_success'); ?>
				   <a href="#" class="close" data-dismiss="alert">&times;</a>
			      </div>
			      
			      <legend>
				   <?= $form_title; ?>
				   <div class="control-group pull-right">
					<?= Form::submit('send_form', __('Send'), array('class' => 'btn btn-primary', 'id' => 'send_form')); ?>
					<?= Form::submit('submit_form', __('Submit'), array('class' => 'btn btn-info', 'id' => 'submit_form')); ?>
					<?= Form::input('cancel_form', __('Cancel'), array('type'=>'reset', 'class' => 'btn', 'id' => 'cancel_form', 'onclick' => 'window.location = "'.URL::base('http').Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/"')); ?>
				   </div>
			      </legend>
			 
			      <div class="clearfix"></div>
			      <? if($news_list['news_title'] != '') { ?><big><i><?= $news_list['news_title']; ?></i></big><br /><br /> <? } ?>
			      <div class="clearfix"></div>
			      
			      <ul class="nav nav-tabs" id="FormTabs">
				  <li class="active"><a href="#tabm" data-toggle="tab"><i class="icon-edit"></i> <?= __('Content');?></a></li>
				  <li><a href="#tabseo" data-toggle="tab"><i class="icon-globe"></i> <?= __('SEO');?></a></li>
				  <li><a href="#tabphoto" data-toggle="tab"><i class="icon-picture"></i> <?= __('Photo');?></a></li>
				  <li><a href="#tabset" data-toggle="tab"><i class="icon-wrench"></i> <?= __('Settings');?></a></li>
			      </ul>
			      
			      <div id="myTabContent" class="tab-content">
				   <div class="tab-pane fade in active" id="tabm">
					<div class="control-group">
					     <?= Form::label('content_title', __('News_title'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('news_title', $news_list['news_title'], array('class' => 'input span6', 'id' => 'content_title', 'placeholder' => __('News_title'), 'required' => '')); ?>
					     </div>
					</div>
					     <div class="control-group">
						  <?= Form::label('content_url', __('URL'), array('class' => 'control-label')); ?>
						  <div class="controls controls-row">
						       <?= Form::input('news_url', $news_list['news_url'], array('class' => 'input span6', 'id' => 'content_url', 'placeholder' => __('URL'), 'required' => '')); ?>
						       <div class="clearfix"></div>
						       <?= Form::checkbox('url_change', 1, $url_change, array('id' => 'stop_auto_url')); ?> <?= __('Do_not_change_url');?>
						  </div>
					     </div>
					     <div class="control-group">
						  <?= Form::label('content_section', __('Section'), array('class' => 'control-label')); ?>
						  <div class="controls controls-row">
						       <?= Form::select('news_section', $news_sections_list, $news_list['id_section'], array('id' => 'content_section', 'data-style' => 'btn-info')); ?>
						  </div>
					     </div>

					     <div class="control-group">
						  <?= Form::label('content_text', __('News_text'), array('class' => 'control-label')); ?>
						  <div class="controls">
						       <?= Form::textarea('news_text', $news_list['news_text'], array('class' => 'input span6', 'id' => 'content_text', 'placeholder' => __('News_text'))); ?>
						       <script>
							    CKEDITOR.replace( 'news_text',
								 {
								      toolbar: [
									   { name: 'document', items: [ 'Source', ] },
										[ 'PasteFromWord', 'RemoveFormat'],
										['Undo', 'Redo' ],
									   '/',
									   { name: 'basicstyles', items: [ 'Styles', 'Format', 'Bold','Italic','Underline','Strike', ] },
										[ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-'],
									   '/',
										[ 'Link','Unlink','Anchor' ],
										[ 'Image', 'Flash', '-', 'youtube', 'oembed', ],
										[ 'NumberedList','BulletedList', '-', 'Subscript','Superscript', 'Blockquote', ]
										
										
								      ],
								
								      
								      
								      
								      'filebrowserBrowseUrl':'<?=URL::base(); ?>public/default/editors/ckeditor/kcfinder/browse.php?type=files',
								      'filebrowserImageBrowseUrl':'<?=URL::base(); ?>public/default/editors/ckeditor/kcfinder/browse.php?type=images',
								      'filebrowserFlashBrowseUrl':'<?=URL::base(); ?>public/default/editors/ckeditor/kcfinder/browse.php?type=flash',
								      'filebrowserUploadUrl':'<?=URL::base(); ?>public/default/editors/ckeditor/kcfinder/upload.php?type=files',
								      'filebrowserImageUploadUrl':'<?=URL::base(); ?>public/default/editors/ckeditor/kcfinder/upload.php?type=images',
								      'filebrowserFlashUploadUrl':'<?=URL::base(); ?>public/default/editors/ckeditor/kcfinder/upload.php?type=flash'
								 }
								  
							    );

						       </script>
						     
						       
						  </div>
					     </div>
					     <div class="control-group">
						  <?= Form::label('content_text_full', __('News_text_full'), array('class' => 'control-label')); ?>
						  <div class="controls">
						       <?= Form::textarea('news_text_full', $news_list['news_text_full'], array('class' => 'input span6', 'id' => 'content_text_full', 'placeholder' => __('News_text_full'))); ?>
						       <script>
							    CKEDITOR.replace( 'news_text_full',
								 {
								      toolbar: [
									   { name: 'document', items: [ 'Source', '-', 'Maximize', 'Preview', '-', 'Templates', 'ShowBlocks' ] },
										[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', 'RemoveFormat'],
										['Undo', 'Redo' ],
										[ 'Outdent','Indent','-','TextColor','BGColor','-', ],
									   '/',
									   { name: 'basicstyles', items: [ 'Styles', 'Format', 'Font', 'FontSize', 'Bold','Italic','Underline','Strike', ] },
										[ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-'],
									   '/',
										[ 'Link','Unlink','Anchor' ],
										[ 'Image', 'Flash', '-', 'youtube', 'oembed', ],
										[ 'Table','HorizontalRule','SpecialChar','PageBreak' ],
										[ 'NumberedList','BulletedList', '-', 'Subscript','Superscript', 'Blockquote', ]
										
										
								      ],
								
								      
								      
								      
								      'filebrowserBrowseUrl':'<?=URL::base(); ?>public/default/editors/ckeditor/kcfinder/browse.php?type=files',
								      'filebrowserImageBrowseUrl':'<?=URL::base(); ?>public/default/editors/ckeditor/kcfinder/browse.php?type=images',
								      'filebrowserFlashBrowseUrl':'<?=URL::base(); ?>public/default/editors/ckeditor/kcfinder/browse.php?type=flash',
								      'filebrowserUploadUrl':'<?=URL::base(); ?>public/default/editors/ckeditor/kcfinder/upload.php?type=files',
								      'filebrowserImageUploadUrl':'<?=URL::base(); ?>public/default/editors/ckeditor/kcfinder/upload.php?type=images',
								      'filebrowserFlashUploadUrl':'<?=URL::base(); ?>public/default/editors/ckeditor/kcfinder/upload.php?type=flash'
								 }
								  
							    );

						       </script>
						  </div>
					     </div>
				   </div>
				   <div class="tab-pane fade" id="tabseo">
					<div class="control-group">
					     <?= Form::label('content_seo_title', __('News_seo_title'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('news_seo_title', $news_list['news_seo_title'], array('class' => 'input span6', 'id' => 'content_seo_title', 'placeholder' => __('News_seo_title'))); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_seo_keywords', __('News_seo_keywords'), array('class' => 'control-label')); ?>
					     <div class="controls">
						  <?= Form::textarea('news_seo_keywords', $news_list['news_seo_keywords'], array('class' => 'input span6', 'id' => 'content_seo_keywords', 'placeholder' => __('News_seo_keywords'))); ?>
					     </div>
					</div>
					<div class="control-group">
						  <?= Form::label('content_seo_descr', __('News_seo_descr'), array('class' => 'control-label')); ?>
						  <div class="controls">
						       <?= Form::textarea('news_seo_descr', $news_list['news_seo_descr'], array('class' => 'input span6', 'id' => 'content_seo_descr', 'placeholder' => __('News_seo_descr'))); ?>
						  </div>
					</div>
				   </div>
				   <div class="tab-pane fade" id="tabphoto">
					<div class="control-group">
					     <?= Form::label('content_photo', __('News_picture'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::file('content_photo', array('class' => 'span4', 'accept' => 'image/*', 'id' => 'content_photo')); ?>
						  <div class="clearfix"></div>
						  <i><?= __('Current_f');?>: <? if($news_list['news_picture'] != '') { ?><img src="<?= URL::base('http').'media/news/'.$news_list['news_picture_dir'].$news_list['news_picture']; ?>" alt="" width="300" /> <? } else echo __('No'); ?></i>
						  <div class="clearfix"><br /></div>
						  <?= Form::checkbox('content_photo_nc', 1, '', array('class' => '', 'id' => 'content_photo_nc')); ?> Не изменять маленькую картинку и картинку для блока главных новостей 
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_photo_small', __('News_picture_small'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::file('content_photo_small', array('class' => 'span4', 'accept' => 'image/*', 'id' => 'content_photo_small')); ?>
						  <div class="clearfix"></div>
						  <i><?= __('Current_f');?>: <? if($news_list['news_picture_small'] != '') { ?><img src="<?= URL::base('http').'media/news/'.$news_list['news_picture_dir'].$news_list['news_picture_small']; ?>" alt="" /> <? } else echo __('No'); ?></i>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_photo_main', __('News_picture_main'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::file('content_photo_main', array('class' => 'span4', 'accept' => 'image/*', 'id' => 'content_photo_main')); ?>
						  <div class="clearfix"></div>
						  <i><?= __('Current_f');?>: <? if($news_list['news_picture_small'] != '') { ?><img src="<?= URL::base('http').'media/news/'.$news_list['news_picture_dir'].$news_list['news_picture_main']; ?>" alt="" /> <? } else echo __('No'); ?></i>
					     </div>
					</div>
					
				   </div>
				   <div class="tab-pane fade" id="tabset">
					<div class="control-group">
					     <?= Form::label('datepicker', __('News_date'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						
						  <div class="input-append" id="datepicker" >
						       <?= Form::input('news_date', Date::formatted_time($news_list['news_date'], 'd.m.Y H:i:s'), array('class' => 'input span12', 'data-format' => 'dd.MM.yyyy hh:mm:ss')); ?>
						       <span class="add-on"><i class="icon-calendar add_picker"></i></span>
						  </div>	       
					     </div>   
					</div> 
					<div class="control-group">
						  <?= Form::label('content_author', __('News_author'), array('class' => 'control-label')); ?>
						  <div class="controls controls-row">
						       <?= Form::select('news_author_id', $authors_list, Auth::instance()->get_user()->id, array('id' => 'content_author_list', 'data-style' => 'btn-info')); ?>
						       <div class="clearfix"></div>
						       <?= Form::input('news_author', $news_list['news_author'], array('class' => 'input span6', 'id' => 'content_author', 'placeholder' => __('News_author'))); ?>
						  </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_activity inline', __('Activity'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::checkbox('news_activity', 1, $activity_flag, array('class' => '', 'id' => 'content_activity')); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_ismain inline', __('News_main'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::checkbox('news_ismain', 1, $ismain_flag, array('class' => '', 'id' => 'content_ismain')); ?>
					     </div>
					</div>
				   </div>
			      </div>
			      
			      

			     
			      <div class="control-group">
				   
			      </div>
			      <div class="control-group pull-right">
				   <?= Form::submit('send_form', __('Send'), array('class' => 'btn btn-primary', 'id' => 'send_form')); ?>
				   <?= Form::submit('submit_form', __('Submit'), array('class' => 'btn btn-info', 'id' => 'submit_form')); ?>
				   <?= Form::input('cancel', __('Cancel'), array('type' => 'reset', 'class' => 'btn', 'id' => 'cancel_form', 'onclick' => 'window.location = "'.URL::base(true).$mod_url.'"')); ?>
			      </div>
			      <div class="clearfix"></div>
			      <hr>
			      <?= Form::hidden('action_type', $sub_action); ?>
			      <?= Form::hidden('news_id', $news_id); ?>
			      <?= Form::hidden('news_picture_old', $news_list['news_picture']); ?>
			      <?= Form::hidden('news_picture_small_old', $news_list['news_picture_small']); ?>
			      <?= Form::hidden('news_picture_main_old', $news_list['news_picture_main']); ?>
			      <?= Form::hidden('news_picture_dir', $news_list['news_picture_dir']); ?>
			      <?= Form::hidden('news_url_old', $news_list['news_url']); ?>
			      <?= Form::hidden('contact_time', $contact_time_cr); ?>
			      <?= Form::hidden('contact_xhr', $contact_secret); ?>
			 <?= Form::close(); ?> 
		    </div>
	       </div><!--/row-->