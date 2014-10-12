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
			      <? if($fb_list['fb_title'] != '') { ?><big><i><?= $fb_list['fb_title']; ?></i></big><br /><br /> <? } ?>
			      <div class="clearfix"></div>
			      
			      <ul class="nav nav-tabs" id="FormTabs">
				  <li class="active"><a href="#tabm" data-toggle="tab"><i class="icon-edit"></i> <?= __('Content');?></a></li>
				  <li><a href="#tabphoto" data-toggle="tab"><i class="icon-picture"></i> <?= __('Photo');?></a></li>
				  <li><a href="#tabset" data-toggle="tab"><i class="icon-wrench"></i> <?= __('Settings');?></a></li>
			      </ul>
			      
			      <div id="myTabContent" class="tab-content">
				   <div class="tab-pane fade in active" id="tabm">
					<div class="control-group">
					     <?= Form::label('content_title', __('Feedback_title'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('article_title', $fb_list['fb_title'], array('class' => 'input span6', 'id' => 'content_title', 'placeholder' => __('Article_title'), 'required' => '')); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_section', __('Section'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::select('article_section[]', $articles_sections, array(), array('id' => 'content_section', 'data-placeholder' => __('Choose_section'), 'tabindex' => '1', 'class' => 'chosen-select')); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('issue_year', __('Issue'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::select('article_issue_year', $articles_issues_list, '', array('id' => 'issue_year',  'tabindex' => '1', 'class' => '', 'required' => '')); ?>
						  <?= Form::select('article_issue_month', array(), '', array('id' => 'issue_month', 'tabindex' => '1', 'class' => '', 'required' => '', 'disabled' => 'disabled')); ?>
						  <?= Form::select('article_issue_day', array(), '', array('id' => 'issue_day', 'data-placeholder' => __('Choose_day'), 'tabindex' => '1', 'class' => '', 'required' => '', 'disabled' => 'disabled')); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_text', __('Article_text'), array('class' => 'control-label')); ?>
					     <div class="controls">
						  <?= Form::textarea('article_text', $articles_list['article_text'], array('class' => 'input span6', 'id' => 'content_text', 'placeholder' => __('News_text'))); ?>
						  <script>
							    CKEDITOR.replace( 'article_text',
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
					<?= Form::label('content_text_full', __('Article_text_full'), array('class' => 'control-label')); ?>
					<div class="controls">
					     <?= Form::textarea('article_text_full', $articles_list['article_text_full'], array('class' => 'input span6', 'id' => 'content_text_full', 'placeholder' => __('News_text_full'))); ?>
					     <script>
							    CKEDITOR.replace( 'article_text_full',
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
			      <div class="tab-pane fade" id="tabphoto">
					<div class="control-group">
					     <?= Form::label('content_photo', __('Article_picture'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::file('content_photo', array('class' => 'span4', 'accept' => 'image/*', 'id' => 'content_photo')); ?>
						  <div class="clearfix"></div>
						  <i><?= __('Current_f');?>: <? if($articles_list['article_picture'] != '') { ?><img src="<?= URL::base('http').'media/news/'.$articles_list['article_picture_dir'].$articles_list['article_picture']; ?>" alt="" width="300" /> <? } else echo __('No'); ?></i>
						  <div class="clearfix"><br /></div>
						  <?= Form::checkbox('content_photo_nc', 1, '', array('class' => '', 'id' => 'content_photo_nc')); ?> Не изменять маленькую картинку и картинку для блока главных новостей 
					     </div>
					</div>
			      </div>
			      <div class="tab-pane fade" id="tabset">
					<div class="control-group">
					     <?= Form::label('datepicker', __('Article_date'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						
						  <div class="input-append" id="datepicker" >
						       <?= Form::input('article_date', Date::formatted_time($articles_list['article_issue_date'], 'd.m.Y H:i:s'), array('class' => 'input span12', 'data-format' => 'dd.MM.yyyy hh:mm:ss')); ?>
						       <span class="add-on"><i class="icon-calendar add_picker"></i></span>
						  </div>	       
					     </div>   
					</div> 
					<div class="control-group">
						  <?= Form::label('content_author', __('Article_author'), array('class' => 'control-label')); ?>
						  <div class="controls controls-row">
						       <?= Form::select('article_authors_id', $authors_list, Auth::instance()->get_user()->id, array('id' => 'content_author_list', 'data-style' => 'btn-info')); ?>
						  </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_activity inline', __('Activity'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::checkbox('article_activity', 1, $activity_flag, array('class' => '', 'id' => 'content_activity')); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_ismain inline', __('Article_main'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::checkbox('article_ismain', 1, $ismain_flag, array('class' => '', 'id' => 'content_ismain')); ?>
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
			      <?= Form::hidden('article_id', $article_id); ?>
			      <?= Form::hidden('article_picture_old', $articles_list['article_picture']); ?>
			      <?= Form::hidden('article_picture_dir', $articles_list['article_picture_dir']); ?>
			      <?= Form::hidden('article_url_old', $articles_list['article_url']); ?>
			      <?= Form::hidden('contact_time', $contact_time_cr); ?>
			      <?= Form::hidden('contact_xhr', $contact_secret); ?>
			 <?= Form::close(); ?> 
		    </div>
	       </div><!--/row-->