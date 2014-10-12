	       <?= $breadcrumbs;
	       print_r($brands_sections);
	       ?>
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
			      <? if($brands_list['brand_title'] != '') { ?><big><i><?= $brands_list['brand_title']; ?></i></big><br /><br /> <? } ?>
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
					     <?= Form::label('content_title', __('Brand_title'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('brand_title', SpHTML::unchars($brands_list['brand_title']), array('class' => 'input span6', 'id' => 'content_title', 'placeholder' => __('Brand_title'), 'required' => '')); ?>
					     </div>
					</div>
					     <div class="control-group">
						  <?= Form::label('content_url', __('URL'), array('class' => 'control-label')); ?>
						  <div class="controls controls-row">
						       <?= Form::input('brand_url', $brands_list['brand_url'], array('class' => 'input span6', 'id' => 'content_url', 'placeholder' => __('URL'), 'required' => '')); ?>
						       <div class="clearfix"></div>
						       <?= Form::checkbox('url_change', 1, $url_change, array('id' => 'stop_auto_url')); ?> <?= __('Do_not_change_url');?>
						  </div>
					     </div>
					     <div class="control-group">
						  <?= Form::label('content_section', __('Sections'), array('class' => 'control-label')); ?>
						  <div class="controls controls-row">
						       <?= Form::select('brand_sections[]', $brands_sections_list, $brands_sections, array('id' => 'content_section', 'title' => __('Choose_section'), 'multiple' => 'multiple', 'data-style' => 'btn-info', 'required' => '')); ?>
						  </div>
					     </div>

					     <div class="control-group">
						  <?= Form::label('content_text', __('Brand_info'), array('class' => 'control-label')); ?>
						  <div class="controls">
						       <?= Form::textarea('brand_info', SpHTML::unchars($brands_list['brand_info']), array('class' => 'input span6', 'id' => 'content_text', 'placeholder' => __('Brand_info'))); ?>
						       <script>
							    CKEDITOR.replace( 'brand_info',
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
						  <?= Form::label('content_text_full', __('Brand_info_full'), array('class' => 'control-label')); ?>
						  <div class="controls">
						       <?= Form::textarea('brand_info_full', SpHTML::unchars($brands_list['brand_info_full']), array('class' => 'input span6', 'id' => 'content_text_full', 'placeholder' => __('Brand_info_full'))); ?>
						       <script>
							    CKEDITOR.replace( 'brand_info_full',
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
					     <?= Form::label('content_seo_title', __('Brand_seo_title'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('brand_seo_title', $brands_list['brand_seo_title'], array('class' => 'input span6', 'id' => 'content_seo_title', 'placeholder' => __('Brand_seo_title'))); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_seo_keywords', __('Brand_seo_keywords'), array('class' => 'control-label')); ?>
					     <div class="controls">
						  <?= Form::textarea('brand_seo_keywords', $brands_list['brand_seo_keywords'], array('class' => 'input span6', 'id' => 'content_seo_keywords', 'placeholder' => __('Brand_seo_keywords'))); ?>
					     </div>
					</div>
					<div class="control-group">
						  <?= Form::label('content_seo_descr', __('Brand_seo_descr'), array('class' => 'control-label')); ?>
						  <div class="controls">
						       <?= Form::textarea('brand_seo_descr', $brands_list['brand_seo_descr'], array('class' => 'input span6', 'id' => 'content_seo_descr', 'placeholder' => __('Brand_seo_descr'))); ?>
						  </div>
					</div>
				   </div>
				   <div class="tab-pane fade" id="tabphoto">
					<div class="control-group">
					     <?= Form::label('content_gallery', __('Brand_gallery'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::select('brand_gallery', $galleries_list, $brands_list['brand_gallery'], array('id' => 'content_gallery', 'title' => __('Choose_gallery'), 'data-style' => 'btn-info')); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_logo', __('Brand_logo'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::file('content_logo', array('class' => 'span4', 'accept' => 'image/*', 'id' => 'content_logo')); ?>
						  <div class="clearfix"></div>
						  <i><?= __('Current_l');?>: <? if($brands_list['brand_logo'] != '') { ?><img src="<?= URL::base('http').'media/brands/logos/'.$brands_list['brand_logo']; ?>" alt="" width="300" /> <? } else echo __('No'); ?></i>
						  <div class="clearfix"><br /></div>
						  <?= Form::checkbox('brand_logo_onlist', 1, '', array('class' => '', 'id' => 'content_photo_nc')); ?> Логотип в списке на главной
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_photo', __('Brand_picture'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::file('content_photo', array('class' => 'span4', 'accept' => 'image/*', 'id' => 'content_photo')); ?>
						  <div class="clearfix"></div>
						  <i><?= __('Current_f');?>: <? if($brands_list['brand_picture'] != '') { ?><img src="<?= URL::base('http').'media/brands/pict/'.$brands_list['brand_picture']; ?>" alt="" /> <? } else echo __('No'); ?></i>
					     </div>
					</div>
				   </div>
				   <div class="tab-pane fade" id="tabset">
					<div class="control-group">
					     <?= Form::label('content_map', __('Brand_map'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::select('brand_map', $map_sections, $brands_list['brand_map_section'], array('id' => 'content_map', 'title' => __('Choose_map_section'), 'data-style' => 'btn-info')); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_activity inline', __('Activity'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::checkbox('brand_activity', 1, $activity_flag, array('class' => '', 'id' => 'content_activity')); ?>
					     </div>
					</div>
					<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
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
			      <?= Form::hidden('brand_id', $brand_id); ?>
			      <?= Form::hidden('brand_logo_old', $brands_list['brand_logo']); ?>
			      <?= Form::hidden('brand_pict_old', $brands_list['brand_picture']); ?>
			      <?= Form::hidden('brand_pictb_old', $brands_list['brand_picture_big']); ?>
			      <?= Form::hidden('brand_url_old', $brands_list['brand_url']); ?>
			      <?= Form::hidden('contact_time', $contact_time_cr); ?>
			      <?= Form::hidden('contact_xhr', $contact_secret); ?>
			 <?= Form::close(); ?> 
		    </div>
	       </div><!--/row-->