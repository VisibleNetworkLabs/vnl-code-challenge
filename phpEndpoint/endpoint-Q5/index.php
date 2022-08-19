<?php
include_once('./authorization_service.php');

$auth = new AuthorizationService();
$auth->validateLoggedIn();

$network = null;
$network = $auth->getCurrentNetwork();

echo json_encode($network);
?>


/* Answer under here */
