<?php
require 'app.php';
$post = $db->getById($_GET['id'],'posts');
if ($post == FALSE) {
	header('Location: index.php');

} else {
	$layout->view('post', array(
		'article' => $post
	));
}
