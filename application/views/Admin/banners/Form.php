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
			      <? if($banners_list['banner_title'] != '') { ?><big><i><?= $banners_list['banner_title']; ?></i></big><br /><br /> <? } ?>
			      <div class="clearfix"></div>
			      
			      <ul class="nav nav-tabs" id="FormTabs">
				  <li class="active"><a href="#tabm" data-toggle="tab"><i class="icon-edit"></i> <?= __('Content');?></a></li>
				  <li><a href="#tabphoto" data-toggle="tab"><i class="icon-picture"></i> <?= __('Picture');?></a></li>
				  <li><a href="#tabset" data-toggle="tab"><i class="icon-wrench"></i> <?= __('Settings');?></a></li>
			      </ul>
			      
			      <div id="myTabContent" class="tab-content">
				   <div class="tab-pane fade in active" id="tabm">
					<div class="control-group">
					     <?= Form::label('banner_title', __('Banner_title'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('banner_title', $banners_list['banner_title'], array('class' => 'input span6', 'id' => 'banner_title', 'placeholder' => __('Banner_title'), 'required' => '')); ?>
					     </div>
					</div>
					     <div class="control-group">
						  <?= Form::label('banner_url', __('URL'), array('class' => 'control-label')); ?>
						  <div class="controls controls-row">
						       <?= Form::input('banner_url', $banners_list['banner_url'], array('class' => 'input span6', 'id' => 'banner_url', 'placeholder' => __('URL'), 'required' => '')); ?>
						  </div>
					     </div>
					     <div class="control-group">
						  <?= Form::label('banner_text', __('Banner_text'), array('class' => 'control-label')); ?>
						  <div class="controls">
						       <?= Form::textarea('banner_text', $banners_list['banner_text'], array('class' => 'input span6', 'id' => 'content_text', 'placeholder' => __('Banner_text'))); ?>
						       <script>
							    CKEDITOR.replace('banner_text',
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
				   </div>
				   <div class="tab-pane fade" id="tabphoto">
					<div class="control-group">
					     <?= Form::label('banner_pict1', __('Banner_picture1'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::file('banner_pict1', array('class' => 'span4', 'accept' => 'image/*', 'id' => 'content_photo')); ?>
						  <div class="clearfix"></div>
						  <?= __('Width');?> &ndash; <?= Kohana::$config->load('banners.mod_bp_w');?> <?= __('px');?><br />
						  <?= __('Height');?> &ndash; <?= Kohana::$config->load('banners.mod_bp_h');?> <?= __('px');?>
						  <div class="clearfix"><br /></div>
						  <i><?= __('Current_f');?>: <? if($banners_list['banner_pict1'] != '') { ?><img src="<?= URL::base('http').'media/news/'.$banners_list['banner_picture_dir'].$banners_list['banner_pict1']; ?>" alt="" /> <? } else echo __('No'); ?></i>
						  <div class="clearfix"></div>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('banner_pict2', __('Banner_picture2'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::file('banner_pict2', array('class' => 'span4', 'accept' => 'image/*', 'id' => 'content_photo_small')); ?>
						  <div class="clearfix"></div>
						  <?= __('Width');?> &ndash; <?= Kohana::$config->load('banners.mod_bm_w');?> <?= __('px');?><br />
						  <?= __('Height');?> &ndash; <?= Kohana::$config->load('banners.mod_bm_h');?> <?= __('px');?>
						  <div class="clearfix"><br /></div>
						  <i><?= __('Current_f');?>: <? if($banners_list['banner_pict2'] != '') { ?><img src="<?= URL::base('http').'media/banners/'.$banners_list['banner_picture_dir'].$banners_list['banner_pict2']; ?>" alt="" /> <? } else echo __('No'); ?></i>
						  <div class="clearfix"></div>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('banner_pict3', __('Banner_picture3'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::file('banner_pict3', array('class' => 'span4', 'accept' => 'image/*', 'id' => 'content_photo_main')); ?>
						  <div class="clearfix"></div>
						  <?= __('Width');?> &ndash; <?= Kohana::$config->load('banners.mod_bn_w');?> <?= __('px');?><br />
						  <?= __('Height');?> &ndash; <?= Kohana::$config->load('banners.mod_bn_h');?> <?= __('px');?>
						  <div class="clearfix"><br /></div>
						  <i><?= __('Current_f');?>: <? if($banners_list['banner_pict3'] != '') { ?><img src="<?= URL::base('http').'media/banners/'.$banners_list['banner_picture_dir'].$banners_list['banner_pict3']; ?>" alt="" /> <? } else echo __('No'); ?></i>
						  <div class="clearfix"></div>
					     </div>
					</div>
					
				   </div>
				   <div class="tab-pane fade" id="tabset">
					<div class="control-group">
					     <?= Form::label('datepicker', __('Pub_start_date'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						
						  <div class="input-append" id="datepicker" >
						       <?= Form::input('banner_start_date', Date::formatted_time($banners_list['banner_start_date'], 'd.m.Y H:i:s'), array('class' => 'input span12', 'id' => 'input span12', 'data-format' => 'dd.MM.yyyy hh:mm:ss')); ?>
						       <span class="add-on"><i class="icon-calendar add_picker"></i></span>
						  </div>	       
					     </div>   
					</div>
					<div class="control-group">
					     <?= Form::label('datepicker_end', __('Pub_end_date'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						
						  <div class="input-append" id="datepicker_end" >
						       <?= Form::input('banner_end_date', Date::formatted_time($banners_list['banner_end_date'], 'd.m.Y H:i:s'), array('class' => 'input span12',  'data-format' => 'dd.MM.yyyy hh:mm:ss')); ?>
						       <span class="add-on"><i class="icon-calendar add_picker"></i></span>
						  </div>	       
					     </div>   
					</div>
					<div class="control-group">
						  <?= Form::label('banner_clicks', __('Clicks'), array('class' => 'control-label')); ?>
						  <div class="controls controls-row">
						       <?= Form::input('banner_clicks', $banners_list['banner_count'], array('class' => 'input span1', 'id' => 'banner_clicks', 'placeholder' => __('Clicks'))); ?>
						  </div>
					</div>
					<div class="control-group">
						  <?= Form::label('banner_pos', __('Position'), array('class' => 'control-label')); ?>
						  <div class="controls controls-row">
						       <?= Form::select('banner_pos', $pos_list, $banners_list['pos_id'], array('id' => 'banner_pos', 'data-style' => 'btn-info')); ?>
						  </div>
					</div>
					<div class="control-group">
						  <?= Form::label('banner_sort', __('Sort_n'), array('class' => 'control-label')); ?>
						  <div class="controls controls-row">
						       <?= Form::input('banner_sort', $banners_list['sort_id'], array('class' => 'input span1', 'id' => 'banner_sort', 'placeholder' => __('Sort_n'))); ?>
						  </div>
					</div>
					<div class="control-group">
						  <?= Form::label('banner_author', __('Banner_author'), array('class' => 'control-label')); ?>
						  <div class="controls controls-row">
						       <?= Form::select('banner_author_id', $users_list, Auth::instance()->get_user()->id, array('id' => 'banner_author_id', 'data-style' => 'btn-info')); ?>
						  </div>
					</div>
					<div class="control-group">
					     <?= Form::label('banner_activity inline', __('Activity'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::checkbox('banner_activity', 1, $activity_flag, array('class' => '', 'id' => 'banner_activity')); ?>
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
			      <?= Form::hidden('banner_id', $banner_id); ?>
			      <?= Form::hidden('banner_public', $banner_pub_date); ?>
			      <?= Form::hidden('banner_pict1_old', $banners_list['banner_pict1']); ?>
			      <?= Form::hidden('banner_pict2_old', $banners_list['banner_pict2']); ?>
			      <?= Form::hidden('banner_pict3_old', $banners_list['banner_pict3']); ?>
			      <?= Form::hidden('banner_picture_dir', $banners_list['banner_picture_dir']); ?>
			      <?= Form::hidden('contact_time', $contact_time_cr); ?>
			      <?= Form::hidden('contact_xhr', $contact_secret); ?>
			 <?= Form::close(); ?> 
		    </div>
	       </div><!--/row-->