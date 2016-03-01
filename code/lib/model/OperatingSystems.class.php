<?php
/*
   Represents a single row for the Operating Systems table. 
   
   This a concrete implementation of the Domain Model pattern.
 */
class OperatingSystems extends DomainObject
{  
   
   static function getFieldNames() {
      return array('id','name');
   }

   public function __construct(array $data, $generateExc)
   {
      parent::__construct($data, $generateExc);
   }
   
   // implement any setters that need input checking/validation
}

?>