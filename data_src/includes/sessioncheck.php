<?php

session_start();
function checklogged(){
    if($_SESSION["LoggedIn"] != "YES"){
        return  false;
    }
    else{
        return true;
    }
}

?>