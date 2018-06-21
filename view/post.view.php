<div style="text-align:right"><a href="index.php">HOME</a></div>
  <div class="span8">
      <div class="content">
       <h3 class="text-center" ><?php echo $article['title']; ?></h3></br>
       <div class="text-center">
         <span class="date">posted by <?php echo Author;?> -- <?php echo date('Y-m-d H:i',$article['time']['$date']['$numberLong']/1000); ?></span></div>
       </br>
        <div><?php echo $article['html']; ?> </div>
        <input type="hidden" id="allowcomment" value="<?php echo $article['allowcomment']?>"/>

      </div>
  </div><!-- span8-->
<div class="empty-50"></div>
<!-- back/next -->
<!-- <div class="row">
  <div class="span2"></div>
  <div class="span8">
        <ul class="pager">
        </ul>
  </div>
</div>
<div class="span2"></div> -->
<h6 id="nocomment" style="display:none;">COMMENT NOT ALLOWED</h6>
<div id="comment-row"><!-- comment -->
      <div class="span8">

           <?php if (!empty($article['comments'])): ?>
                <h6>COMMENTS</h6>
                <?php foreach($article['comments'] as $comment):
                    echo '<p title="'.$comment['email'].'"><strong>'.$comment['name'].':</strong></p>';?>
                    <p><?php echo $comment['comment']; ?></p>
                    <span><?php echo $comment['posted_at']; ?></span><br/>
                    <div class="empty-20"></div>
                <?php endforeach;
            endif;?>
<hr>
          <h6>POST YOUR COMMENT</h6>

          <form id="myform" method="post" action="comment.php">
              <div><input type="text" name="fName" id="fName" required="required" placeholder="Name"/></div>
              <div><input type="email" name="fEmail" id="fEmail" required="required" placeholder="name@example.com" /></div>
              <div><textarea id="textwrite" cols="40" rows="8" class="span8 wmd-input" placeholder="Comments..."></textarea></div>
              <input type="hidden" id="textsend" name="fComment" value=""/>
              <input type="hidden" name="article_id" value="<?php echo $article['_id']['$oid']; ?>"/>
              <div class="submit"><input id="save"class="submit-btn" type="button" name="btn" value="SUBMIT"/></div>
          </form>
      </div>

</div>

<script type="text/javascript">
				$( document ).ready(function() {
          if($('#allowcomment').val()==0) {
            $("#nocomment").css({ 'display': "block" });
            $("#comment-row").css({ 'display': "none" });
          }
					$('#save').on('click',function(event){
            var $getValue=$('#textwrite').val();
            var $endValue=$getValue.replace(/\r\n/g, '<br/>').replace(/\n/g, '<br/>').replace(/\s/g, ' ');
						$('#textsend').val($endValue);
						$("#myform").submit();
					});
				});
</script>
