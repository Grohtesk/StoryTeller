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
   private $protagonists

  /**
   * @var string
   *
   * @ORM\Column(name="LastName", type="string", length=255)
   */
  private $name;

  /**
   * @var string
   *
   * @ORM\Column(name="description", type="text")
   */
  private $description;

}
?>
