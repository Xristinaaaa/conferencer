<?php
declare(strict_types=1);
namespace models;

use libs\Db;

class Category
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
            $stmt = (new Db())->getConn()->prepare("SELECT * FROM `categories` WHERE name = ?");
            $result = $stmt->execute([$this->name]);
        } else
        {
            throw new \Exception('Cannot load category');
        }

        $dbCategory = $stmt->fetch();
        
        $this->id           = $dbCategory['id'];
        $this->name         = $dbCategory['name'];
        $this->deleted      = $dbCategory['deleted'];
        
        return !!$dbCategory;
    }

    public function load() :bool
    {
        $stmt = [];
        if ($this->id)
        {
            $stmt = (new Db())->getConn()->prepare("SELECT * FROM `categories` WHERE id = ?");
            $result = $stmt->execute([$this->id]);
        } else
        {
            throw new \Exception('Cannot load category');
        }
        
        $dbCategory = $stmt->fetch();

        $this->id           = $dbCategory['id'];
        $this->name         = $dbCategory['name'];
        $this->deleted      = $dbCategory['deleted'];
        
        return !!$dbCategory;
    }
    
    public function insert()
    {
        $existingCategory = new Category('');
        $existingCategory->setName($this->name);
        $existingCategory->load();
        
        if ($existingCategory->id)
        {
            // category exists
            return false;
        }
        
        $stmt = (new Db())->getConn()->prepare("INSERT INTO `categories` (name, deleted) VALUES (?, ?) ");
        return $stmt->execute([$this->name, 0]);
    }
    
    public static function fetchAll()
    {
        $stmt = (new Db())->getConn()->prepare("SELECT * FROM `categories` ORDER BY name DESC");
        
        $stmt->execute();
        
        $categories = [];
        
        while ($category = $stmt->fetch())
        {
            $categoryObject = new Category($category['name']);
            $categoryObject->setId($category['id']);
            $categories[] = $categoryObject;
        }
        
        return $categories;
    }
  }
?>