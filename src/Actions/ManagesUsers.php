<?php

namespace Famdirksen\FFReserverenPhpSdk\Actions;

use Famdirksen\FFReserverenPhpSdk\Resources\User;

trait ManagesUsers
{
    public function me(): User
    {
        $userAttributes = $this->get('me');

        return new User($userAttributes, $this);
    }
}
