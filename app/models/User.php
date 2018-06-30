<?php
declare(strict_types=1);
namespace models;

use libs\Db;

class User
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $registeredOn;
    private $avatarUrl;
    private $role;
    private $deleted;
    
    public function __construct(string $name, string $password = null)
    {
        $this->name = $name;
        if ($password)
        {
            $this->password = hash('sha256', $password);
        }
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {    
        $this->id = $id;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    public function registeredOn()
    {
        return $this->registeredOn;
    }
    
    public function setRegisteredOn($registeredOn)
    {    
        $this->registeredOn = $registeredOn;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {    
        $this->name = $name;
    }
    
    public function getAvatar()
    {
        return $this->avatarUrl;
    }
    
    public function setAvatar($avatarUrl)
    {    
        $this->avatarUrl = $avatarUrl;
    }

    public function load() :bool
    {
        $stmt = [];
        if ($this->id)
        {
            $stmt = (new Db())->getConn()->prepare("SELECT * FROM `users` WHERE id = ?");
            $result = $stmt->execute([$this->id]);
        }
        elseif ($this->email)
        {
            $stmt = (new Db())->getConn()->prepare("SELECT * FROM `users` WHERE email = ?");
            $result = $stmt->execute([$this->email]);
        }
        else
        {
            throw new \Exception('Cannot load user');
        }
        
        $dbUser = $stmt->fetch();

        $this->id           = $dbUser['id'];
        $this->name         = $dbUser['name'];
        $this->email        = $dbUser['email'];
        $this->registeredOn = $dbUser['registered_on'];
        $this->avatarUrl = $dbUser['avatar_url'];
        $this->role = $dbUser['role'];
        $this->deleted = $dbUser['deleted'];
        
        return !!$dbUser;
    }
    
    public function insert()
    {
        $existingUser = new User('');
        $existingUser->setEmail($this->email);
        $existingUser->load();
        
        if ($existingUser->id)
        {
            // user exists
            return false;
        }
        
        $stmt = (new Db())->getConn()->prepare("INSERT INTO `users` (name, email, password, avatar_url, role) VALUES (?, ?, ?, ?, ?) ");
        return $stmt->execute([$this->name, $this->email, $this->password,  $this->avatarUrl, $this->role]);
    }
    
    public static function fetchAll()
    {
        $stmt = (new Db())->getConn()->prepare("SELECT * FROM `users` ORDER BY registered_on DESC");
        
        $stmt->execute();
        
        $users = [];
        
        while ($user = $stmt->fetch())
        {
            $userObject = new User($user['name']);
            $userObject->setId($user['id']);
            $userObject->setRegisteredOn($user['registered_on']);
            $userObject->setEmail($user['email']);
            $userObject->setAvatar($user['avatar_url']);
            $users[] = $userObject;
        }
        
        return $users;
    }
  }
?>