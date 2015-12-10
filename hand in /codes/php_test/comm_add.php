<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ./");
    exit;
}
function getParam($parm)
{
    return (isset($_POST[$parm]) ? $_POST[$parm] : "");
}

function getParamInt($parm)
{
    return (isset($_POST[$parm]) ? $_POST[$parm] : "0");
}

function getParamBool($parm)
{
    return (isset($_POST[$parm]) ? $_POST[$parm] : "false");
}

function getPhoto($parm)
{
    $str = "";
    if (($_FILES[$parm]["type"] == "image/gif")
        || ($_FILES[$parm]["type"] == "image/jpeg")
        || ($_FILES[$parm]["type"] == "image/jpg")
        || ($_FILES[$parm]["type"] == "image/pjpeg")
        || ($_FILES[$parm]["type"] == "image/x-png")
        || ($_FILES[$parm]["type"] == "image/png")
    ) {
        $str = substr(md5(rand()), 0, 30);
        move_uploaded_file($_FILES[$parm]["tmp_name"],
            "comm_images/" . $str);
    }
    return $str;
}

$m = new MongoClient();
$db = $m->php_test;
$communication = $db->communication;

$reference = getParam("reference") == "" ? "" : new MongoId(getParam("reference"));
$record = array("message" => getParam("message"),
    "owner" => getParam("owner"),
    "postedBy" => $_SESSION['username'],
    "reference" => $reference,
    "image" => getPhoto("image"),
    "create_date" => new MongoDate(),
    "update_date" => new MongoDate());
$newrec = $communication->insert($record);
$communication->update(
		array("_id" => $reference),
		array('$set' => array('update_date' => new MongoDate()))
);
header("Location: ./communication.php");
exit;

?>