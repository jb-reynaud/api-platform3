<?php

namespace App\ApiResource;

use ApiPlatform\Doctrine\Orm\State\Options;
use ApiPlatform\Metadata\ApiResource;
use App\Entity\User;

#[ApiResource(
    shortName: 'User',
    stateOptions: new Options(entityClass: User::class),
)]
class UserApi
{
    public ?int $id = null;

    public ?string $email = null;

    public ?string $username = null;

    public int $flameThrowingDistance = 0;
}
