<?php
declare(strict_types=1);
namespace models;

use libs\Db;

class Country
{
    private $id;
    private $name;
    private $deleted;
    
    public function __construct(string $name, int $deleted = 0)
    {
        $this->name = $name;
        $this->deleted = $deleted;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {    
        $this->id = $id;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {    
        $this->name = $name;
    }

    public function load() :bool
    {
        $stmt = [];
        if ($this->id)
        {
            $stmt = (new Db())->getConn()->prepare("SELECT * FROM `countries` WHERE id = ?");
            $result = $stmt->execute([$this->id]);
        } else
        {
            throw new \Exception('Cannot load country');
        }
        
        $dbCountry = $stmt->fetch();

        $this->id           = $dbCountry['id'];
        $this->name         = $dbCountry['name'];
        $this->deleted      = $dbCountry['deleted'];
        
        return !!$dbCountry;
    }
    
    public function insert()
    {
        $existingCountry = new Country('');
        $existingCountry->setName($this->name);
        $existingCountry->load();
        
        if ($existingCountry->id)
        {
            // country exists
            return false;
        }
        
        $stmt = (new Db())->getConn()->prepare("INSERT INTO `countries` (name, deleted) VALUES (?, ?) ");
        return $stmt->execute([$this->name, 0]);
    }
    
    public static function fetchAll()
    {
        $stmt = (new Db())->getConn()->prepare("SELECT * FROM `countries` ORDER BY name DESC");
        
        $stmt->execute();
        
        $countries = [];
        
        while ($country = $stmt->fetch())
        {
            $countryObject = new Country($country['name']);
            $countryObject->setId($country['id']);
            $countries[] = $countryObject;
        }
        
        return $countries;
    }
  }
?>