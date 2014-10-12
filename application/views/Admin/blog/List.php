			<div class="service_line">
					<h3><?= __('Blog'); ?></h3>
			</div>
			<div class="clearfix"></div>
	        <?= $breadcrumbs; ?>
	        <div class="row">
		    <span class="pull-right"><?= SpHTML::anchor(URL::base('http').ADMINURL.'/'.$mod_url.'/items/add/', '<i class="icon-pencil"></i> '.__('Blog_add') ,$attributes = array('class' => 'not_und','title' => __('Blog_add'))); ?></span>
		    <div class="clearer"></div>
		    <table class="table table-hover table-bordered">
			   <thead>
                <tr>
				      <th><?= __('ID');?></th>
				      <th><?= __('Date');?></th>
				      <th><?= __('Title');?></th>
				      <th><?= __('Link');?></th>
				      <th><?= __('Actions');?></th>
				 </tr>
               </thead>
               <tbody>
				<?php foreach($items_list as $item): ?>
                <tr>
				     <td><?= $item['id_item']; ?></td>
				     <td><?= Date::formatted_time($item['item_publish_date'], 'H:i d.m.Y'); ?></td>
				     <td><?= SpHTML::anchor(URL::base('http').ADMINURL.'/'.$mod_url.'/items/edit/'.$item['id_item'].'/', $item['item_title_ru'],$attributes = array('class' => 'not_und sp_tooltip','title' => __('Edit'))); ?></td>
				     <td><?= SpHTML::anchor(URL::base('http').$mod_url.'/'.$item['item_url'].'/', $item['item_url'],$attributes = array('class' => 'not_und sp_tooltip newwindow','target' => '_blank','title' => __('View'))); ?></td>
				     <td><?= SpHTML::anchor(URL::base('http').ADMINURL.'/'.$mod_url.'/items/edit/'.$item['id_item'],'<i class="icon-edit"></i>',$attributes = array('class' => 'not_und sp_tooltip o_pad','title' => __('Edit'))); ?>  <?= SpHTML::anchor(URL::base('http').ADMINURL.'/'.$mod_url.'/items/delete/'.$item['id_item'].'/','<i class="icon-remove-circle"></i>',$attributes = array('class' => 'confirm not_und sp_tooltip o_pad','title' => __('Delete'))); ?></td>
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