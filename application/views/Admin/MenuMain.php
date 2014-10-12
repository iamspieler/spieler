		   <? $cur_controller = SpHTML::str_2lower(Request::current()->controller()); ?>
		   <ul class="nav navbar-nav">	      
		       <li><a href="#" class="icon icon-menu hidden-xs" id="btn-menu">Menu</a></li>
			   <!--<li <?= (($cur_controller === 'articles')) ? 'class="active visible-xs-block"' : 'class="visible-xs-block"' ?>><?= SpHTML::anchor('/'.ADMINURL.'/'.Kohana::$config->load('controllers.articles'),__('Articles')); ?></li>
		       <li <?= (($cur_controller === 'brands')) ? 'class="active visible-xs-block"' : 'class="visible-xs-block"' ?>><?= SpHTML::anchor('/'.ADMINURL.'/brands',__('Brands')); ?></li>-->
		       <li <?= (($cur_controller === 'users')) ? 'class="active visible-xs-block"' : 'class="visible-xs-block"' ?>><?= SpHTML::anchor('/'.ADMINURL.'/users',__('Users')); ?></li>
		       <li <?= (($cur_controller === 'pages')) ? 'class="active visible-xs-block"' : 'class="visible-xs-block"' ?>><?= SpHTML::anchor('/'.ADMINURL.'/pages',__('Pages_static')); ?></li>
		       <li <?= (($cur_controller === 'blocks')) ? 'class="active visible-xs-block"' : 'class="visible-xs-block"' ?>><?= SpHTML::anchor('/'.ADMINURL.'/blocks',__('Blocks')); ?>
				<ul><li>ewewqw</li></ul><ul><li>ewewqw</li></ul>
			   </li>
		       <!--<li <?= (($cur_controller === 'banners')) ? 'class="active visible-xs-block"' : 'class="visible-xs-block"' ?>><?= SpHTML::anchor('/'.ADMINURL.'/banners',__('Banners')); ?></li>
		       <li <?= (($cur_controller === 'info')) ? 'class="active visible-xs-block"' : 'class="visible-xs-block"' ?>><?= SpHTML::anchor('/'.ADMINURL.'/info',__('Info')); ?></li>
		       <li <?= (($cur_controller === 'video')) ? 'class="active visible-xs-block"' : 'class="visible-xs-block"' ?>><?= SpHTML::anchor('/'.ADMINURL.'/video',__('Video')); ?></li>-->
		   </ul>