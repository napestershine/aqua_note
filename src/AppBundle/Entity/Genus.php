<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 22/10/16
 * Time: 3:29 PM
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;


/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GenusRepository")
 * @ORM\Table(name="genus")
 */
class Genus
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $speciesCount;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $funFact;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPublished = true;

    /**
     * @ORM\Column(type="date")
     */
    private $firstDiscoveredAt;

    /**
     * @ORM\OneToMany(targetEntity="GenusNote", mappedBy="genus")
     * @ORM\OrderBy({"createdAt" = "DESC"})
     */
    private $notes;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\SubFamily")
     * @ORM\JoinColumn(nullable=false)
     */
    private $subFamily;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSpeciesCount()
    {
        return $this->speciesCount;
    }

    /**
     * @param mixed $speciesCount
     */
    public function setSpeciesCount($speciesCount)
    {
        $this->speciesCount = $speciesCount;
    }

    /**
     * @return mixed
     */
    public function getFunFact()
    {
        return '**TEST** '.$this->funFact;
    }

    /**
     * @param mixed $funFact
     */
    public function setFunFact($funFact)
    {
        $this->funFact = $funFact;
    }

    public function getUpdatedAt()
    {
        return new \DateTime('-' . rand(0, 100) . ' days');
    }

    /**
     * @return mixed
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * @param mixed $isPublished
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;
    }

    public function __construct()
    {
        $this->notes = new ArrayCollection();
    }

    /**
     * @return ArrayCollection|GenusNote[]
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @return SubFamily
     */
    public function getSubFamily()
    {
        return $this->subFamily;
    }
    public function setSubFamily(SubFamily $subFamily)
    {
        $this->subFamily = $subFamily;
    }

    public function getFirstDiscoveredAt()
    {
        return $this->firstDiscoveredAt;
    }

    public function setFirstDiscoveredAt(\DateTime $firstDiscoveredAt = null)
    {
        $this->firstDiscoveredAt = $firstDiscoveredAt;
    }
}