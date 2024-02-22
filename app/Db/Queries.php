<?php

namespace App\Db;

use Illuminate\Support\Facades\DB;

class Queries{

    //------------------Add new data----------------------
    public static function addnew($table,$dataobject){
        $result = DB::table($table)->insert($dataobject);
        return $result;
    }

    public static function insertarray($table, $insertdata_array){
        $result = DB::table('cashcount_tbl')->insert($insertdata_array);

        return $result;
    }

    public static function insertarrayVals($table, $insertdata_arrayvalues){
        $result = DB::table($table)->insert($insertdata_arrayvalues);
        return $result;
    }

    public static function addNewAndGetId($table, $dataObject){
        $result = DB::table($table)->insertGetId($dataObject);
        return $result;
    }

    //---------------------Edit data-------------------------------
    public static function edit($table, $wheredb, $updated_data, $whereval) {
        $result = DB::table($table)
            ->where($wheredb, $whereval)
            ->update($updated_data);
        return $result;
    }

    public static function editArray($table,$wheredb,$updated_data, $whereval) {
        $result = DB::table($table)
            ->whereIN($wheredb, $whereval)
            ->update($updated_data);
        return $result;
    }

    //--------------get all data-------------
    public static function all($table,$select){
        $result = DB::table($table)->select($select)->get();
        return $result;
    }

    public static function allrows($table,$select){
        $results = DB::table($table)
                        ->select($select)
                        ->get();
        return $results;
    }

    //--------------------Paginations---------------------------
    public static function Paginations($table, $page_num,$itemsperpage,$select) {
        $offset = $itemsperpage * ($page_num-1);
        $res = DB::table($table)
            ->select($select)
            ->limit($itemsperpage)
            ->offset($offset)
            ->get();
        return $res;
    }

    public static function PageWhere1($itemsperpage,$page_num,$table,$select,$where1db,$where1val) {
        $offset = $itemsperpage * ($page_num-1);
        $res = DB::table($table)
            ->select($select)
            ->where($where1db, $where1val)
            ->limit($itemsperpage)
            ->offset($offset)
            ->get();
        return $res;
    }
    public static function PageWhere1Comparison($itemsPerPage, $pageNum, $table, $select, $where1db,$comparison, $where1val) {
        $offset = $itemsPerPage * ($pageNum - 1);
        $res = DB::table($table)
            ->select($select)
            ->where($where1db, $comparison, $where1val)  // Corrected where clause
            ->orderBy('id', 'desc')
            ->limit($itemsPerPage)
            ->offset($offset)
            ->get();
        return $res;
    }

    public static function PageWhere1Comparison1($itemsPerPage, $pageNum, $table, $select,$wheredb2, $whereval2, $where1db,$comparison, $where1val) {
        $offset = $itemsPerPage * ($pageNum - 1);
        $res = DB::table($table)
            ->select($select)
            ->where($wheredb2, $whereval2)  // Corrected where clause
            ->where($where1db, $comparison, $where1val)  // Corrected where clause
            ->orderBy('id', 'desc')
            ->limit($itemsPerPage)
            ->offset($offset)
            ->get();
        return $res;
    }

    public static function PageWhere2($itemsperpage,$page_num,$table,$select,$where1db,$where1val,$where2db,$where2val) {
        $offset = $itemsperpage * ($page_num-1);
        $res = DB::table($table)
            ->select($select)
            ->where($where1db, $where1val)
            ->where($where2db, $where2val)
            ->limit($itemsperpage)
            ->offset($offset)
            ->get();
        return $res;
    }
    public static function PageWhere3($itemsperpage,$page_num,$table,$select,$where1db,$where1val,$where2db,$where2val,$wheredb3, $whereval3) {
        $offset = $itemsperpage * ($page_num-1);
        $res = DB::table($table)
            ->select($select)
            ->where($where1db, $where1val)
            ->where($where2db, $where2val)
            ->where($wheredb3, $whereval3)
            ->limit($itemsperpage)
            ->offset($offset)
            ->get();
        return $res;
    }
    public static function PageWhere1desc($itemsperpage,$page_num,$table,$select,$where1db,$where1val) {
        $offset = $itemsperpage * ($page_num-1);
        $res = DB::table($table)
            ->select($select)
            ->where($where1db, $where1val)
            ->orderBy('id', 'desc')
            ->limit($itemsperpage)
            ->offset($offset)
            ->get();
        return $res;
    }
    public static function PageWhere2desc($itemsperpage,$page_num,$table,$select,$where1db,$where1val,$where2db,$where2val) {
        $offset = $itemsperpage * ($page_num-1);
        $res = DB::table($table)
            ->select($select)
            ->where($where1db, $where1val)
            ->where($where2db, $where2val)
            ->orderBy('id', 'desc')
            ->limit($itemsperpage)
            ->offset($offset)
            ->get();
        return $res;
    }
    public static function PageWhere3desc($itemsperpage,$page_num,$table,$select,$where1db,$where1val,$where2db,$where2val,$wheredb3, $whereval3) {
        $offset = $itemsperpage * ($page_num-1);
        $res = DB::table($table)
            ->select($select)
            ->where($where1db, $where1val)
            ->where($where2db, $where2val)
            ->where($wheredb3, $whereval3)
            ->orderBy('id', 'desc')
            ->limit($itemsperpage)
            ->offset($offset)
            ->get();
        return $res;
    }

    public static function PageWhereIn3desc($itemsperpage,$page_num,$table,$select,$where1db,$where1valArray,$where2db,$where2val,$wheredb3, $whereval3) {
        $offset = $itemsperpage * ($page_num-1);
        $res = DB::table($table)
            ->select($select)
            ->where($where1db, $where1valArray)
            ->where($where2db, $where2val)
            ->where($wheredb3, $whereval3)
            ->orderBy('id', 'desc')
            ->limit($itemsperpage)
            ->offset($offset)
            ->get();
        return $res;
    }

    public static function PageWhereIn2desc($itemsperpage,$page_num,$table,$select,$where1db,$where1valArray,$where2db,$where2val) {
        $offset = $itemsperpage * ($page_num-1);
        $res = DB::table($table)
            ->select($select)
            ->where($where2db, $where2val)
            ->whereIn($where1db, $where1valArray)
            ->orderBy('id', 'desc')
            ->limit($itemsperpage)
            ->offset($offset)
            ->get();
        return $res;
    }

    //-------------------------Search----------------
    public static function search2($table, $page_num, $search, $field1, $field2,$itemsperpage) {
        $offset = $itemsperpage * ($page_num-1);
        if ($search != "" && $search != null) {
            $res = DB::table($table)
                ->select('*')
                ->where(function ($query) use ($field1, $field2, $search) {
                    $query->where($field1, 'like', '%' . $search . '%')
                        ->orWhere($field2, 'like', '%' . $search . '%');
                })
                ->offset($offset)
                ->limit($itemsperpage)
                ->get();
            return $res;
        }
    }
    public static function search2where2page($itemsperpage,$page_num,$table, $search,$wherefielddb, $wherefield1,$wherefielddb2, $wherefield2, $field1, $field2) {
        $offset = $itemsperpage * ($page_num-1);
        $res = DB::table($table)
        ->where($wherefielddb,'=', $wherefield1)
        ->where($wherefielddb2,'=', $wherefield2)
        ->where(function ($query) use ($field1, $field2, $search) {
            $query->where($field1, 'like', '%' . $search . '%')
                ->orWhere($field2, 'like', '%' . $search . '%');
        })
        ->offset($offset)
        ->limit($itemsperpage)
        ->get();
        return $res;
    }
    public static function search2where1page($itemsperpage,$page_num,$table, $search,$wherefielddb, $wherefield1, $field1, $field2) {
        $offset = $itemsperpage * ($page_num-1);
        $res = DB::table($table)
        ->where($wherefielddb,'=', $wherefield1)
        ->where(function ($query) use ($field1, $field2, $search) {
            $query->where($field1, 'like', '%' . $search . '%')
                ->orWhere($field2, 'like', '%' . $search . '%');
        })
        ->offset($offset)
        ->limit($itemsperpage)
        ->get();
        return $res;
    }

    //----------------------Count----------------
    public static function countall($table){
        $result = DB::table($table)
                        ->count();
        return $result;
    }

    public static function countwhere1($table,$wheredb1,$whereval1){
        $result = DB::table($table)
                        ->where($wheredb1, $whereval1)
                        ->count();
        return $result;
    }

    public static function countwhere1comparison($table,$wheredb1,$operators = '=',$whereval1){
        $result = DB::table($table)
                        ->where($wheredb1,$operators, $whereval1)
                        ->count();
        return $result;
    }

    public static function countwhere1comparison1($table,$wheredb2, $whereval2,$wheredb1,$operators = '=',$whereval1){
        $result = DB::table($table)
                        ->where($wheredb2, $whereval2)
                        ->where($wheredb1,$operators, $whereval1)
                        ->count();
        return $result;
    }

    public static function countwhere2($table,$wheredb1,$whereval1,$wheredb2, $whereval2){
        $result = DB::table($table)
                        ->where($wheredb1, $whereval1)
                        ->where($wheredb2, $whereval2)
                        ->count();
        return $result;
    }
    public static function search2count($table, $search, $field1, $field2) {
        $res = DB::table($table)
        ->where(function ($query) use ($field1, $field2, $search) {
            $query->where($field1, 'like', '%' . $search . '%')
                ->orWhere($field2, 'like', '%' . $search . '%');
        })
        ->count(); // Moved count() outside the closure
        return $res;
    }

    public static function search2where2count($table, $search,$wherefielddb, $wherefield1,$wherefielddb2, $wherefield2, $field1, $field2) {
        $res = DB::table($table)
        ->where($wherefielddb,'=', $wherefield1)
        ->where($wherefielddb2,'=', $wherefield2)
        ->where(function ($query) use ($field1, $field2, $search) {
            $query->where($field1, 'like', '%' . $search . '%')
                ->orWhere($field2, 'like', '%' . $search . '%');
        })
        ->count(); // Moved count() outside the closure
        return $res;
    }
    public static function search2where1count($table, $search,$wherefielddb, $wherefield1, $field1, $field2) {
        $res = DB::table($table)
        ->where($wherefielddb,'=', $wherefield1)
        ->where(function ($query) use ($field1, $field2, $search) {
            $query->where($field1, 'like', '%' . $search . '%')
                ->orWhere($field2, 'like', '%' . $search . '%');
        })
        ->count(); // Moved count() outside the closure
        return $res;
    }

    public static function countwhereIn2($table,$wheredb1,$whereval1Array,$wheredb2, $whereval2){
        $result = DB::table($table)
                        ->whereIn($wheredb1, $whereval1Array)
                        ->where($wheredb2, $whereval2)
                        ->count();
        return $result;
    }

    //---------------------where-----------------------------
    public static function getWhereBatch($table, $dbWhere, $whereVal,$select){
        if (!empty($whereVal)) {
            $results = DB::table($table)
                ->select($select)
                ->whereIn($dbWhere, $whereVal)
                ->get();
        } else {
            $results = [];
        }
        return $results;
    }

    public static function getwhereInBatch($table, $select, $whereDb1, $whereInValues){
        $results = DB::table($table)
            ->select($select)
            ->whereIn($whereDb1, $whereInValues)
            ->get();

        return $results;
    }


    public static function where1($table, $Wheredb1, $whereval1,$select){
        $results = DB::table($table)
        ->select($select)
        ->where($Wheredb1, '=',$whereval1)
        ->get();

        return $results;
    }

    //-----------------------delete-------------
    public static function deleterow($table,$wheredb1,$wherevalue1){
        $result = DB::table($table)
        ->where($wheredb1, '=', $wherevalue1)
        ->delete();

        return $result;
    }

    //----------------------between------------------------------
    public static function inbetween($table,$select,$where1db,$where1val,$greaterthanDB,$lessthanDB,$betweenValue){
        $results = DB::table($table)
                        ->select($select)
                        ->where($where1db, $where1val)
                        ->where($greaterthanDB, '<=', $betweenValue)
                        ->where($lessthanDB, '>=', $betweenValue)
                        ->get();
        return $results;
    }
}
