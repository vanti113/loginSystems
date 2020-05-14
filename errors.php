<?php

function errors_process($errors){

	print <<<_html_
	<!DOCTYPE html>
	<html lang="en" class="errors_html">
	<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Logging System</title>
	<link rel="stylesheet" href="http://localhost:81/php/logsys/loginSystems/css/style.css" />
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	</head>
	<body class="errors">
	<header class="header">
	<h1>LogSystem&Admin</h1>
	</header>
	<main class="errors__contents">
	<div class="errors__title">
	<i class="fas fa-exclamation-triangle"></i>
	<span>Check the Error Messages</span>
	</div>
	<ul class="errors__messages">
	<li class="errors__comments">
	_html_;
	if($errors){
		$message = '';
		foreach($errors as $value){
			$message.= "<div class=\"error\"><i class=\"fas fa-exclamation\"></i><span>".$value.'</span></div>';
		}
		
		print $message;
	}
print '</li></ul></main></body></html>';

	}
