<?php
require_once 'core/init.php';

$user = DB::getInstance()->query("SELECT emp_id FROM all_ro10_emp WHERE emp_id = ?", array('26-1136'));
if ($user->error()) {
    	echo "No user";
} else {
    	echo "ok";
}
?>
