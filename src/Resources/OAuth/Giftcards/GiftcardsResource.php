<?php

namespace Piggy\Api\Resources\OAuth\Giftcards;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Giftcards\GiftcardMapper;
use Piggy\Api\Models\Giftcards\Giftcard;
use Piggy\Api\Resources\BaseResource;

/**
 * Class GiftcardsResource
 * @package Piggy\Api\Resources\OAuth\Giftcards
 */
class GiftcardsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/giftcards";

    /**
     * @param string $hash
     *
     * @return Giftcard
     * @throws PiggyRequestException
     */
    public function findOneBy(string $hash): Giftcard
    {
        $response = $this->client->get("$this->resourceUri/find-one-by", [
            "hash" => $hash,
        ]);

        $mapper = new GiftcardMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $giftcardProgramUuide
     * @param int $type
     *
     * @return Giftcard
     * @throws PiggyRequestException
     */
    public function create(string $giftcardProgramUuid, int $type): Giftcard
    {
        $response = $this->client->post($this->resourceUri, [
            "giftcard_program_uuid" => $giftcardProgramUuid,
            "type" => $type
        ]);

        $mapper = new GiftcardMapper();

        return $mapper->map($response->getData());
    }

}
