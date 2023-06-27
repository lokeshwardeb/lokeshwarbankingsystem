<?php
// require  "inc/const.php";

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// $uri = $_SERVER['REQUEST_URI'];
// echo "<pre>";
// var_dump($uri);
// echo "</pre>";
// created the routes array

// register your routes uri and the url on this Routes array
$Routes = [
    '/' => __DIR__ . "/controllers/index.php",
    // '/phpdevelopment/lokeshwarbankingsystem/' => __DIR__ . "/controllers/index.php",
    // '/phpdevelopment/lokeshwarbankingsystem/users' => __DIR__ . "/controllers/index.php",
    '/dashboard' => __DIR__ . "/controllers/index.php",
    '/users' =>__DIR__ .  "/controllers/users.php",
    '/manage_account' =>__DIR__ .  "/controllers/manage_account.php",
    '/print_ac_statement' =>__DIR__ .  "/controllers/print_ac_statement.php",
    '/create_account' =>__DIR__ .  "/controllers/create_account_form.php",
    '/make_transaction' =>__DIR__ .  "/controllers/make_transaction_form.php",
    '/search' =>__DIR__ .  "/controllers/search_exe.php",
    '/close_account' =>__DIR__ .  "/controllers/close_account.php",
    '/total_fund' =>__DIR__ .  "/controllers/total_fund.php",
    '/add_admin' =>__DIR__ .  "/controllers/add_admin.php",
    '/login' =>__DIR__ .  "/controllers/login.php",
    '/logout' =>__DIR__ .  "/controllers/logout.php",
    '/create_bank_account' =>__DIR__ .  "/controllers/create_bank_account.php",
    '/forgot_pass' =>__DIR__ .  "/controllers/forgot_password.php",
    '/fp_pass' =>__DIR__ .  "/controllers/fp_pass.php",
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