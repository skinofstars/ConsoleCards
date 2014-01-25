<?php 

use ConsoleCards\Dealer;

class DealerUnitTest extends \PHPUnit_Framework_TestCase 
{
    protected $dealer;

    public function _construct() {
        $this->dealer = new Dealer;
    }

    public function testNewDeck() { 
        
        $deck = $this->dealer->newDeck();
        
        // deck exists
        $this->assertNotNull($deck);
        
        // deck has 52 cards
        $this->assertEquals(52, count($deck->getCards());
        
        // deck has 13 of each suit
        $suitCount = array();
        foreach ($deck->getCards() as $card) {
            $suitCount[$card->getSuit()]++;
        }
        $this->assertEquals(13, count($suitCount['Heart']));
        $this->assertEquals(13, count($suitCount['Club']));
        $this->assertEquals(13, count($suitCount['Diamond']));
        $this->assertEquals(13, count($suitCount['Spade']));
        
        // deck has 4 of each rank
        //$ranks = array_merge(array("J", "Q", "K", "A"), range(2,10));
        
        foreach ($deck->getCards() as $card) {
            $rankCount[$card->getRank()]++;
        }
        
        foreach ($rankCount as $rank) {
            $this->assertEquals(4, count($rank));
        }
    }
    
    public function testShuffledDeck {
        // deck has no 2 sequential ids ... questionable randomness
        $deck = $this->dealer->newDeck();
        $deck = $this->dealer->shuffleDeck();
        
        $isSequential = false;
        for ($i=0;$i<52;$i++) {
            $thisCard = $deck->getCard(array('position'=>$i));
            $nextCard = $deck->getCard(array('position'=>$i+1));
            
            // this might be nicer using an interface like:
            //    $deck->dealCard() and $deck->nextCard()
            
            // if cards had managed IDs, i could just check that's not sequential
            // also, not sure if anyone cares about King -> Ace -> 2
            
            if ($thisCard->getSuit() == $nextCard->getSuit()) {
                if ($thisCard->getRank() == $nextCard->getRank()-1 || $thisCard->getRank() == $nextCard->getRank()+1) {
                    $isSequential = true;
                }
            }
        }
        
        $this->assertNotTrue($isSequential);
        
    }
    
    public function testPlayerCount {
        // there are 4 players
        $this->dealer->setPlayers(4);
        $this->assertEquals(4, count($this->dealer->getPlayers()));
    }
    
    public function testDeal {
        $this->dealer->newDeck();
        $this->dealer->shuffleDeck();
        $this->dealer->setPlayers(4);
    
        $this->dealer->deal(7);
        
        // each player has 7 cards
        foreach ($this->dealer->players() as $player) {
            $this->assertEquals(7, count($player->getCards());
        }
        
        // deck has 26 cards
        $this->assertEquals(26, count($this->dealer->getCards()));
        
    }

}