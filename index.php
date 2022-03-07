<?php
//include controller
 require_once './autoload.php'; 
 require_once './controllers/HomeController.php';
require_once './controllers/FlightsController.php';
 require_once './views/includes/header.php';
require_once './views/includes/alerts.php';



//creation d'object out of class home
$home = new HomeController();
$page = ['login','home','add','update','delete','register','logout','homeuser' ,'addpassenger', 'deleterev', 'homecopy', 'allres','showvols'];

if(isset($_SESSION['login']) && $_SESSION['login'] === true){


        if(isset($_GET['page'])){
            if(in_array($_GET['page'],$page)){
                $page = $_GET ['page'];
                $home->index($page);
            }

        }else{
            $home->index('home');
        }

        
        require_once './views/includes/footer.php'; 
}else if(isset($_GET['page']) && $_GET['page'] == 'register'){
    $home->index('register');
}else {
    $home->index('login');
}