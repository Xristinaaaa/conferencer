<?php
declare(strict_types=1);
namespace models;

use libs\Db;

class Comment
{
    private $id;
    private $content;
    private $deleted;
    
    public function __construct(string $content, int $deleted = 0)
    {
        $this->content = $content;
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
    
    public function getContent()
    {
        return $this->content;
    }
    
    public function setContent($content)
    {    
        $this->content = $content;
    }

    public function load() :bool
    {
        $stmt = [];
        if ($this->id)
        {
            $stmt = (new Db())->getConn()->prepare("SELECT * FROM `comments` WHERE id = ?");
            $result = $stmt->execute([$this->id]);
        } else
        {
            throw new \Exception('Cannot load comment');
        }
        
        $dbComment = $stmt->fetch();

        $this->id           = $dbComment['id'];
        $this->content         = $dbComment['content'];
        $this->deleted      = $dbComment['deleted'];
        
        return !!$dbComment;
    }
    
    public function insert()
    {
        $existingComment = new Comment('');
        $existingComment->setContent($this->content);
        $existingComment->load();
        
        if ($existingComment->id)
        {
            // comment exists
            return false;
        }
        
        $stmt = (new Db())->getConn()->prepare("INSERT INTO `comments` (content, deleted) VALUES (?, ?) ");
        return $stmt->execute([$this->content, 0]);
    }
    
    public static function fetchAll()
    {
        $stmt = (new Db())->getConn()->prepare("SELECT * FROM `comments` ORDER BY id");
        $stmt->execute();
        
        $comments = [];
        
        while ($comment = $stmt->fetch())
        {
            $commentObject = new Comment($comment['content']);
            $commentObject->setId($comment['id']);
            $comments[] = $commentObject;
        }
        
        return $comments;
    }
  }
?>