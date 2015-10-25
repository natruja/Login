<?php
require_once 'core/init.php';
$today = date("Y-m-d H:i:s");
    if(Session::exists('home')){
    	echo '<p>' . Session::flash('home') . '</p>';
    }

?>
