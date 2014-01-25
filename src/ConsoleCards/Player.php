<?php

namespace ConsoleCards;

use ConsoleCards\Card;

class Player
{
    protected $id;
    protected $cards = array();
    
    public function __construct()
    {
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function addCard(Card $card)
    {
        $this->cards[] = $card;
    }

    public function getCards()
    {
        return $this->cards;
    }
    
    public function showCards()
    {
        $res = '';
        foreach ($this->cards as $card) {
            $res += $card->getName() + ($card == end($this->cards) ? '' : ', ');
        }
    }
}    