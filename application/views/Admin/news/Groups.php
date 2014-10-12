	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    <table class="table table-striped table-hover">
			   <thead>
                                 <tr>
				      <td></td>
				      <td>Название группы</td>
				      <td>URL</td>
				 </tr>
                           </thead>
                           <tbody>
				<?php foreach($groups_list as $group): ?>
                                <tr>
				     <td><?= SpHTML::anchor($mod_url.'/sections/edit/'.$group['id_group'],'<i class="icon-edit icon-large"></i>',$attributes = array('class' => 'not_und sp_tooltip','title' => __('Edit'))); ?></td>
				     <td><?= HTML::chars($group['group_title']); ?></td>
				     <td><?= HTML::chars($group['group_url']); ?></td>
				</tr>
				<?php endforeach; ?> 
		    </table>


		    <?= $pagination; ?>
	      </div><!--/row-->