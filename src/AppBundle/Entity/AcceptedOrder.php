<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\FormTypeInterface;
/**
 * AcceptedOrderType
 *
 * @ORM\Table(name="accepted_order")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AcceptedOrderRepository")
 */
class AcceptedOrder
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateOrderAccepted", type="datetime")
     */
    private $dateOrderAccepted;



    /**
     * @var
     * @ORM\Column(name="worker",type="integer")
     */

    private $worker;


    /**
     * @var int
     * @ORM\Column(name="carId", type="integer")
     */

    private $carId;

    /**
     * @var int
     * @ORM\Column(name="userID",type="integer")
     */

    private $userId;


    public function __construct()
    {
        $this->dateOrderAccepted=new \DateTime('now');
    }

    public function __constructb(array $elements = [])
    {        $this->elements = $elements;    }




    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateOrderAccepted.
     *
     * @param \DateTime $dateOrderAccepted
     *
     * @return AcceptedOrder
     */
    public function setDateOrderAccepted($dateOrderAccepted)
    {
        $this->dateOrderAccepted = $dateOrderAccepted;

        return $this;
    }

    /**
     * Get dateOrderAccepted.
     *
     * @return \DateTime
     */
    public function getDateOrderAccepted()
    {
        return $this->dateOrderAccepted;
    }



    /**
     * Set carOrdered.
     *
     * @param int $carOrdered
     *
     * @return AcceptedOrder
     */
    public function setCarOrdered($carOrdered)
    {
        $this->carOrdered = $carOrdered;

        return $this;
    }

    /**
     * Get carOrdered.
     *
     * @return int
     */
    public function getCarOrdered()
    {
        return $this->carOrdered;
    }

    /**
     * Set carId.
     *
     * @param int $carId
     *
     * @return AcceptedOrder
     */
    public function setCarId($carId)
    {
        $this->carId = $carId;

        return $this;
    }

    /**
     * Get carId.
     *
     * @return int
     */
    public function getCarId()
    {
        return $this->carId;
    }

    /**
     * Set userId.
     *
     * @param int $userId
     *
     * @return AcceptedOrder
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId.
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }



    /**
     * Set worker.
     *
     * @param int $worker
     *
     * @return AcceptedOrder
     */
    public function setWorker($worker)
    {
        $this->worker = $worker;

        return $this;
    }

    /**
     * Get worker.
     *
     * @return int
     */
    public function getWorker()
    {
        return $this->worker;
    }
}
