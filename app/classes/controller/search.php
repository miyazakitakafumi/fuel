<?php
use \Model\DailyReport;

/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.8
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2016 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Search extends Controller_Rest
{
	/**
	 * The basic welcome message
	 *
	 * @param
	 * @return json
	 */
	public function post_list()
	{
        //**検索条件用配列
        $condition = array();
        $val = Validation::forge();
        
        //**パラメータ取得
        //リクエストパラメータに存在しない場合セットしない
        //パラメータがあるときのみバリデーションチェック
        
        if (input::json('name') !== null) {
            $condition['name'] = input::json('name');
            $val->add('name', 'Your name')->add_rule('max_length', 2);
        }
        
        if (input::json('email') !== null) {
            $condition['email'] = input::json('email');
            $val->add('email', 'Your email')->add_rule('max_length', 1);
        }
        
        if ($val->run())
        {
           
            $result = DailyReport::search($condition);
            return $this->response($result); 
        }
        else
        {
            print($val->error());
        }
        
	}

	/**
	 * A typical "Hello, Bob!" type example.  This uses a Presenter to
	 * show how to use them.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_hello()
	{
		return Response::forge(Presenter::forge('welcome/hello'));
	}

	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(Presenter::forge('welcome/404'), 404);
	}

	public function action_servererr()
	{

		return Response::forge(View::forge('welcome/err'));
	}
}
