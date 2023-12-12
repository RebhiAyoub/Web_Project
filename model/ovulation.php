<?php
class Ovulation//as u like
{
    private ?int $idUser = null;
    private ?string $firstDayOfLMP= null;
    private ?int $averageCycleLength= null;
    private ?string $ovulationDate= null;


    
    

    public function __construct($idUser=null, $firstDayOfLMP, $averageCycleLength, $ovulationDate)
    {
        $this->idUser = $idUser;
        $this->firstDayOfLMP = $firstDayOfLMP;
        $this->averageCycleLength= $averageCycleLength;
        $this->ovulationDate = $ovulationDate;
      
    }
//This class is designed to encapsulate and manage information about a menstrual cycle for a user. 

    public function getidUser()
    {
        return $this->idUser;
    }


    public function getfirstDayOfLMP()//scanf to the db
    {
        return $this->firstDayOfLMP;
    }


    public function setfirstDayOfLMP ($firstDayOfLMP )//write the current..in db
    {
        $this->firstDayOfLMP  = $firstDayOfLMP ;

        return $this;
    }


    public function getaverageCycleLength()
    {
        return $this->averageCycleLength;
    }


    public function setaverageCycleLength($averageCycleLength)
    {
        $this->averageCycleLength = $averageCycleLength;

        return $this;
    }


    public function getovulationDate()
    {
        return $this->ovulationDate;
    }


    public function setovulationDate($ovulationDate)
    {
        $this->ovulationDate = $ovulationDate;

        return $this;
    }

    public function getCycle()
    {
        return $this->cycle;
    }



   
}
