	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    <span class="pull-right"><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/add/', '<i class="icon-pencil"></i> '.__('Pages_add') ,$attributes = array('class' => 'not_und','title' => __('Pages_add'))); ?></span>
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
				<?php foreach($pages_list as $pages): ?>
                                <tr>
				    
				     <td><?= $pages['id_pages']; ?></td>
				     <td><?= Date::formatted_time($pages['pages_date'], 'd.m.Y'); ?></td>
				     <td><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/edit/'.$pages['id_pages'], $pages['pages_title'],$attributes = array('class' => 'not_und sp_tooltip','title' => __('Edit'))); ?></td>
				     <td><?= SpHTML::anchor($pages['pages_url'],  __('View'),$attributes = array('class' => 'not_und sp_tooltip','target' => '_blank','title' => __('View'))); ?></td>
				     <td><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/edit/'.$pages['id_pages'],'<i class="icon-edit"></i>',$attributes = array('class' => 'not_und sp_tooltip o_pad','title' => __('Edit'))); ?>  <?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/delete/'.$pages['id_pages'],'<i class="icon-remove-circle"></i>',$attributes = array('class' => 'confirm not_und sp_tooltip o_pad','title' => __('Delete'))); ?></td>
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