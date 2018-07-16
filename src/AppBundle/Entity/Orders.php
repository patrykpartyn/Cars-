<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrdersRepository")
 */
class Orders
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
     * @ORM\Column(name="dateOrder", type="datetime")
     */
    private $dateOrder;

    ////////////////////////// mapping

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Cars", inversedBy="orderCar")
     */

    private $carOrder;


    /**
     * @var
     * @ORM\ManyToOne(targetEntity="User", inversedBy="orderUser")
     */

    private $user;




    //////////////getters and setteers
      public function __toString() {
           return (string) $this->user;
       }
    public function __construct()
    {
        $this->dateOrder=new \DateTime('now');
    }

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
     * Set dateOrder.
     *
     * @param \DateTime $dateOrder
     *
     * @return Orders
     */
    public function setDateOrder($dateOrder)
    {
        $this->dateOrder = $dateOrder;

        return $this;
    }

    /**
     * Get dateOrder.
     *
     * @return \DateTime
     */
    public function getDateOrder()
    {
        return $this->dateOrder;
    }

    /**
     * Set car.
     *
     * @param \AppBundle\Entity\Cars|null $car
     *
     * @return Orders
     */
    public function setCar(\AppBundle\Entity\Cars $car = null)
    {
        $this->car = $car;

        return $this;
    }

    /**
     * Get car.
     *
     * @return \AppBundle\Entity\Cars|null
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * Set user.
     *
     * @param \AppBundle\Entity\User|null $user
     *
     * @return Orders
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \AppBundle\Entity\User|null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set carOrder.
     *
     * @param \AppBundle\Entity\Cars|null $carOrder
     *
     * @return Orders
     */
    public function setCarOrder(\AppBundle\Entity\Cars $carOrder = null)
    {
        $this->carOrder = $carOrder;

        return $this;
    }

    /**
     * Get carOrder.
     *
     * @return \AppBundle\Entity\Cars|null
     */
    public function getCarOrder()
    {
        return $this->carOrder;
    }

    /**
     * Set order.
     *
     * @param \AppBundle\Entity\AcceptedOrder|null $order
     *
     * @return Orders
     */
    public function setOrder(\AppBundle\Entity\AcceptedOrder $order = null)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order.
     *
     * @return \AppBundle\Entity\AcceptedOrder|null
     */
    public function getOrder()
    {
        return $this->order;
    }
}
