<?php
// require  "inc/const.php";

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// $uri = $_SERVER['REQUEST_URI'];
echo "<pre>";
var_dump($uri);
echo "</pre>";
// created the routes array

// register your routes uri and the url on this Routes array
$Routes = [
    '/' => __DIR__ . "/controllers/index.php",
    '/dashboard' => __DIR__ . "/controllers/index.php",
    '/users' =>__DIR__ .  "/controllers/users.php",
];

// checking if the requested url is registed on the route array
if(array_key_exists($uri, $Routes)){
    require $Routes[$uri];
}else{
    require __DIR__ . "/controllers/error_page.php";
}

// if($uri === '/'){
//     require  __DIR__ . "/controllers/index.php";
//     // realpath("controllers/index.php") ;
//     // require  "controllers/index.php";
// }else{
//     require   __DIR__ .  "/controllers/users.php";
// }
// echo 'hi';




?>