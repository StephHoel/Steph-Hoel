<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>" lang="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="ROBOTS" content="<?php echo context::robotsPolicy($core->blog->settings->system->robots_policy,''); ?>" />

  <title><?php echo __('Archives'); ?> - <?php echo context::global_filter($core->blog->name,1,0,0,0,0,'BlogName'); ?></title>
  <meta name="copyright" content="<?php echo context::global_filter($core->blog->settings->system->copyright_notice,1,0,0,0,0,'BlogCopyrightNotice'); ?>" />
  <meta name="author" content="<?php echo context::global_filter($core->blog->settings->system->editor,1,0,0,0,0,'BlogEditor'); ?>" />
  <meta name="date" scheme="W3CDTF" content="<?php echo context::global_filter(dt::iso8601($core->blog->upddt,$core->blog->settings->system->blog_timezone),0,0,0,0,0,'BlogUpdateDate'); ?>" />

  <link rel="schema.dc" href="http://purl.org/dc/elements/1.1/" />
  <meta name="dc.title" lang="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>" content="<?php echo __('Archives'); ?> - <?php echo context::global_filter($core->blog->name,1,0,0,0,0,'BlogName'); ?>" />
  <meta name="dc.language" content="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>" />
  <meta name="dc.publisher" content="<?php echo context::global_filter($core->blog->settings->system->editor,1,0,0,0,0,'BlogEditor'); ?>" />
  <meta name="dc.rights" content="<?php echo context::global_filter($core->blog->settings->system->copyright_notice,1,0,0,0,0,'BlogCopyrightNotice'); ?>" />
  <meta name="dc.date" scheme="W3CDTF" content="<?php echo context::global_filter(dt::iso8601($core->blog->upddt,$core->blog->settings->system->blog_timezone),0,0,0,0,0,'BlogUpdateDate'); ?>" />
  <meta name="dc.type" content="text" />
  <meta name="dc.format" content="text/html" />

  <link rel="top" href="<?php echo context::global_filter($core->blog->url,0,0,0,0,0,'BlogURL'); ?>" title="<?php echo __('Home'); ?>" />

  <?php
if (!isset($params)) $params = array();
$params['type'] = 'month';
if ($_ctx->exists("categories")) { $params['cat_id'] = $_ctx->categories->cat_id; }
$_ctx->archives = $core->blog->getDates($params); unset($params);
?>
<?php while ($_ctx->archives->fetch()) : ?>
    <link rel="chapter" href="<?php echo context::global_filter($_ctx->archives->url($core),0,0,0,0,0,'ArchiveURL'); ?>" title="<?php echo context::global_filter(dt::dt2str('%B %Y',$_ctx->archives->dt),1,0,0,0,0,'ArchiveDate'); ?>" />
  <?php endwhile; $_ctx->archives = null; ?>

  <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("feed","atom"),0,0,0,0,0,'BlogFeedURL'); ?>" />

  <?php try { echo $core->tpl->getData('_head.html'); } catch (Exception $e) {} ?>
</head>

<body class="dc-archive">
<div id="page">
<?php try { echo $core->tpl->getData('_top.html'); } catch (Exception $e) {} ?>

<div id="wrapper">

<div id="main">
  <div id="content">

  <div id="content-info">
    <h2><?php echo __('Archives'); ?></h2>
  </div>

  <div class="content-inner">
  <?php
if (!isset($params)) $params = array();
$params['type'] = 'month';
if ($_ctx->exists("categories")) { $params['cat_id'] = $_ctx->categories->cat_id; }
$_ctx->archives = $core->blog->getDates($params); unset($params);
?>
<?php while ($_ctx->archives->fetch()) : ?>
    <?php if ($_ctx->archives->yearHeader()) : ?>
      <h3><?php echo context::global_filter(dt::dt2str('%Y',$_ctx->archives->dt),0,0,0,0,0,'ArchiveDate'); ?></h3>
      <ul>
    <?php endif; ?>
      <li><a href="<?php echo context::global_filter($_ctx->archives->url($core),0,0,0,0,0,'ArchiveURL'); ?>"
      title="<?php echo context::global_filter(dt::dt2str('%B %Y',$_ctx->archives->dt),1,0,0,0,0,'ArchiveDate'); ?>"><?php echo context::global_filter(dt::dt2str('%B',$_ctx->archives->dt),1,0,0,0,0,'ArchiveDate'); ?></a>
      (<?php echo context::global_filter($_ctx->archives->nb_post,0,0,0,0,0,'ArchiveEntriesCount'); ?>)</li>
    <?php if ($_ctx->archives->yearFooter()) : ?>
      </ul>
    <?php endif; ?>
  <?php endwhile; $_ctx->archives = null; ?>
  </div>

  </div>
</div> <!-- End #main -->

<div id="sidebar">
  <div id="blognav">
    <?php publicWidgets::widgetsHandler('nav','');  ?>
  </div> <!-- End #blognav -->

  <div id="blogextra">
    <?php publicWidgets::widgetsHandler('extra','');  ?>
  </div> <!-- End #blogextra -->
</div>

</div> <!-- End #wrapper -->

<?php try { echo $core->tpl->getData('_footer.html'); } catch (Exception $e) {} ?>
</div> <!-- End #page -->
</body>
</html>
