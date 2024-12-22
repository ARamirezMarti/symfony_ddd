<?php

namespace App\Infrastructure\Queue\Rabbit;

use App\Application\EventAsyncBus\EventAsyncBusInterface;
use App\Domain\Event\EventInterface;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMqEventBus implements EventAsyncBusInterface
{
    private AMQPChannel $channel;

    public function __construct(
        private RabbitConnection $rabbitConnection
    ){
        $this->channel = $rabbitConnection->connection()->channel();
    }
    
    /**
     * @param \App\Domain\Event\DomainEvent $event
     * @return void
     */
    public function publish(EventInterface $event): void
    {  
       $exchange = $event->exchange() ?: $event->queue(); 
     
       $queue = $event->queue();

       $this->channel->exchange_declare($exchange, 'direct', false, true, false);
       $this->channel->queue_declare($queue, false, true, false, false);
       
 
       $this->channel->queue_bind($queue, $exchange);
       
       $msgBody = $event->toMessage(); 
       $msg = new AMQPMessage($msgBody, [
           'content_type' => 'application/json',
           'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT, 
       ]);
       
       $this->channel->basic_publish($msg, $exchange);
        
    }

    public function ConsumeQueue(string $queue,callable $callback): void
    {   
        $this->channel->basic_consume(
            $queue,
            '',
            false,  
            false,    
            false, 
            false,    
            $callback
        );
    
        while ($this->channel->is_consuming()) {
            $this->channel->wait();
        }
    }
}
