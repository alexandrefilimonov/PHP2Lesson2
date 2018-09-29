<?php
abstract class Item {
	public $type="";
	public $basicValue=100;
	public $weight=1.0;	
	public $qty=1;
	public $value=1;	
	abstract protected function setValue();
	public function printTypeName() {
		return $this->type;
	}
}
class QuantityItem extends Item{	
	function __construct ($qty) {
		$this->qty = $qty;
		$this->type = "By quantity";
		$this->setValue();
	}
	protected function setValue() {
		$this->value = $this->qty * $this->basicValue;
	}
}
class DigitalItem extends Item{	
	function __construct ($qty) {
		$this->qty = $qty;
		$this->type = "Digital";
		$this->setValue();
	}
	protected function setValue() {
		$this->value = 1/2 * $this->qty * $this->basicValue;
	}
}
class WeightItem extends Item{	
	function __construct ($weight, $qty) {
		$this->weight = $weight;
		$this->qty = $qty;
		$this->type = "By weight";
		$this->setValue();
	}
	protected function setValue() {
		$this->value = $this->qty * $this->weight * $this->basicValue;
	}
}

echo "<br><br>Quantity Item:";
$a = new QuantityItem(12);
echo "<br>Qty of Quantity Items:".$a->qty; 
echo "<br>Total Price:".$a->value." rub";

echo "<br><br>Digital Item:";
$b = new DigitalItem(12);
echo "<br>Qty of Quantity Items:".$b->qty; 
echo "<br>Total Price:".$b->value." rub";

echo "<br><br>Weight Item#1:";
$c = new WeightItem(0.5,12);
echo "<br>Qty of Weight Items:".$c->qty." with weight:".$c->weight."kg"; 
echo "<br>Total Price:".$c->value." rub";

echo "<br><br>Weight Item#2:";
$c = new WeightItem(1.5,3);
echo "<br>Qty of Weight Items:".$c->qty." with weight:".$c->weight."kg"; 
echo "<br>Total Price:".$c->value." rub";

?>

