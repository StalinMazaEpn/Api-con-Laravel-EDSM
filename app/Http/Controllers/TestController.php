<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TestController extends Controller
{
    //
    public function all_posts(Request $request){
        
        $client = new Client();
        $request = $client->get('http://laravel.jsmc/api_laravel_ed/public/api/products/all?api_token=de146d0ffcb5cc0fed548d560d211a');
        $data = json_decode($request->getBody()->getContents());
        
        return response()->json($data);
        // dd($data);
    }

    public function create_user(Request $request){
        
        $client = new Client();
        $data = [
            'name' => "Juan",
            'city'  => "Bolivar",
            'age' => 35
        ];
        $request = $client->post('https://reqres.in/api/users',$data);
        $status_code = $request->getStatusCode();
        $content = $request->getBody()->getContents();
        dd($content);
        $arr1 = str_split($content);
        dd($arr1);
        die();
        $data = json_decode($request->getBody()->getContents());

        array_push($data, ["msg" => $status_code]);
        
        return response()->json($data);
        // dd($data);
    }

    public function update_user(Request $request){
        
        $client = new Client();
        $data = [
            'name' => "Juan",
            'job'  => "Supervisor Journal"
        ];
        $request = $client->put('https://reqres.in/api/users/2',$data);
        $data = json_decode($request->getBody()->getContents());
        
        return response()->json($data);
        // dd($data);
    }

    public function delete_user(Request $request){
        
        $client = new Client();
        $data = [];
        $request = $client->delete('https://reqres.in/api/users/2',$data);
        // $data = json_decode($request->getBody()->getContents());
        $status_code = $request->getStatusCode();
        if($status_code == "204"){
            return response()->json(['msg' => 'Usuario Eliminado Correctamente']);
        }else{
            return response()->json(['msg' => 'Usuario no fue Eliminado Correctamente']);
        }
       
        // dd($data);
    }
}
