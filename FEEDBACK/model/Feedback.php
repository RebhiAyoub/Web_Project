<?php

class Feedback {
    // Properties
    private $idFeedback;
    private $idUser;
    private $rating;
    private $comment;
    private $categoryID;
    private $timestamp_column;

    // Constructor
    public function __construct($idFeedback, $idUser, $rating, $comment, $categoryID, $timestamp_column) {
        $this->idFeedback = $idFeedback;
        $this->idUser = $idUser;
        $this->rating = $rating;
        $this->comment = $comment;
        $this->categoryID = $categoryID;
        $this->timestamp_column = $timestamp_column;
    }

    // Getters
    public function getIdFeedback() {
        return $this->idFeedback;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function getRating() {
        return $this->rating;
    }

    public function getComment() {
        return $this->comment;
    }

    public function getCategoryID() {
        return $this->categoryID;
    }

    public function getTimestampColumn() {
        return $this->timestamp_column;
    }

    // Setters
    public function setIdFeedback($idFeedback) {
        $this->idFeedback = $idFeedback;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function setRating($rating) {
        $this->rating = $rating;
    }

    public function setComment($comment) {
        $this->comment = $comment;
    }

    public function setCategoryID($categoryID) {
        $this->categoryID = $categoryID;
    }

    public function setTimestampColumn($timestamp_column) {
        $this->timestamp_column = $timestamp_column;
    }
}
?>
