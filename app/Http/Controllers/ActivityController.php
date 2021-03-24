<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ActivityModel;
use App\AuthModel;
use App\RiwayatTransaksi;
use App\RequestTopup;
use Carbon\Carbon;


class ActivityController extends Controller
{
    public $api_url = 'https://borneo-panel.com/api/'; // API Url Borneo Panel API

    public $api_key = 'BP-F9U2381SH47L19'; // Your API Key In Borneo Panel
    
    public $user_key = '5ccfde2ae75b8c183da3eb9f9d87d8c46bb07359'; // Your User Key In Borneo Panel
    
    private function connect($end_point, $post) {
        $_post = Array();
        if (is_array($post)) {
            foreach ($post as $name => $value) {
                $_post[] = $name.'='.urlencode($value);
            }
        }
        $ch = curl_init($end_point);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        if (is_array($post)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, join('&', $_post));
        }
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        $result = curl_exec($ch);
        if (curl_errno($ch) != 0 && empty($result)) {
            $result = false;
        }
        curl_close($ch);
        return $result;
    }

    public function buy_pulsa(Request $request) {
        try{
            $dataUser = new RiwayatTransaksi;
            $dataUser->kode_layanan=$request->id_service;
            $dataUser->cust_num=$request->phone_number;
            $dataUser->username=$request->phone_number;
            $dataUser->nominal=$request->total;
            $dataUser->save();
        }catch (Exception $e){
            return response()->json([
                "message"=>"Something Wrong",
                "serve"=>[]
            ],500);
        }
        try{
            $dataUser = new UserSaldo;
            $dataUser->saldo = $saldo;
            $dataUser ->$nominal = $request->total;
            $dataUser ->saldo = $saldo-$nominal;
            $dataUser->save();
        }catch (Exception $e){
            return response()->json([
                "message"=>"Something Wrong",
                "serve"=>[]
            ],500);
        }
        return json_decode($this->connect($this->api_url, array(
            'api' => $this->api_key,
            'user' => $this->user_key,
            'action' => 'buy',
            'target' => $request->phonenumber,
            'service' => $request->id_service,
            'jenis' => 'buy_pulsa'
        )), true);

    }

    public function buy_kuota(Request $request) {
        try{
            $dataUser = new RiwayatTransaksi;
            $dataUser->kode_layanan=$request->id_service;
            $dataUser->cust_num=$request->phone_number;
            $dataUser->nominal=$request->total;
            $dataUser->save();
        }catch (Exception $e){
            return response()->json([
                "message"=>"Something Wrong",
                "serve"=>[]
            ],500);
        }
        try{
            $dataUser = new UserSaldo;
            $dataUser->saldo = $saldo;
            $dataUser ->$nominal = $request->total;
            $dataUser ->saldo = $saldo-$nominal;
            $dataUser->save();
        }catch (Exception $e){
            return response()->json([
                "message"=>"Something Wrong",
                "serve"=>[]
            ],500);
        }
        return json_decode($this->connect($this->api_url, array(
            'api' => $this->api_key,
            'user' => $this->user_key,
            'action' => 'buy',
            'target' =>  $request->phonenumber,
            'service' => $request->id_service,
            'jenis' => 'buy_kuota'
        )), true);
    }
    public function buy_token(Request $request) {
        try{
            $dataUser = new RiwayatTransaksi;
            $dataUser->kode_layanan=$request->id_service;
            $dataUser->cust_num=$request->phone_number;
            $dataUser->nominal=$request->total;
            $dataUser->save();
        }catch (Exception $e){
            return response()->json([
                "message"=>"Something Wrong",
                "serve"=>[]
            ],500);
        }
        try{
            $dataUser = new UserSaldo;
            $dataUser->saldo = $saldo;
            $dataUser ->$nominal = $request->total;
            $dataUser ->saldo = $saldo-$nominal;
            $dataUser->save();
        }catch (Exception $e){
            return response()->json([
                "message"=>"Something Wrong",
                "serve"=>[]
            ],500);
        }
        return json_decode($this->connect($this->api_url, array(
            'api' => $this->api_key,
            'user' => $this->user_key,
            'action' => 'buy',
            'target' =>  $request->phonenumber,
            'service' => $request->id_service,
            'nopln' => $request->token,
            'jenis' => 'buy_token'
        )), true);
    }

    public function permintaan(Request $request){
        try{
            $dataUser = new RequestTopup;
            $dataUser->id=$request->user_id;
            $dataUser->phone_number=$request->phone_number;
            $dataUser->img='NULL';
            $dataUser->nominal=$request->total;
            $dataUser->status='Belum';
            $dataUser->save();
            return response()->json([
                "message"=>"Success",
                "serve"=>[]
            ],200);
        }catch (Exception $e){
            return response()->json([
                "message"=>"Something Wrong",
                "serve"=>[]
            ],500);
        }
    }

}