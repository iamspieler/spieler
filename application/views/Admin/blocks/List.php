	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    <table class="table table-striped table-hover">
			   <thead>
                                 <tr>
				      <td>ID</td>
				      <td>Заголовок</td>
				      <td>Тип</td>
				      <td>Действия</td>
				 </tr>
                           </thead>
                           <tbody>
				<?php foreach($blocks_list as $blocks): ?>
                                <tr>
				    
				     <td><?= $blocks['id_block']; ?></td>
				     <td><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/edit/'.$blocks['id_block'], $blocks['block_title'],$attributes = array('class' => 'not_und sp_tooltip','title' => __('Edit'))); ?></td>
				     <td>
					  <?
					     switch ($blocks['block_type']) {
						  case "column":
						       echo __('Block_column');
						       break;
						  case "main_slider":
						       echo __('Block_main_slider');
						       break;
						  case "main_text":
						       echo __('Block_main_text');
						       break;
						  default:
						       echo __('Not_defined');
					      }
					  ?>
				     </td>
				     <td><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/edit/'.$blocks['id_block'],'<i class="icon-edit"></i>',$attributes = array('class' => 'not_und sp_tooltip o_pad','title' => __('Edit'))); ?>  <?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/delete/'.$blocks['id_block'],'<i class="icon-remove-circle"></i>',$attributes = array('class' => 'confirm not_und sp_tooltip o_pad','title' => __('Delete'))); ?></td>
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