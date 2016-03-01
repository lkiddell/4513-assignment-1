<?php
/*
  Table Data Gateway for the Browser table.
 */
class OperatingSystemsTableGateway extends TableDataGateway
{    
   public function __construct($dbAdapter) 
   {
      parent::__construct($dbAdapter);
   }
  
   protected function getDomainObjectClassName()  
   {
      return "OperatingSystems";
   } 
   protected function getTableName()
   {
      return "operating_systems";
   }
   protected function getOrderFields() 
   {
      return 'name';
   }
  
   protected function getPrimaryKeyName() {
      return "id";
   }


}

?>