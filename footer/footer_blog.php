<?php
$footer =  html_entity_decode( $rowsetting['footer_blog'], ENT_QUOTES, "UTF-8" );
$anncopy = date('Y');
?>
<footer class="blog-footer">
<p><span class="copy">@<?php echo $anncopy; ?></span>&nbsp;
<span class="desc_copy"><?php echo $footer; ?></span>
</p>
<p><a href="/?cookie-policy">cookie policy</a></p>
<p><a href="" id="top">Torna su</a></p>

</footer>
