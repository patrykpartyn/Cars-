<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Available
 *
 * @ORM\Table(name="available")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AvailableRepository")
 */
class Available
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
     * @var bool
     *
     * @ORM\Column(name="available",type="string", length=100)
     */
    private $available;


    /**
     * @ORM\OneToMany(targetEntity="Cars",mappedBy="available")
     */

    private $car;

    public function __toString()
    {
        return (string) $this->available;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set available
     *
     * @param string $available
     *
     * @return Available
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return string
     */
    public function getAvailable()
    {
        return $this->available;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->car = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add car
     *
     * @param \AppBundle\Entity\Cars $car
     *
     * @return Available
     */
    public function addCar(\AppBundle\Entity\Cars $car)
    {
        $this->car[] = $car;

        return $this;
    }

    /**
     * Remove car
     *
     * @param \AppBundle\Entity\Cars $car
     */
    public function removeCar(\AppBundle\Entity\Cars $car)
    {
        $this->car->removeElement($car);
    }

    /**
     * Get car
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCar()
    {
        return $this->car;
    }
}
