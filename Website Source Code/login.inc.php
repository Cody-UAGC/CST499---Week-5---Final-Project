<?php

//create a class that manages role based permissions and associated cookie data

class clsUserPermissions {

//Base Permissions
private $NONE = 0b0000; // 0
private $READ = 0b0001; // 1
private $WRITE = 0b0010; // 2
private $EXECUTE = 0b0100; // 4
    
//Role Permissions
private $GUEST = 0b0000; // 0      
private $EMPLOYEE = 0b0001; // 1      
private $SUPERVISOR = 0b0011; // 3       
private $ADMIN = 0b0111; // 7   
 
private $myPermissions = null;   
    
public function setPermission($pPermissions){
        
    switch ($pPermissions) {
            
            case "NONE":
                $this->myPermissions = $this->myPermissions | $this->NONE;
            break;

            case "READ":
                $this->myPermissions = $this->myPermissions | $this->READ;
            break;

            case "WRITE":
                $this->myPermissions = $this->myPermissions | $this->WRITE;
            break;
            
            case "EXECUTE":
                $this->myPermissions = $this->myPermissions | $this->EXECUTE;
            break;

    }
              
        if ($this->myPermissions == $this->GUEST) {
            $myRole = "GUEST";
            $_SESSION['PERMISSIONS'] = $myRole;
            //setcookie("PERMISSIONS", $myRole, time() + 3600);
            //header("Location: http://localhost/cst499/index.php");
        }
    
        if ($this->myPermissions == $this->EMPLOYEE) { 
            $myRole = "STUDENT";
            $_SESSION['PERMISSIONS'] = $myRole;
            //setcookie("PERMISSIONS", $myRole, time() + 3600);
        }
            
        if ($this->myPermissions == $this->SUPERVISOR) {
            $myRole = "INSTRUCTOR";
            $_SESSION['PERMISSIONS'] = $myRole;
            //setcookie("PERMISSIONS", $myRole, time() + 3600);
        }

        if ($this->myPermissions == $this->ADMIN) {
            $myRole = "ADMIN";
            $_SESSION['PERMISSIONS'] = $myRole;
            //setcookie("PERMISSIONS", $myRole, time() + 3600);
        }

    }
    
}

?>
