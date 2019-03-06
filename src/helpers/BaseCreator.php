<?php
/**
 * Created by PhpStorm.
 * User: anwar
 * Date: 3/3/2019
 * Time: 11:14 AM
 */

namespace Anwar\ConfigMaker\Helpers;
use Anwar\ConfigMaker\Contracts\BaseFile;
use Illuminate\Support\Facades\File;
use Mockery\Exception;


class BaseCreator implements BaseFile
{
    private $configPath;

    public function __construct()
    {
        $this->configPath = config_path();
    }

    /**
     * @param $filename
     * @param $key
     * @param $value
     * @return mixed
     */
    public function addToConfig($filename, $key, $value=null)
    {
        // TODO: Implement addToConfig() method.
        $conf = [];
        if (is_array($key)){
            $conf = $this->addConfigKeyPrefix($filename,$key);
        }else{
            $conf = [$filename.'.'.$key=>$value];
        }
        $configpath = config_path($filename.".php");
        if (!file_exists($configpath)){
            abort(404,"file not found");
        }
        $fp = fopen($configpath , 'w');
        config($conf);
        return fwrite($fp, '<?php return ' . var_export(config($filename), true) . ';');
    }

    /**
     * @param $filename
     * @return mixed
     * @desc create config file
     */
    public function createFile($filename)
    {
        // TODO: Implement createFile() method.

        if (!file_exists($this->configPath."\\".$filename.".php")){
            $filepath = $this->configPath."\\".$filename.".php";
            try{
                File::put($filepath,$this->basicPhpFileContent()) ?? throwException();
            }catch (Exception $e){
                return $e->getTraceAsString();
            }
        }
        $error = ["message"=>"File already exist. thank you"];
        return $this;

    }

    /**
     * @param $filename
     * @param $key
     * @param $value
     * @return mixed
     * @desc update config file with data
     */
    public function updatefile($filename, $key, $value=null,$parent=null)
    {
        // TODO: Implement updatefile() method.
        $file = $parent != null?$filename.'.'.$parent:$filename;
        $configpath = config_path($filename.".php");
        if (!file_exists($configpath)){
            return $error["message"] = "$filename not found inside config folder";
        }
        $allData = config($filename);
        if ($parent !== null){
            $allData = reGenerateArray($allData,$key,$value,$parent);
        }else{
            $i = 0;
            if (is_array($key)){
                foreach ($key as $k=>$v){
                    if (array_key_exists($k,$allData)){
                        $allData[$k] = $v;
                    }
                    $error["message"] = [$i++ =>"$k not found on $filename config file"];
                }
            }else{

                if (array_key_exists($key,$allData)){
                    $allData[$key] = $value;
                }else{
                    return $error["message"] = "Key not found on $filename config file";
                }
            }
        }

        if (!isset($allData))
            $allData = [];

        $fp = fopen($configpath , 'w');
        $write = fwrite($fp, '<?php return ' . var_export($allData, true) . ';');
        return $this;

    }


    /**
     * @param $key
     * @return mixed
     * @desc delete a key
     */
    public function removeData($filename,$key)
    {
        // TODO: Implement removeData() method.

        $configpath = config_path($filename.".php");
        if (!file_exists($configpath)){
            return $error["message"] = "$filename not found inside config folder";
        }
        $allData = config($filename);

        if (array_key_exists($key,$allData)){
            unset($allData[$key]);
        }else{
            return $error["message"] = "Key not found on $filename config file";
        }

        if (!isset($allData))
            $allData = [];

        $fp = fopen($configpath , 'w');
        $write =  fwrite($fp, '<?php return ' . var_export($allData, true) . ';');
        return $this;
    }

    /**
     * @param $filename
     * @return mixed
     */
    public function deletefile($filename)
    {
        // TODO: Implement deletefile() method.
        return unlink(config_path($filename));
    }

    /**
     * @return string
     */

    private function basicPhpFileContent(){
        return <<<EOT
<?php
EOT;
    }

    /**
     * @param $filename
     * @param array $confiArray
     * @return array|bool
     */

    private function addConfigKeyPrefix($filename,Array $confiArray){
        $configWithPrefix = [];
        if (!is_array($confiArray))
            return false;

        foreach ($confiArray as $k=>$v){
            $configWithPrefix[$filename.".".$k] = $v;
        }

        return $configWithPrefix;

    }


}
