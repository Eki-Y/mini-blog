<!-- <script src="<?php echo URL;?>/static/markdown/js/jquery.pagedown-bootstrap.combined.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>/static/markdown/css/jquery.pagedown-bootstrap.css"> -->

<div style="text-align:right"><a href="index.php">HOME</a></div>
<div class="span1"></div>
<div class="span10" id="post-admin">
	<?php
		if (isset($data['status'])) {
			echo '	<div class="alert alert-success">';
			echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			echo($data['status']);
			echo '<a href="../admin" class="alert-link pull-right"> &larr; Go back</a>';
			echo '	</div>';
		}
	?>
	<h4>Create A New Post</h4>

	<!-- <form action="" method="post">

			 <div><label for="Title">Title</label></br>
	      		<input type="text" name="title" id="title" required="required" />
	  		</div>
			<label for="content">Content</label></br>
				<p><textarea name="content" id="content" cols="40" rows="8" class="span10"></textarea></p>

			<div class="submit"><input class="submit-btn" type="submit" name="btn_submit" value="Save"/></div>
	</form> -->

	<!-- Create a tag that we will use as the editable area. -->
	    <!-- You can use a div tag as well. -->
  <form action="" id="myform"method="post">
	  <div><input type="text" name="title" id="title" required="required" placeholder="Title" /></div>
	  <div id="editor" style="background-color:#ffffff; border-radius:5px;"></div>
		<div><input id="checkbox" type="checkbox">allow comment</div>
	  <textarea id="sychtml" name="html" style="display: none;"></textarea>
	  <textarea id="syctext" name="content" style="display: none;"></textarea></br>
		<input type="hidden" id="allowcomment" name="allowcomment" value="1"/>
	  <div class="submit"><input id="save"class="submit-btn" type="button" name="btn" value="SAVE"/></div>
  </form>
</div>


<script type="text/javascript">
				$( document ).ready(function() {
					$('#checkbox').prop('checked', true);
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
	        var $html = $('#sychtml');
					var $text = $('#syctext');
					$('#save').on('click',function(event){
						if($('#checkbox').is(':checked')) {
								$('#allowcomment').val(1);
								console.log(1);
						} else {
							$('#allowcomment').val(0);
							console.log(0);
						}
						console.log($('#allowcomment').val());
						$html.val(editor.txt.html());
						$text.val(editor.txt.text());
						$("#myform").submit();
					});
				});
</script>
