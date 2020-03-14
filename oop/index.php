<?php

//介面宣告
interface Animal{
	const type="animal";
	public function sound();
	public function run();
}

interface Life{
	
	public function age();
	
}

class PET implements Animal,Life{
	private $name="hello";
	//public __construct(){  }
	public function sound(){
		 echo "汪汪"; 
		}
	public function run(){
		echo "跑跑";
	  }
	public function age(){
		echo "十歲";
	}
	public function setname($name){
		$this->name=$name;
	}
	public function getname(){
		return $this->name;
	}
}

$pet=new PET;
echo $pet->getname();
echo $pet->sound();
echo $pet->run();
echo $pet->age();
$pet->setname("咪咪");
echo $pet->getname();
//echo $pet->jump();
echo "<hr>";


//繼承
class DOG extends PET{
	public function sound(){
		echo "哦喔喔";
	}
	public function jump(){
		echo "跳躍";
	}
	public function eat(){
		echo "狗骨頭";
	}
}

$dog=new DOG;
echo $dog->getname();
echo $dog->sound();
echo $dog->setname("阿福");
echo $dog->getname();
echo $dog->jump();
echo $dog->eat();

?>
