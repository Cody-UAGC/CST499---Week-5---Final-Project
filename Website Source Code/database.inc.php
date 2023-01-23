<?php 

class clsDatabase {

private $myCon;
private $mySQL;
private $myReturn = array();
private $myVar;

    
//Configure the database configuration parameters.
public function setCon($pCon){
    $this->myCon = $pCon;
}
    
//Set the value of the SQL query.
public function setSQL($pSQL){
    $this->mySQL = $pSQL;
}
        
//Set the value of the SQL query return.
public function getReturn(){
    return $this->myReturn;
}
    
//Set the value of the SQL query return.
public function getSingleReturn(){
    return $this->myVar;
}

    
    //Execute a DML command that is not a query.
    public function DML_STATEMENT(){
        
        if ($this->myCon && $this->mySQL){
            $this->myCon->query($this->mySQL);
        }
        
    }
    
    //Return all records from a single field.
    public function DML_QUERY_FIELD($pField) {
        
        $myCount =  0;
            
        if ($this->myCon && $this->mySQL) {
            
            $result = $this->myCon->query($this->mySQL); 
            
                if ($result){

                    if ($result->num_rows > 0){
                            
                        while($row = $result->fetch_assoc()){
                            $myCount = $myCount + 1;
                            $this->myReturn[$myCount] = $row[$pField]; 
                            
                        }
                        
                    }   

                    
                }
            
        }
    
    }
    
    
    //Return all records from a single field.
    public function DML_QUERY_FIELD_SINGLE($pField) {
        
        $myCount =  0;
            
        if ($this->myCon && $this->mySQL) {
            
            $result = $this->myCon->query($this->mySQL); 
            
                if ($result){

                    if ($result->num_rows > 0){
                            
                        while($row = $result->fetch_assoc()){
                            $this->myVar= $row[$pField];    
                        }
                        
                    }   
                    
                }
            
        }
    }
    
}

?>
