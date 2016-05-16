<?php

namespace Sim\StoryTellerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Event
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
   * @var array
   *
   * @ORM\ManyToMany(targetEntity="Protagonist",inversedBy="events")
   * @ORM\JoinTable(name="events_protagonist")
   */
   private $protagonists;

   /**
    * @var array
    *
    * @ORM\ManyToMany(targetEntity="Place",inversedBy="events")
    * @ORM\JoinTable(name="events_places")
    */
    private $places;

  /**
   * @var string
   *
   * @ORM\Column(name="name", type="string", length=255)
   */
  private $name;

  /**
   * @var string
   *
   * @ORM\Column(name="description", type="text")
   */
  private $description;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getProtagonists()
    {
        return $this->protagonists;
    }

    /**
     * @param array $protagonists
     */
    public function setProtagonists($protagonists)
    {
        $this->protagonists = $protagonists;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}
?>
