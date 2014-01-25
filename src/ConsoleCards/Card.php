<?php

namespace ConsoleCards;

class Card
{
    protected $id;
    protected $suit; 
    protected $rank; // 1..13
    protected $name; // suit + rank

    public function __construct($suit, $rank)
    {
        $this->setSuit($suit);
        $this->setRank($rank);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setSuit($suit)
    {
        $this->suit = $suit;
    }

    public function getSuit()
    {
        return $this->suit;
    }

    public function setRank($rank)
    {
        $this->rank = $rank;
    }

    public function getRank()
    {
        return $this->rank;
    }

    public function getName()
    {
        return $this->suit + $this->rank;
    }

}    