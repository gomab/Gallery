<?php

namespace App\Command;

use App\Entity\Image;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
//use Symfony\Component\Console\Style\SymfonyStyle;
//use Symfony\Component\Console\Input\InputOption;
//use Symfony\Component\Console\Input\InputArgument;

class SetupImagesCommand extends Command
{
    protected static $defaultName = 'app:setupImagesCommand';

    private $projectDir;

    private $em;

    public function __construct(?string $projectDir, EntityManager $em)
    {
        parent::__construct($projectDir);
        $this->projectDir = $projectDir;
        $this->em = $em;

    }

    protected function configure()
    {
        $this
            ->setDescription('Grabs all the local wallpaper da creates entity for each one ')
            //->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            //->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $images = glob($this->projectDir . '/public/images/*.*');

        //exit(\Doctrine\Common\Util\Debug::dump($images));

        foreach ($images as $image){
            $img = new Image();
            $img->setFilename($image);
            $img->setSlug($image);
            $img->setHeight(1080);
            $img->setWidth(1920);
                //->setHeight(108)
                ;

            //$this->em->persist($img);
            $this->em->persist($img);
        }
        $this->em->flush();

        $output->writeln('Gomab command result');
        /**
         * $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
        $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
        // ...
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');
         */
    }
}
