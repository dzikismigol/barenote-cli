<?php
namespace BarenoteCli;

use Barenote\BarenoteClient;
use Symfony\Component\Console\Application;

class BarenoteApplication extends Application
{
    /**
     * @var BarenoteClient
     */
    protected $client;
    
    public function __construct($name = 'UNKNOWN', $version = 'UNKNOWN', $host = 'http://localhost:8080')
    {
        parent::__construct($name, $version);
        $this->client = new BarenoteClient($host);
    }
    
    /**
     * @return BarenoteClient
     */
    public function getClient()
    {
        return $this->client;
    }
}