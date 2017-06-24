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
class Controller_DailyReport extends Controller_Rest
{
	/**
	 * 日報検索処理
	 *
	 * @param
	 * @return json
	 */
	public function post_search()
	{
        $condition = array();
        
        if (input::json('title') !== null) {
            $condition['title'] = input::json('title');
        }
        
        if (input::json('body') !== null) {
            $condition['body'] = input::json('body');
        }
        
        if (input::json('author_id') !== null) {
            $condition['author_id'] = input::json('author_id');
        }
        
        $result['daily_list'] = DailyReport::search($condition);
        return $this->response($result); 
        
	}
    
    /**
	 * 日報登録処理
	 *
	 * @param
	 * @return json
	 */
	public function post_insert()
	{
        $condition = array();
        
        if (input::json('title') !== null) {
            $condition['title'] = input::json('title');
        }
        
        if (input::json('body') !== null) {
            $condition['body'] = input::json('body');
        }
        
        if (input::json('author_id') !== null) {
            $condition['author_id'] = input::json('author_id');
        }
        
        $result['daily_list'] = DailyReport::insert($condition);
        return $this->response($result); 
        
	}
    
    /**
	 * 日報更新処理
	 *
	 * @param
	 * @return json
	 */
	public function post_update()
	{
        $condition = array();
        
        if (input::json('title') !== null) {
            $condition['title'] = input::json('title');
        }
        
        if (input::json('body') !== null) {
            $condition['body'] = input::json('body');
        }
        
        if (input::json('author_id') !== null) {
            $condition['author_id'] = input::json('author_id');
        }
        
        $result['daily_list'] = DailyReport::update($condition);
        return $this->response($result); 
        
	}
    
    /**
	 * 日報削除処理
	 *
	 * @param
	 * @return json
	 */
	public function post_delete()
	{
        $condition = array();
        
        if (input::json('author_id') !== null) {
            $condition['author_id'] = input::json('author_id');
        }
        
        $result['daily_list'] = DailyReport::delete($condition);
        return $this->response($result); 
        
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
