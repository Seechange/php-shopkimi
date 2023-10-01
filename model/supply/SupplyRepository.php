<?php
class SupplyRepository extends BaseRepository{
	
	protected function fetchAll($condition = null)
	{
		global $conn;
		$supplier = array();
		$sql = "SELECT * FROM supplier";
		if ($condition) 
		{
			$sql .= " WHERE  $condition";//SELECT * FROM supplier WHERE category =1
		}

		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			while ($row = $result->fetch_assoc()) 
			{
				$supply = new Supply($row["id"], $row["name"],$row["address"], $row["shipping_fee"],$row["discount"],$row["category_id"]);
				$suppliers[] = $supply;
			}
		}
		return $suppliers;
	}

	function getAll() {
		return $this->fetchAll();
	}

	function find($id) {
		global $conn; 
		$condition = "id = $id";
		$suppliers = $this->fetchAll($condition);
		$supply = current($suppliers);
		return $supply;
	}

	// function save($data) {
	// 	global $conn;
	// 	$name = $data["name"];
	// 	$sql = "INSERT INTO category (name) VALUES ('$name')";
	// 	if ($conn->query($sql) === TRUE) {
	// 		$last_id = $conn->insert_id;//chỉ cho auto increment
	// 	    return $last_id;
	// 	} 
	// 	$this->error = "Error: " . $sql . PHP_EOL . $conn->error;
	// 	return false;
	// }

	// function update($category) {
	// 	global $conn;
	// 	$name = $category->getName();
	// 	$id = $category->getId();
	// 	$sql = "UPDATE category SET name='$name' WHERE id=$id";

	// 	if ($conn->query($sql) === TRUE) {
	// 	    return true;
	// 	} 
	// 	$this->error = "Error: " . $sql . PHP_EOL . $conn->error;
	// 	return false;
	// }

	// function delete($category) {
	// 	global $conn;
	// 	$id = $category->getId();
	// 	$sql = "DELETE FROM category WHERE id=$id";
	// 	if ($conn->query($sql) === TRUE) {
	// 	    return true;
	// 	} 
	// 	$this->error = "Error: " . $sql . PHP_EOL . $conn->error;
	// 	return false;
	// }
}