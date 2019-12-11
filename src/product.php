<?php
/**
* @Entity @Table(name="products")
**/
class User {

	/** @Id @Column(type="integer") @GeneratedValue **/
	protected $id;
	/** @Column(type="string") **/
	protected $name;
	/** @Column(type="float") **/
	protected $price;
	/** @Column(type="string") **/
	protected $description;
  /** @Column(type="string") **/
  protected $description_full;


	public function setName($name) {
		$this->name = $name;
	}

	public function setPrice($price) {
		$this->price = $price;
	}

	public function setDescription($description) {
		$this->description = $description;
	}
  public function setDescription1($description_full) {
    $this->description_full = $description_full;
  }


	public function getName() {
		return $this->name;
	}

	public function getPrice() {
		return $this->price;
	}
	public function getDescription() {
		return $this->description;
	}
  public function getDescription_full() {
    return $this->description_full;
  }
}
