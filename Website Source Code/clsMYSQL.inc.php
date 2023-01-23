<?php

class clsMYSQL {

private $myCon;
private $mySQL;
private $mySearch;

private $myReturn = array();

//Set the database connection parameters.
public function setCon($pHost, $pUser, $pPass, $pTable){    
    
$this->myCon = mysqli_connect($pHost, $pUser, $pPass, $pTable);

    if (!$this->myCon) {
        
        die ("Connection failed: " . mysqli_connect_error());
    }
    else {
        
        echo ("Connected successfully");  
    }   

}  

//Declare a SQL query.
public function setSQLSTATEMENT($pSQL){
    $this->mySQL = $pSQL;
}

//Declare search criteria.
public function setSearch($pSearch){
    $this->mySearch = $pSearch;
}    
    
//Return the SQL query data.
public function getQuery(){
    return $this->myReturn;
}
    
//Determine and execute specific SQL queries.
public function DML_STATEMENT($DML){

$myCount = 0;
$myCon = $this->myCon;
$mySQL = $this->mySQL;
$mySearch = $this->mySearch;

    if ($myCon && $mySQL){
        
        switch ($DML){
        
        case "INSERT":
            
            $myCon->query($mySQL);
            echo ("INSERT query submitted.");
        
        case "SELECT":
            
            $myReturn = $myCon->query($mySQL);
            
            if ($myReturn->num_rows > 0){
                    
                while ($row = $myReturn->fetch_assoc()){
                
                    $myCount = $myCount + 1;
                    $this->myReturn[$myCount] = $row[$mySearch]
                } 
            }
                
            else {
                    
                echo ("No search results found.")
            }
        
        case "INNER JOIN":
                
            
                
                
        }
    }
    
    else {
        
        echo ("This class has not had its SQL variable set. Try that and then execute this function.");
    }               
}
   
}
?> 
    