<?php
/*
  Table Data Gateway for the device-brand table.
 */
class DeviceBrandTableGateway extends TableDataGateway
{    
   public function __construct($dbAdapter) 
   {
      parent::__construct($dbAdapter);
   }
  
   protected function getDomainObjectClassName()  
   {
      return "DeviceBrand";
   } 
   protected function getTableName()
   {
      return "device_brands";
   }
   protected function getOrderFields() 
   {
      return 'name';
   }
  
   protected function getPrimaryKeyName() {
      return "id";
   }

  public function getDeviceNameAndCount() {
     $sql = "SELECT `name`, COUNT(`device_brand_id`) as Views FROM `device_brands` JOIN `visits` on `device_brands`.`ID` = `visits`.`device_brand_id` Group by `name`";
      $result =  $this->dbAdapter->fetchAsArray($sql);  
      //console.log(print_r($result));
      //$temp = $result[0];
      return $result;
   }


}

?>