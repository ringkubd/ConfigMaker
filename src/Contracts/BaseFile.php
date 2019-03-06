<?php
/**
 * Created by PhpStorm.
 * User: anwar
 * Date: 3/3/2019
 * Time: 11:17 AM
 */
namespace Anwar\ConfigMaker\Contracts;

interface BaseFile{


    /**
     * @param $filename
     * @return mixed
     * @desc create config file
     */

    public function createFile($filename);

    /**
     * @param $filename
     * @param $key
     * @param $value
     * @return mixed
     * @desc update config file with data
     */

    public function updatefile($filename,$key,$value);

    /**
     * @param $key
     * @return mixed
     * @desc delete a key
     */

    public function removeData($filename,$key);

    /**
     * @param $filename
     * @return mixed
     */

    public function deletefile($filename);

    /**
     * @param $filename
     * @param $key
     * @param $value
     * @return mixed
     */
    public function addToConfig($filename,$key,$value);



}
