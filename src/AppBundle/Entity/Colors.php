<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Colors
 *
 * @ORM\Table(name="colors")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ColorsRepository")
 */
class Colors
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * @var string
     * @ORM\OneToMany(targetEntity="Cars", mappedBy="color")
     */

    private $carColor;


    public function __toString() {
        return $this->name;
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
     * Set name
     *
     * @param string $name
     *
     * @return Colors
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->carColor = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add carColor
     *
     * @param \AppBundle\Entity\Cars $carColor
     *
     * @return Colors
     */
    public function addCarColor(\AppBundle\Entity\Cars $carColor)
    {
        $this->carColor[] = $carColor;

        return $this;
    }

    /**
     * Remove carColor
     *
     * @param \AppBundle\Entity\Cars $carColor
     */
    public function removeCarColor(\AppBundle\Entity\Cars $carColor)
    {
        $this->carColor->removeElement($carColor);
    }

    /**
     * Get carColor
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCarColor()
    {
        return $this->carColor;
    }
}
