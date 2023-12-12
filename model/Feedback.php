<?php
class Feedback
{
    private ?int $idUser = null;
    private ?int $feed= null;
    

    public function __construct($idUser= null, $feed)
    {
        $this->idUser = $idUser;
        $this->feed = $feed;
      
    }
//This class is designed to encapsulate and manage information about a menstrual cycle for a user. 

    public function getidUser()
    {
        return $this->idUser;
    }


    public function getFeed()//scanf to the db
    {
        return $this->feed;
    }


    public function setFeed ($feed )//write the current..in db
    {
        $this->feed  = $feed ;

        return $this;
    }


   
}
