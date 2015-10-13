<?php
/**
 * Created by PhpStorm.
 * User: cleconte
 * Date: 08/10/2015
 * Time: 10:10
 */
namespace App\Frontend\Modules\Device;



use OCFram\BackController;
use \OCFram\HTTPRequest;

class DeviceController extends  BackController
{

    public function executeIndex(HTTPRequest $request){

        $detect = new \Mobile_Detect;
        $deviceType = $detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer';
        // on ajoute la variable du type

        $this->page()->addVar('deviceType',$deviceType);


    }
}
