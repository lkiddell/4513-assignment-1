<?php
/*
   Represents a single row for the Browsers table. 
   
   This a concrete implementation of the Domain Model pattern.
 */
class Browser extends DomainObject implements JsonSerializable
{  
   
   static function getFieldNames() {
      return array('id','name');
   }

   public function __construct(array $data, $generateExc)
   {
      parent::__construct($data, $generateExc);
   }
   
    public function jsonSerialize(){
      return ['id'=>$this->id, 'name'=>$this->name];
   }
   // implement any setters that need input checking/validation
}

?>