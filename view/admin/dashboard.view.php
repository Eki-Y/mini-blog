<div class="span1"> </div>
<div class="span10" id="post-admin">
    <div style="text-align:right"><span class="btn-ref"><a href="..\index.php">HOME</a></span><span class="btn-ref"><a href="index.php?status=logout">LOGOUT</a></span></div>
    <h2 style="text-align:center">DASHBOARD</h2>
    <div class="empty-20"></div>
    <a href="index.php?status=create" class="btn btn-primary pull-right"><i class='fa fa-plus-circle'></i> Create Post</a>
    <div class="empty-50"></div>
    <table class="table table-striped" align="center">
        <thead>
            <tr>
                <th>Title</th>
                <th>Published at</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $currentIdx = 0;
            while($currentIdx < count($cursor)):
            $article = json_decode(json_encode($cursor[$currentIdx]), True);
            $currentIdx++;
            ?>
            <tr>
                <td><a href="../post.php?id=<?php echo $article['_id']['$oid'];?>"><?php echo substr($article['title'], 0, 35) . '...'; ?></a>
                </td>
                <td><?php print date('M d/Y H:i', $article['time']['$date']['$numberLong']/1000);?></td>
                <td width="5%">
                    <a href="index.php?status=edit&id=<?php echo $article['_id']['$oid'];?>"><i class="fa fa-pencil-square-o"></i>Edit</a>

                </td>
                <td width="5%">
                     <a href="#" onclick="confirmDelete('<?php echo $article['_id']['$oid']; ?>')"><i class="fa fa-times"></i> Delete</a>
                </td>
            </tr>
            <?php endwhile;?>
        </tbody>
    </table>
</div>

<!-- pagination -->
<div class="row">
    <div class="span12">
        <ul class="pager">
          <li>
            <?php if($currentPage !== 1): ?>
                <a href="<?php echo $_SERVER['PHP_SELF'].'?page='.($currentPage - 1); ?>">&larr; Newer</a>
            <?php endif; ?>

          </li>
                    <li lass="page-number"> Page <?php echo $currentPage; ?> </li>

          <li>
            <?php if($currentPage !== $totalPages): ?>
                <a href="<?php echo $_SERVER['PHP_SELF'].'?page='.($currentPage + 1); ?>">Older &rarr;</a>
            <?php endif;?>
        </li>
        </ul>
    </div>
</div>
<script type="text/javascript" charset="utf-8">
        function confirmDelete(articleId) {
            var deleteArticle = confirm('Are you sure you want to delete this article?');
            if(deleteArticle){
                window.location.href = 'index.php?status=delete&id='+articleId;
            }
            return;
        }
    </script>
