<?php

public class fileBrowser(){
    
    private constant $fileDirectory = "files/";
    private $fileName;
    private $fileType;
    

    private function setFileName($pName){
        $this->fileName = $pName;
    }
    
    private function setFileType($pType){
        $this->fileType = $pType;
    }
    
    public function getFileDirectory(){
        return $this->fileDirectory;
    }
        
    public function getFileName(){
        return $this->fileName;
    }
    
    public function getFileType(){
        return $this->fileType;
    }
 
    public function uploadFile(){
        
        
        
    }
}

?>
