<?php

namespace Anwar\ConfigMaker\Controllers;

use Anwar\ConfigMaker\Helpers\BaseCreatorFacade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Anwar\ConfigMaker\Helpers\BaseFileHandleFacade;
use function MongoDB\BSON\toJSON;

class ConfigController extends Controller
{
    public function index(){
        $data = BaseFileHandleFacade::configFileList();
        return view("ConfigMaker::index",compact('data'));
    }

    public function insideFolder($folderName){
        //return view("ConfigMaker::fileEdit");
    }

    /**
     * @param $filename
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function fileContents($filename){
        $data = BaseFileHandleFacade::fileContents($filename);
        return view("ConfigMaker::fileEdit",compact('data'));
    }

    public function updateConfig(Request $request){
        if ($request->ajax()){
            //return json_encode($request->all());
            $filename = $this->configFileNameByUrl(url()->previous());
            $action = BaseCreatorFacade::updatefile($filename,$request->key,$request->value,$request->parent);
            return $action ?"success":"error";

        }

    }

    private function configFileNameByUrl($url=null){
        $url = $url ?? url()->previous();
        return substr($url,strrpos($url,'/')+1);
    }

}
