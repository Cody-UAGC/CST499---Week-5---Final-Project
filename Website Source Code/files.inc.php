<? php

    class fileUpload {
    
    public $fileName
    public $$fileExstension
    
    public static $ofileUploadCount = 0;//constant property of a class "static"
    const EARLIEST_DATE = 'January 1, 1200';//constant value stored more efficiently; so long as it is never updated.
        
    function __construct($fileName){
        
        $this->fileName = $fileName;
        $this->fileExstension = $fileExstension 
        
    }
    
    public function outputFileChoice() {
        
        $myTable = "<table>";
        $myTable .= "<tr><th colspan='2'>";
        $myTable .= $this->fileName . "" . $this->fileExstension;
        $myTable .= "</th></tr>";
        return $myTable;
        self::$ofileUploadCount++;//use "self::" to reference a static property
        
    }
    
}
    
    //instantiate class: $ofileUpload = new fileUpload("Sample File", ".txt");
    //echo $ofileUpload->outputFileChoice();
    //self::$ofileUploadCount

?>