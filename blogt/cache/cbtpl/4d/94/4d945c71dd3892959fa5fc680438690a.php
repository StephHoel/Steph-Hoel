<div id="footer">
  <p><?php printf(__("Powered by %s"),"<a href=\"http://dotclear.org/\">Dotclear</a>"); ?> <br />    - <a href="http://themes.jm-royer.com/opaline">Thème &laquo; Opaline &raquo;</a></p>
</div>

<?php if ($core->hasBehavior('publicFooterContent')) { $core->callBehavior('publicFooterContent',$core,$_ctx);} ?>