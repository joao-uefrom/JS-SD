<?php

namespace Atv\Classes;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="apostadores")
 */
class Apostador
{

  public function __construct()
  {
    $this->apostas = new ArrayCollection();
  }

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue
   * @var integer
   */
  protected $id;

  /**
   * @ORM\OneToMany(targetEntity="Atv\Classes\Aposta", mappedBy="apostador")
   * @var Aposta[]
   */
  protected $apostas;

  /**
   * @ORM\Column(type="string")
   * @var string
   */
  protected $nome;

  /**
   * @ORM\Column(type="string")
   * @var string
   */
  protected $email;

  /**
   * @ORM\Column(type="string")
   * @var string
   */
  protected $cpf;

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
   * Get the value of nome
   *
   * @return  string
   */
  public function getNome()
  {
    return $this->nome;
  }

  /**
   * Set the value of nome
   *
   * @param  string  $nome
   *
   * @return  self
   */
  public function setNome(string $nome)
  {
    $this->nome = $nome;

    return $this;
  }

  /**
   * Get the value of email
   *
   * @return  string
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @param  string  $email
   *
   * @return  self
   */
  public function setEmail(string $email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * Get the value of cpf
   *
   * @return  string
   */
  public function getCpf()
  {
    return $this->cpf;
  }

  /**
   * Set the value of cpf
   *
   * @param  string  $cpf
   *
   * @return  self
   */
  public function setCpf(string $cpf)
  {
    $this->cpf = $cpf;

    return $this;
  }

}
