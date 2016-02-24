<?php

namespace Sim\StoryTellerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Story
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Story
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="Protagonist", mappedBy="story")
     * @ORM\Column(name="protagonists", type="array")
     */
    private $protagonists;

    /**
     * @var \Map
     *
     * @ORM\OneToOne(targetEntity="Map",mappedBy="story")
     */
    private $map;

    /**
     * @var \Timeline
     *
     * @ORM\OneToOne(targetEntity="Timeline",mappedBy="story")
     */
    private $timeline;


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
     * Set title
     *
     * @param string $title
     *
     * @return Story
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Story
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
     * Set protagonists
     *
     * @param array $protagonists
     *
     * @return Story
     */
    public function setProtagonists($protagonists)
    {
        $this->protagonists = $protagonists;

        return $this;
    }

    /**
     * Get protagonists
     *
     * @return array
     */
    public function getProtagonists()
    {
        return $this->protagonists;
    }

    /**
     * Set map
     *
     * @param \stdClass $map
     *
     * @return Story
     */
    public function setMap($map)
    {
        $this->map = $map;

        return $this;
    }

    /**
     * Get map
     *
     * @return \stdClass
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * Set timeline
     *
     * @param \stdClass $timeline
     *
     * @return Story
     */
    public function setTimeline($timeline)
    {
        $this->timeline = $timeline;

        return $this;
    }

    /**
     * Get timeline
     *
     * @return \stdClass
     */
    public function getTimeline()
    {
        return $this->timeline;
    }
}
