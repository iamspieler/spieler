            <? $uri = Request::detect_uri(); ?>
		  	<div id="sideNav" class="showHalfMenu hidden-xs">
				<ul>
					<li><a href="#" class="icon icon-home1"><span>Dashboard</span></a></li>
					<? if((LOGGED_AS == 'root') or (LOGGED_AS == 'admin')) { ?>
					<li><a href="#" class="icon icon-blog"><span><?= __('Blog');?></span></a>
						<ul>
							<li <?= $uri === '/'.ADMINURL.'/'.Kohana::$config->load('controllers.blog').'/' ? 'class="active"' : NULL ?>><?= SpHTML::anchor('/'.ADMINURL.'/blog','<i class="icon-list"></i>'.__('Blog_list')); ?></li>
							<li <?= $uri === '/'.ADMINURL.'/'.Kohana::$config->load('controllers.blog').'/items/add/' ? 'class="active"' : NULL ?>><?= SpHTML::anchor('/'.ADMINURL.'/blog/items/add','<i class="icon-pencil"></i>'.__('Blog_add')); ?></li>
							<li <?= $uri === '/'.ADMINURL.'/'.Kohana::$config->load('controllers.blog').'/sections/' ? 'class="active"' : NULL ?>><?= SpHTML::anchor('/'.ADMINURL.'/blog/sections','<i class="icon-pencil"></i>'.__('Blog_sections')); ?></li>
						</ul>
					</li>
					<? } ?>
					<? if((LOGGED_AS == 'root') or (LOGGED_AS == 'admin')) { ?>
					<li><a href="#" class="icon icon-articles"><span><?= __('Pages_static');?></span></a>
						<ul>
							<li <?= $uri === '/'.ADMINURL.'/'.Kohana::$config->load('controllers.pages').'/' ? 'class="active"' : NULL ?>><?= SpHTML::anchor('/'.ADMINURL.'/pages','<i class="icon-list"></i>'.__('Pages_list')); ?></li>
							<li <?= $uri === '/'.ADMINURL.'/'.Kohana::$config->load('controllers.pages').'/add/' ? 'class="active"' : NULL ?>><?= SpHTML::anchor('/'.ADMINURL.'/pages/add','<i class="icon-pencil"></i>'.__('Pages_add')); ?></li>
						</ul>
					</li>
					<? } ?>
					<? if((LOGGED_AS == 'root') or (LOGGED_AS == 'admin')) { ?>
					<li><a href="#" class="icon icon-social"><span><?= __('Users');?></span></a>
						<ul>
							<li <?= $uri === '/'.ADMINURL.'/users/' ? 'class="active"' : NULL ?>><?= SpHTML::anchor(ADMINURL.'/users','<i class="icon-user"></i>'.__('List')); ?></li>
							<li <?= $uri === '/'.ADMINURL.'/users/add/' ? 'class="active"' : NULL ?>><?= SpHTML::anchor(ADMINURL.'/users/add','<i class="icon-pencil"></i>'.__('Add_user')); ?></li>
							<li <?= $uri === '/'.ADMINURL.'/teams/' ? 'class="active"' : NULL ?>><?= SpHTML::anchor('#','<i class="icon-h-sign"></i>'.__('Organizations')); ?></li>
						</ul>
					</li>
					<? } ?>
					</li>
				</ul>	
		    </div>	
