<?php

namespace ConsoleCards\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class DealerCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('dealer:deal')
            ->setDescription('Deals n cards to n players from a shuffled deck')
            ->addOption(
                'players',
                null,
                InputOption::VALUE_REQUIRED,
                'How many players?',
                4 // default of 4 players
            );
            ->addOption(
                'cards',
                null,
                InputOption::VALUE_REQUIRED,
                'How many cards should be dealt to each player?',
                7 // default of 7 cards
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $players = $input->getOption('players');
        $cards = $input->getOption('cards');

        $output->writeln($text);
    }

    /**
     * @var \Silex\Application
     */
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;

    }


    public function newDeck()
    {
    
    }
}
