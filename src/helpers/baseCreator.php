<?php
/**
 * Created by PhpStorm.
 * User: anwar
 * Date: 3/3/2019
 * Time: 11:14 AM
 */

namespace Anwar\ConfigMaker\Helpers;
use Anwar\ConfigMaker\Contracts\BaseFile;


class baseCreator implements BaseFile
{
    private $configPath;

    public function __construct()
    {
        $this->configPath = config_path();
    }

    /**
     * @param $filename
     * @return mixed
     * @desc create config file
     */
    public function createFile($filename)
    {
        // TODO: Implement createFile() method.

        if (!file_exists($this->configPath.$filename.".php")){



        }
    }

    /**
     * @param $filename
     * @param $key
     * @param $value
     * @return mixed
     * @desc update config file with data
     */
    public function updatefile($filename, $key, $value)
    {
        // TODO: Implement updatefile() method.
    }

    /**
     * @param $key
     * @return mixed
     * @desc delete a key
     */
    public function removeData($key)
    {
        // TODO: Implement removeData() method.
    }

    /**
     * @param $filename
     * @return mixed
     */
    public function deletefile($filename)
    {
        // TODO: Implement deletefile() method.
    }
}
