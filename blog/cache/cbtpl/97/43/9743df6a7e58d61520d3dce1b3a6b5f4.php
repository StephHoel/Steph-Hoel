<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>" lang="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="MSSmartTagsPreventParsing" content="TRUE" />
  <meta name="ROBOTS" content="<?php echo context::robotsPolicy($core->blog->settings->system->robots_policy,''); ?>" />
  
  <title><?php echo context::global_filter($core->blog->name,1,0,0,0,0,'BlogName'); ?><?php if(!context::PaginationStart()) : ?> - <?php echo __('page'); ?> <?php echo context::global_filter(context::PaginationPosition(0),0,0,0,0,0,'PaginationCurrent'); ?><?php endif; ?></title>
  <meta name="description" lang="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>" content="<?php echo context::global_filter($core->blog->desc,1,0,180,0,0,'BlogDescription'); ?>" />
  <meta name="copyright" content="<?php echo context::global_filter($core->blog->settings->system->copyright_notice,1,0,0,0,0,'BlogCopyrightNotice'); ?>" />
  <meta name="author" content="<?php echo context::global_filter($core->blog->settings->system->editor,1,0,0,0,0,'BlogEditor'); ?>" />
  <meta name="date" scheme="W3CDTF" content="<?php echo context::global_filter(dt::iso8601($core->blog->upddt,$core->blog->settings->system->blog_timezone),0,0,0,0,0,'BlogUpdateDate'); ?>" />
  
  <link rel="schema.dc" href="http://purl.org/dc/elements/1.1/" />
  <meta name="dc.title" lang="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>" content="<?php echo context::global_filter($core->blog->name,1,0,0,0,0,'BlogName'); ?><?php if(!context::PaginationStart()) : ?> - <?php echo __('page'); ?> <?php echo context::global_filter(context::PaginationPosition(0),0,0,0,0,0,'PaginationCurrent'); ?><?php endif; ?>" />
  <meta name="dc.description" lang="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>" content="<?php echo context::global_filter($core->blog->desc,1,0,0,0,0,'BlogDescription'); ?>" />
  <meta name="dc.language" content="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>" />
  <meta name="dc.publisher" content="<?php echo context::global_filter($core->blog->settings->system->editor,1,0,0,0,0,'BlogEditor'); ?>" />
  <meta name="dc.rights" content="<?php echo context::global_filter($core->blog->settings->system->copyright_notice,1,0,0,0,0,'BlogCopyrightNotice'); ?>" />
  <meta name="dc.date" scheme="W3CDTF" content="<?php echo context::global_filter(dt::iso8601($core->blog->upddt,$core->blog->settings->system->blog_timezone),0,0,0,0,0,'BlogUpdateDate'); ?>" />
  <meta name="dc.type" content="text" />
  <meta name="dc.format" content="text/html" />
  
  <link rel="contents" title="<?php echo __('Archives'); ?>" href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("archive"),0,0,0,0,0,'BlogArchiveURL'); ?>" />
  <?php
if (!isset($params)) $params = array();
$_ctx->categories = $core->blog->getCategories($params);
?>
<?php while ($_ctx->categories->fetch()) : ?>
  <link rel="section" href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("category",$_ctx->categories->cat_url),0,0,0,0,0,'CategoryURL'); ?>" title="<?php echo context::global_filter($_ctx->categories->cat_title,1,0,0,0,0,'CategoryTitle'); ?>" />
  <?php endwhile; $_ctx->categories = null; unset($params); ?>
  
  <?php if ($_ctx->exists("meta") && ($_ctx->meta->meta_type == "tag")) { if (!isset($params)) { $params = array(); }
if (!isset($params['from'])) { $params['from'] = ''; }
if (!isset($params['sql'])) { $params['sql'] = ''; }
$params['from'] .= ', '.$core->prefix.'meta META ';
$params['sql'] .= 'AND META.post_id = P.post_id ';
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
        <link rel="previous" title="<?php echo __('previous entries'); ?>" href="<?php echo context::global_filter(context::PaginationURL(1),0,0,0,0,0,'PaginationURL'); ?>" />
        <?php endif; ?>
        
        <?php if(!context::PaginationStart()) : ?>
        <link rel="next" title="<?php echo __('next entries'); ?>" href="<?php echo context::global_filter(context::PaginationURL(-1),0,0,0,0,0,'PaginationURL'); ?>" />
        <?php endif; ?>
      <?php endif; ?>
    <?php endif; ?>
    
    <link rel="chapter" href="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>" title="<?php echo context::global_filter($_ctx->posts->post_title,1,0,0,0,0,'EntryTitle'); ?>" />
  <?php endwhile; $_ctx->posts = null; $_ctx->post_params = null; ?>
  
  <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("feed","atom"),0,0,0,0,0,'BlogFeedURL'); ?>" />
  <link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor('rsd'),0,0,0,0,0,'BlogRSDURL'); ?>" />
  <link rel="meta" type="application/xbel+xml" title="Blogroll" href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("xbel"),0,0,0,0,0,'BlogrollXbelLink'); ?>" />
  
  <?php try { echo $core->tpl->getData('_head.html'); } catch (Exception $e) {} ?>
</head>

<body class="dc-home">
<div id="page">
<?php try { echo $core->tpl->getData('_top.html'); } catch (Exception $e) {} ?>

<div id="wrapper">

<div id="main">
  <div id="content">
  <?php if ($_ctx->exists("meta") && ($_ctx->meta->meta_type == "tag")) { if (!isset($params)) { $params = array(); }
if (!isset($params['from'])) { $params['from'] = ''; }
if (!isset($params['sql'])) { $params['sql'] = ''; }
$params['from'] .= ', '.$core->prefix.'meta META ';
$params['sql'] .= 'AND META.post_id = P.post_id ';
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

    <?php if(($_ctx->posts->hasComments() || $_ctx->posts->commentsActive())) : ?>
      <p class="post-info-co">
    <?php endif; ?>
    <?php if(($_ctx->posts->hasComments() || $_ctx->posts->commentsActive())) : ?>
      <a href="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>#comments" class="comment_count"><?php if ($_ctx->posts->nb_comment == 0) {
  printf(__('%s'),$_ctx->posts->nb_comment);
} elseif ($_ctx->posts->nb_comment == 1) {
  printf(__('%s'),$_ctx->posts->nb_comment);
} else {
  printf(__('%s'),$_ctx->posts->nb_comment);
} ?></a>
    <?php endif; ?>
    <?php if(($_ctx->posts->hasComments() || $_ctx->posts->commentsActive())) : ?>
      </p>
    <?php endif; ?>


    <p class="post-info"> 
<?php if($_ctx->posts->cat_id) : ?>
<?php
$_ctx->categories = $core->blog->getCategoryParents($_ctx->posts->cat_id);
while ($_ctx->categories->fetch()) : ?>
  <a href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("category",$_ctx->categories->cat_url),0,0,0,0,0,'CategoryURL'); ?>"><?php echo context::global_filter($_ctx->categories->cat_title,1,0,0,0,0,'CategoryTitle'); ?></a> ›
<?php endwhile; $_ctx->categories = null; ?>
<a href="<?php echo context::global_filter($_ctx->posts->getCategoryURL(),0,0,0,0,0,'EntryCategoryURL'); ?>"><?php echo context::global_filter($_ctx->posts->cat_title,1,0,0,0,0,'EntryCategory'); ?></a> -
<?php endif; ?> 
<?php echo context::global_filter($_ctx->posts->getAuthorLink(),0,0,0,0,0,'EntryAuthorLink'); ?> - <?php echo context::global_filter($_ctx->posts->getDate('',''),0,0,0,0,0,'EntryDate'); ?>
    </p>

    <?php
$_ctx->meta = $core->meta->getMetaRecordset($_ctx->posts->post_meta,'tag'); $_ctx->meta->sort('meta_id_lower','asc'); ?><?php while ($_ctx->meta->fetch()) : ?>
    <?php if ($_ctx->meta->isStart()) : ?><ul class="post-tags"> <?php echo __('Tags'); ?> :<?php endif; ?>
    <a href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("tag",rawurlencode($_ctx->meta->meta_id)),0,0,0,0,0,'TagURL'); ?>"><?php echo context::global_filter($_ctx->meta->meta_id,0,0,0,0,0,'TagID'); ?></a><?php if ($_ctx->loopPosition(0,-1,null)) : ?>, <?php endif; ?>
    <?php if ($_ctx->meta->isEnd()) : ?></ul><?php endif; ?>
    <?php endwhile; $_ctx->meta = null; ?>
    
    <h2 class="post-title"><a
    href="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>"><?php echo context::global_filter($_ctx->posts->post_title,1,0,0,0,0,'EntryTitle'); ?></a></h2>

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
    <?php publicWidgets::widgetsHandler('nav',''); ?>
  </div> <!-- End #blognav -->
  
  <div id="blogextra">
    <?php publicWidgets::widgetsHandler('extra',''); ?>
  </div> <!-- End #blogextra -->

  <div id="custom">
    <?php publicWidgets::widgetsHandler('custom',''); ?>
  </div> <!-- End #custom-->
</div>

</div> <!-- End #wrapper -->

<?php try { echo $core->tpl->getData('_footer.html'); } catch (Exception $e) {} ?>
</div> <!-- End #page -->
</body>
</html>