<?php
namespace Springjk\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ServersCommand extends Base
{
    protected function configure()
    {
        $this
            ->setName('servers')
            ->setDescription('Displays all vpn servers');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $servers = $this->system->getServers();

        if (empty($servers)) {
            throw new \Exception('vpn server not found');
        }
        $this->showTable($servers, $output);

        return $servers;
    }
}