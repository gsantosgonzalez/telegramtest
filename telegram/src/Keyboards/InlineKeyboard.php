<?php

namespace Telegram\Keyboards;

class InlineKeyboard {
	private $rows;
	private $config;
	private $parent;

	function __construct($parent){
		$this->parent = $parent;
	}

	function row(){ return new InlineKeyboardRow($this); }
	function row_button($text, $request = NULL, $switch = NULL){
		return $this->row()
			->button($text, $request, $switch)
		->end_row();
	}

	function push($data){
		if(!is_array($data)){ return FALSE; }
		$this->rows[] = $data;
		return $this;
	}

	function show(){
		$this->parent->_push('reply_markup', [
			'inline_keyboard' => $this->rows,
		]);
		$this->_reset();
		return $this->parent;
	}

	function _reset(){
		$this->rows = array();
		return $this;
	}
}

class InlineKeyboardRow {
	private $buttons;
	private $parent;

	function __construct($parent){
		$this->parent = $parent;
	}

	function button($text, $request = NULL, $switch = NULL){
		$data = array();
		$data['text'] = $text;
		if(filter_var($request, FILTER_VALIDATE_URL) !== FALSE){ $data['url'] = $request; }
		elseif($switch === TRUE or (is_string($switch) && strtolower($switch) == "command")){
			// enviar por privado
			$data['url'] = "https://telegram.me/" .$this->bot->username ."?start=" .urlencode($request);
		}elseif(is_string($switch) && strtolower($switch) == "share"){
			$enc = NULL;
			if(is_array($request) && count($request) == 2){
				$enc = ['url' => urlencode($request[0]), 'text' => urldecode($request[1])];
			}else{
				$enc = ['url' => urlencode($request)];
			}
			$data['url'] = "https://telegram.me/share/url?" .http_build_query($enc);
		}
		elseif($switch === FALSE){ $data['switch_inline_query'] = $request; }
		elseif(is_string($switch) && strtolower($switch) == "text"){ $data['callback_data'] = "T:" .$request; }
		elseif($switch === NULL or is_string($switch)){ $data['callback_data'] = $request; }
		if(is_string($switch)){ $data['switch_inline_query'] = $switch; }
		$this->buttons[] = $data;
		return $this;
	}
	function end_row(){
		$this->parent->push($this->buttons);
		return $this->parent;
	}
}

?>
