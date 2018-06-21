<!doctype html>
<html>
<head>
	<title>mini-Blog</title>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL;?>/static/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL ;?>/static/css/styles.css">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="<?php echo URL;?>/static/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="<?php echo URL ;?>/static/wangEditor/wangEditor.min.js"></script>
	<script type="text/javascript" src="<?php echo URL ;?>/static/wangEditor/wangEditor.js"></script>
	<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
	<div class="container">

		<div class="row">

		<?php include_once ($path); ?>

	    </div>
	</div>

</body>
</html>
