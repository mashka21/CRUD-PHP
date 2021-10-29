<?php

header("Content-type: application/json");

include 'conn.php';

// function ReadAll
// function Insert
// function Delete
// function Update

/* POST
*/
$action = $_POST['action'];





// function realAll
function readAll($conn) {

    $date = array();
    $message = array();    

    $query = "SELECT * FROM students";

    // excute the query
    $result = $conn->query($query);

    // success or error

    if($result) {

        while($row=$result->fetch_assoc()) {

            $data [] = $row;

        }

        $message = array("status" => true, "data" => $data);

    }else{

        $message = array("status" => false, "data" => $conn->error);

    }

    echo json_encode($message);
    
}

function readStudentInfo($conn) {

    $date = array();
    $message = array();
    
    $id = $_POST['ID'];

    $query = "SELECT * FROM students WHERE ID = '$id'";

    // excute the query
    $result = $conn->query($query);

    // success or error

    if($result) {

        while($row=$result->fetch_assoc()) {

            $data [] = $row;

        }

        $message = array("status" => true, "data" => $data);

    }else{

        $message = array("status" => false, "data" => $conn->error);

    }

    echo json_encode($message);
    
}

function deleteStudentInfo($conn) {

    $date = array();
    $message = array();
    
    $id = $_POST['ID'];

    $query = "DELETE FROM students WHERE ID = '$id'";

    // excute the query
    $result = $conn->query($query);

    // success or error

    if($result) {
            $data=$result;

        $message = array("status" => true, "data" => $data);

    }else{

        $message = array("status" => false, "data" => $conn->error);

    }

    echo json_encode($message);
    
}


// function insert/register
function register($conn) {

    $studentId = $_POST['stID'];
    $studentName = $_POST['stName'];
    $studentClass = $_POST['stClass'];

    $data = array();

    $query = "INSERT INTO students(ID,Name,Class) values('$studentId','$studentName','$studentClass')";
    $result = $conn->query($query);
    if($result){
        $data = array("status"=>true, "data" => "Registered SuccessFully");

    }else{
        $data = array("status"=>false, "data" => $conn->error);
    }

    echo json_encode($data);

}


function updateStudent($conn) {

    $studentId = $_POST['stID'];
    $studentName = $_POST['stName'];
    $studentClass = $_POST['stClass'];

    $data = array();

    $query = "UPDATE students set Name = '$studentName', Class = '$studentClass' where ID='$studentId'";
    $result = $conn->query($query);
    if($result){
        $data = array("status"=>true, "data" => "updated SuccessFully");

    }else{
        $data = array("status"=>false, "data" => $conn->error);
    }

    echo json_encode($data);

}




if(isset($action)){
    
    $action($conn);

}else{
    echo "action required";
}



?>