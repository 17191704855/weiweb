<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TKLModel extends Model
{
    protected $table = 'tkl';

    protected $primaryKey = 'id';

    protected $guarded = [];
    public static function getRecordCountCondition($where = []){
//        if(empty($where)){
//            return false;
//        }

        $record = self::query();

        $record = self::organizeQuery($where,$record);

        return $record->count();
    }

    public static function getRecordListCondition($where = [],$columns = ['*'],$order_by = [],$page = 0,$pageSize = 0){
//        if(empty($where)){
//            return false;
//        }

        $record = self::query();

        $record = self::organizeQuery($where,$record);

        if($page > 0 && $pageSize > 0){
            $record->forPage($page, $pageSize);
        }

        if(!empty($order_by)){
            foreach ($order_by as $key=>$value){
                $record->orderBy($key, $value);
            }
        }

        return $record->get($columns);
    }
    public static function organizeQuery($where,$record){
        if(empty($where)) return $record;
        $where_like = [];
        foreach ($where as $field=>$value){
            if(!is_array($value)){
                $record->where($field, $value);
                continue;
            }
            $operate = array_keys($value)[0];//得到操作数
            $operate_value = $value[$operate];
            switch (strtolower($operate)){
                case "like":
                    $where_like[$field] = $operate_value;
                    break;
                case "between":
                    $record->whereBetween($field,$operate_value);
                    break;
                case "wherein":
                    $record->whereIn($field, $operate_value);
                    break;
                case "wherenotin":
                    $record->whereNotIn($field, $operate_value);
                    break;
                case "or":
                    $record->where(function ($query) use ($field,$operate_value){
                        foreach ($operate_value as $k=>$v){
                            $query->orWhere($field,$v);
                        }
                    }) ;
                    break;
                default:
                    $record->where($field, $operate, $operate_value);
            }
        }
        if(!empty($where_like)) {
            $record->where(function ($query) use ($where_like) {
                foreach ($where_like as $k => $v) {
                    $query->orWhere($k, 'like', "%$v%");
                }
            });
        }
        return $record;
    }
}
