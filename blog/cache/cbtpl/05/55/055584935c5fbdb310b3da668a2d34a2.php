<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>" lang="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="ROBOTS" content="<?php echo context::robotsPolicy($core->blog->settings->system->robots_policy,'NOINDEX'); ?>" />

  <title><?php echo context::global_filter($_ctx->categories->cat_title,1,0,0,0,0,'CategoryTitle'); ?> - <?php echo context::global_filter($core->blog->name,1,0,0,0,0,'BlogName'); ?><?php if(!context::PaginationStart()) : ?> - <?php echo __('page'); ?> <?php echo context::global_filter(context::PaginationPosition(0),0,0,0,0,0,'PaginationCurrent'); ?><?php endif; ?></title>
  <meta name="description" lang="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>" content="<?php echo context::global_filter($_ctx->categories->cat_desc,0,1,180,0,0,'CategoryDescription'); ?>" />
  <meta name="copyright" content="<?php echo context::global_filter($core->blog->settings->system->copyright_notice,1,0,0,0,0,'BlogCopyrightNotice'); ?>" />
  <meta name="author" content="<?php echo context::global_filter($core->blog->settings->system->editor,1,0,0,0,0,'BlogEditor'); ?>" />
  <meta name="date" scheme="W3CDTF" content="<?php echo context::global_filter(dt::iso8601($core->blog->upddt,$core->blog->settings->system->blog_timezone),0,0,0,0,0,'BlogUpdateDate'); ?>" />

  <link rel="schema.dc" href="http://purl.org/dc/elements/1.1/" />
  <meta name="dc.title" lang="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>" content="<?php echo context::global_filter($_ctx->categories->cat_title,1,0,0,0,0,'CategoryTitle'); ?> - <?php echo context::global_filter($core->blog->name,1,0,0,0,0,'BlogName'); ?><?php if(!context::PaginationStart()) : ?> - <?php echo __('page'); ?> <?php echo context::global_filter(context::PaginationPosition(0),0,0,0,0,0,'PaginationCurrent'); ?><?php endif; ?>" />
  <meta name="dc.description" lang="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>" content="<?php echo context::global_filter($_ctx->categories->cat_desc,0,1,0,0,0,'CategoryDescription'); ?>" />
  <meta name="dc.language" content="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>" />
  <meta name="dc.publisher" content="<?php echo context::global_filter($core->blog->settings->system->editor,1,0,0,0,0,'BlogEditor'); ?>" />
  <meta name="dc.rights" content="<?php echo context::global_filter($core->blog->settings->system->copyright_notice,1,0,0,0,0,'BlogCopyrightNotice'); ?>" />
  <meta name="dc.date" scheme="W3CDTF" content="<?php echo context::global_filter(dt::iso8601($core->blog->upddt,$core->blog->settings->system->blog_timezone),0,0,0,0,0,'BlogUpdateDate'); ?>" />
  <meta name="dc.type" content="text" />
  <meta name="dc.format" content="text/html" />

  <link rel="top" href="<?php echo context::global_filter($core->blog->url,0,0,0,0,0,'BlogURL'); ?>" title="<?php echo __('Home'); ?>" />
  <link rel="contents" href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("archive"),0,0,0,0,0,'BlogArchiveURL'); ?>" title="<?php echo __('Archives'); ?>" />

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
    <?php if ($_ctx->posts->isStart()) : ?>
      <?php
$params = $_ctx->post_params;
$_ctx->pagination = $core->blog->getPosts($params,true); unset($params);
?>
<?php if ($_ctx->pagination->f(0) > $_ctx->posts->count()) : ?>
        <?php if(!context::PaginationEnd()) : ?>
        <link rel="prev" title="<?php echo __('previous entries'); ?>" href="<?php echo context::global_filter(context::PaginationURL(1),0,0,0,0,0,'PaginationURL'); ?>" />
        <?php endif; ?>

        <?php if(!context::PaginationStart()) : ?>
        <link rel="next" title="<?php echo __('next entries'); ?>" href="<?php echo context::global_filter(context::PaginationURL(-1),0,0,0,0,0,'PaginationURL'); ?>" />
        <?php endif; ?>
      <?php endif; ?>
    <?php endif; ?>

    <link rel="chapter" href="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>" title="<?php echo context::global_filter($_ctx->posts->post_title,1,0,0,0,0,'EntryTitle'); ?>" />
  <?php endwhile; $_ctx->posts = null; $_ctx->post_params = null; ?>

  <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("feed","category/".$_ctx->categories->cat_url."/atom"),0,0,0,0,0,'CategoryFeedURL'); ?>" />

  <?php try { echo $core->tpl->getData('_head.html'); } catch (Exception $e) {} ?>
</head>

<body class="dc-category">
<div id="page">
<?php try { echo $core->tpl->getData('_top.html'); } catch (Exception $e) {} ?>

<div id="wrapper">

<div id="main">
  <div id="content">

  <div id="content-info">
    <h2><?php
$_ctx->categories = $core->blog->getCategoryParents($_ctx->categories->cat_id);
while ($_ctx->categories->fetch()) : ?><a href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("category",$_ctx->categories->cat_url),0,0,0,0,0,'CategoryURL'); ?>"><?php echo context::global_filter($_ctx->categories->cat_title,1,0,0,0,0,'CategoryTitle'); ?></a> &rsaquo; <?php endwhile; $_ctx->categories = null; ?>
    <?php echo context::global_filter($_ctx->categories->cat_title,1,0,0,0,0,'CategoryTitle'); ?></h2>
    <?php echo context::global_filter($_ctx->categories->cat_desc,0,0,0,0,0,'CategoryDescription'); ?>

    <?php if($_ctx->categories->nb_post > 0) : ?>
      <p><a type="application/atom+xml" href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("feed","category/".$_ctx->categories->cat_url."/atom"),0,0,0,0,0,'CategoryFeedURL'); ?>"
      title="<?php echo __('This category\'s entries Atom feed'); ?>" class="feed"><?php echo __('Entries feed'); ?></a>

      <?php if($core->blog->settings->system->allow_comments || $core->blog->settings->system->allow_trackbacks) : ?>
      - <a type="application/atom+xml" href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("feed","category/".$_ctx->categories->cat_url."/atom"),0,0,0,0,0,'CategoryFeedURL'); ?>/comments"
      title="<?php echo __('This category\'s comments Atom feed'); ?>" class="feed"><?php echo __('Comments feed'); ?></a>
      <?php endif; ?>
      </p>
    <?php endif; ?>
  </div>

  <?php
$_ctx->categories = $core->blog->getCategoryFirstChildren($_ctx->categories->cat_id);
while ($_ctx->categories->fetch()) : ?>
    <?php if ($_ctx->categories->isStart()) : ?>
      <div id="subcategories">
      <h3><?php echo __('Subcategories'); ?></h3>
      <ul>
    <?php endif; ?>
    <li><a href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("category",$_ctx->categories->cat_url),0,0,0,0,0,'CategoryURL'); ?>"><?php echo context::global_filter($_ctx->categories->cat_title,1,0,0,0,0,'CategoryTitle'); ?></a></li>
    <?php if ($_ctx->categories->isEnd()) : ?>
      </ul>
      </div>
    <?php endif; ?>
  <?php endwhile; $_ctx->categories = null; ?>

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
$_ctx->post_params = $params;
$_ctx->posts = $core->blog->getPosts($params); unset($params);
?>
<?php while ($_ctx->posts->fetch()) : ?>
    <div id="p<?php echo context::global_filter($_ctx->posts->post_id,0,0,0,0,0,'EntryID'); ?>" class="post <?php if (($_ctx->posts->index()+1)%2 == 1) { echo 'odd'; } ?> <?php if ($_ctx->posts->index() == 0) { echo 'first'; } ?>" lang="<?php if ($_ctx->posts->post_lang) { echo context::global_filter($_ctx->posts->post_lang,0,0,0,0,0,'EntryLang'); } else {echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'EntryLang'); } ?>" xml:lang="<?php if ($_ctx->posts->post_lang) { echo context::global_filter($_ctx->posts->post_lang,0,0,0,0,0,'EntryLang'); } else {echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'EntryLang'); } ?>">

    <?php if ($_ctx->posts->firstPostOfDay()) : ?><p class="day-date"><?php echo context::global_filter($_ctx->posts->getDate('',''),0,0,0,0,0,'EntryDate'); ?></p><?php endif; ?>

    <h2 class="post-title"><a
    href="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>"><?php echo context::global_filter($_ctx->posts->post_title,1,0,0,0,0,'EntryTitle'); ?></a></h2>

    <p class="post-info"><?php echo __('By'); ?> <?php echo context::global_filter($_ctx->posts->getAuthorLink(),0,0,0,0,0,'EntryAuthorLink'); ?>
    <?php echo __('on'); ?> <?php echo context::global_filter($_ctx->posts->getDate('',''),0,0,0,0,0,'EntryDate'); ?>, <?php echo context::global_filter($_ctx->posts->getTime('',''),0,0,0,0,0,'EntryTime'); ?></p>

    <?php
$_ctx->meta = $core->meta->getMetaRecordset($_ctx->posts->post_meta,'tag'); $_ctx->meta->sort('meta_id_lower','asc'); ?><?php while ($_ctx->meta->fetch()) : ?>
    <?php if ($_ctx->meta->isStart()) : ?><ul class="post-tags"><?php endif; ?>
    <li><a href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("tag",rawurlencode($_ctx->meta->meta_id)),0,0,0,0,0,'TagURL'); ?>"><?php echo context::global_filter($_ctx->meta->meta_id,0,0,0,0,0,'TagID'); ?></a></li>
    <?php if ($_ctx->meta->isEnd()) : ?></ul><?php endif; ?>
    <?php endwhile; $_ctx->meta = null; ?>

    <?php if ($core->hasBehavior('publicEntryBeforeContent')) { $core->callBehavior('publicEntryBeforeContent',$core,$_ctx);} ?>

    <?php if($_ctx->posts->isExtended()) : ?>
      <div class="post-content"><?php echo context::global_filter($_ctx->posts->getExcerpt(0),0,0,0,0,0,'EntryExcerpt'); ?></div>
      <p class="read-it"><a href="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>"
      title="<?php echo __('Continue reading'); ?> <?php echo context::global_filter($_ctx->posts->post_title,1,0,0,0,0,'EntryTitle'); ?>"><?php echo __('Continue reading'); ?></a>...</p>
    <?php endif; ?>

    <?php if(!$_ctx->posts->isExtended()) : ?>
      <div class="post-content"><?php echo context::global_filter($_ctx->posts->getContent(0),0,0,0,0,0,'EntryContent'); ?></div>
    <?php endif; ?>

    <?php if ($core->hasBehavior('publicEntryAfterContent')) { $core->callBehavior('publicEntryAfterContent',$core,$_ctx);} ?>

    <?php if(($_ctx->posts->hasComments() || $_ctx->posts->commentsActive()) || ($_ctx->posts->hasTrackbacks() || $_ctx->posts->trackbacksActive()) || $_ctx->posts->countMedia()) : ?>
      <p class="post-info-co">
    <?php endif; ?>
    <?php if(($_ctx->posts->hasComments() || $_ctx->posts->commentsActive())) : ?>
      <a href="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>#comments" class="comment_count"><?php if ($_ctx->posts->nb_comment == 0) {
  printf(__('no comment'),$_ctx->posts->nb_comment);
} elseif ($_ctx->posts->nb_comment == 1) {
  printf(__('one comment'),$_ctx->posts->nb_comment);
} else {
  printf(__('%d comments'),$_ctx->posts->nb_comment);
} ?></a>
    <?php endif; ?>
    <?php if(($_ctx->posts->hasTrackbacks() || $_ctx->posts->trackbacksActive())) : ?>
      <a href="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>#pings" class="ping_count"><?php if ($_ctx->posts->nb_trackback == 0) {
  printf(__('no trackback'),(integer) $_ctx->posts->nb_trackback);
} elseif ($_ctx->posts->nb_trackback == 1) {
  printf(__('one trackback'),(integer) $_ctx->posts->nb_trackback);
} else {
  printf(__('%d trackbacks'),(integer) $_ctx->posts->nb_trackback);
} ?></a><?php endif; ?>
    <?php if($_ctx->posts->countMedia()) : ?>
      <a href="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>#attachments" class="attach_count"><?php if ($_ctx->posts->countMedia() == 0) {
  printf(__('no attachment'),(integer) $_ctx->posts->countMedia());
} elseif ($_ctx->posts->countMedia() == 1) {
  printf(__('one attachment'),(integer) $_ctx->posts->countMedia());
} else {
  printf(__('%d attachments'),(integer) $_ctx->posts->countMedia());
} ?></a><?php endif; ?>
    <?php if(($_ctx->posts->hasComments() || $_ctx->posts->commentsActive()) || ($_ctx->posts->hasTrackbacks() || $_ctx->posts->trackbacksActive()) || $_ctx->posts->countMedia()) : ?>
      </p>
    <?php endif; ?>
    </div>

    <?php if ($_ctx->posts->isEnd()) : ?>
      <?php
$params = $_ctx->post_params;
$_ctx->pagination = $core->blog->getPosts($params,true); unset($params);
?>
<?php if ($_ctx->pagination->f(0) > $_ctx->posts->count()) : ?>
        <p class="pagination"><?php if(!context::PaginationEnd()) : ?><a href="<?php echo context::global_filter(context::PaginationURL(1),0,0,0,0,0,'PaginationURL'); ?>" class="prev">&#171;
        <?php echo __('previous entries'); ?></a> - <?php endif; ?>
        <?php echo __('page'); ?> <?php echo context::global_filter(context::PaginationPosition(0),0,0,0,0,0,'PaginationCurrent'); ?> <?php echo __('of'); ?> <?php echo context::global_filter(context::PaginationNbPages(),0,0,0,0,0,'PaginationCounter'); ?>
        <?php if(!context::PaginationStart()) : ?> - <a href="<?php echo context::global_filter(context::PaginationURL(-1),0,0,0,0,0,'PaginationURL'); ?>" class="next"><?php echo __('next entries'); ?>
        &#187;</a><?php endif; ?></p>
      <?php endif; ?>
    <?php endif; ?>
  <?php endwhile; $_ctx->posts = null; $_ctx->post_params = null; ?>
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
