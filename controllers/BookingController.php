<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use linslin\yii2\curl;


class BookingController extends Controller
{
  public function actionIndex(){
    $session_id = 5968145;
    //cargamos datos de la api
    $station_list_check_in = array(
      "Function" => "GetStationList",
			"SessionId" => $session_id,
			"StationType" => "CheckIn"
    );
    $station_list_check_in_list = $this->get_api($station_list_check_in);
    $station_list_check_in_list = json_decode($station_list_check_in_list,true);

    //traemos las estaciones de retorno
    $station_list_check_in['StationType'] = 'CheckOut';
    $station_list_check_out_list = $this->get_api($station_list_check_in);
    $station_list_check_out_list = json_decode($station_list_check_out_list,true);

    return $this->render('index',[
      'data' => array(
        'station_check_in' => $station_list_check_in_list,
        'station_check_out' => $station_list_check_out_list
      )
    ]);
  }

  public function get_api($params){

    $curl = new curl\Curl();

        $response = $curl->setOption(
                CURLOPT_POSTFIELDS,
                json_encode($params)
                )
            ->post('http://www.triyolo.com/ejercicio/rest/index.php');

    return $response;
  }
}
