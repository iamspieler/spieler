	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    
		    <div>
			 <?= Form::open(URL::base('http').Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/items/'.$mod_action.'/', array('method' => 'POST', 'name' => 'news_form', 'enctype' => 'multipart/form-data', 'id' => 'form_news', 'class' => 'well p_form')); ?>

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
			      <? if($item_list['item_title'] != '') { ?><big><i><?= $item_list['item_title']; ?></i></big><br /><br /> <? } ?>
			      <div class="clearfix"></div>
			      
			      <ul class="nav nav-tabs" id="FormTabs">
				  <li class="active"><a href="#tabm" data-toggle="tab"><i class="icon-edit"></i> <?= __('Menu_item');?></a></li>
			      </ul>
			      
			      <div id="myTabContent" class="tab-content">
				   <div class="tab-pane fade in active" id="tabm">
					<div class="control-group">
					     <?= Form::label('content_title', __('Menu_item_title'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('item_title', $item_list['item_title'], array('class' => 'input span6', 'id' => 'content_title', 'placeholder' => __('Menu_item_title'), 'required' => '')); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_section', __('Menu'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::select('item_menu', $menu_list, $item_list['menu_id'], array('id' => 'content_section', 'data-style' => 'btn-info', 'required' => '',  'onchange' => 'javascript:selectItemParents();')); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_mod', __('Menu_item_mod'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::select('item_mod', $ctrl_list, $item_list['item_mod'], array('id' => 'content_mod', 'data-style' => 'btn-info',  'onchange' => 'javascript:selectModPages();')); ?>
						  <div name="selectItemPage"><?= $content_list; ?></div>
						  <div id="selrt"></div>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_parent', __('Menu_item_parent'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <div name="selectItemParent"><?= $parent_list; ?></div>
					     </div>
					</div>

					<script type="text/javascript">
					     function selectModPages(){
						     var menu_mod = $('#content_mod[name="item_mod"]').val();
						     if(!menu_mod){
							     $('div[name="selectItemPage"]').html('');
						     }else{
							     $('div[name="selectItemPage"]').html('<img src="<?= URL::base();?>public/default/img/ajax-loader.gif" alt="" />');

							     $.ajax({
								     type: "POST",
								     url: "<?= URL::base().Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/pgselect/'; ?>",
								     data: { action: 'showCtrlPages', menu_mod: menu_mod },
								     cache: false,
								     timeout: 30000,
								     error:function(){ alert("<?= __('Error_data_cant_be_obtained');?>");$('div[name="selectItemPage"]').html(''); },
								     success: function(response){ $('div[name="selectItemPage"]').html(response); }
							     });
						     };
					     };
					     
					     function selectItemParents(){
						     var menu_id = $('#content_section[name="item_menu"]').val();
						     if(!menu_id){
							     $('div[name="selectItemParent"]').html('');
						     }else{
							     $('div[name="selectItemParent"]').html('<img src="<?= URL::base();?>public/default/img/ajax-loader.gif" alt="" />');

							     $.ajax({
								     type: "POST",
								     url: "<?= URL::base().Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/parentselect/'; ?>",
								     data: { action: 'showItems', menu_id: menu_id },
								     cache: false,
								     timeout: 300000,
								     error:function(){ alert("<?= __('Error_data_cant_be_obtained');?>");$('div[name="selectItemParent"]').html(''); },
								     success: function(response){ $('div[name="selectItemParent"]').html(response); }
							     });
						     };
					     };
					</script>
					<div class="control-group">
					     <?= Form::label('content_hide_phone inline', __('Hide_for_phone'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::checkbox('item_hide_phone', 1, $h_phone_flag, array('class' => '', 'id' => 'content_hide_phone')); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_hide_desktop inline', __('Hide_for_desktop'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::checkbox('item_hide_desktop', 1, $h_desktop_flag, array('class' => '', 'id' => 'content_hide_desktop')); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_pos', __('Menu_item_pos'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('item_pos', $item_list['item_sort'], array('class' => 'input span1', 'id' => 'content_pos', 'placeholder' => __('Menu_item_pos'), 'required' => '')); ?>
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
			      <?= Form::hidden('item_id', $item_id); ?>
			      <?= Form::hidden('contact_time', $contact_time_cr); ?>
			      <?= Form::hidden('contact_xhr', $contact_secret); ?>
			 <?= Form::close(); ?> 
		    </div>
	       </div><!--/row-->