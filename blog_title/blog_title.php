<?php
$title_blog = html_entity_decode($rowsetting['title_blog'], ENT_QUOTES, "UTF-8");
$st_title_blog = html_entity_decode($rowsetting['st_title_blog'], ENT_QUOTES, "UTF-8");
?>
<h1 class="blog-title"><?php echo $title_blog; ?></h1>
<p class="blog-description"><?php echo $st_title_blog; ?></p>
