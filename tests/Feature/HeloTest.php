<?php

use Bellows\Plugins\Helo;
use Bellows\PluginSdk\Facades\Project;

it('can set the environment variables', function () {
    $result = $this->plugin(Helo::class)->install();

    expect($result->getEnvironmentVariables())->toEqual([
        'MAIL_MAILER'                   => 'smtp',
        'MAIL_HOST'                     => '127.0.0.1',
        'MAIL_PORT'                     => '2525',
        'MAIL_USERNAME'                 => Project::appName(),
        'MAIL_PASSWORD'                 => null,
        'MAIL_ENCRYPTION'               => null,
        'MAIL_FROM_ADDRESS'             => 'hello@' . Project::domain(),
    ]);
});
