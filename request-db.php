<?php
function checkIfUserExists($computingID, $password) 
{
    global $db;
    $query = "SELECT * FROM student WHERE computing_ID=:computingID AND password=:password";
    $statement = $db->prepare($query);
    $statement->bindValue(':computingID', $computingID);
    $statement->bindValue(':password', $password);
    $statement->execute(); 
    $result = $statement -> fetchAll();
    $statement->closeCursor();

    return $result;
}

function addRequests($reqDate, $roomNumber, $reqBy, $repairDesc, $reqPriority)
{


}

function getAllRequests()
{
   

}

function getRequestById($id)  
{
    

}

function updateRequest($reqId, $reqDate, $roomNumber, $reqBy, $repairDesc, $reqPriority)
{


}

function deleteRequest($reqId)
{

    
}

?>
