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
	public function get_list()
	{
        //変数
//        $bango = 5000000004;
        $bango = 1000000023;
        
        //SQL
        $sql = "
            SELECT * FROM w_naiteisha WHERE `shaimbango` = :bango 
        ";
        
        //値バインド
        $query = DB::query($sql)->bind('bango', $bango);
        
        //実行
        $result = $query->as_object()->execute();
        
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
