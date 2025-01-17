<?php

namespace Piggy\Api\Models\Automations;

use DateTime;

/**
 * Class Shop
 * @package Piggy\Api\Models\Shops
 */
class Automation
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $event;

    /**
     * @var DateTime
     */
    protected $createdAt;

    /**
     * @var DateTime
     */
    protected $updatedAt;

    /**
     * @param string $name
     * @param string $status
     * @param string $event
     * @param DateTime $createdAt
     * @param DateTime $updatedAt
     */
    public function __construct(string $name, string $status, string $event, DateTime $createdAt, DateTime $updatedAt)
    {
        $this->name = $name;
        $this->status = $status;
        $this->event = $event;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getEvent(): string
    {
        return $this->event;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }
}
