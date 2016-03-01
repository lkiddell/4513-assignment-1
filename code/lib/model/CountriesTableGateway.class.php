<?php
/*
  Table Data Gateway for the device-brand table.
 */
class CountriesTableGateway extends TableDataGateway
{    
   public function __construct($dbAdapter) 
   {
      parent::__construct($dbAdapter);
   }
  
   protected function getDomainObjectClassName()  
   {
      return "Countries";
   } 
   protected function getTableName()
   {
      return "countries";
   }
   protected function getOrderFields() 
   {
      return 'countryName';
   }
  
   protected function getPrimaryKeyName() {
      return "iso";
   }
   
      public function getCountryNamesAndCount() {
    $sql = "SELECT `CountryName` , COUNT( `country_code` ) AS Views, `Continent` , `ContinentName` FROM `countries` JOIN `visits` ON `countries`.`fipsCountryCode` = `visits`.`country_code` JOIN `continents` ON `continents`.`ContinentCode` = `countries`.`Continent` GROUP BY `CountryName`";

     $countriesAndVisits =  $this->dbAdapter->fetchAsArray($sql);  
     
     return $countriesAndVisits;
      
   } 
   
   

}

?>