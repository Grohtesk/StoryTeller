<?php

namespace Sim\StoryTellerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Place
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Place
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
   * @var \Map
   *
   * @ORM\ManyToOne(targetEntity="Map", inversedBy="places")
   */
  private $map;

  /**
   * @var array
   *
   * @ORM\ManyToMany(targetEntity="Event", mappedBy="places")
   */
  private $events;

  private $name;
  private $description;
  private $img;


}
?>
