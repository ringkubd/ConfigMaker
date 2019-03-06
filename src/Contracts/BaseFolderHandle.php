<?php
namespace Anwar\ConfigMaker\Contracts;

use PhpParser\Node\Expr\Array_;

interface BaseFolderHandle{
    /**
     * @param null $path
     * @return mixed
     */
    public function configFileList($path=null);

    /**
     * @param array $directoris
     * @return mixed
     */

    public function directoriesNameResolve(array $directoris);

    /**
     * @param $path
     * @return mixed
     */

    public function directoryName($path);

    /**
     * @return string
     */

    public function folderIcon():string ;

    /**
     * @param array $files
     * @return mixed
     */

    public function fileNameResolve(array $files);

    /**
     * @param $path
     * @return mixed
     */

    public function fileContents($path);



}
