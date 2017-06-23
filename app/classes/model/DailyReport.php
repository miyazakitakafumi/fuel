<?php

namespace Model;
use DB;

class DailyReport extends \Model {

    /**
     * 検索処理
     * @param $condition array 検索条件
     * @return $result array 検索結果
     */
    public static function search( $condition )
    {
        $sql = '';
        $where_sql = array();
        $where_param = array();
        
        $sql = "
            SELECT * FROM user
        ";
        
        if(isset($condition['name'])){
            $where_sql[] = " name = :name";
            $where_param['name'] = $condition['name'];
        }

        if(isset($condition['email'])){
            $where_sql[] = " email = :email";
            $where_param['email'] = $condition['email'];
        }

        if(count($where_sql) > 0) {
            $sql .= 'WHERE ' . implode(' AND ', $where_sql);
        }

        $query = DB::query($sql);

        $query->parameters($where_param);

        $result = $query->as_assoc()->execute();

        return $result;
        
    }

}