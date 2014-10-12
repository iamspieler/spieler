	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    
		    <div>
			 <?= Form::open(URL::base('http').Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/'.$mod_action.'/', array('method' => 'POST', 'name' => 'pages_form', 'enctype' => 'multipart/form-data', 'id' => 'form_pages', 'class' => 'well p_form')); ?>  
			      <legend>
				   <?= $form_title; ?>
				   <div class="control-group pull-right">
					<?= Form::submit('send_form', __('Send'), array('class' => 'btn btn-primary', 'id' => 'send_form')); ?>
					<?= Form::submit('submit_form', __('Submit'), array('class' => 'btn btn-info', 'id' => 'submit_form')); ?>
					<?= Form::input('cancel_form', __('Cancel'), array('type'=>'reset', 'class' => 'btn', 'id' => 'cancel_form', 'onclick' => 'window.location = "'.URL::base(true).Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'"')); ?>
				   </div>
			      </legend>

			      <div class="clearfix"></div>
			      <? if($pages_list['pages_title'] != '') { ?><big><i><?= $pages_list['pages_title']; ?></i></big><br /><br /> <? } ?>
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
					     <?= Form::label('content_title', __('Pages_title'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('pages_title', $pages_list['pages_title'], array('class' => 'input span6', 'id' => 'content_title', 'placeholder' => __('Pages_title'), 'required' => '')); ?>
					     </div>
					</div>
					     <div class="control-group">
						  <?= Form::label('content_url', __('URL'), array('class' => 'control-label')); ?>
						  <div class="controls controls-row">
						       <?= Form::input('pages_url', $pages_list['pages_url'], array('class' => 'input span6', 'id' => 'content_url', 'placeholder' => __('URL'), 'required' => '')); ?>
						       <div class="clearfix"></div>
						       <?= Form::checkbox('url_change', 1, $url_change, array('id' => 'stop_auto_url')); ?> <?= __('Do_not_change_url');?>
						  </div>
					     </div>
					     <div class="control-group">
						  <?= Form::label('content_text', __('Pages_text'), array('class' => 'control-label')); ?>
						  <div class="controls">
						       <?= Form::textarea('pages_text', SpHTML::unchars($pages_list['pages_text']), array('class' => 'input span6', 'id' => 'content_text', 'placeholder' => __('Pages_text'))); ?>
						       <script>
							    CKEDITOR.replace( 'pages_text',
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
						  <?= Form::label('content_text_full', __('Pages_text_full'), array('class' => 'control-label')); ?>
						  <div class="controls">
						       <?= Form::textarea('pages_text_full', SpHTML::unchars($pages_list['pages_text_full']), array('class' => 'input span6', 'id' => 'content_text_full', 'placeholder' => __('Pages_text_full'))); ?>
						       <script>
							    CKEDITOR.replace( 'pages_text_full',
								 {
								      height: '600px',
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
					     <?= Form::label('content_seo_title', __('Pages_seo_title'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('pages_seo_title', $pages_list['pages_seo_title'], array('class' => 'input span6', 'id' => 'content_seo_title', 'placeholder' => __('Pages_seo_title'))); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_seo_keywords', __('Pages_seo_keywords'), array('class' => 'control-label')); ?>
					     <div class="controls">
						  <?= Form::textarea('pages_seo_keywords', $pages_list['pages_seo_keywords'], array('class' => 'input span6', 'id' => 'content_seo_keywords', 'placeholder' => __('Pages_seo_keywords'))); ?>
					     </div>
					</div>
					<div class="control-group">
						  <?= Form::label('content_seo_descr', __('Pages_seo_descr'), array('class' => 'control-label')); ?>
						  <div class="controls">
						       <?= Form::textarea('pages_seo_descr', $pages_list['pages_seo_descr'], array('class' => 'input span6', 'id' => 'content_seo_descr', 'placeholder' => __('Pages_seo_descr'))); ?>
						  </div>
					</div>
				   </div>
				   <div class="tab-pane fade" id="tabphoto">
					<div class="control-group">
					     <?= Form::label('content_photo', __('Pages_photo'), array('class' => 'control-label')); ?>
					     <div class="">
						  <?= Form::file('pages_photo', array('class' => 'input span3', 'id' => 'content_photo')); ?>
						  
						  <div class="clearfix"><br /><br ></div>
						  <?php foreach($photos_list as $photo): ?>
						       <div class="col-md-4 pull-left">
							    <div class="thumbnail">
								 <?= HTML::image(URL::base(true).'media/photo/'.$photo['photo_small'], array('alt' => '')); ?>
								 <div class="caption">
								      <h4><?= $photo['photo_title']; ?></h4>
								      <?= Form::checkbox('deletephoto[]', $photo['id_photo']); ?>  <?= __('Delete'); ?> 
								 </div>
							    </div>
						      </div>
						  <?php endforeach; ?> 
					     </div>
					</div>
				   </div>
				   <div class="tab-pane fade" id="tabset">
					<div class="control-group">
					     <?= Form::label('datepicker', __('Pages_date'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						
						  <div class="input-append" id="datepicker" >
						       <?= Form::input('pages_date', Date::formatted_time($pages_list['pages_date'], 'd.m.Y H:i:s'), array('class' => 'input span12', 'data-format' => 'dd.MM.yyyy hh:mm:ss')); ?>
						       <span class="add-on"><i class="icon-calendar add_picker"></i></span>
						  </div>	       
					     </div>   
					</div> 
					<div class="control-group">
						  <?= Form::label('content_author', __('Pages_author'), array('class' => 'control-label')); ?>
						  <div class="controls controls-row">
						       <?= Form::select('pages_author_id', $authors_list, Auth::instance()->get_user()->id, array('id' => 'content_author_list', 'data-style' => 'btn-info')); ?>
						       <div class="clearfix"></div>
						       <?= Form::input('pages_author', $pages_list['pages_author'], array('class' => 'input span6', 'id' => 'content_author', 'placeholder' => __('Pages_author'))); ?>
						  </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_activity inline', __('Activity'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::checkbox('pages_activity', 1, $activity_flag, array('class' => '', 'id' => 'content_activity')); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_ismain inline', __('Pages_main'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::checkbox('pages_ismain', 1, $ismain_flag, array('class' => '', 'id' => 'content_ismain')); ?>
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
			      <?= Form::hidden('pages_id', $pages_id); ?>
			      <?= Form::hidden('pages_url_old', $pages_list['pages_url']); ?>
			      <?= Form::hidden('contact_time', $contact_time_cr); ?>
			      <?= Form::hidden('contact_xhr', $contact_secret); ?>
			 <?= Form::close(); ?> 
		    </div>
	       </div><!--/row-->