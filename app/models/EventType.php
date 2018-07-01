<?php
declare(strict_types=1);
namespace models;

use libs\Db;

class EventType
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

    public function getByName() :bool
    {
        $stmt = [];
        if($this->name) 
        {
            $stmt = (new Db())->getConn()->prepare("SELECT * FROM `eventtypes` WHERE name = ?");
            $result = $stmt->execute([$this->name]);
        } else
        {
            throw new \Exception('Cannot load event type');
        }

        $dbEventType = $stmt->fetch();
        
        $this->id           = $dbEventType['id'];
        $this->name         = $dbEventType['name'];
        $this->deleted      = $dbEventType['deleted'];
        
        return !!$dbEventType;
    }

    public function load() :bool
    {
        $stmt = [];
        if ($this->id)
        {
            $stmt = (new Db())->getConn()->prepare("SELECT * FROM `eventtypes` WHERE id = ?");
            $result = $stmt->execute([$this->id]);
        } else
        {
            throw new \Exception('Cannot load event type');
        }
        
        $dbEventType = $stmt->fetch();

        $this->id           = $dbEventType['id'];
        $this->name         = $dbEventType['name'];
        $this->deleted      = $dbEventType['deleted'];
        
        return !!$dbEventType;
    }
    
    public function insert()
    {
        $existingEventType = new EventType('');
        $existingEventType->setName($this->name);
        $existingEventType->load();
        
        if ($existingEventType->id)
        {
            // event type exists
            return false;
        }
        
        $stmt = (new Db())->getConn()->prepare("INSERT INTO `eventtypes` (name, deleted) VALUES (?, ?) ");
        return $stmt->execute([$this->name, 0]);
    }
    
    public static function fetchAll()
    {
        $stmt = (new Db())->getConn()->prepare("SELECT * FROM `eventtypes` ORDER BY name DESC");
        
        $stmt->execute();
        
        $eventTypes = [];
        
        while ($eventType = $stmt->fetch())
        {
            $eventTypeObject = new EventType($eventType['name']);
            $eventTypeObject->setId($eventType['id']);
            $eventTypes[] = $eventTypeObject;
        }
        
        return $eventTypes;
    }
  }
?>