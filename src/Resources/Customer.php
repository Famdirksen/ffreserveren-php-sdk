<?php

namespace Famdirksen\FFReserverenPhpSdk\Resources;

class Customer extends ApiResource
{
    public int $id;

    public string $firstName;

    public string $lastName;

    public string $email;

    public string $phoneNumber;
}
