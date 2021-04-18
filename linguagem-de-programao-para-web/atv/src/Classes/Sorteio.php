<?php

namespace Atv\Classes;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * @ORM\Entity
 * @ORM\Table(name="sorteios")
 */
class Sorteio
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue
   * @var integer
   */
  protected $id;

  /**
   * @ORM\Column(type="string")
   * @var integer
   */
  protected $valores;

  /**
   * @ORM\Column(type="datetime")
   * @var DateTime
   */
  protected $data;

  /**
   * Get the value of valores
   *
   * @return  integer
   */
  public function getValores()
  {
    return $this->valores;
  }

  /**
   * Set the value of valores
   *
   * @param  integer  $valores
   *
   * @return  self
   */
  public function setValores($valores)
  {
    $this->valores = $valores;

    return $this;
  }

  /**
   * Get the value of data
   *
   * @return  DateTime
   */
  public function getData(): DateTime
  {
    return $this->data;
  }

  /**
   * Set the value of data
   *
   * @param  DateTime  $data
   *
   * @return  self
   */
  public function setData(DateTime $data)
  {
    $this->data = $data;

    return $this;
  }

  /**
   * Get the value of id
   *
   * @return  integer
   */
  public function getId()
  {
    return $this->id;
  }
}
