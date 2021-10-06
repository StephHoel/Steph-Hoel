<ul id="gotop" class="supranav nobig"><li><a href="#top">Haut de page</a></li></ul>

<?php echo tplSimpleMenu::displayMenu('supranav nobig','sn-bottom',''); ?>

<div id="footer">
	<div id="blogcustom">
		<?php publicWidgets::widgetsHandler('custom','');  ?>
	</div> <!-- End #custom widgets -->

	<?php if ($core->hasBehavior('publicInsideFooter')) { $core->callBehavior('publicInsideFooter',$core,$_ctx);} ?>

	<p><?php printf(__("Powered by %s"),"<a href=\"http://dotclear.org/\">Dotclear</a>"); ?></p>
</div>

<?php if ($core->hasBehavior('publicFooterContent')) { $core->callBehavior('publicFooterContent',$core,$_ctx);} ?>