<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
// use App\Mail\TestEmail

class MailController extends Controller
{
    //ENVIAR CORREOS CON UNA ESTRUCTURA BASICA
    public function enviarBasico(){
        $data = ['mensaje' => 'Bienvenidos al Workshop'];
        // $data
        Mail::send([], $data, function ($body) {
            //Cuerpo del Envio del Correo Electrónico
            $body->to('stalinct97@gmail.com', 'Stalin Maza')->subject('Laravel API');
            $body->from('jersonPruebas1997@gmail.com', 'Api SM');
        });

        return response()->json([
            'response' => 'Se envió correctamente el correo',
            'code' => 200
        ]);

    }

    //Enviar correo con datos de HMTL
    public function enviarHTML(){
        $data = [
            'titulo' => 'Bienvenidos al Workshop API Laravel',
            "mensaje" => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate unde eos veniam eum, deserunt sed quae expedita ipsum esse fuga, praesentium perspiciatis dolorum natus quidem iure suscipit minima cupiditate ad!'
        ];
        // $data
        Mail::send('mails.testing', $data, function ($body) use ($data) {
            //Cuerpo del Envio del Correo Electrónico
            $body->to('stalinct97@gmail.com', 'Stalin Maza')->subject('Laravel API');
            $body->subject("Nuevos Cursos: " . $data['titulo']);
            $body->from('jersonPruebas1997@gmail.com', 'Api SM');
        });

        return response()->json([
            'response' => 'Se envió correctamente el correo con un HTML',
            'code' => 200
        ]);

    }

    //Enviar correo desde un template
    public function enviarTemplate(){
        $data = [
            'titulo' => 'Bienvenidos al Workshop API Laravel',
            "mensaje" => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate unde eos veniam eum, deserunt sed quae expedita ipsum esse fuga, praesentium perspiciatis dolorum natus quidem iure suscipit minima cupiditate ad!'
        ];
        // $data
        Mail::send('mails.template', $data, function ($body) use ($data) {
            //Cuerpo del Envio del Correo Electrónico
            $body->to('stalinct97@gmail.com', 'Stalin Maza')->subject('Laravel API Template');
            $body->subject("Nuevos Cursos: " . $data['titulo']);
            $body->from('jersonPruebas1997@gmail.com', 'Api SM');
        });

        return response()->json([
            'response' => 'Se envió correctamente el correo con un template',
            'code' => 200
        ]);

    }

}
