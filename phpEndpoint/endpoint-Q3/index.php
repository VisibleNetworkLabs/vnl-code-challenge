<?php
header('Content-Type: application/json');
/* request mock
 * body: {
 *  favoriteColor: #FFFFFF 
 * }
 * */
$users = array(
    ["id"=> 1, "name"=>"Adam", "favoriteColor"=>"#3FA873"],
    ["id"=> 2, "name"=>"Bob", "favoriteColor"=>"#FFFFFF"],
    ["id"=> 3, "name"=>"Christy", "favoriteColor"=>"#FFFFFF"],
    ["id"=> 4, "name"=>"Diana", "favoriteColor"=>"#F6AB74"],
    ["id"=> 5, "name"=>"Emanual", "favoriteColor"=>"#D78F73"],
);
$result;

if(isset($_POST['id'])) {
    $result['users'] = array_filter($users, function($user) {
        return $user['id'] == $_POST['id'];
    });
}

if(isset($_POST['favoriteColor'])) {
    $result['users'] = array_filter($users, function($user) {
        return $user['favoriteColor'] == $_POST['favoriteColor'];
    });
}

echo json_encode($result);
?>
