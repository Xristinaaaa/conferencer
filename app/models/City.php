<?php
declare(strict_types=1);
namespace models;

use libs\Db;

class City
{
    private $id;
    private $name;
    private $countryId;
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

    public function getCountryId()
    {
        return $this->countryId;
    }
    
    public function setCountryId($countryId)
    {    
        $this->countryId = $countryId;
    }

    public function load() :bool
    {
        $stmt = [];
        if ($this->id)
        {
            $stmt = (new Db())->getConn()->prepare("SELECT * FROM `cities` WHERE id = ?");
            $result = $stmt->execute([$this->id]);
        } else
        {
            throw new \Exception('Cannot load city');
        }
        
        $dbCity = $stmt->fetch();

        $this->id           = $dbCity['id'];
        $this->name         = $dbCity['name'];
        $this->countryId    = $dbCity['countryId'];
        $this->deleted      = $dbCity['deleted'];
        
        return !!$dbCity;
    }
    
    public function insert()
    {
        $existingCity = new City('');
        $existingCity->setName($this->name);
        $existingCity->load();
        
        if ($existingCity->id)
        {
            // city exists
            return false;
        }
        
        $stmt = (new Db())->getConn()->prepare("INSERT INTO `cities` (name, countryId, deleted) VALUES (?, ?, ?) ");
        return $stmt->execute([$this->name, $this->countryId, 0]);
    }
    
    public static function fetchAll()
    {
        $stmt = (new Db())->getConn()->prepare("SELECT * FROM `cities` ORDER BY name DESC");
        
        $stmt->execute();
        
        $cities = [];
        
        while ($city = $stmt->fetch())
        {
            $cityObject = new City($city['name']);
            $cityObject->setId($city['id']);
            $cityObject->setCountryId($city['countryId']);
            $cities[] = $cityObject;
        }
        
        return $cities;
    }
  }
?>