<?php

class Controller_Test extends Controller {

	private $param1 = null;
	private $param2 = null;

	public function action_index() {
// 		throw new HttpServerErrorException;
			Session::set('session1', 111);
			var_dump(Session::get());
			$data = array();
			$data['name'] = 'yamada';
			$data['memo'] = $this->param1;
			$data['session'] =Session::get();
			return View::forge('test/index', $data);

	}

	public function before(){
		parent::before();
		$this->param1 = 'aaaaa';
	}

	public function after($response){

		var_dump($response);
		$response = parent::after($response);
		return $response;
	}

}