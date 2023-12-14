<?php
	class Product{
		private $idProduit=null;
		private $Product_name=null;
		private $Descriptionn=null;
		private $Product_price=null;
		private $Availabilityy=null;
		private $img=null;
		private $creationDate=null;
		private $categ;

		

		//// Contructor
		function __construct($Product_name,$Descriptionn,$Product_price,$Availabilityy,$img,$categ,int $id = null){
			$this->idProduit=$id;
			$this->Product_name=$Product_name;
			$this->Descriptionn=$Descriptionn;
			$this->Product_price=$Product_price;
			$this->Availabilityy=$Availabilityy;
			$this->img=$img;
			 $this->categ=$categ; 
		}

        /// Getters
		function getidProduit(){
			return $this->idProduit;
		}

		function getProduct_name(){
			return $this->Product_name;
		}
		function getCateg(){
			return $this->categ;
		}
		function getDescriptionn(){
			return $this->Descriptionn;
		}
		function getProduct_price(){
			return $this->Product_price;
		}
		function getAvailabilityy(){
			return $this->Availabilityy;
		}
		function getimg(){
			return $this->img;
		}
		

       //// Setters
		function setProduct_name(string $Product_name){
			$this->Product_name=$Product_name;
		}
		function setCateg(int $categ){
			$this->categ=$categ;
		}
		function setDescriptionn(string $Descriptionn){
			$this->Descriptionn=$Descriptionn;
		}
		function setProduct_price(int $Product_price){
			$this->Product_price=$Product_price;
		}
		function setAvailabilityy(string $Availabilityy){
			$this->Availabilityy=$Availabilityy;
		}
		function setimg(string $img){
			$this->img=$img;
		}

	}
?>