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
$result = [];

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
$network['network'] = [
    'network_id' => 1,
    'score1' => 1,
    'score2' => 2,
    'score3' => 3,
    'owner_id' => 1,
    'user_id' => 1,
    'network_name' => 'VNL Network',
    'username' => 'Test User',
    'email' => 'test@email.com',
];
echo json_encode($network);
echo json_encode($result);
?>
