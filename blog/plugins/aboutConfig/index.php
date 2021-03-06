<?php
# -- BEGIN LICENSE BLOCK ---------------------------------------
#
# This file is part of Dotclear 2.
#
# Copyright (c) 2003-2011 Olivier Meunier & Association Dotclear
# Licensed under the GPL version 2.0 license.
# See LICENSE file or
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
#
# -- END LICENSE BLOCK -----------------------------------------
if (!defined('DC_CONTEXT_ADMIN')) { return; }

# Local navigation
if (!empty($_POST['gs_nav'])) {
	http::redirect($p_url.$_POST['gs_nav']);
	exit;
}
if (!empty($_POST['ls_nav'])) {
	http::redirect($p_url.$_POST['ls_nav']);
	exit;
}

# Local settings update
if (!empty($_POST['s']) && is_array($_POST['s']))
{
	try
	{
		foreach ($_POST['s'] as $ns => $s)
		{
			$core->blog->settings->addNamespace($ns);
			
			foreach ($s as $k => $v) 	{
				$core->blog->settings->$ns->put($k,$v);
			}
			
			$core->blog->triggerBlog();
		}
		
		http::redirect($p_url.'&upd=1');
	}
	catch (Exception $e)
	{
		$core->error->add($e->getMessage());
	}
}

# Global settings update
if (!empty($_POST['gs']) && is_array($_POST['gs']))
{
	try
	{
		foreach ($_POST['gs'] as $ns => $s)
		{
			$core->blog->settings->addNamespace($ns);
			
			foreach ($s as $k => $v) 	{
				$core->blog->settings->$ns->put($k,$v,null,null,true,true);
			}
			
			$core->blog->triggerBlog();
		}
		
		http::redirect($p_url.'&upd=1&part=global');
	}
	catch (Exception $e)
	{
		$core->error->add($e->getMessage());
	}
}

$part = !empty($_GET['part']) && $_GET['part'] == 'global' ? 'global' : 'local';

function settingLine($id,$s,$ns,$field_name,$strong_label)
{
	if ($s['type'] == 'boolean') {
		$field = form::combo(array($field_name.'['.$ns.']['.$id.']',$field_name.'_'.$id),
		array(__('yes') => 1, __('no') => 0),$s['value']);
	} else {
		$field = form::field(array($field_name.'['.$ns.']['.$id.']',$field_name.'_'.$id),40,null,
		html::escapeHTML($s['value']));
	}
	
	$slabel = $strong_label ? '<strong>%s</strong>' : '%s';
	
	return
	'<tr>'.
	'<td scope="raw"><label for="s_'.$id.'">'.sprintf($slabel,html::escapeHTML($id)).'</label></td>'.
	'<td>'.$field.'</td>'.
	'<td>'.$s['type'].'</td>'.
	'<td>'.html::escapeHTML($s['label']).'</td>'.
	'</tr>';
}
?>
<html>
<head>
  <title>about:config</title>
  <?php echo dcPage::jsPageTabs($part); ?>
  <style type="text/css">
  table.settings { border: 1px solid #999; margin-bottom: 2em; }
  table.settings th { background: #f5f5f5; color: #444; padding-top: 0.3em; padding-bottom: 0.3em; }
  p.anchor-nav {float: right; }
  </style>
	<script type="text/javascript">
	//<![CDATA[
	$(function() {
		$("#gs_submit").hide();
		$("#ls_submit").hide();
		$("#gs_nav").change(function() {
			window.location = $("#gs_nav option:selected").val();
		})
		$("#ls_nav").change(function() {
			window.location = $("#ls_nav option:selected").val();
		})
	});
	//]]>
	</script>
</head>

<body>
<?php
if (!empty($_GET['upd'])) {
	echo '<p class="message">'.__('Configuration successfully updated').'</p>';
}

if (!empty($_GET['upda'])) {
	echo '<p class="message">'.__('Settings definition successfully updated').'</p>';
}
?>
<h2><?php echo html::escapeHTML($core->blog->name); ?> &rsaquo; <span class="page-title">about:config</span></h2>

<div id="local" class="multi-part" title="<?php echo __('blog settings'); ?>">

<?php 
$table_header = '<table class="settings" id="%s"><caption>%s</caption>'.
'<thead>'.
'<tr>'."\n".
'  <th class="nowrap">Setting ID</th>'."\n".
'  <th>'.__('Value').'</th>'."\n".
'  <th>'.__('Type').'</th>'."\n".
'  <th class="maximalx">'.__('Description').'</th>'."\n".
'</tr>'."\n".
'</thead>'."\n".
'<tbody>';
$table_footer = '</tbody></table>';

$settings = array();
foreach ($core->blog->settings->dumpNamespaces() as $ns => $namespace) {
	foreach ($namespace->dumpSettings() as $k => $v) {
		$settings[$ns][$k] = $v;
	}
}
ksort($settings);
if (count($settings) > 0) {
	$ns_combo = array();
	foreach ($settings as $ns => $s) {
		$ns_combo[$ns] = '#l_'.$ns;
	}
	echo 
		'<form action="plugin.php" method="post">'.
		'<p class="anchor-nav">'.
		'<label for="ls_nav" class="classic">'.__('Goto:').'</label> '.form::combo('ls_nav',$ns_combo).
		' <input type="submit" value="'.__('Ok').'" id="ls_submit" />'.
		'<input type="hidden" name="p" value="aboutConfig" />'.
		$core->formNonce().'</p></form>';
}
?>

<form action="plugin.php" method="post">

<?php
foreach ($settings as $ns => $s)
{
	ksort($s);
	echo sprintf($table_header,'l_'.$ns,$ns);
	foreach ($s as $k => $v)
	{
		echo settingLine($k,$v,$ns,'s',!$v['global']);
	}
	echo $table_footer;
}
?>

<p><input type="submit" value="<?php echo __('Save'); ?>" />
<input type="hidden" name="p" value="aboutConfig" />
<?php echo $core->formNonce(); ?></p>
</form>
</div>

<div id="global" class="multi-part" title="<?php echo __('global settings'); ?>">

<?php
$settings = array();

foreach ($core->blog->settings->dumpNamespaces() as $ns => $namespace) {
	foreach ($namespace->dumpGlobalSettings() as $k => $v) {
		$settings[$ns][$k] = $v;
	}
}

ksort($settings);

if (count($settings) > 0) {
	$ns_combo = array();
	foreach ($settings as $ns => $s) {
		$ns_combo[$ns] = '#g_'.$ns;
	}
	echo 
		'<form action="plugin.php" method="post">'.
		'<p class="anchor-nav">'.
		'<label for="gs_nav" class="classic">'.__('Goto:').'</label> '.form::combo('gs_nav',$ns_combo).
		' <input type="submit" value="'.__('Ok').'" id="gs_submit" />'.
		'<input type="hidden" name="p" value="aboutConfig" />'.
		$core->formNonce().'</p></form>';
}
?>

<form action="plugin.php" method="post">

<?php
foreach ($settings as $ns => $s)
{
	ksort($s);
	echo sprintf($table_header,'g_'.$ns,$ns);
	foreach ($s as $k => $v)
	{
		echo settingLine($k,$v,$ns,'gs',false);
	}
	echo $table_footer;
}
?>

<p><input type="submit" value="<?php echo __('Save'); ?>" />
<input type="hidden" name="p" value="aboutConfig" />
<?php echo $core->formNonce(); ?></p>
</form>
</div>

</body>
</html>