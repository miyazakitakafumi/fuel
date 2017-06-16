<?php

class Controller_RestTest extends Controller_Rest{

	public function get_list(){

		return $this->response(array(
			'foo' => Input::get('foo'),
			'buz' => array(
				1, 2, 33
			),
			'empty' => null
		));
	}
}