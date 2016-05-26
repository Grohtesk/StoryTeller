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
   * @var string
   *
   * @ORM\Column(name="img", type="string", length=255)
   */
  private $img;


}
?>
