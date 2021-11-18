<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Common\CreditCard;
use Omnipay\FirstData\Ach;
use Omnipay\Nuvei\Ach as NAch;

use Omnipay\Nuvei\Gateway;
use Omnipay\Omnipay;

class ProcessorController extends Controller
{
	public function run($filename){


		$config = $this->parseFile($this->loadFile($filename));
		$this->convertPaymentMethod($config);
		$this->addTransactionId($config);

		$gateway = Omnipay::create($config['gateway']);
		$gateway->initialize($config['config']);

		$request =$gateway->purchase($config['transaction']);
		dump($request->getData());

		$result = $request->send();

		dd($result);
	}

	public function loadFile($filename){
		return \Storage::disk('local')->get("/config/$filename.json");
	}

	public function parseFile($text){
		return json_decode($text,true,4,JSON_THROW_ON_ERROR);
	}

	public function convertPaymentMethod(&$config){
		if(isset($config['transaction']['card'])){
			$config['transaction']['card'] = new CreditCard($config['transaction']['card']);

		}else if(isset($config['transaction']['ach'])){
			if($config['gateway'] == 'Nuvei'){
				$config['transaction']['ach'] = new NAch($config['transaction']['ach']);
			}else{
				$config['transaction']['ach'] = new Ach($config['transaction']['ach']);
			}
		}else{
			throw new \Exception("No payment method in config file");
		}
	}

	public function addTransactionId(&$config){
		$config['transaction']['transactionId'] = Gateway::generateUniqueOrderId();
	}
}
