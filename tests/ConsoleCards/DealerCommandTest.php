<?php
use ConsoleCards\Command\DealerCommand; 
use Symfony\Component\Console\Application; 
use Symfony\Component\Console\Tester\CommandTester; 

class DealerCommandTest extends \PHPUnit_Framework_TestCase 
{

    public function testNewDeck() { 
        $application = new Application(); 
        $application->add(new DealerCommand()); 

        $command = $application->find('dealer:deal'); 
        
        $commandTester = new CommandTester($command); 
        $commandTester->execute( array(
            'command' => $command->getName(),
            'players' => 4,
            'cards' => 7
        )); 

        // err, might need to research this regex a bit!!
        $this->assertRegExp('/[0-9A-F]{7}/', $commandTester->getDisplay()); 
        
    }
    

}