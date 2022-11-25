<?php
//print_r($_POST);
require_once 'class/Crud.php';

$Crud = new Crud;
$update = $Crud->update('client', $_POST);

echo $update;





