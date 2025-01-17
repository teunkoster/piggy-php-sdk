<?php

namespace Piggy\Api\Resources\OAuth\Giftcards\Program;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Giftcards\GiftcardProgramsMapper;
use Piggy\Api\Resources\BaseResource;

/**
 * Class GiftcardProgramResource
 * @package Piggy\Api\Resources\OAuth
 */
class GiftcardProgramsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/giftcard-programs";

    /**
     * @return array
     * @throws PiggyRequestException
     */
    public function list(): array
    {
        $response = $this->client->get($this->resourceUri);

        $mapper = new GiftcardProgramsMapper();

        return $mapper->map($response->getData());
    }
}