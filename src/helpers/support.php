
<?php
/**
 * Created by PhpStorm.
 * User: anwar
 * Date: 3/4/2019
 * Time: 3:39 PM
 */

/**
 * @param $data
 * @param string $class
 * @param string $parent
 */

if (!function_exists('multiLoop')){

    function multiLoop($data,$class="table-striped",$parent=""){
        echo "<table class='table table-bordered table-responsive {$class}'> <tbody>";
        foreach($data as $key=>$value){
            echo "<tr> 
<td parent='{$parent}'>".$key."</td>";
            if(is_array($value) || is_object($value)){
                echo "<td key='{$key}' parent='{$parent}' style='background-color: lightgray' class='content' contenteditable='true' parent='{$parent}'>".multiLoop($value,' table-hover',$key)."     </td>";
            }else{
                echo "<td  key='{$key}' parent='{$parent}' style='background-color: lightgray' class='content' contenteditable='true'>".$value."</td>
</tr>";
            }
        }
        echo "</tbody></table>";
    }
}


/**
 * @param $arr
 * @param null $key
 * @param null $value
 * @param null $parent
 * @return mixed
 */


if (!function_exists('reGenerateArray')){
    function reGenerateArray(&$arr,$key=null,$value=null,$parent=null)
    {
        array_walk($arr, function (&$v, $k ) use($key,$parent,$value) {
            if($k === $parent) {
                $v[$key] = $value;
            } elseif("array" == gettype($v)) {
                $this->reGenerateArray($v);
            }
        });
        return $arr;
    }
}
