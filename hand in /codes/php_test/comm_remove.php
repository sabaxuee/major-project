<?php
session_start();
function getParam($parm)
{
	return (isset($_GET[$parm]) ? $_GET[$parm] : "");
}

$m = new MongoClient();
$db = $m->php_test;
$comment = $db->communication;
$rec = $comment->findOne(array('_id' => new MongoId(getParam("id"))));
if(!empty($rec["image"])){
	unlink("comm_images/".$rec["image"]);
}
$comment->remove(array('_id' => new MongoId(getParam("id"))));
$comment->remove(array('reference' => new MongoId(getParam("id"))));
header("Location: ".$_SERVER['HTTP_REFERER']);
exit;

?>