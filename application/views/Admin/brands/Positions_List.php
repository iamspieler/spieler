	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    <form id="formid" name="formwsel" method="post" action="<?= URL::base().Kohana::$config->load('global.site_ap_url').'/'.$mod_url;?>/">
			   <span class="pull-left"><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/positions/add/', '<i class="icon-pencil"></i> '.__('Brand_position_add') ,$attributes = array('class' => 'not_und','title' => __('Section_add'))); ?></span>
		    </form>
		    <table class="table table-striped table-hover">
			   <thead>
                                 <tr>
				      <td>ID</td>
				      <td><?= __('Title');?></td>
				      <td><?= __('Floor');?></td>
				      <td><?= __('Activity');?></td>
				      <td><?= __('Actions');?></td>
				 </tr>
                           </thead>
                           <tbody>
				<?php foreach($positions_list as $positions): ?>
                                <tr>
				    
				     <td><?= $positions['id_section']; ?></td>
				     <td><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/positions/edit/'.$positions['id_section'], $positions['section_title'],$attributes = array('class' => 'not_und sp_tooltip','title' => __('Edit'))); ?></td>
				     <td><?= $positions['section_floor']; ?></td>
				     <td><? if($positions['section_status'] != 0) echo __('Yes'); else echo __('No');  ?></td>
				     <td><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/positions/edit/'.$positions['id_section'],'<i class="icon-edit"></i>',$attributes = array('class' => 'not_und sp_tooltip o_pad','title' => __('Edit'))); ?>  <?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/positions/delete/'.$positions['id_section'],'<i class="icon-remove-circle"></i>',$attributes = array('class' => 'confirm not_und sp_tooltip o_pad','title' => __('Delete'))); ?></td>
				</tr>
				<?php endforeach; ?> 
		    </table>
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