<div class="blog-image">
  <div class="empty-20"></div>
  <a id="blog-image" href="<?php echo URL;?>/admin/index.php">
    <img class="text-cente" title="Enter Dashboard(Login)" src="<?php echo URL;?>/static/img/logo.png">
  </a>
  <div class="empty-20"></div>
  <h5 class="text-center" >Welcome to <?php echo Author;?>'s Blog!</h5>
  <div class="empty-50"></div>
</div>
<div class="span2"></div>
  <div class="span8">
      <div class="content">
        <?php $currentIdx = 0; ?>
         <?php while ($currentIdx < count($cursor)):
    $article = json_decode(json_encode($cursor[$currentIdx]), True);
    $currentIdx++; ?>
    <h4>-<?php echo $article['title']; ?></h4>
    <span class="date"><?php echo date('Y-m-d H:i',$article['time']['$date']['$numberLong']/1000); ?> posted by <?php echo Author;?></span>
    <div class="empty-10"></div>
    <p style="font-size:15px; color:gray;"><?php echo substr($article['content'], 0, 200);?></p>
    <div class="empty-10"></div>
    <a href="post.php?id=<?php echo $article['_id']['$oid']; ?>">Read more...</a>
    <div class="empty-50"></div>
  <?php endwhile; ?>
  </div>
  </div><!-- span8 -->
<div class="span2"></div>
<!-- pagination -->
<div class="row">
    <div class="span12">
        <ul class="pager">
          <li>
            <?php if($currentPage !== 1): ?>
                <a href="<?php echo $_SERVER['PHP_SELF'].'?page='.($currentPage - 1); ?>">&larr; Newer</a>
            <?php endif; ?>

          </li>
                    <li lass="page-number"> <?php echo $currentPage; ?> </li>

          <li>
            <?php if($currentPage !== $totalPages): ?>
                <a href="<?php echo $_SERVER['PHP_SELF'].'?page='.($currentPage + 1); ?>">Older &rarr;</a>
            <?php endif;?>
        </li>
        </ul>
    </div>
</div>
