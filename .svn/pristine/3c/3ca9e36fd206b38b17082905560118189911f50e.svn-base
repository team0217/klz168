<?php
class content_input {
	var $modelid;
	var $fields;
	var $data;

    function __construct($modelid) {
		$this->db_pre = C('DB_PREFIX');
		$this->modelid = $modelid;
		$this->fields = getcache('model_field_'.$modelid, 'model');
		$this->error = '';
		//初始化附件类
		// pc_base::load_sys_class('attachment','',0);
		// $this->siteid = param::get_cookie('siteid');
		// $this->attachment = new attachment('content','0',$this->siteid);
    }

	function get($data,$isimport = 0) {
		$this->data = $data = trim_script($data);
		$info = array();
		foreach($data as $field=>$value) {
			if(!isset($this->fields[$field]) && !check_in($field,'paytype,paginationtype,maxcharperpage,id')) continue;
			if(defined('IN_ADMIN')) {
				if(check_in(session('roleid'), $this->fields[$field]['unsetroleids'])) continue;
			} else {
				$_groupid = cookie('_groupid');
				if(check_in($_groupid, $this->fields[$field]['unsetgroupids'])) continue;
			}
			$name = $this->fields[$field]['name'];
			$minlength = $this->fields[$field]['minlength'];
			$maxlength = $this->fields[$field]['maxlength'];
			$pattern = $this->fields[$field]['pattern'];
			$errortips = $this->fields[$field]['errortips'];
			if(empty($errortips)) $errortips = $name.' '.L('not_meet_the_conditions');
			$length = empty($value) ? 0 : (is_string($value) ? strlen($value) : count($value));

			if($minlength && $length < $minlength) {
				if(!$isimport) {					
					$this->error = $name.' '.L('not_less_than').' '.$minlength.L('characters');
				} 
				return false;
			}
			if($maxlength && $length > $maxlength) {
				if($isimport) {
					$value = str_cut($value,$maxlength,'');
				} else {
					$this->error = $name.' '.L('not_more_than').' '.$maxlength.L('characters');
					return false;
				}
			} elseif($maxlength) {
				$value = str_cut($value,$maxlength,'');
			}
			if($pattern && $length && !preg_match($pattern, $value) && !$isimport) {
				$this->error = $errortips;
				return false;
			}
			$models = getcache('model','commons');         
            if($this->fields[$field]['isunique'] && ACTION_NAME != 'edit') {
            	$this->db->table_name = $this->fields[$field]['issystem'] ? $this->db_pre.$models[$this->modelid]['tablename'] : $this->db_pre.$models[$this->modelid]['tablename'].'_data';
            	if(M()->query("SELECT {$field} FROM `{$this->db->table_name}` WHERE `{$field}` = '{$value}' LIMIT 0,1")) {
	            	$this->error = $name.L('the_value_must_not_repeat');
	            	return false;
            	}
            }
			$func = $this->fields[$field]['formtype'];
			if(method_exists($this, $func)) $value = $this->$func($field, $value);
			if($this->fields[$field]['issystem']) {
				$info['system'][$field] = $value;
			} else {
				$info['model'][$field] = $value;
			}
			//颜色选择为隐藏域 在这里进行取值
			$info['system']['style'] = $_POST['style_color'] && preg_match('/^#([0-9a-z]+)/i', $_POST['style_color']) ? $_POST['style_color'] : '';
			if($_POST['style_font_weight']=='bold') $info['system']['style'] = $info['system']['style'].';'.strip_tags($_POST['style_font_weight']);
		}
		return $info;
	}

	public function getError() {
		return $this->error;
	}

	function textarea($field, $value) {
		if(!$this->fields[$field]['enablehtml']) $value = strip_tags($value);
		return $value;
	}

	function editor($field, $value) {
		$setting = string2array($this->fields[$field]['setting']);
		$enablesaveimage = $setting['enablesaveimage'];
		if(isset($_POST['spider_img'])) $enablesaveimage = 0;
		if($enablesaveimage) {
			$site_setting = string2array($this->site_config['setting']);
			$watermark_enable = intval($site_setting['watermark_enable']);
			//暂时屏蔽远程附件下载
			//$value = $this->attachment->download('content', $value,$watermark_enable);
		}
		return stripslashes($value);
	}

	function box($field, $value) {
		$setting = string2array($this->fields[$field]['setting']);
		if($setting['boxtype'] == 'checkbox') {
			if(!is_array($value) || empty($value)) return false;
			array_shift($value);
			$value = implode(',', $value);
			return $value;
		} elseif($setting['boxtype'] == 'multiple') {
			if(is_array($value) && count($value)>0) {
				$value = implode(',', $value);
				return $value;
			}
		} else {
			return $value;
		}
	}

	function image($field, $value) {
		$value = remove_xss(str_replace(array("'",'"','(',')'),'',$value));
		return trim($value);
	}


	function images($field, $value) {
		//取得图片列表
		$pictures_url = $_POST[$field.'_url'];
		//取得图片说明
		$pictures_alt = isset($_POST[$field.'_alt']) ? $_POST[$field.'_alt'] : array();
		$array = $temp = array();
		if(!empty($pictures_url)) {
			foreach($pictures_url as $key=>$pic) {
				if(!$pic) continue;
				$temp['url'] = $pic;
				$temp['alt'] = dhtmlspecialchars($pictures_alt[$key]);
				$array[] = $temp;
			}
		}
		//$array = array2string($array);
		return serialize($array);
	}

	function datetime($field, $value) {
		$setting = string2array($this->fields[$field]['setting']);
		if($setting['fieldtype']=='int') {
			$value = strtotime($value);
		}
		return $value;
	}

	function posid($field, $value) {
		$number = count($value);
		$value = $number== 1 ? 0 : 1;
		return $value;
	}

	function copyfrom($field, $value) {
		$field_data = $field.'_data';
		if(isset($_POST[$field_data])) {
			$value .= '|'.safe_replace($_POST[$field_data]);
		}
		return $value;
	}

	function groupid($field, $value) {
		$datas = '';
		if(!empty($_POST[$field]) && is_array($_POST[$field])) {
			$datas = implode(',',$_POST[$field]);
		}
		return $datas;
	}

	function picfile($field, $value) {
		//取得镜像站点列表
		$config = getcache('setting', 'document');
		$_value = $_POST['info']['_'.$field];
		$_result = getpicfile($value, 1);
		$_result = json_decode($_result, TRUE);
		$result = array();
		if ($_result) {
			foreach ($_result as $_k => $_r) {
				$dpi = ($_k == 'self') ? '300' : $config[$_k]['dpi'];
				$result[$_k] = getpicinfo($_r);
				$result[$_k]['name'] = $config[$_k]['name'];
				$result[$_k]['url'] = $_r;
				$result[$_k]['dpi'] = $dpi;
				$result[$_k]['dpi_w'] = dpi2cm($result[$_k]['width'], $dpi);
				$result[$_k]['dpi_h'] = dpi2cm($result[$_k]['height'], $dpi);
				$result[$_k]['point'] = (int) $_value[$_k]['point'];
			}
		}
		return serialize($result);
	}
	function downfile($field, $value) {
		//取得镜像站点列表
		$result = '';
		$server_list = count($_POST[$field.'_servers']) > 0 ? implode(',' ,$_POST[$field.'_servers']) : '';
		$result = $value.'|'.$server_list;
		return $result;
	}

	function downfiles($field, $value) {
		$files = $_POST[$field.'_fileurl'];
		$files_alt = $_POST[$field.'_filename'];
		$array = $temp = array();
		if(!empty($files)) {
			foreach($files as $key=>$file) {
					$temp['fileurl'] = $file;
					$temp['filename'] = $files_alt[$key];
					$array[$key] = $temp;
			}
		}
		$array = array2string($array);
		return $array;
	}

 } 
?>