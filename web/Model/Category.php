<?php
class Category {
    private $categoryID;
    private $nameCategory;

    // Constructor
    public function __construct($categoryID, $nameCategory) {
        $this->categoryID = $categoryID;
        $this->nameCategory = $nameCategory;
    }

    // Getter for CategoryID
    public function getCategoryID() {
        return $this->categoryID;
    }

    // Setter for CategoryID
    public function setCategoryID($categoryID) {
        $this->categoryID = $categoryID;
    }

    // Getter for nameCategory
    public function getNameCategory() {
        return $this->nameCategory;
    }

    // Setter for nameCategory
    public function setNameCategory($nameCategory) {
        $this->nameCategory = $nameCategory;
    }
}
?>