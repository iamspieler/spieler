	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    <span class="pull-right"><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/add/', '<i class="icon-pencil"></i> '.__('Rooms_add') ,$attributes = array('class' => 'not_und','title' => __('Pages_add'))); ?></span>
		    <div class="clearer"></div>
		    <table class="table table-striped table-hover">
			   <thead>
                                 <tr>
				      <td>ID</td>
				      <td>Дата</td>
				      <td>Заголовок</td>
				      <td>Ссылка</td>
				      <td>Действия</td>
				 </tr>
                           </thead>
                           <tbody>
				<?php foreach($rooms_list as $room): ?>
                                <tr>
				    
				     <td><?= $room['id_room']; ?></td>
				     <td><?= Date::formatted_time($room['room_date'], 'd.m.Y'); ?></td>
				     <td><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/edit/'.$room['id_room'], $room['room_title'],$attributes = array('class' => 'not_und sp_tooltip','title' => __('Edit'))); ?></td>
				     <td><?= SpHTML::anchor('rooms/', __('View'),$attributes = array('class' => 'not_und sp_tooltip','target' => '_blank','title' => __('View'))); ?></td>
				     <td><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/edit/'.$room['id_room'],'<i class="icon-edit"></i>',$attributes = array('class' => 'not_und sp_tooltip o_pad','title' => __('Edit'))); ?>  <?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/delete/'.$room['id_room'],'<i class="icon-remove-circle"></i>',$attributes = array('class' => 'confirm not_und sp_tooltip o_pad','title' => __('Delete'))); ?></td>
				</tr>
				<?php endforeach; ?> 
		    </table>


		    <?= $pagination; ?>
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