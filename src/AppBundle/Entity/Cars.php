<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;



/**
 * Cars
 *
 * @ORM\Table(name="cars")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarsRepository")
 */
/**
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Cars
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
     * @ORM\Column(name="Brand", type="string", length=50)
     */
    public $brand;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text")
     */
    private $description;


    /**
     * @var int
     * @ORM\Column(name="maxSpeed",type="integer")
     */

    private $maxSpeed;

    /**
     * @var float
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="car")
     */

    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity="Available",inversedBy="car")
     */

    private $available;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Colors",inversedBy="carColor")
     */

    private $color;

    /**
     * @ORM\ManyToOne(targetEntity="Area", inversedBy="car")
     */
    private $area;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="car")
     */
    private $category;







    public function __toString() {
        return $this->brand;
    }

    /**
     * @var
     * @ORM\OneToMany(targetEntity="Orders", mappedBy="carOrder")
     */

    private $orderCar;


/// setters and getteerss

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
     * Set brand
     *
     * @param string $brand
     *
     * @return Cars
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Cars
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add comment
     *
     * @param \AppBundle\Entity\Comment $comment
     *
     * @return Cars
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
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Cars
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set color
     *
     * @param \AppBundle\Entity\Colors $color
     *
     * @return Cars
     */
    public function setColor(\AppBundle\Entity\Colors $color = null)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return \AppBundle\Entity\Colors
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set maxSpeed
     *
     * @param integer $maxSpeed
     *
     * @return Cars
     */
    public function setMaxSpeed($maxSpeed)
    {
        $this->maxSpeed = $maxSpeed;

        return $this;
    }

    /**
     * Get maxSpeed
     *
     * @return integer
     */
    public function getMaxSpeed()
    {
        return $this->maxSpeed;
    }

    /**
     * Set area
     *
     * @param \AppBundle\Entity\Area $area
     *
     * @return Cars
     */
    public function setArea(\AppBundle\Entity\Area $area = null)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return \AppBundle\Entity\Area
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set available
     *
     * @param \AppBundle\Entity\Available $available
     *
     * @return Cars
     */
    public function setAvailable(\AppBundle\Entity\Available $available = null)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return \AppBundle\Entity\Available
     */
    public function getAvailable()
    {
        return $this->available;
    }

    // ZDJECIA /////////////////////////
    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime $updatedAt
     *
     * @return Cars
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

//    /**
//     * Get updatedAt.
//     *
//     * @return \DateTime
//     */
//    public function getUpdatedAt()
//    {
//        return $this->updatedAt;
//    }
//
//    /**
//     * Set user.
//     *
//     * @param \AppBundle\Entity\User|null $user
//     *
//     * @return Cars
//     */
//    public function setUser(\AppBundle\Entity\User $user = null)
//    {
//        $this->user = $user;
//
//        return $this;
//    }
//
//    /**
//     * Get user.
//     *
//     * @return \AppBundle\Entity\User|null
//     */
//    public function getUser()
//    {
//        return $this->user;
//    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set orderCar.
     *
     * @param \AppBundle\Entity\Orders|null $orderCar
     *
     * @return Cars
     */
    public function setOrderCar(\AppBundle\Entity\Orders $orderCar = null)
    {
        $this->orderCar = $orderCar;

        return $this;
    }

    /**
     * Get orderCar.
     *
     * @return \AppBundle\Entity\Orders|null
     */
    public function getOrderCar()
    {
        return $this->orderCar;
    }

    /**
     * Set price.
     *
     * @param float $price
     *
     * @return Cars
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price.
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Add orderCar.
     *
     * @param \AppBundle\Entity\Orders $orderCar
     *
     * @return Cars
     */
    public function addOrderCar(\AppBundle\Entity\Orders $orderCar)
    {
        $this->orderCar[] = $orderCar;

        return $this;
    }

    /**
     * Remove orderCar.
     *
     * @param \AppBundle\Entity\Orders $orderCar
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeOrderCar(\AppBundle\Entity\Orders $orderCar)
    {
        return $this->orderCar->removeElement($orderCar);
    }
}
