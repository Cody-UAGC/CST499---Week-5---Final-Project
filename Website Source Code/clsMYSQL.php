<?php

class clsMYSQL {

private $myCon;
private $mySQL;
private $mySearch;

private $myReturn = array();

//Declare a SQL query.
public function setSQL($pSQL){
    $this->mySQL = $pSQL;
}

//Declare search criteria.
public function setSearch($pSearch){
    $this->mySearch = $pSearch;
}    
    
//SQL query data.
public function getQuery(){
    return $this->myReturn;
}
    
public function initConnection(){    
    
$this->myCon = mysqli_connect('localhost', 'root', '', 'cst499');

    if (!$this->myCon) {
        
        die ("Connection failed: " . mysqli_connect_error());
    }
    else {
        
        echo ("Connected successfully");  
    }   

}
    
public function DML_STATEMENT($DML){
    
$myCon = $this->myCon;
$mySQL = $this->mySQL;
$mySearch = $this->mySearch;

$myCount = 0;
$myReturn = array();
$myRow = array();

    if ($myCon && $mySQL){
        
        switch ($DML){
        
        case "INSERT":
            
            $myCon->query($mySQL);
            echo ("INSERT query submitted");
        
        case "SELECT":
                
            $myReturn = $myCon->query($mySQL);
            
            if ($myReturn->num_rows > 0){
                    
                while ($myRow = $myReturn->fetch_assoc()){
                
                    $myCount = $myCount + 1;
                    $myReturn[$myCount] = $myRow[$mySearch]
                }
                
                $this->myReturn = $myReturn;
            }
                
            else {
                    
                echo ("No records in row")
            } 
        }
    }
    
    else {
        
        echo ("This class has not had its SQL variable set. Try that and then execute this function.");
    }               
}
    
//Return all records from a single field.
public function DML_STATEMENT() {

$result = $this->myCon->query($this->mySQL); 
            
    if ($result->num_rows > 0){
                            
        while($row = $result->fetch_assoc()){
            
            $myCount = $myCount + 1;
            $this->myReturn[$myCount] = $row[$pField];              
        }
                        
    }   
}
            
}
?>
