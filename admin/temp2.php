<?php

function c(){
	print "no!";
	a();
	$val = "popo";
}

function a(){
	c();
}

a();
?>