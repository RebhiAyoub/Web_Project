<?php

    class DeliveryDate{
        private string $period;
        private int $length;
        private string $deliveryDate;

        public function __construct(string $period, int $length, string $deliveryDate){
            $this->period = $period;        
            $this->length = $length;
            $this->deliveryDate = $deliveryDate;
        }

        //Period
        public function setPeriod(string $period){
            $this->period = $period;
        }
        public function getPeriod(){
            return $this->period;
        }

        //Length
        public function setLength(int $length){
            $this->length = $length;
        }
        public function getLength(){
            return $this->length;
        }

        //Deliverydate
        public function setDeliveryDate(string $deliveryDate){
            $this->deliveryDate = $deliveryDate;
        }
        public function getDeliveryDate(){
            return $this->deliveryDate;
        }
    }

    class Trimester{
        private string $period;
        private int $length;
        private string $trimester;

        public function __construct(string $period, int $length, string $trimester){
            $this->period = $period;        
            $this->length = $length;
            $this->deliveryDate = $trimester;
        }

        //Period
        public function setPeriod(string $period){
            $this->period = $period;
        }
        public function getPeriod(){
            return $this->period;
        }

        //Length
        public function setLength(int $length){
            $this->length = $length;
        }
        public function getLength(){
            return $this->length;
        }

        //Deliverydate
        public function setTrimester(string $trimester){
            $this->deliveryDate = $trimester;
        }
        public function getTrimester(){
            return $this->trimester;
        }
    }

            





?>