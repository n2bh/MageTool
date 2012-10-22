<?php

use Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use Symfony\Component\Process\Process;

require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';

/**
 * Console context.
 */
class PharContext extends BehatContext
{
    private $process;

    /**
     * @Given /^I have compiled the mt\.phar$/
     */
    public function iHaveCompiledTheMtPhar()
    {
        $this->process = new Process('./bin/compile');
        if ($this->process->run() != 0) {
            throw new \RuntimeException("Can't compile mt.phar " . $this->process->getOutput());
        }
    }
}