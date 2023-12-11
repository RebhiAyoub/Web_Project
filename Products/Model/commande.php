<?php

class Commande
{
    private ?int $idCommande = null;
    private ?int $quantite = null;
    private ?DateTime $dateCommande = null;
    private ?string $status = null;
    private ?int $amount = null;
    private ?int $idProduit = null;
    

    public function __construct(?int $id = null, ?int $quantite, ?string $status, ?int $amount, ?int $idProduit)
    {
        $this->idCommande = $id;
        $this->quantite = $quantite;
        $this->status = $status;
        $this->amount = $amount;
        $this->idProduit = $idProduit;
    }
    
    

    /**
     * Get the value of idClient
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }

    /**
     * Get the value of lastName
     */
    public function getQuantite()
    {
        return $this->quantite;
    }
    public function getAmount()
    {
        return $this->amount;
    }
    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setQuantite($quantite)
    {
        $this->quantite= $quantite;

        return $this;
    }
    public function setAmount($amount)
    {
        $this->amount= $amount;

        return $this;
    }

    /**
     * Get the value of dob
     */
    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setDateCommande($dateCommande)
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
    public function getIdProduit()
    {
        return $this->idProduit;
    }
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;

        return $this;
    }







}
