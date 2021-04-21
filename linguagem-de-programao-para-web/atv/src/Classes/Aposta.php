<?php

namespace Atv\Classes;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * @ORM\Entity
 * @ORM\Table(name="apostas")
 */
class Aposta
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue
   * @var integer
   */
  protected $id;

  /**
   * @ORM\ManyToOne(targetEntity="Atv\Classes\Apostador", inversedBy="apostas")
   * @var Apostador
   */
  protected $apostador;

  /**
   * @ORM\Column(type="integer")
   * @var integer
   */
  protected $tipoDeAposta;

  /**
   * @ORM\Column(type="integer")
   * @var integer
   */
  protected $tipoDeJogo = 0;

  /**
   * @ORM\Column(type="integer", options={"default" : 0})
   * @var integer
   */
  protected $numeroDaSorte1 = 0;

  /**
   * @ORM\Column(type="integer", options={"default" : 0})
   * @var integer
   */
  protected $numeroDaSorte2 = 0;

  /**
   * @ORM\Column(type="integer", options={"default" : 0})
   * @var integer
   */
  protected $bicho = 0;

  /**
   * @ORM\Column(type="float")
   * @var float
   */
  protected $valor;

  /**
   * @ORM\Column(type="datetime")
   * @var DateTime
   */
  protected $data;

  /**
   * Get the value of id
   *
   * @return  integer
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get the value of apostador
   *
   * @return  Apostador
   */
  public function getApostador()
  {
    return $this->apostador;
  }

  /**
   * Set the value of apostador
   *
   * @param  Apostador  $apostador
   *
   * @return  self
   */
  public function setApostador(Apostador $apostador)
  {
    $this->apostador = $apostador;

    return $this;
  }

  /**
   * Get the value of tipoDeJogo
   *
   * @return  integer
   */
  public function getTipoDeJogo()
  {
    return $this->tipoDeJogo;
  }

  /**
   * Set the value of tipoDeJogo
   *
   * @param  integer  $tipoDeJogo
   *
   * @return  self
   */
  public function setTipoDeJogo($tipoDeJogo)
  {
    $this->tipoDeJogo = $tipoDeJogo;

    return $this;
  }

  /**
   * Get the value of bicho
   *
   * @return  integer
   */
  public function getBicho()
  {
    return $this->bicho;
  }

  /**
   * Set the value of bicho
   *
   * @param  integer  $bicho
   *
   * @return  self
   */
  public function setBicho($bicho)
  {
    $this->bicho = $bicho;

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
   * Get the value of tipoDeAposta
   *
   * @return  integer
   */
  public function getTipoDeAposta()
  {
    return $this->tipoDeAposta;
  }

  /**
   * Set the value of tipoDeAposta
   *
   * @param  integer  $tipoDeAposta
   *
   * @return  self
   */
  public function setTipoDeAposta($tipoDeAposta)
  {
    $this->tipoDeAposta = $tipoDeAposta;

    return $this;
  }

  /**
   * Get the value of valor
   *
   * @return  double
   */
  public function getValor()
  {
    return $this->valor;
  }

  /**
   * Set the value of valor
   *
   * @param  float  $valor
   *
   * @return  self
   */
  public function setValor(float $valor)
  {
    $this->valor = $valor;

    return $this;
  }

  /**
   * Get the value of numeroDaSorte1
   *
   * @return  integer
   */
  public function getNumeroDaSorte1()
  {
    return $this->numeroDaSorte1;
  }

  /**
   * Set the value of numeroDaSorte1
   *
   * @param  integer  $numeroDaSorte1
   *
   * @return  self
   */
  public function setNumeroDaSorte1($numeroDaSorte1)
  {
    $this->numeroDaSorte1 = $numeroDaSorte1;

    return $this;
  }

  /**
   * Get the value of numeroDaSorte2
   *
   * @return  integer
   */
  public function getNumeroDaSorte2()
  {
    return $this->numeroDaSorte2;
  }

  /**
   * Set the value of numeroDaSorte2
   *
   * @param  integer  $numeroDaSorte2
   *
   * @return  self
   */
  public function setNumeroDaSorte2($numeroDaSorte2)
  {
    $this->numeroDaSorte2 = $numeroDaSorte2;

    return $this;
  }
}
