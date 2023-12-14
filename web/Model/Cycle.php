<?php
class Cycle
{
    private ?int $idUser = null;
    private ?string $currentPeriodDate = null;
    private ?string $previousPeriodDate= null;
    private ?int $menstrualCycleLength= null;
    

    public function __construct($idUser= null, $currentPeriodDate, $previousPeriodDate, $menstrualCycleLength)
    {
        $this->idUser = $idUser;
        $this->currentPeriodDate = $currentPeriodDate;
        $this->previousPeriodDate= $previousPeriodDate;
        $this->menstrualCycleLength = $menstrualCycleLength;
      
    }
//This class is designed to encapsulate and manage information about a menstrual cycle for a user. 

    public function getidUser()
    {
        return $this->idUser;
    }


    public function getcurrentPeriodDate()//scanf to the db
    {
        return $this->currentPeriodDate;
    }


    public function setcurrentPeriodDate ($currentPeriodDate )//write the current..in db
    {
        $this->currentPeriodDate  = $currentPeriodDate ;

        return $this;
    }


    public function getpreviousPeriodDate()
    {
        return $this->previousPeriodDate;
    }


    public function setpreviousPeriodDate($previousPeriodDate)
    {
        $this->previousPeriodDate = $previousPeriodDate;

        return $this;
    }


    public function getmenstrualCycleLength()
    {
        return $this->menstrualCycleLength;
    }


    public function setmenstrualCycleLength($menstrualCycleLength)
    {
        $this->menstrualCycleLength = $menstrualCycleLength;

        return $this;
    }


   
}
