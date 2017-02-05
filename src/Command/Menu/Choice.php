<?php
namespace BarenoteCli\Command\Menu;

class Choice
{
    /**
     * @var string|null
     */
    private $command;
    /**
     * @var string
     */
    private $option;
    
    public function __construct($command, string $option)
    {
        $this->command = $command;
        $this->option = $option;
    }
    
    /**
     * @return string|null
     */
    public function getCommand()
    {
        return $this->command;
    }
    
    /**
     * @return string
     */
    public function getOption(): string
    {
        return $this->option;
    }
}