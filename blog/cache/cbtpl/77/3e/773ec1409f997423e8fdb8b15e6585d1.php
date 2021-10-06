<div id="header">
	
	<div id="top">
		<p id="logo" class="nosmall"><a href="<?php echo context::global_filter($core->blog->url,0,0,0,0,0,'BlogURL'); ?>"><img src="<?php echo context::global_filter($core->blog->settings->system->themes_url."/".$core->blog->settings->system->theme,0,0,0,0,0,'BlogThemeURL'); ?>/img/logo.png" alt="<?php echo __('Home'); ?>" /></a></p>
		<h1><span><a href="<?php echo context::global_filter($core->blog->url,0,0,0,0,0,'BlogURL'); ?>"><?php echo context::global_filter($core->blog->name,1,0,0,0,0,'BlogName'); ?></a></span></h1>
		<p id="blogdesc" class="nosmall"><?php echo context::global_filter($core->blog->desc,0,0,0,0,0,'BlogDescription'); ?></p>
	</div>
	
	<ul id="prelude">
		<li class="nosmall"><a href="#main"><?php echo __('To content'); ?></a></li>
		<li><a href="#blognav"><?php echo __('To menu'); ?></a></li>
		<li><a href="#search"><?php echo __('To search'); ?></a></li>
	</ul>

	<?php if ($core->hasBehavior('publicTopAfterContent')) { $core->callBehavior('publicTopAfterContent',$core,$_ctx);} ?>
	
	<?php echo tplSimpleMenu::displayMenu('supranav nosmall','sn-top',''); ?>

</div>