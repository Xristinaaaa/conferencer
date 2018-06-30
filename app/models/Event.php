<?php
declare(strict_types=1);
namespace models;

use libs\Db;

class Event
{
    private $id;
    private $name;
    private $createdOn;
    private $startDate;
    private $endDate;
    private $location;
    private $coverUrl;
    private $description;
    private $eventTypeId;
    private $categoryId;
    private $lecturer;
    private $capacity;
    private $price;
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

    public function getCreatedOn()
    {
        return $this->createdOn;
    }
    
    public function setCreatedOn($createdOn)
    {    
        $this->createdOn = $createdOn;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }
    
    public function setStartDate($startDate)
    {    
        $this->startDate = $startDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }
    
    public function setEndDate($endDate)
    {    
        $this->endDate = $endDate;
    }

    public function getLocation()
    {
        return $this->location;
    }
    
    public function setLocation($location)
    {    
        $this->location = $location;
    }

    public function getCoverUrl()
    {
        return $this->coverUrl;
    }
    
    public function setCoverUrl($coverUrl)
    {    
        $this->coverUrl = $coverUrl;
    }

    public function getDescription()
    {
        return $this->description;
    }
    
    public function setDescription($description)
    {    
        $this->description = $description;
    }

    public function getEventTypeId()
    {
        return $this->eventTypeId;
    }
    
    public function setEventTypeId($eventTypeId)
    {    
        $this->eventTypeId = $eventTypeId;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }
    
    public function setCategoryId($categoryId)
    {    
        $this->categoryId = $categoryId;
    }

    public function getLecturer()
    {
        return $this->lecturer;
    }
    
    public function setLecturer($lecturer)
    {    
        $this->lecturer = $lecturer;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }
    
    public function setCapacity($capacity)
    {    
        $this->capacity = $capacity;
    }

    public function getPrice()
    {
        return $this->price;
    }
    
    public function setPrice($price)
    {    
        $this->price = $price;
    }

    public function load() :bool
    {
        $stmt = [];
        if ($this->id)
        {
            $stmt = (new Db())->getConn()->prepare("SELECT * FROM `events` WHERE id = ?");
            $result = $stmt->execute([$this->id]);
        } else
        {
            throw new \Exception('Cannot load event');
        }
        
        $dbEvent = $stmt->fetch();

        $this->id           = $dbEvent['id'];
        $this->name         = $dbEvent['name'];
        $this->deleted      = $dbEvent['deleted'];
        $this->$createdOn;  = $dbEvent['created_on'];
        $this->$startDate;  = $dbEvent['start_date'];
        $this->$endDate;    = $dbEvent['end_date'];
        $this->$location;   = $dbEvent['location'];
        $this->$coverUrl;   = $dbEvent['cover_url'];
        $this->$description; = $dbEvent['description'];
        $this->$eventTypeId; = $dbEvent['eventTypeId'];
        $this->$categoryId; = $dbEvent['categoryId'];
        $this->$lecturer;   = $dbEvent['lector'];
        $this->$capacity;   = $dbEvent['capacity'];
        $this->$price;      = $dbEvent['price'];

        return !!$dbEvent;
    }
    
    public function insert()
    {
        $existingEvent = new Event('');
        $existingEvent->setName($this->name);
        $existingEvent->load();
        
        if ($existingEvent->id)
        {
            // event exists
            return false;
        }
        
        $stmt = (new Db())->getConn()->prepare("INSERT INTO `events` (name, creаted_on, start_date, end_date, location,
         cover_url, description, eventTypeId, categoryId, lector, capacity, price, deleted) 
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
        return $stmt->execute([$this->name, $this->createdOn, $this->startDate, $this->endDate, $this->location, $this->coverUrl, 
            $this->description, $this->eventTypeId, $this->categoryId, $this->lecturer, $this->capacity, $this->price, 0]);
    }
    
    public static function fetchAll()
    {
        $stmt = (new Db())->getConn()->prepare("SELECT * FROM `events` ORDER BY name DESC");
        
        $stmt->execute();
        
        $events = [];
        
        while ($event = $stmt->fetch())
        {
            $eventObject = new Event($event['name']);
            $eventObject->setId($event['id']);
            $eventObject->setCreatedOn($event['creаted_on']);
            $eventObject->setStartDate($event['start_date']);
            $eventObject->setEndDate($event['end_date']);
            $eventObject->setLocation($event['location']);
            $eventObject->setCoverUrl($event['cover_url']);
            $eventObject->setDescription($event['description']);
            $eventObject->setEventTypeId($event['eventTypeId']);
            $eventObject->setCategoryId($event['categoryId']);
            $eventObject->setLecturer($event['lector']);
            $eventObject->setCapacity($event['capacity']);
            $eventObject->setPrice($event['price']);
            $events[] = $eventObject;
        }
        
        return $events;
    }
  }
?>