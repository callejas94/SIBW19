<?php
	require_once 'session.php';
	$session = Session::getInstance();
	$session->destroy();
	header('Location: loginScreen');
?>;
