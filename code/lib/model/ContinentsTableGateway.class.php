<?php
/*
  Table Data Gateway for the device-brand table.
 */
class ContinentsTableGateway extends TableDataGateway
{    
   public function __construct($dbAdapter) 
   {
      parent::__construct($dbAdapter);
   }
  
   protected function getDomainObjectClassName()  
   {
      return "Continents";
   } 
   protected function getTableName()
   {
      return "continents";
   }
   protected function getOrderFields() 
   {
      return 'continentName';
   }
  
   protected function getPrimaryKeyName() 
   {
      return "continentCode";
   }

 public function getAllContinentsAndCodes() {
    $sql = "SELECT `ContinentCode`, `ContinentName` FROM `continents`";

     return  $this->dbAdapter->fetchAsArray($sql);  
     
      
   } 

}

?>