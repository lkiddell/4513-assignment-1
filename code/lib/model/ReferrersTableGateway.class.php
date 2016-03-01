<?php
/*
  Table Data Gateway for the Browser table.
 */
class ReferrersTableGateway extends TableDataGateway
{    
   public function __construct($dbAdapter) 
   {
      parent::__construct($dbAdapter);
   }
  
   protected function getDomainObjectClassName()  
   {
      return "Referrers";
   } 
   protected function getTableName()
   {
      return "referrers";
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