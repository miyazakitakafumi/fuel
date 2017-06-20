<?php
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
	 * @access  public
	 * @return  Response
	 */
	public function post_list()
	{
        //**検索条件用配列
        $condition = array();
        
        //**パラメータ取得
        //リクエストパラメータに存在しない場合セットしない
        
        if (input::json('aaa') !== null) {
            $condition['aaa'] = input::json('aaa');
        }
        
        if (input::json('bbb') !== null) {
            $condition['bbb'] = input::json('bbb');
        }
        
        if (input::json('ccc') !== null) {
            $condition['ccc'] = input::json('ccc');
        }
        
        //検索条件があるときのみ WHERE 句をセットする
        if(count($condition) === 0){
            $sql = "
                SELECT * FROM user
            ";
        } else {
            $sql = "
                SELECT * FROM user WHERE
            ";
            
            if(isset($condition['aaa'])){
                $sql .= 'user ='
            }
        }
        
        //値バインド
        $query = DB::query($sql)->bind('bango', $bango);
        
        //実行
        $result = $query->as_assoc()->execute();
        
//        foreach($result as $row){
//            print_r($row['shaimbango'] . '<br />');
//        }
         
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
