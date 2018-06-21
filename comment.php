<?php
require 'app.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
	$id = $_POST['article_id'];
	$time = new MongoDB\BSON\UTCDateTime();
	$time = $time->toDateTime()->format('Y-m-d H:i');
	$comment = array(
              	'name' => $_POST['fName'],
                'email' => $_POST['fEmail'],
                'comment' => $_POST['fComment'],
                'posted_at' => $time
	);
	print_r($id);
	print_r($comment);
	$status = $db->commentId($id,'posts',$comment);
	if ($status == TRUE) {
		header('Location: post.php?id='.$id);
	}
}
?>
