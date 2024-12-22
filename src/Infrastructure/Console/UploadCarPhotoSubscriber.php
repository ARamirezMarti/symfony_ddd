<?php

namespace App\Infrastructure\Console;

use App\Application\EventAsyncBus\EventAsyncBusInterface;
use App\Domain\CommandBus\CommandBusInterface;
use PhpAmqpLib\Message\AMQPMessage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UploadCarPhotoSubscriber extends Command
{
    private string $queue = 'photo_uploaded';
    protected static $defaultName = 'car:upload-images';

    public function __construct(
        private EventAsyncBusInterface $rabbitMq,
        private CommandBusInterface $commandBus
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setDescription('Runs the subscriber for upload car photos queue');            
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("Listening to queue ". $this->queue . "\n");
        
        try {
            $callback = function (AMQPMessage $message) use ($output): void {  
                try {
                    
                    $event = unserialize( $message->body);
                  
                    $this->commandBus->handle($event->body());
                    
                    $output->writeln($event->exchange());
                    
                    $message->ack();
                    $output->writeln("Message acknowledged.");

                } catch (\Throwable $th) {
                    $message->nack(true);
                }          
                
            };
            $this->rabbitMq->ConsumeQueue($this->queue,$callback);

        } catch (\Throwable $th) {

            $output->writeln('Error: ' . $th->getMessage());
            return Command::FAILURE;
        }
        
        return Command::SUCCESS;
    }

}
