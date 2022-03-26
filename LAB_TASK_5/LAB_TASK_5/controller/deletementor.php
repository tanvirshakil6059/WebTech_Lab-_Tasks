<?php 

require_once '../model/model.php';

if (deletementor($_GET['id'])) {
    header('Location: ../showAllmentors.php');
}

 ?>