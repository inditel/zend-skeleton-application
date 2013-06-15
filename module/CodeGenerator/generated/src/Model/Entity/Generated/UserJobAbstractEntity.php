<?php
namespace Model\Entity\Generated;

use \Inditel\Db\Entity\AbstractEntity;

/**
 *
 */
class UserJobAbstractEntity extends AbstractEntity
{

    /**
     * @var int $id
     */
    protected $id = null;

    /**
     * @var int $userId
     */
    protected $userId = null;

    /**
     * @var int $companyId
     */
    protected $companyId = null;

    /**
     * @var string $email
     */
    protected $email = null;

    /**
     * @var string $emailDomain
     */
    protected $emailDomain = null;

    /**
     * @var int $isWorking
     */
    protected $isWorking = null;

    /**
     * @var string $start
     */
    protected $start = null;

    /**
     * @var string $end
     */
    protected $end = null;

    /**
     * @var int $isCompanyManager
     */
    protected $isCompanyManager = null;

    /**
     * @var int $countryId
     */
    protected $countryId = null;

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $companyId
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
    }

    /**
     * @return int
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $emailDomain
     */
    public function setEmailDomain($emailDomain)
    {
        $this->emailDomain = $emailDomain;
    }

    /**
     * @return string
     */
    public function getEmailDomain()
    {
        return $this->emailDomain;
    }

    /**
     * @param int $isWorking
     */
    public function setIsWorking($isWorking)
    {
        $this->isWorking = $isWorking;
    }

    /**
     * @return int
     */
    public function getIsWorking()
    {
        return $this->isWorking;
    }

    /**
     * @param string $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param string $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return string
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param int $isCompanyManager
     */
    public function setIsCompanyManager($isCompanyManager)
    {
        $this->isCompanyManager = $isCompanyManager;
    }

    /**
     * @return int
     */
    public function getIsCompanyManager()
    {
        return $this->isCompanyManager;
    }

    /**
     * @param int $countryId
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;
    }

    /**
     * @return int
     */
    public function getCountryId()
    {
        return $this->countryId;
    }


}
