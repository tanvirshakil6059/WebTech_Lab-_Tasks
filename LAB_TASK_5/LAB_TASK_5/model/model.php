<?php 

require_once 'db_connect.php';


function showAllmentors(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM mentor_info ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showmentor($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM mentor_info where User_ID = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function searchUser($name){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM mentor_info WHERE Name LIKE '%$name%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function addmentor($data){
	$conn = db_conn();
    $selectQuery = "INSERT into mentor_info (Name, Phone, Password, Image)
    VALUES (:Name, :Phone, :Password, :Image)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':Name' => $data['Name'],
        	':Phone' => $data['Phone'],
        	':Password' => $data['Password'],
        	':Image' => $data['Image']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updatementor($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE mentor_info set Name = ?, Phone = ?, Image = ? where User_ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['Name'], $data['Phone'], $data['Image'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deletementor($id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM mentor_info WHERE User_ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}