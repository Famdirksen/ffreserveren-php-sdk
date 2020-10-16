<?php

namespace Famdirksen\FFReserverenPhpSdk\Resources;

class User extends ApiResource
{
    public int $id;

    public string $name;

    public string $email;

    /** @var Team[] */
    public array $teams;

    public function __construct(array $attributes, $ohDear = null)
    {
        parent::__construct($attributes, $ohDear);

        $this->teams = array_map(function (array $teamAttributes) {
            return new Team($teamAttributes);
        }, $this->teams);
    }
}
