<?php
	session_start();
	session_destroy();
    if (isset($_GET['redirect']))
        header('Location: ../index.php?'.$_GET['redirect']);
    else
	    header('Location: ../index.php');
    exit;
?>