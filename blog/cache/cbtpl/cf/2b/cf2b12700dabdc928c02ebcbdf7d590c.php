<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>" lang="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="ROBOTS" content="<?php echo context::robotsPolicy($core->blog->settings->system->robots_policy,'NOINDEX'); ?>" />

  <title><?php echo __('Archives'); ?> - <?php echo context::global_filter(dt::dt2str('%B %Y',$_ctx->archives->dt),0,0,0,0,0,'ArchiveDate'); ?> - <?php echo context::global_filter($core->blog->name,1,0,0,0,0,'BlogName'); ?></title>
  <meta name="copyright" content="<?php echo context::global_filter($core->blog->settings->system->copyright_notice,1,0,0,0,0,'BlogCopyrightNotice'); ?>" />
  <meta name="author" content="<?php echo context::global_filter($core->blog->settings->system->editor,1,0,0,0,0,'BlogEditor'); ?>" />
  <meta name="date" scheme="W3CDTF" content="<?php echo context::global_filter(dt::iso8601($core->blog->upddt,$core->blog->settings->system->blog_timezone),0,0,0,0,0,'BlogUpdateDate'); ?>" />

  <link rel="schema.dc" href="http://purl.org/dc/elements/1.1/" />
  <meta name="dc.title" lang="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>" content="<?php echo __('Archives'); ?> - <?php echo context::global_filter(dt::dt2str('%B %Y',$_ctx->archives->dt),0,0,0,0,0,'ArchiveDate'); ?> - <?php echo context::global_filter($core->blog->name,1,0,0,0,0,'BlogName'); ?>" />
  <meta name="dc.language" content="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>" />
  <meta name="dc.publisher" content="<?php echo context::global_filter($core->blog->settings->system->editor,1,0,0,0,0,'BlogEditor'); ?>" />
  <meta name="dc.rights" content="<?php echo context::global_filter($core->blog->settings->system->copyright_notice,1,0,0,0,0,'BlogCopyrightNotice'); ?>" />
  <meta name="dc.date" scheme="W3CDTF" content="<?php echo context::global_filter(dt::iso8601($core->blog->upddt,$core->blog->settings->system->blog_timezone),0,0,0,0,0,'BlogUpdateDate'); ?>" />
  <meta name="dc.type" content="text" />
  <meta name="dc.format" content="text/html" />

  <link rel="top" href="<?php echo context::global_filter($core->blog->url,0,0,0,0,0,'BlogURL'); ?>" title="<?php echo __('Home'); ?>" />
  <link rel="up" href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("archive"),0,0,0,0,0,'BlogArchiveURL'); ?>" title="<?php echo __('Archives'); ?>" />
  <link rel="contents" href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("archive"),0,0,0,0,0,'BlogArchiveURL'); ?>" title="<?php echo __('Archives'); ?>" />


  <?php
if (!isset($params)) $params = array();
$params['type'] = 'month';
$params['next'] = $_ctx->archives->dt;$_ctx->archives = $core->blog->getDates($params); unset($params);
?>
<?php while ($_ctx->archives->fetch()) : ?><link rel="next" href="<?php echo context::global_filter($_ctx->archives->url($core),0,0,0,0,0,'ArchiveURL'); ?>"
  title="<?php echo context::global_filter(dt::dt2str('%B %Y',$_ctx->archives->dt),1,0,0,0,0,'ArchiveDate'); ?>" /><?php endwhile; $_ctx->archives = null; ?>
  <?php
if (!isset($params)) $params = array();$params['type'] = 'month';
$params['previous'] = $_ctx->archives->dt;$_ctx->archives = $core->blog->getDates($params); unset($params);
?>
<?php while ($_ctx->archives->fetch()) : ?><link rel="prev" href="<?php echo context::global_filter($_ctx->archives->url($core),0,0,0,0,0,'ArchiveURL'); ?>"
  title="<?php echo context::global_filter(dt::dt2str('%B %Y',$_ctx->archives->dt),1,0,0,0,0,'ArchiveDate'); ?>" /><?php endwhile; $_ctx->archives = null; ?>

  <?php if ($_ctx->exists("meta")) { @$params['from'] .= ', '.$core->prefix.'meta META ';
@$params['sql'] .= 'AND META.post_id = P.post_id ';
$params['sql'] .= "AND META.meta_type = 'tag' ";
$params['sql'] .= "AND META.meta_id = '".$core->con->escape($_ctx->meta->meta_id)."' ";
} ?>
<?php
if (!isset($_page_number)) { $_page_number = 1; }
$params['limit'] = $_ctx->nb_entry_per_page;
$params['limit'] = array((($_page_number-1)*$params['limit']),$params['limit']);
if ($_ctx->exists("users")) { $params['user_id'] = $_ctx->users->user_id; }
if ($_ctx->exists("categories")) { $params['cat_id'] = $_ctx->categories->cat_id.($core->blog->settings->system->inc_subcats?' ?sub':'');}
if ($_ctx->exists("archives")) { $params['post_year'] = $_ctx->archives->year(); $params['post_month'] = $_ctx->archives->month(); unset($params['limit']); }
if ($_ctx->exists("langs")) { $params['post_lang'] = $_ctx->langs->post_lang; }
if (isset($_search)) { $params['search'] = $_search; }
$params['order'] = 'post_dt desc';
$params['no_content'] = true;
$_ctx->post_params = $params;
$_ctx->posts = $core->blog->getPosts($params); unset($params);
?>
<?php while ($_ctx->posts->fetch()) : ?>
  <link rel="chapter" href="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>" title="<?php echo context::global_filter($_ctx->posts->post_title,1,0,0,0,0,'EntryTitle'); ?>" />
  <?php endwhile; $_ctx->posts = null; $_ctx->post_params = null; ?>

  <?php try { echo $core->tpl->getData('_head.html'); } catch (Exception $e) {} ?>
</head>

<body class="dc-archive-month">
<div id="page">
<?php try { echo $core->tpl->getData('_top.html'); } catch (Exception $e) {} ?>

<div id="wrapper">

<div id="main">
  <div id="content">

  <p id="navlinks">
  <?php
if (!isset($params)) $params = array();$params['type'] = 'month';
$params['previous'] = $_ctx->archives->dt;$_ctx->archives = $core->blog->getDates($params); unset($params);
?>
<?php while ($_ctx->archives->fetch()) : ?><a href="<?php echo context::global_filter($_ctx->archives->url($core),0,0,0,0,0,'ArchiveURL'); ?>" class="prev">&#171; <?php echo context::global_filter(dt::dt2str('%B %Y',$_ctx->archives->dt),1,0,0,0,0,'ArchiveDate'); ?></a>
  - <?php endwhile; $_ctx->archives = null; ?>
  <a href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("archive"),0,0,0,0,0,'BlogArchiveURL'); ?>"><?php echo __('Archives'); ?></a>
  <?php
if (!isset($params)) $params = array();
$params['type'] = 'month';
$params['next'] = $_ctx->archives->dt;$_ctx->archives = $core->blog->getDates($params); unset($params);
?>
<?php while ($_ctx->archives->fetch()) : ?> - <a href="<?php echo context::global_filter($_ctx->archives->url($core),0,0,0,0,0,'ArchiveURL'); ?>" class="next"><?php echo context::global_filter(dt::dt2str('%B %Y',$_ctx->archives->dt),1,0,0,0,0,'ArchiveDate'); ?> &#187;</a><?php endwhile; $_ctx->archives = null; ?>
  </p>

  <div id="content-info">
    <h2><?php echo context::global_filter(dt::dt2str('%B %Y',$_ctx->archives->dt),0,0,0,0,0,'ArchiveDate'); ?></h2>
  </div>

  <div class="content-inner">
  <?php if ($_ctx->exists("meta")) { @$params['from'] .= ', '.$core->prefix.'meta META ';
@$params['sql'] .= 'AND META.post_id = P.post_id ';
$params['sql'] .= "AND META.meta_type = 'tag' ";
$params['sql'] .= "AND META.meta_id = '".$core->con->escape($_ctx->meta->meta_id)."' ";
} ?>
<?php
if (!isset($_page_number)) { $_page_number = 1; }
$params['limit'] = $_ctx->nb_entry_per_page;
$params['limit'] = array((($_page_number-1)*$params['limit']),$params['limit']);
if ($_ctx->exists("users")) { $params['user_id'] = $_ctx->users->user_id; }
if ($_ctx->exists("categories")) { $params['cat_id'] = $_ctx->categories->cat_id.($core->blog->settings->system->inc_subcats?' ?sub':'');}
if ($_ctx->exists("archives")) { $params['post_year'] = $_ctx->archives->year(); $params['post_month'] = $_ctx->archives->month(); unset($params['limit']); }
if ($_ctx->exists("langs")) { $params['post_lang'] = $_ctx->langs->post_lang; }
if (isset($_search)) { $params['search'] = $_search; }
$params['order'] = 'post_dt desc';
$params['no_content'] = true;
$_ctx->post_params = $params;
$_ctx->posts = $core->blog->getPosts($params); unset($params);
?>
<?php while ($_ctx->posts->fetch()) : ?>

    <?php if ($_ctx->posts->firstPostOfDay()) : ?><p class="day-date"><?php echo context::global_filter($_ctx->posts->getDate('',''),0,0,0,0,0,'EntryDate'); ?></p><?php endif; ?>

    <h2 id="p<?php echo context::global_filter($_ctx->posts->post_id,0,0,0,0,0,'EntryID'); ?>" class="post-title" lang="<?php if ($_ctx->posts->post_lang) { echo context::global_filter($_ctx->posts->post_lang,0,0,0,0,0,'EntryLang'); } else {echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'EntryLang'); } ?>" xml:lang="<?php if ($_ctx->posts->post_lang) { echo context::global_filter($_ctx->posts->post_lang,0,0,0,0,0,'EntryLang'); } else {echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'EntryLang'); } ?>"><a
    href="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>" title="<?php echo __('Read'); ?> <?php echo context::global_filter($_ctx->posts->post_title,1,0,0,0,0,'EntryTitle'); ?>"><?php echo context::global_filter($_ctx->posts->post_title,1,0,0,0,0,'EntryTitle'); ?></a></h2>

    <p class="post-info"><?php echo __('By'); ?> <?php echo context::global_filter($_ctx->posts->getAuthorLink(),0,0,0,0,0,'EntryAuthorLink'); ?>
    <?php if(($_ctx->posts->hasComments() || $_ctx->posts->commentsActive())) : ?>
    - <a href="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>#comments"><?php if ($_ctx->posts->nb_comment == 0) {
  printf(__('no comment'),$_ctx->posts->nb_comment);
} elseif ($_ctx->posts->nb_comment == 1) {
  printf(__('one comment'),$_ctx->posts->nb_comment);
} else {
  printf(__('%d comments'),$_ctx->posts->nb_comment);
} ?></a>
    <?php endif; ?>
    <?php if(($_ctx->posts->hasTrackbacks() || $_ctx->posts->trackbacksActive())) : ?>
    - <a href="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>#pings"><?php if ($_ctx->posts->nb_trackback == 0) {
  printf(__('no trackback'),(integer) $_ctx->posts->nb_trackback);
} elseif ($_ctx->posts->nb_trackback == 1) {
  printf(__('one trackback'),(integer) $_ctx->posts->nb_trackback);
} else {
  printf(__('%d trackbacks'),(integer) $_ctx->posts->nb_trackback);
} ?></a><?php endif; ?>
    <?php if($_ctx->posts->countMedia()) : ?>
    - <a href="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>#attachments"><?php if ($_ctx->posts->countMedia() == 0) {
  printf(__('no attachment'),(integer) $_ctx->posts->countMedia());
} elseif ($_ctx->posts->countMedia() == 1) {
  printf(__('one attachment'),(integer) $_ctx->posts->countMedia());
} else {
  printf(__('%d attachments'),(integer) $_ctx->posts->countMedia());
} ?></a><?php endif; ?>
    </p>
  <?php endwhile; $_ctx->posts = null; $_ctx->post_params = null; ?>
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
