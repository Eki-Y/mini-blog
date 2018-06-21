<!-- <script src="<?php echo URL;?>/static/markdown/js/jquery.pagedown-bootstrap.combined.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>/static/markdown/css/jquery.pagedown-bootstrap.css"> -->
<div style="text-align:right"><a href="index.php">HOME</a></div>
<div id="post-admin">
	<?php
		if (isset($data['status'])) {
			echo '	<div class="alert alert-success">';
			echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			echo($data['status']);
			echo '<a href="../admin" class="alert-link pull-right"> &larr; Go back</a>';
			echo '	</div>';
		}
	?>
	<h4>Edit Post</h4>

	<!-- <form action="" method="post">

			 <div><label for="Title">Title</label>
	      		<input type="text" name="title" id="title" required="required" value =""/>
	  		</div>
			<div><label for="content">Content</label>
				<textarea name="content" id="content" cols="40" rows="8"
				class="span10 wmd-input"> </textarea>
			</div>
			<div class="submit"><input type="submit" name="btn_submit" value="Save"/></div>
	</form> -->
	<form action="" id="myform"method="post">
	  <div ><input type="text" name="title" id="title" required="required" value ="<?php echo $article['title']; ?>" /></div>
	  <div id="editor" style="background-color:#ffffff; border-radius:5px;"><p><?php echo $article['html']; ?></p></div>
		<div><input id="checkbox" type="checkbox">allow comment</div>
		<input type="hidden" id="sychtml" name="html" value=""/>
		<input type="hidden" id="syctext" name="content" value=""/></br>
		<input type="hidden" id="allowcomment" name="allowcomment" value="<?php echo $article['allowcomment']?>"/>
	  <div class="submit"><input id="save"class="submit-btn" type="button" name="btn" value="SAVE"/></div>
  </form>

</div>

<script type="text/javascript">
				$( document ).ready(function() {
					if($('#allowcomment').val() == '1') {
						$('#checkbox').prop('checked', true);
					}
					var E = window.wangEditor;
	        var editor = new E('#editor');
					editor.customConfig.menus = [
						'head','bold','fontSize','fontName','italic','underline','strikeThrough','foreColor','backColor','link','list','justify','quote',
						'emoticon','image','video','code','undo','redo'];
					editor.customConfig.lang = {
						'设置标题': 'title','字号': 'fontSize','字体': 'fontName','文字颜色': 'foreColor','背景色': 'backColor','设置列表': 'list','有序列表': 'ordered','无序列表': 'unordered',
						'对齐方式': 'justify','靠左': 'left','居中': 'center','靠右': 'right','默认': 'default','新浪': 'sina','网络图片': 'insert image','插入视频': 'insert video','插入': 'insert',
						'图片link': 'image link','格式如：<iframe src=... ></iframe>':'<iframe src=... ></iframe>'
					}
					editor.create();
					$('.w-e-text-container').height(400);
					$('#save').on('click',function(event){
						if($('#checkbox').is(':checked')) {
								$('#allowcomment').val(1);
								console.log(1);
						} else {
							$('#allowcomment').val(0);
							console.log(0);
						}
						$('#sychtml').val(editor.txt.html());
						$('#syctext').val(editor.txt.text());
						$("#myform").submit();
					});
				});
</script>
