<?php

namespace ConsoleCards;

use ConsoleCards\Card;

class Deck
{
    protected $cards = array();
    
    public function __construct()
    {
        $this->newDeck();
    }

    public function newDeck()
    {
        // $rank = array(2, 3, 4, 5, 6, 7, 8, 9, 10, 'Jack', 'Queen', 'King', 'Ace');
        
        $suits = array('Clubs', 'Diamonds', 'Hearts', 'Spades');

        foreach ($suits as $suit) {
            foreach (range(1,13) as $rank) {
                $this->addCard(new Card($suit, $rank));
            }
        }
    }

    // no one should be able to add cards. what kind of casino is this?!
    private function addCard(Card $card)
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