<link rel="stylesheet" type="text/css" href="<?php echo context::global_filter($core->blog->settings->system->themes_url."/".$core->blog->settings->system->theme,0,0,0,0,0,'BlogThemeURL'); ?>/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo context::global_filter($core->blog->settings->system->themes_url."/".$core->blog->settings->system->theme,0,0,0,0,0,'BlogThemeURL'); ?>/../default/print.css" media="print" />

<script type="text/javascript" src="<?php echo context::global_filter($core->blog->settings->system->themes_url."/".$core->blog->settings->system->theme,0,0,0,0,0,'BlogThemeURL'); ?>/../default/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo context::global_filter($core->blog->settings->system->themes_url."/".$core->blog->settings->system->theme,0,0,0,0,0,'BlogThemeURL'); ?>/../default/js/jquery.cookie.js"></script>

<?php try { echo $core->tpl->getData('user_head.html'); } catch (Exception $e) {} ?>
<?php if ($core->hasBehavior('publicHeadContent')) { $core->callBehavior('publicHeadContent',$core,$_ctx);} ?>
