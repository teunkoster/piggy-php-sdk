<?php

namespace Piggy\Api\Models\Prepaid;

use DateTime;

/**
 * Class CreditBalance
 * @package Piggy\Api\Models
 */
class PrepaidTransaction
{
    /**
     * @var int
     */
    protected $amountInCents;

    /**
     * @var PrepaidBalance
     */
    protected $prepaidBalance;

    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string
     */
    protected $createdAt;

    /**
     * @param int $amountInCents
     * @param PrepaidBalance $prepaidBalance
     * @param string $uuid
     * @param string $createdAt
     */
    public function __construct(int $amountInCents, PrepaidBalance $prepaidBalance, string $uuid, string $createdAt)
    {
        $this->amountInCents = $amountInCents;
        $this->prepaidBalance = $prepaidBalance;
        $this->uuid = $uuid;
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function getAmountInCents(): int
    {
        return $this->amountInCents;
    }

    /**
     * @return PrepaidBalance
     */
    public function getPrepaidBalance(): PrepaidBalance
    {
        return $this->prepaidBalance;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
}