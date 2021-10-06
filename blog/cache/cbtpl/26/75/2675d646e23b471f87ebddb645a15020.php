<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>" lang="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="ROBOTS" content="<?php echo context::robotsPolicy($core->blog->settings->system->robots_policy,'NOINDEX,NOARCHIVE'); ?>" />

  <title><?php echo __('Document not found'); ?> - <?php echo context::global_filter($core->blog->name,1,0,0,0,0,'BlogName'); ?></title>
  <meta name="copyright" content="<?php echo context::global_filter($core->blog->settings->system->copyright_notice,1,0,0,0,0,'BlogCopyrightNotice'); ?>" />
  <meta name="author" content="<?php echo context::global_filter($core->blog->settings->system->editor,1,0,0,0,0,'BlogEditor'); ?>" />

  <link rel="schema.dc" href="http://purl.org/dc/elements/1.1/" />
  <meta name="dc.title" lang="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>" content="<?php echo __('Document not found'); ?> - <?php echo context::global_filter($core->blog->name,1,0,0,0,0,'BlogName'); ?>" />
  <meta name="dc.language" content="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>" />
  <meta name="dc.publisher" content="<?php echo context::global_filter($core->blog->settings->system->editor,1,0,0,0,0,'BlogEditor'); ?>" />
  <meta name="dc.rights" content="<?php echo context::global_filter($core->blog->settings->system->copyright_notice,1,0,0,0,0,'BlogCopyrightNotice'); ?>" />
  <meta name="dc.type" content="text" />
  <meta name="dc.format" content="text/html" />

  <link rel="top" href="<?php echo context::global_filter($core->blog->url,0,0,0,0,0,'BlogURL'); ?>" title="<?php echo __('Home'); ?>" />
  <link rel="contents" title="<?php echo __('Archives'); ?>" href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("archive"),0,0,0,0,0,'BlogArchiveURL'); ?>" />
  <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("feed","atom"),0,0,0,0,0,'BlogFeedURL'); ?>" />

  <?php try { echo $core->tpl->getData('_head.html'); } catch (Exception $e) {} ?>
</head>

<body class="dc-404">
<div id="page">
<?php try { echo $core->tpl->getData('_top.html'); } catch (Exception $e) {} ?>

<div id="wrapper">

<div id="main">
  <div id="content">

  <div id="content-info">
    <h2><?php echo __('Document not found'); ?></h2>
  </div>

  <div class="content-inner">
    <p><?php echo __('The document you are looking for does not exist.'); ?></p>
  </div>

  </div>
</div>

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
