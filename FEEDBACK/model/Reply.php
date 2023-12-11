<?php

class Reply
{
    private $idReply;
    private $idFeedback;
    private $adminReply;
    private $timestamp;

    public function __construct($idReply, $idFeedback, $adminReply, $timestamp)
    {
        $this->idReply = $idReply;
        $this->idFeedback = $idFeedback;
        $this->adminReply = $adminReply;
        $this->timestamp = $timestamp;
    }

    // Getter for idReply
    public function getIdReply()
    {
        return $this->idReply;
    }

    // Setter for idReply
    public function setIdReply($idReply)
    {
        $this->idReply = $idReply;
    }

    // Getter for idFeedback
    public function getIdFeedback()
    {
        return $this->idFeedback;
    }

    // Setter for idFeedback
    public function setIdFeedback($idFeedback)
    {
        $this->idFeedback = $idFeedback;
    }

    // Getter for adminReply
    public function getAdminReply()
    {
        return $this->adminReply;
    }

    // Setter for adminReply
    public function setAdminReply($adminReply)
    {
        $this->adminReply = $adminReply;
    }

    // Getter for timestamp
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    // Setter for timestamp
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }
}
?>
