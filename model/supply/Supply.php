<?php 
class Supply
{
    protected $id;
    protected $name;
    protected $address;
    protected $shipping_fee;
    protected $discount;
	protected $category_id;

    function __construct($id, $name, $address,$shipping_fee,$discount,$category_id){
		$this->id = $id;
		$this->name = $name;
        $this->address = $address;
		$this->shipping_fee = $shipping_fee;
		$this->discount = $discount;
		$this->category_id = $category_id;
	}

    function getId(){
        return $this->id;
    }

    function getName(){
		return $this->name;
	}

	function setName($name){
		$this->name = $name;
		return $this;
	}

	function setCategoryId($category_id){
		$this->category_id = $category_id;
		return $this;
	}
    function getAddress(){
		return $this->address;
	}

	function setAddress($address){
		$this->address = $address;
		return $this;
	}

    function getShippingFee(){
		return $this->shipping_fee;
	}

	function setShippingFee($shipping_fee){
		$this->shipping_fee = $shipping_fee;
		return $this;
	}

    function getDiscount(){
		return $this->discount;
	}

	function setDiscount($discount){
		$this->discount = $discount;
		return $this;
	}

	function getCategoryId(){
		return $this->category_id;
	}

	function getCategory(){
		$categoryRepository = new CategoryRepository();
		$category = $categoryRepository->find($this->category_id);
		return $category;
	}
}
?>