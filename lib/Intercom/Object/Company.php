<?php

namespace Intercom\Object;

use \Datetime;

use Intercom\Request\FormatableInterface,
    Intercom\Exception\UserException;

/**
 * This class represents an Intercom User Object
 *
 * @link Api : http://doc.intercom.io/api/#users
 */
class Company implements FormatableInterface
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $id;

    /**
     * @var int
     */
    private $createdAt;

    /**
     * @var int
     */
    private $remoteCreatedAt;

    /**
     * @var int
     */
    private $updatedAt;

    /**
     * @var string
     */
    private $companyId;

    /**
     * @var string
     */
    private $name;
    /**
     * @var array
     */
    private $customAttributes;

    /**
     * @var int
     */
    private $sessionCount;

    /**
     * @var float
     */
    private $monthlySpend;

    /**
     * @var int
     */
    private $userCount;

    /**
     * @var string
     */
    private $planId;

    /**
     * @param null $id
     * @param null $companyId
     *
     * @throws \Intercom\Exception\UserException
     * @internal param int $userId
     * @internal param string $email
     */
    public function __construct($id = null, $companyId = null)
    {
        if (null === $id && null === $companyId) {
            throw new UserException("Id or companyId must be defined.");
        }

        $this->id               = $id;
        $this->companyId        = $companyId;
        $this->createdAt        = time();
        $this->customAttributes = [];
    }

    /**
     * {@inheritdoc}
     */
    public function format()
    {
        return [
            // 'type'                      => $this->type,
            // 'id'                        => $this->id,
            // 'created_at'                => $this->createdAt,
            // 'remote_created_at'         => $this->remoteCreatedAt,
            // 'updated_at'                => $this->updatedAt,
            'company_id'                => $this->companyId,
            'name'                      => $this->name,
            'custom_attributes'         => $this->customAttributes,
            // 'session_count'             => $this->sessionCount,
            'monthly_spend'             => $this->monthlySpend,
            'user_count'                => $this->userCount
        ];
    }

    /**
     * Set IntercomId
     *
     * @param $type
     *
     * @internal param string $intercomId
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get IntercomId
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set UserId
     *
     * @param $id
     *
     * @internal param int $userId
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = (int) $id;

        return $this;
    }

    /**
     * Get UserId
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set remote Created At
     *
     * @param $remoteCreatedAt
     *
     * @internal param $createdAt
     *
     * @internal param int $email
     *
     * @return $this
     */
    public function setRemoteCreatedAt($remoteCreatedAt)
    {
        $this->remoteCreatedAt = (int) $remoteCreatedAt;

        return $this;
    }

    /**
     * Get remote Created At
     *
     * @return int
     */
    public function getRemoteCreatedAt()
    {
        return $this->remoteCreatedAt;
    }


    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = (int) $updatedAt;

        return $this;
    }

    /**
     * Get remote updated At
     *
     * @return int
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }


    /**
     * Set Name
     *
     * @param  string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set CreatedAt
     *
     * @param  string $createdAt
     *
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get CreatedAt
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set LastSeenIp
     *
     * @param  string $lastSeenIp
     *
     * @return $this
     */
    public function setLastSeenIp($lastSeenIp)
    {
        $this->lastSeenIp = $lastSeenIp;

        return $this;
    }

    /**
     * Get LastSeenIp
     *
     * @return string
     */
    public function getLastSeenIp()
    {
        return $this->lastSeenIp;
    }

    /**
     * Set CustomAttributes
     *
     * @param  array $customAttributes
     *
     * @return $this
     */
    public function setCustomAttributes(array $customAttributes)
    {
        $this->customAttributes = $customAttributes;

        return $this;
    }

    /**
     * Get CustomAttributes
     *
     * @return array
     */
    public function getCustomAttributes($property = null)
    {
        return null !== $property && isset($this->customAttributes[$property]) ? $this->customAttributes[$property] : $this->customAttributes;
    }

    /**
     * Add a property in customAttributes
     *
     * @param string $property
     * @param string $value
     *
     * @return $this
     */
    public function addCustomAttributes($property, $value)
    {
        $this->customAttributes[$property] = $value;

        return $this;
    }

    /**
     * Has a gievn property in customAttributes
     *
     * @param  string  $property
     *
     * @return boolean
     */
    public function hasCustomAttributes($property)
    {
        return isset($this->customAttributes[$property]);
    }

    /**
     * Set monthlySpend
     *
     * @param float $monthlySpend
     *
     * @internal param string $lastSeenUserAgent
     *
     * @return $this
     */
    public function setMonthlySpend($monthlySpend)
    {
        $this->monthlySpend = (float) $monthlySpend;

        return $this;
    }

    /**
     * Get LastSeenUserAgent
     *
     * @return string
     */
    public function getMonthlySpend()
    {
        return $this->monthlySpend;
    }

    /**
     * Set userCount
     *
     * @param $userCount
     *
     * @internal param int $lastRequestAt
     *
     * @return $this
     */
    public function setUserCount($userCount)
    {
        $this->userCount = (int) $userCount;

        return $this;
    }

    /**
     * Get userCount
     *
     * @return int
     */
    public function getUserCount()
    {
        return $this->userCount;
    }

    /**
     * Set planId
     *
     * @param string $planId
     *
     * @return $this
     */
    public function setPlanId($planId)
    {
        D(["plain_id", $planId]);
        $this->planId = $planId;

        return $this;
    }

    /**
     * Get UnsubscribedFromEmails
     *
     * @return string
     */
    public function getPlanId()
    {
        return $this->planId;
    }

    /**
     * Set SessionCount
     *
     * @param  integer $sessionCount
     *
     * @return $this
     */
    public function setSessionCount($sessionCount)
    {
        $this->sessionCount = $sessionCount;

        return $this;
    }

    /**
     * Get SessionCount
     *
     * @return integer
     */
    public function getSessionCount()
    {
        return $this->sessionCount;
    }

}
