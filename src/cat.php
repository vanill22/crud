<?php
/**
 * @Entity @Table(name="Categories")
 **/
class Categorys {

  /** @Id @Column(type="integer") @GeneratedValue **/
  protected $id;
  /** @Column(type="string") **/
  protected $name;



  public function setName($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }

}
