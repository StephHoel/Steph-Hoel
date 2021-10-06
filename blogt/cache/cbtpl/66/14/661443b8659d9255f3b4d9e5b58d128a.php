<div id="footer">
  <p><?php printf(__("Powered by %s"),"<a href=\"http://dotclear.org/\">Dotclear</a>"); ?> <br /> <a href="http://www.hostinger.com.br" target="_blank" rel="nofollow"><img width="80" height="31" src="http://www.hostinger.com.br/banners/br/hostinger-80x31-2.gif" alt="Hospedagem" title="Hospedagem Gratuita!" style="border:0;margin:5px;" /></a> </p>
</div>

<?php if ($core->hasBehavior('publicFooterContent')) { $core->callBehavior('publicFooterContent',$core,$_ctx);} ?>