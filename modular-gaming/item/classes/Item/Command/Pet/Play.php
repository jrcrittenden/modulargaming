<?php
class Item_Command_Pet_Play extends Item_Command_Pet {
	public function build_form($name){
		return array(
			'title' => 'Pet mood', 
			'fields' => array(
				array(
					'input' => array(
						'name' => $name, 'class' => 'input-mini'
					)
				)
			)	
		);
	}
	
	public function validate($param) {
		return (Valid::digit($param) && $param > 0);
	}
	
	public function perform($item, $data) {
		$pet = $data['pet'];
		
		if($pet->mood == 100)
			return $pet->name.' is already too happy';
		else
		{
			$level = $pet->mood + $data['param'];
			
			if($level > 100)
				$pet->mood = 100;
			else 
				$pet->mood = $level;
			
			$pet->save();
			
			return $pet->name.' played with '. $item->name;
		}
	}
}