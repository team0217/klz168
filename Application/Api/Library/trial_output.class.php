<?php
class trial_output {
	var $fields;
	var $data;

	function __construct() {
		$this->error = '';
    }

	function get($data) {
		$this->data = $data;
		$this->id = $data['id'];
		$info = array();
		foreach($data as $field => $v) {
			$func = $field;
			$result = method_exists($this, $func) ? $this->$func($field, $v) : $v;
			if($result !== false) $info[$field] = $result;
		}
		$info['mod_price'] =  sprintf('%.2f',$info['goods_price']);
		return $info;
	}

	public function source($field, $value) {
		return (int) $value;
	}

	public function goods_albums($field, $value) {
		return ($value) ? string2array($value) : array();
	}
	
	public function goods_search_albums($field, $value){
		return ($value) ? string2array($value) : array();
	}
	public function goods_rule($field, $value) {
		return ($value) ? string2array($value) : array();
	}

	public function goods_tips($field, $value) {
		return ($value) ? string2array($value) : array();
	}

	public function goods_price($field, $value){
		return ($value) ? sprintf('%.2f', $value) : '';
	}
}