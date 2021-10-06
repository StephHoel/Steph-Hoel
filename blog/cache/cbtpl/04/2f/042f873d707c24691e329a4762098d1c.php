<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>" lang="<?php echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'BlogLanguage'); ?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="ROBOTS" content="<?php echo context::robotsPolicy($core->blog->settings->system->robots_policy,''); ?>" />
	
	<title><?php echo context::global_filter($_ctx->posts->post_title,1,0,0,0,0,'EntryTitle'); ?> - <?php echo context::global_filter($core->blog->name,1,0,0,0,0,'BlogName'); ?></title>
	<meta name="description" lang="<?php if ($_ctx->posts->post_lang) { echo context::global_filter($_ctx->posts->post_lang,0,0,0,0,0,'EntryLang'); } else {echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'EntryLang'); } ?>" content="<?php echo context::global_filter($_ctx->posts->getExcerpt(0)." ".$_ctx->posts->getContent(0),1,1,180,0,0,'EntryContent'); ?>" />
	<meta name="copyright" content="<?php echo context::global_filter($core->blog->settings->system->copyright_notice,1,0,0,0,0,'BlogCopyrightNotice'); ?>" />
	<meta name="author" content="<?php echo context::global_filter($_ctx->posts->getAuthorCN(),1,0,0,0,0,'EntryAuthorCommonName'); ?>" />
	<meta name="date" scheme="W3CDTF" content="<?php echo context::global_filter($_ctx->posts->getISO8601Date(''),0,0,0,0,0,'EntryDate'); ?>" />
	
	<link rel="schema.dc" href="http://purl.org/dc/elements/1.1/" />
	<meta name="dc.title" content="<?php echo context::global_filter($_ctx->posts->post_title,1,0,0,0,0,'EntryTitle'); ?>" />
	<meta name="dc.description" lang="<?php if ($_ctx->posts->post_lang) { echo context::global_filter($_ctx->posts->post_lang,0,0,0,0,0,'EntryLang'); } else {echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'EntryLang'); } ?>" content="<?php echo context::global_filter($_ctx->posts->getExcerpt(0)." ".$_ctx->posts->getContent(0),1,1,180,0,0,'EntryContent'); ?>" />
	<meta name="dc.creator" content="<?php echo context::global_filter($_ctx->posts->getAuthorCN(),1,0,0,0,0,'EntryAuthorCommonName'); ?>" />
	<meta name="dc.language" content="<?php if ($_ctx->posts->post_lang) { echo context::global_filter($_ctx->posts->post_lang,0,0,0,0,0,'EntryLang'); } else {echo context::global_filter($core->blog->settings->system->lang,0,0,0,0,0,'EntryLang'); } ?>" />
	<meta name="dc.publisher" content="<?php echo context::global_filter($core->blog->settings->system->editor,1,0,0,0,0,'BlogEditor'); ?>" />
	<meta name="dc.rights" content="<?php echo context::global_filter($core->blog->settings->system->copyright_notice,1,0,0,0,0,'BlogCopyrightNotice'); ?>" />
	<meta name="dc.date" scheme="W3CDTF" content="<?php echo context::global_filter($_ctx->posts->getISO8601Date(''),0,0,0,0,0,'EntryDate'); ?>" />
	<meta name="dc.type" content="text" />
	<meta name="dc.format" content="text/html" />
	
	<link rel="top" href="<?php echo context::global_filter($core->blog->url,0,0,0,0,0,'BlogURL'); ?>" title="<?php echo __('Home'); ?>" />
	<link rel="contents" href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("archive"),0,0,0,0,0,'BlogArchiveURL'); ?>" title="<?php echo __('Archives'); ?>" />
	
	<?php $next_post = $core->blog->getNextPost($_ctx->posts,1,0,0); ?>
<?php if ($next_post !== null) : ?><?php $_ctx->posts = $next_post; unset($next_post);
while ($_ctx->posts->fetch()) : ?><link rel="next" href="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>" title="<?php echo context::global_filter($_ctx->posts->post_title,1,0,0,0,0,'EntryTitle'); ?>" /><?php endwhile; $_ctx->posts = null; ?><?php endif; ?>

	<?php $prev_post = $core->blog->getNextPost($_ctx->posts,-1,0,0); ?>
<?php if ($prev_post !== null) : ?><?php $_ctx->posts = $prev_post; unset($prev_post);
while ($_ctx->posts->fetch()) : ?><link rel="prev" href="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>" title="<?php echo context::global_filter($_ctx->posts->post_title,1,0,0,0,0,'EntryTitle'); ?>" /><?php endwhile; $_ctx->posts = null; ?><?php endif; ?>

	
	<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("feed","atom"),0,0,0,0,0,'BlogFeedURL'); ?>" />
	
	<?php try { echo $core->tpl->getData('_head.html'); } catch (Exception $e) {} ?>
	
	<script type="text/javascript" src="<?php echo context::global_filter($core->blog->settings->system->themes_url."/".$core->blog->settings->system->theme,0,0,0,0,0,'BlogThemeURL'); ?>/../default/js/post.js"></script>
	<script type="text/javascript">
		//<![CDATA[
		var post_remember_str = '<?php echo __('Remember me on this blog'); ?>';
		//]]>
	</script>
</head>

<body class="dc-post">
	<div id="page">
		<?php if ($_ctx->posts->trackbacksActive()) { echo $_ctx->posts->getTrackbackData(); } ?>

		
		<?php try { echo $core->tpl->getData('_top.html'); } catch (Exception $e) {} ?>
		
		<div id="wrapper">
			
			<div id="main">
				<div id="content">
					
					<p class="navlinks topnl">
						<?php $prev_post = $core->blog->getNextPost($_ctx->posts,-1,0,0); ?>
<?php if ($prev_post !== null) : ?><?php $_ctx->posts = $prev_post; unset($prev_post);
while ($_ctx->posts->fetch()) : ?><a href="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>"
						 title="<?php echo context::global_filter($_ctx->posts->post_title,1,0,0,0,0,'EntryTitle'); ?>" class="prev">&#171; <?php echo context::global_filter($_ctx->posts->post_title,1,0,50,0,0,'EntryTitle'); ?></a><?php endwhile; $_ctx->posts = null; ?><?php endif; ?>

						<?php $next_post = $core->blog->getNextPost($_ctx->posts,1,0,0); ?>
<?php if ($next_post !== null) : ?><?php $_ctx->posts = $next_post; unset($next_post);
while ($_ctx->posts->fetch()) : ?> <span>-</span> <a href="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>"
						 title="<?php echo context::global_filter($_ctx->posts->post_title,1,0,0,0,0,'EntryTitle'); ?>" class="next"><?php echo context::global_filter($_ctx->posts->post_title,1,0,50,0,0,'EntryTitle'); ?> &#187;</a><?php endwhile; $_ctx->posts = null; ?><?php endif; ?>

					</p>
					
					<?php try { echo $core->tpl->getData('_simple-entry.html'); } catch (Exception $e) {} ?>
					
					<p class="navlinks">
						<?php $prev_post = $core->blog->getNextPost($_ctx->posts,-1,0,0); ?>
<?php if ($prev_post !== null) : ?><?php $_ctx->posts = $prev_post; unset($prev_post);
while ($_ctx->posts->fetch()) : ?><a href="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>"
						 title="<?php echo context::global_filter($_ctx->posts->post_title,1,0,0,0,0,'EntryTitle'); ?>" class="prev">&#171; <?php echo context::global_filter($_ctx->posts->post_title,1,0,50,0,0,'EntryTitle'); ?></a><?php endwhile; $_ctx->posts = null; ?><?php endif; ?>

						<?php $next_post = $core->blog->getNextPost($_ctx->posts,1,0,0); ?>
<?php if ($next_post !== null) : ?><?php $_ctx->posts = $next_post; unset($next_post);
while ($_ctx->posts->fetch()) : ?> <span>-</span> <a href="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>"
						 title="<?php echo context::global_filter($_ctx->posts->post_title,1,0,0,0,0,'EntryTitle'); ?>" class="next"><?php echo context::global_filter($_ctx->posts->post_title,1,0,50,0,0,'EntryTitle'); ?> &#187;</a><?php endwhile; $_ctx->posts = null; ?><?php endif; ?>

					</p>
					
				</div>
			</div> <!-- End #main -->
			
			<?php try { echo $core->tpl->getData('_sidebar.html'); } catch (Exception $e) {} ?>
			
		</div> <!-- End #wrapper -->
		
		<?php try { echo $core->tpl->getData('_footer.html'); } catch (Exception $e) {} ?>
	</div> <!-- End #page -->
</body>
</html>
