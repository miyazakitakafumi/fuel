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
        $sql_param = array();
        
        $sql = "
            SELECT * FROM daily_report
        ";
        
        if(isset($condition['title'])){
            $where_sql[] = " title like :title";
            $sql_param['title'] = '%' . $condition['title'] . '%';
        }

        if(isset($condition['body'])){
            $where_sql[] = " body = :body";
            $sql_param['body'] = '%' . $condition['body'] . '%';
        }
        
        if(isset($condition['author_id'])){
            $where_sql[] = " author_id = :author_id";
            $sql_param['author_id'] = $condition['author_id'];
        }

        if(count($where_sql) > 0) {
            $sql .= 'WHERE ' . implode(' AND ', $where_sql);
        }

        $query = DB::query($sql);

        $query->parameters($sql_param);

        $result = $query->as_assoc()->execute();

        return $result;
    }
    
    /**
     * 登録処理
     * @param $condition array 登録条件
     * @return $result array 登録結果
     */
    public static function insert( $condition )
    {
        $sql = '';
        $sql_param = array();
        
        $sql = "
            INSERT INTO `daily_solt`.`daily_report` 
            (
                `title`, 
                `body`, 
                `author_id`, 
                `created_at`, 
                `updated_at`, 
                `delete_flag`
            ) 
            VALUES 
            (
                :title,
                :body,
                :author_id,
                NOW(),
                NOW(),
                '0'
            )
        ";
        
        if(isset($condition['title'])){
            $sql_param['title'] = $condition['title'];
        }

        if(isset($condition['body'])){
            $sql_param['body'] = $condition['body'];
        }
        
        if(isset($condition['author_id'])){
            $sql_param['author_id'] = $condition['author_id'];
        }

        $query = DB::query($sql);

        $query->parameters($sql_param);

        $result = $query->as_assoc()->execute();

        return $result;
    }
    
    /**
     * 更新処理
     * @param $condition array 更新条件
     * @return $result array 更新結果
     */
    public static function update( $condition )
    {
        $sql = '';
        $set_sql = array();
        $sql_param = array();
        
        $sql = "
            UPDATE `daily_solt`.`daily_report` SET 
        ";
        
        //SET
        if(isset($condition['title'])){
            $set_sql[] = " title = :title";
            $sql_param['title'] = $condition['title'];
        }

        if(isset($condition['body'])){
            $set_sql[] = " body = :body";
            $sql_param['body'] = $condition['body'];
        }
        
        $set_sql[] = " updated_at = NOW()";

        if(count($set_sql) > 0) {
            $sql .= implode(', ', $set_sql);
        }
        
        //WHERE
        if(isset($condition['author_id'])){
            $sql .= " WHERE author_id = :author_id";
            $sql_param['author_id'] = $condition['author_id'];
        }

        $query = DB::query($sql);

        $query->parameters($sql_param);

        $result = $query->as_assoc()->execute();

        return $result;
    }
    
    /**
     * 削除処理
     * @param $condition array 削除条件
     * @return $result array 検索結果
     */
    public static function delete( $condition )
    {
        $sql = '';
        $set_sql = array();
        $sql_param = array();
        
        $sql = "
            UPDATE `daily_solt`.`daily_report` SET
        ";
        
        //SET
        $set_sql[] = " delete_flag = '1'";
        $set_sql[] = " updated_at = NOW()";

        if(count($set_sql) > 0) {
            $sql .= implode(', ', $set_sql);
        }
        
        //WHERE
        if(isset($condition['author_id'])){
            $sql .= " WHERE author_id = :author_id";
            $sql_param['author_id'] = $condition['author_id'];
        }

        $query = DB::query($sql);

        $query->parameters($sql_param);

        $result = $query->as_assoc()->execute();

        return $result;
    }
}