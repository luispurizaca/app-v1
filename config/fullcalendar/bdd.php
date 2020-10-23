<?php
try
{
	$bdd = new PDO('mysql:host=nutrikatherinealfaro.com.pe;dbname=nutrikat_app-v1;charset=utf8', 'nutrikat_localhost', 'Nutrikatherinealfaro123');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
