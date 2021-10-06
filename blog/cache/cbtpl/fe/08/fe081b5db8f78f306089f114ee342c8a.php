<div id="p<?php echo context::global_filter($_ctx->posts->post_id,0,0,0,0,0,'EntryID'); ?>" class="post simple">
	<h2 class="post-title"><?php echo context::global_filter($_ctx->posts->post_title,1,0,0,0,0,'EntryTitle'); ?></h2>
	
	<div class="post-attr">
		<p class="post-info">
			<span class="post-author"><?php echo __('By'); ?> <?php echo context::global_filter($_ctx->posts->getAuthorLink(),0,0,0,0,0,'EntryAuthorLink'); ?>, </span>
			<span class="post-date"><?php echo context::global_filter($_ctx->posts->getDate('',''),0,0,0,0,0,'EntryDate'); ?>. </span>
			<span class="permalink"><a href="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>"><?php echo __('Permalink'); ?></a></span>
			<?php if($_ctx->posts->cat_id) : ?>
				<span class="post-cat"><?php
$_ctx->categories = $core->blog->getCategoryParents($_ctx->posts->cat_id);
while ($_ctx->categories->fetch()) : ?><a 
				href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("category",$_ctx->categories->cat_url),0,0,0,0,0,'CategoryURL'); ?>"><?php echo context::global_filter($_ctx->categories->cat_title,1,0,0,0,0,'CategoryTitle'); ?></a> › <?php endwhile; $_ctx->categories = null; ?><a 
				href="<?php echo context::global_filter($_ctx->posts->getCategoryURL(),0,0,0,0,0,'EntryCategoryURL'); ?>"><?php echo context::global_filter($_ctx->posts->cat_title,1,0,0,0,0,'EntryCategory'); ?></a></span>
			<?php endif; ?>
		</p>
		
		<?php
$_ctx->meta = $core->meta->getMetaRecordset($_ctx->posts->post_meta,'tag'); $_ctx->meta->sort('meta_id_lower','asc'); ?><?php while ($_ctx->meta->fetch()) : ?>
			<?php if ($_ctx->meta->isStart()) : ?>
				<ul class="post-tags">
			<?php endif; ?>
				<li><a href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("tag",rawurlencode($_ctx->meta->meta_id)),0,0,0,0,0,'TagURL'); ?>"><?php echo context::global_filter($_ctx->meta->meta_id,0,0,0,0,0,'TagID'); ?></a></li> 
			<?php if ($_ctx->meta->isEnd()) : ?>
				</ul>
			<?php endif; ?>
		<?php endwhile; $_ctx->meta = null; ?>
	</div>    

	<?php if ($core->hasBehavior('publicEntryBeforeContent')) { $core->callBehavior('publicEntryBeforeContent',$core,$_ctx);} ?>

	<?php if($_ctx->posts->isExtended()) : ?>
		<div class="post-excerpt"><?php echo context::global_filter($_ctx->posts->getExcerpt(0),0,0,0,0,0,'EntryExcerpt'); ?></div>
	<?php endif; ?>
	
	<div class="post-content"><?php echo context::global_filter($_ctx->posts->getContent(0),0,0,0,0,0,'EntryContent'); ?></div>

	<?php if ($core->hasBehavior('publicEntryAfterContent')) { $core->callBehavior('publicEntryAfterContent',$core,$_ctx);} ?>
</div>

<?php
if ($_ctx->posts !== null && $core->media) {
$_ctx->attachments = new ArrayObject($core->media->getPostMedia($_ctx->posts->post_id));
?>
<?php foreach ($_ctx->attachments as $attach_i => $attach_f) : $GLOBALS['attach_i'] = $attach_i; $GLOBALS['attach_f'] = $attach_f;$_ctx->file_url = $attach_f->file_url; ?>
	<?php if ($attach_i == 0) : ?>
		<div id="attachments">
			<h3><?php echo __('Attachments'); ?></h3>
			<ul>
	<?php endif; ?>
				<li class="<?php echo context::global_filter($attach_f->media_type,0,0,0,0,0,'AttachmentType'); ?>">
					<?php if($attach_f->type == "audio/mpeg3") : ?>
						<?php try { echo $core->tpl->getData('_mp3_player.html'); } catch (Exception $e) {} ?> - 
					<?php endif; ?>
					<?php if(($attach_f->type == "video/x-flv" || $attach_f->type == "video/mp4" || $attach_f->type == "video/x-m4v")) : ?>
						<?php try { echo $core->tpl->getData('_flv_player.html'); } catch (Exception $e) {} ?>
					<?php endif; ?>
					<?php if(!($attach_f->type == "video/x-flv" || $attach_f->type == "video/mp4" || $attach_f->type == "video/x-m4v")) : ?>
						<a href="<?php echo context::global_filter($attach_f->file_url,0,0,0,0,0,'AttachmentURL'); ?>"
						 title="<?php echo context::global_filter($attach_f->basename,0,0,0,0,0,'AttachmentFileName'); ?> (<?php echo context::global_filter(files::size($attach_f->size),0,0,0,0,0,'AttachmentSize'); ?>)"><?php echo context::global_filter($attach_f->media_title,0,0,0,0,0,'AttachmentTitle'); ?></a>
					<?php endif; ?>
				</li>
	<?php if ($attach_i+1 == count($_ctx->attachments)) : ?>
			</ul>
		</div>
	<?php endif; ?>
<?php endforeach; $_ctx->attachments = null; unset($attach_i,$attach_f,$_ctx->file_url); ?><?php } ?>


<?php if(($_ctx->posts->hasComments() || $_ctx->posts->commentsActive())) : ?>
	<?php if ($_ctx->exists("meta")) { @$params['from'] .= ', '.$core->prefix.'meta META ';
@$params['sql'] .= 'AND META.post_id = P.post_id ';
$params['sql'] .= "AND META.meta_type = 'tag' ";
$params['sql'] .= "AND META.meta_id = '".$core->con->escape($_ctx->meta->meta_id)."' ";
} ?>
<?php
if ($_ctx->nb_comment_per_page !== null) { $params['limit'] = $_ctx->nb_comment_per_page; }
if ($_ctx->posts !== null) { $params['post_id'] = $_ctx->posts->post_id; $core->blog->withoutPassword(false);
}
if ($_ctx->exists("categories")) { $params['cat_id'] = $_ctx->categories->cat_id; }
if ($_ctx->exists("langs")) { $params['sql'] = "AND P.post_lang = '".$core->blog->con->escape($_ctx->langs->post_lang)."' "; }
$params['order'] = 'comment_dt asc';
$_ctx->comments = $core->blog->getComments($params); unset($params);
if ($_ctx->posts !== null) { $core->blog->withoutPassword(true);}
$_ctx->pings = $_ctx->comments;
?>
<?php while ($_ctx->comments->fetch()) : ?>
		<?php if ($_ctx->comments->isStart()) : ?>
			<div id="comments">
				<h3><?php if (($_ctx->posts->nb_comment + $_ctx->posts->nb_trackback) == 0) {
  printf(__('no comment'),($_ctx->posts->nb_comment + $_ctx->posts->nb_trackback));
} elseif (($_ctx->posts->nb_comment + $_ctx->posts->nb_trackback) == 1) {
  printf(__('%s'),($_ctx->posts->nb_comment + $_ctx->posts->nb_trackback));
} else {
  printf(__('%s'),($_ctx->posts->nb_comment + $_ctx->posts->nb_trackback));
} ?> <?php echo __('reactions'); ?></h3>
				<ul>
		<?php endif; ?>
					<?php if(!$_ctx->comments->comment_trackback) : ?>
						<li id="c<?php echo $_ctx->comments->comment_id; ?>" class="comment <?php if ($_ctx->comments->isMe()) { echo 'me'; } ?> <?php if (($_ctx->comments->index()+1)%2) { echo 'odd'; } ?> <?php if ($_ctx->comments->index() == 0) { echo 'first'; } ?>">
					<?php endif; ?>
					<?php if($_ctx->comments->comment_trackback) : ?>
						<li id="c<?php echo $_ctx->pings->comment_id; ?>" class="ping <?php if (($_ctx->pings->index()+1)%2) { echo 'odd'; } ?> <?php if ($_ctx->pings->index() == 0) { echo 'first'; } ?>">
					<?php endif; ?>
							<p class="comment-info"><a href="#c<?php echo $_ctx->comments->comment_id; ?>" class="comment-number"><?php echo $_ctx->comments->index()+1; ?></a>
								<?php echo __('From'); ?> <?php echo context::global_filter($_ctx->comments->getAuthorLink(),0,0,0,0,0,'CommentAuthorLink'); ?> - <?php echo context::global_filter($_ctx->comments->getDate('%d',''),0,0,0,0,0,'CommentDate'); ?>/<?php echo context::global_filter($_ctx->comments->getDate('%m',''),0,0,0,0,0,'CommentDate'); ?>/<?php echo context::global_filter($_ctx->comments->getDate('%Y',''),0,0,0,0,0,'CommentDate'); ?>, <?php echo context::global_filter($_ctx->comments->getTime('',''),0,0,0,0,0,'CommentTime'); ?>
							</p>
							<div class="comment-content">

								<?php if ($core->hasBehavior('publicCommentBeforeContent')) { $core->callBehavior('publicCommentBeforeContent',$core,$_ctx);} ?>
								
								<?php echo context::global_filter($_ctx->comments->getContent(0),0,0,0,0,0,'CommentContent'); ?>

								<?php if ($core->hasBehavior('publicCommentAfterContent')) { $core->callBehavior('publicCommentAfterContent',$core,$_ctx);} ?>
							</div>
						</li>
		<?php if ($_ctx->comments->isEnd()) : ?>
					</ul>
				</div>
		<?php endif; ?>
	<?php endwhile; $_ctx->comments = null; ?>
<?php endif; ?>

<?php if($_ctx->posts->commentsActive() || $_ctx->posts->trackbacksActive()) : ?>
	<p id="comments-feed"><a class="feed" href="<?php echo context::global_filter($core->blog->url.$core->url->getURLFor("feed","atom"),0,0,0,0,0,'BlogFeedURL'); ?>/comments/<?php echo context::global_filter($_ctx->posts->post_id,0,0,0,0,0,'EntryID'); ?>"
		 title="<?php echo __('This post\'s comments Atom feed'); ?>"><?php echo __('This post\'s comments feed'); ?></a></p>
<?php endif; ?>

<?php if($_ctx->posts->commentsActive()) : ?>    
	<?php if ($_ctx->form_error !== null) : ?>
		<p class="error" id="pr"><?php if ($_ctx->form_error !== null) { echo $_ctx->form_error; } ?></p>
	<?php endif; ?>
	
	<?php if (!empty($_GET['pub'])) : ?>
		<p class="message" id="pr"><?php echo __('Your comment has been published.'); ?></p>
	<?php endif; ?>
	
	<?php if (isset($_GET['pub']) && $_GET['pub'] == 0) : ?>
		<p class="message" id="pr"><?php echo __('Your comment has been submitted and will be reviewed for publication.'); ?></p>
	<?php endif; ?>

	<form action="<?php echo context::global_filter($_ctx->posts->getURL(),0,0,0,0,0,'EntryURL'); ?>#pr" method="post" id="comment-form">
		<?php if ($_ctx->comment_preview !== null && $_ctx->comment_preview["preview"]) : ?>
			<div id="pr">
				<h3><?php echo __('Your comment'); ?></h3>
				<div class="comment-preview"><?php echo context::global_filter($_ctx->comment_preview["content"],0,0,0,0,0,'CommentPreviewContent'); ?></div>
				<p class="buttons"><input type="submit" class="submit" value="<?php echo __('send'); ?>" /></p>
			</div>
		<?php endif; ?>
		
		<h3><?php echo __('Add a comment'); ?></h3>
		<fieldset>

			<?php if ($core->hasBehavior('publicCommentFormBeforeContent')) { $core->callBehavior('publicCommentFormBeforeContent',$core,$_ctx);} ?>
			
			<p class="field"><label for="c_name"><?php echo __('Name or nickname'); ?>&nbsp;:</label>
				<input name="c_name" id="c_name" type="text" size="30" maxlength="255"
				 value="<?php echo context::global_filter($_ctx->comment_preview["name"],1,0,0,0,0,'CommentPreviewName'); ?>" />
			</p>
			
			<p class="field"><label for="c_mail"><?php echo __('Email address'); ?>&nbsp;:</label>
				<input name="c_mail" id="c_mail" type="text" size="30" maxlength="255"
				 value="<?php echo context::global_filter($_ctx->comment_preview["mail"],1,0,0,0,0,'CommentPreviewEmail'); ?>" />
			</p>
			
			<p class="field"><label for="c_site"><?php echo __('Website'); ?> (<?php echo __('optional'); ?>)&nbsp;:</label>
				<input name="c_site" id="c_site" type="text" size="30" maxlength="255"
				 value="<?php echo context::global_filter($_ctx->comment_preview["site"],1,0,0,0,0,'CommentPreviewSite'); ?>" />
			</p>
			
			<p style="display:none">
				<input name="f_mail" type="text" size="30" maxlength="255" value="" />
			</p>
			
			<p class="field"><label for="c_content"><?php echo __('Comment'); ?>&nbsp;:</label>
				<textarea name="c_content" id="c_content" cols="35"
				 rows="7"><?php echo context::global_filter($_ctx->comment_preview["rawcontent"],1,0,0,0,0,'CommentPreviewContent'); ?></textarea>
			</p>
			
			<p class="form-help"><?php if ($core->blog->settings->system->wiki_comments) {
  echo __('Comments can be formatted using a simple wiki syntax.');
} else {
  echo __('HTML code is displayed as text and web addresses are automatically converted.');
} ?></p>

			<?php if ($core->hasBehavior('publicCommentFormAfterContent')) { $core->callBehavior('publicCommentFormAfterContent',$core,$_ctx);} ?>
		</fieldset>
		
		<fieldset>
			<p class="buttons">
				<input type="submit" class="preview" name="preview" value="<?php echo __('preview'); ?>" />
				<?php if ($_ctx->comment_preview !== null && $_ctx->comment_preview["preview"]) : ?>
					<input type="submit" class="submit" value="<?php echo __('send'); ?>" />
				<?php endif; ?>
			</p>
		</fieldset>
	</form>
<?php endif; ?>
  
<?php if($_ctx->posts->trackbacksActive()) : ?>
	<div id="ping-url">
		<h3><?php echo __('Add ping'); ?></h3>
		<p><?php echo __('Trackback URL'); ?>&nbsp;: <?php if ($_ctx->posts->trackbacksActive()) { echo $_ctx->posts->getTrackbackLink(); } ?>
</p>
	</div>
<?php endif; ?>
