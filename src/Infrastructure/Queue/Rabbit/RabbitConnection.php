<?php

namespace App\Infrastructure\Queue\Rabbit;

use PhpAmqpLib\Connection\AMQPStreamConnection;


class RabbitConnection
{
    private static $instance;
    
	public function __construct(private readonly array $configuration) {}

    public function connection(): AMQPStreamConnection {
        if (!self::$instance) {
            self::$instance = new AMQPStreamConnection(
                $this->configuration['host'],
                $this->configuration['port'],
                $this->configuration['login'],
                $this->configuration['password']);                
        }   
        
        if(!self::$instance->isConnected()){
           throw new \Exception('Rabbit mq not connected');
        }

        return self::$instance;
    }
 

}
