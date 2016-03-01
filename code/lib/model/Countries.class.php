<?php
/*
   Represents a single row for the device-brand table. 
   
   This a concrete implementation of the Domain Model pattern.
 */
class Countries extends DomainObject implements JsonSerializable
{  
   
   static function getFieldNames() {
      return array('iso','fipsCountryCode','iso3','isoNumeric','countryName','capital','geoNameId','area','population','continent','topLevelDomain','currencyCode','currencyName','phoneCountryCode','languages','postalCodeFormat','postalCodeRegex','neighbours','countryDescription');
   }

   public function __construct(array $data, $generateExc)
   {
      parent::__construct($data, $generateExc);
   }
   
   public function jsonSerialize(){
      return ['iso'=>$this->iso, 'fipsCountryCode'=>$this->fipsCountryCode, 'iso3'=>$this->iso3, 'isoNumeric'=>$this->isoNumeric, 'countryName'=>$this->countryName, 'capital'=>$this->capital, 'geoNameId'=>$this->geoNameId, 'area'=>$this->area, 'population'=>$this->population, 'continent'=>$this->continent, 'topLevelDomain'=>$this->topLevelDomain, 'currencyCode'=>$this->currencyCode, 'currencyName'=>$this->currencyName, 'phoneCountryCode'=>$this->phoneCountryCode, 'languages'=>$this->languages, 'postalCodeFormat'=>$this->postalCodeFormat, 'postalCodeRegex'=>$this->postalCodeRegex, 'neighbours'=>$this->neighbours, 'countryDescription'=>$this->countryDescription];
   }
   // implement any setters that need input checking/validation
}

?>