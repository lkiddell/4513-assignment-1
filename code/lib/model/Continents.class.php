<?php
/*
   Represents a single row for the device-brand table. 
   
   This a concrete implementation of the Domain Model pattern.
 */
class Continents extends DomainObject implements JsonSerializable
{  
   
   static function getFieldNames() {
      return array('continentCode','continentName','geoNameId');
   }

   public function __construct(array $data, $generateExc)
   {
      parent::__construct($data, $generateExc);
   }
   
   public function jsonSerialize(){
      return ['continentCode'=>$this->continentCode, 'continentName'=>$this->continentName, 'geoNameId'=>$this->geoNameId];
   }
   // implement any setters that need input checking/validation
}

?>