<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 *
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;



    /**
     *
     *
     * @ORM\Column(name="DateOfBirth", type="date")
     *
     */
    protected $dateOfBirth;

    /**
     * @var string
     *
     * @ORM\Column(name="City", type="string", length=50)
     */
    protected $city;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="user")
     */
    protected $comments;


    /**
     * @var
     * @ORM\OneToMany(targetEntity="Orders", mappedBy="user")
     */
    private $orderUser;


// getters and setters
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
     * @return User
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
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set dateOfBirth
     *
     * @param \Date $dateOfBirth
     *
     * @return User
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \Date
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    public function __construct()
    {
        parent::__construct ();
    }



    /**
     * Add comment
     *
     * @param \AppBundle\Entity\Comment $comment
     *
     * @return User
     */
    public function addComment(\AppBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \AppBundle\Entity\Comment $comment
     */
    public function removeComment(\AppBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }


    /**
     * Add orderUser.
     *
     * @param \AppBundle\Entity\Orders $orderUser
     *
     * @return User
     */
    public function addOrderUser(\AppBundle\Entity\Orders $orderUser)
    {
        $this->orderUser[] = $orderUser;

        return $this;
    }

    /**
     * Remove orderUser.
     *
     * @param \AppBundle\Entity\Orders $orderUser
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeOrderUser(\AppBundle\Entity\Orders $orderUser)
    {
        return $this->orderUser->removeElement($orderUser);
    }

    /**
     * Get orderUser.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrderUser()
    {
        return $this->orderUser;
    }

    /**
     * Set user.
     *
     * @param \AppBundle\Entity\AcceptedOrder|null $user
     *
     * @return User
     */
    public function setUser(\AppBundle\Entity\AcceptedOrder $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \AppBundle\Entity\AcceptedOrder|null
     */
    public function getUser()
    {
        return $this->user;
    }
}
