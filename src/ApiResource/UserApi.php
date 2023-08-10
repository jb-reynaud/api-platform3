<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Doctrine\Orm\State\Options;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use App\Entity\DragonTreasure;
use App\State\UserApiStateProvider;
use App\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ApiResource(
    shortName: 'User',
    paginationItemsPerPage: 5,
    provider: UserApiStateProvider::class,
    stateOptions: new Options(entityClass: User::class),
)]
#[ApiFilter(SearchFilter::class, properties: [
    'username' => 'partial',
])]
class UserApi
{
    #[ApiProperty(identifier: true)]
    public ?int $id;

    public ?string $email = null;

    public ?string $username = null;

    /**
     * @var Collection<int, DragonTreasure>
     */
    public Collection $dragonTreasures;

    public int $flameThrowingDistance = 0;

    public function __construct(int $id = 5)
    {
        $this->id = $id;
        $this->dragonTreasures = new ArrayCollection();
    }
}
