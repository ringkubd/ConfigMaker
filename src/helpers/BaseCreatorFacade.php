<?php
namespace Anwar\ConfigMaker\Helpers;
use Illuminate\Support\Facades\Facade;

class BaseCreatorFacade extends Facade{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'ConfigMakerBaseCreator';
    }
}
