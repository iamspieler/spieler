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
			      <? if($menu_list['menu_title'] != '') { ?><big><i><?= $menu_list['menu_title']; ?></i></big><br /><br /> <? } ?>
			      <div class="clearfix"></div>
			      
			      <ul class="nav nav-tabs" id="FormTabs">
				  <li class="active"><a href="#tabm" data-toggle="tab"><i class="icon-edit"></i> <?= __('Menu');?></a></li>
			      </ul>
			      
			      <div id="myTabContent" class="tab-content">
				   <div class="tab-pane fade in active" id="tabm">
					<div class="control-group">
					     <?= Form::label('content_title', __('Menu_title'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('menu_title', $menu_list['menu_title'], array('class' => 'input span6', 'id' => 'content_title', 'placeholder' => __('Menu_title'), 'required' => '')); ?>
					     </div>
					</div>
					<div class="control-group">
						  <?= Form::label('content_pos', __('Menu_pos'), array('class' => 'control-label')); ?>
						  <div class="controls controls-row">
						       <?= Form::select('menu_pos', $pos_list, $menu_list['menu_pos'], array('id' => 'content_pos', 'data-style' => 'btn-info')); ?>
						  </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_activity inline', __('Activity'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::checkbox('menu_activity', 1, $activity_flag, array('class' => '', 'id' => 'content_activity')); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_items', __('Menu_items'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row inline">
						  <div id="mitems">
						       <ul class="list_items">
							    <?= SpForm::SpMenuTree($items_list, 0, $mod_url); ?> 
							    
						       </ul>
								
	
								
			
						  </div>
						  <div class="clearfix"></div>
						  <div>
						       <?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/items/add/', '<i class="icon-pencil"></i> '.__('Menu_item_add') ,$attributes = array('class' => 'not_und','title' => __('Menu_add_item'))); ?></span>
						  </div>
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
			      <?= Form::hidden('menu_id', $menu_id); ?>
			      <?= Form::hidden('contact_time', $contact_time_cr); ?>
			      <?= Form::hidden('contact_xhr', $contact_secret); ?>
			 <?= Form::close(); ?> 
		    </div>
	       </div><!--/row-->
	       
	       <!-- delete confirm dialog -->
	       <div class="jqmConfirm" id="confirm">
		    <div id="ex3b" class="jqmConfirmWindow">
			 <div class="jqmConfirmTitle clearfix">
			      <h1>Внимание</h1>
				    <a href="#" class="jqmClose"><em>Закрыть</em></a>
			 </div> 
			 <div class="jqmConfirmContent">
			      <p class="jqmConfirmMsg"></p>
			      <p>Продолжить?</p>
			 </div>

			 <button type="submit" value="no" class="confirm_button decline" />Нет</button>
			 <button type="submit" value="yes" class="confirm_button accept" />Да</button>
		    </div>
	       </div>