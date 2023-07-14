<?php

namespace Bellows\Plugins;

use Bellows\PluginSdk\Contracts\Installable;
use Bellows\PluginSdk\Facades\Project;
use Bellows\PluginSdk\Plugin;
use Bellows\PluginSdk\PluginResults\CanBeInstalled;
use Bellows\PluginSdk\PluginResults\InstallationResult;

class Helo extends Plugin implements Installable
{
    use CanBeInstalled;

    public function install(): ?InstallationResult
    {
        return InstallationResult::create()->environmentVariables([
            'MAIL_MAILER'                   => 'smtp',
            'MAIL_HOST'                     => '127.0.0.1',
            'MAIL_PORT'                     => '2525',
            'MAIL_USERNAME'                 => Project::appName(),
            'MAIL_PASSWORD'                 => null,
            'MAIL_ENCRYPTION'               => null,
            'MAIL_FROM_ADDRESS'             => 'hello@' . Project::domain(),
        ]);
    }
}
