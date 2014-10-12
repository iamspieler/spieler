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
			      <? if($video_list['video_title'] != '') { ?><big><i><?= $video_list['video_title']; ?></i></big><br /><br /> <? } ?>
			      <div class="clearfix"></div>
			      
			      <ul class="nav nav-tabs" id="FormTabs">
				  <li class="active"><a href="#tabm" data-toggle="tab"><i class="icon-edit"></i> <?= __('Content');?></a></li>
			      </ul>
			      
			      <div id="myTabContent" class="tab-content">
				   <div class="tab-pane fade in active" id="tabm">
					<div class="control-group">
					     <?= Form::label('content_title', __('Title'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('video_title', $video_list['video_title'], array('class' => 'input span6', 'id' => 'content_title', 'placeholder' => __('Title'), 'required' => '')); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_photo', __('Video_thumb'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::file('video_thumb', array('class' => 'span4', 'accept' => 'image/*', 'id' => 'content_photo')); ?>
						  <div class="clearfix"></div>
						  <i><?= __('Current_f');?>: <? if($video_list['video_thumb'] != '') { ?><img src="<?= URL::base('http').'media/video/thumb/'.$video_list['video_thumb']; ?>" alt="" width="300" /> <? } else echo __('No'); ?></i>
						  <div class="clearfix"></div>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_file', __('Video_file'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::file('video_file', array('class' => 'span4', 'accept' => 'video/mp4,video/x-flv', 'id' => 'content_file')); ?>
						  <div class="clearfix"></div>
						  <i><?= __('Current_m');?>: <? if($video_list['video_file'] != '') { 
						       ?>
							    <script src="<?= URL::base('http').'public/default/codo/CodoPlayer.js' ;?>" type="text/javascript"></script>
							    <script type="text/javascript">
								    var player1 = CodoPlayer([{
									    title:"<?= $video_list['video_title'];?>",
									    src: ["<?= URL::base('http').'media/video/'.$video_list['video_file']; ?>"],
									    poster: "<?= URL::base('http').'media/video/thumb/'.$video_list['video_thumb']; ?>"
								    }], {
									    width: 400,
									    height: 300,
									    preload: false,
									    autoplay: false,
									    playlist: true,
									    style: 'standard',
									    controls: {
										volume: false
									    },
									    onReady: function(player) {
										    player.API.onLoad(function() {
											    _gaq.push(['_trackEvent', player.playlist.API.getClip().title, 'onLoad']);
										    })
									    }
								    });
								    player1.API.onError(function(error) {
									    _gaq.push(['_trackEvent', player1.playlist.API.getClip().title, 'onError']);
								    });
							    </script>
							    <a href="<?= URL::base('http').'media/video/'.$video_list['video_file']; ?>" target="_blank" /><?= __('Show'); ?></a> <? 
							    
						       } else echo __('No'); ?></i>
						  <p><i><?= __('Rule:max_upload_filesize'). ' '. get_cfg_var('upload_max_filesize');?></i><p>
					     </div>
					</div>

					     <div class="control-group">
						  <?= Form::label('content_text', __('Video_text'), array('class' => 'control-label')); ?>
						  <div class="controls">
						       <?= Form::textarea('video_descr', $video_list['video_descr'], array('class' => 'input span6', 'id' => 'content_text', 'placeholder' => __('Video_text'))); ?>
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
					     <?= Form::label('datepicker', __('Video_date'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <div class="input-append" id="datepicker" >
						       <?= Form::input('video_date', Date::formatted_time($video_list['video_date'], 'd.m.Y H:i:s'), array('class' => 'input span12', 'data-format' => 'dd.MM.yyyy hh:mm:ss')); ?>
						       <span class="add-on"><i class="icon-calendar add_picker"></i></span>
						  </div>	       
					     </div>   
					</div> 
					<div class="control-group">
					     <?= Form::label('content_activity inline', __('Activity'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::checkbox('video_activity', 1, $activity_flag, array('class' => '', 'id' => 'content_activity')); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_ismain inline', __('Video_main'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::checkbox('video_ismain', 1, $ismain_flag, array('class' => '', 'id' => 'content_ismain')); ?>
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
			      <?= Form::hidden('video_id', $video_id); ?>
			      <?= Form::hidden('video_thumb_old', $video_list['video_thumb']); ?>
			      <?= Form::hidden('video_picture_old', $video_list['video_picture']); ?>
			      <?= Form::hidden('video_file_old', $video_list['video_file']); ?>
			      <?= Form::hidden('contact_time', $contact_time_cr); ?>
			      <?= Form::hidden('contact_xhr', $contact_secret); ?>
			 <?= Form::close(); ?> 
		    </div>
	       </div><!--/row-->