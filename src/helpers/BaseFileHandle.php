<?php
/**
 * Created by PhpStorm.
 * User: anwar
 * Date: 3/4/2019
 * Time: 11:55 AM
 */

namespace Anwar\ConfigMaker\Helpers;
use Anwar\ConfigMaker\Contracts\BaseFolderHandle;
use Illuminate\Support\Facades\File;
use Mockery\Exception;


class BaseFileHandle implements BaseFolderHandle
{
    /**
     * @param null $path
     * @return mixed
     */
    public function configFileList($path = null)
    {
        // TODO: Implement configFileList() method.
        if (File::isDirectory(config_path())){
            $data['files'] = $this->fileNameResolve(File::allFiles(config_path()));
            $data['directories'] = $this->directoriesNameResolve(File::directories(config_path()));
            $data['folderIcon'] = $this->folderIcon();
            return $data;
        }else{
            throw new Exception("Folder not found");
            return true;
        }

    }

    /**
     * @param array $directoris
     * @return array|mixed
     */


    public function directoriesNameResolve(array $directoris)
    {
        // TODO: Implement directoriesNameResolve() method.
        $directorylist = [];
        $i=0;
        if (!empty($directoris)){
            foreach ($directoris as $d){
                $directorylist[$i++]=$this->directoryName($d);
            }
            return $directorylist;
        }else{
            throw new Exception("No folder found.");
        }
    }

    /**
     * @param $path
     * @return bool|string
     */


    public function directoryName($path)
    {
        // TODO: Implement directoryName() method.

        return substr($path,strrpos($path,'\\')+1);
    }

    /**
     * @return string
     */
    public function folderIcon(): string
    {
        // TODO: Implement folderIcon() method.
        return 'vendor/config_maker/img/folder.png';
    }

    /**
     * @param array $files
     * @return mixed
     */
    public function fileNameResolve(array $files)
    {
        // TODO: Implement fileNameResolve() method.

        $filelist = [];
        foreach ($files as $f){
            $filelist[File::name($f)] = File::extension($f);
        }
        return $filelist;

    }


    /**
     * @param $path
     * @return mixed
     */
    public function fileContents($path)
    {
        // TODO: Implement fileContents() method.
        return config($path);
    }

}
