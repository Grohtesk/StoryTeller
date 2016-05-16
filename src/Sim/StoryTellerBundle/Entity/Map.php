<?php

namespace Sim\StoryTellerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Map
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Map
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \Story
     *
     * @ORM\OneToOne(targetEntity="Story",inversedBy="map")
     */
    private $story;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="Place", mappedBy="map")
     */
    private $places;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var array
     *
     * @ORM\Column(name="origins", type="array")
     */
    private $origins;

    /**
     * @var array
     *
     * @ORM\Column(name="regions", type="array")
     */
    private $regions;


    /**
     * Get id
     *
     * @return integer
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
     * @return Map
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
     * Set origins
     *
     * @param array $origins
     *
     * @return Map
     */
    public function setOrigins($origins)
    {
        $this->origins = $origins;

        return $this;
    }

    /**
     * Get origins
     *
     * @return array
     */
    public function getOrigins()
    {
        return $this->origins;
    }

    /**
     * Set regions
     *
     * @param array $regions
     *
     * @return Map
     */
    public function setRegions($regions)
    {
        $this->regions = $regions;

        return $this;
    }

    /**
     * Get regions
     *
     * @return array
     */
    public function getRegions()
    {
        return $this->regions;
    }
}
