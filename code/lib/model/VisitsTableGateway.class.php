<?php
/*
  Table Data Gateway for the Browser table.
 */
class VisitsTableGateway extends TableDataGateway
{    
   public function __construct($dbAdapter) 
   {
      parent::__construct($dbAdapter);
   }
  
   protected function getDomainObjectClassName()  
   {
      return "Visits";
   } 
   protected function getTableName()
   {
      return "visits";
   }
   protected function getOrderFields() 
   {
      return 'ip_address';
   }
  
   protected function getPrimaryKeyName() {
      return "id";
   }
   
  public function getCount($id) {
      $sql = "SELECT COUNT(*) FROM visits WHERE browser_id = " . $id;
      $result =  $this->dbAdapter->fetchAsArray($sql);  
      $temp = $result[0];
      return $temp['COUNT(*)'];
      
   }
   
   public function getAllCount() {
      $sql = "SELECT COUNT(*) FROM visits";
     $totalVisits =  $this->dbAdapter->fetchAsArray($sql);  
     $temp = $totalVisits[0];
     return $temp['COUNT(*)'];
      
   }


}

?>