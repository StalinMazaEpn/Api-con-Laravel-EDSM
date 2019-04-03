<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use Illuminate\Support\Facades\Validator;

use File;
use Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'id' => 1, 'nombre' => 'Laravel desde Cero', "tipo" => 'libro',
            'costo' => '40USD'
        ];

        return response()->json([
            'data' => $data,
            'code' => 200
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeLocal(Request $request)
    {
        //name, file
        ### Validator::make, errors, fails

        // var_dump($request->json()->all());
        // var_dump($request->all());
        // die();
        $validator = Validator::make($request->all(), [
            'name' => "required|min:5",
            "img_path" => 'required|max:50000|mimes:jpg,jpeg,png,gif'
        ]);

        #KB, MAX: 10240 = 10MB
        // "img_path" => 'dimensions:min_width=100,min_height=200',
        // "img_path" => 'mimes:jpg,jpeg,png,gif',
        // "img_path" => 'required|max:mimes:jpg,jpeg,png,gif',


        if ($validator->fails()) {
            # no me dejes insertar enviar error en json
            return response()->json([
                'data' => $validator->errors(),
                'code' => 404
            ]);
        } else {
            #Subir el archivo a mi disco local

            $filename = $request->file('img_path');
            $extension = $filename->getClientOriginalExtension(); #La extension archivo
            $file_path = $filename->getFilename() . "." . $extension;
            Storage::disk('public')->put($file_path, File::get($filename));


            #Haga la insercion en la tabla Product BDD con Eloquent
            $product = new Product();
            $product->name = $request->name;
            $product->img_path = $file_path;
            $product->save();

            return response()->json([
                'data' => 'Inserción correcta',
                'code' => 200
            ]);
        }


    }


    public function storeS3(Request $request){
$validator = Validator::make($request->all(), [
            'name' => "required|min:5",
            "img_path" => 'required|max:50000|mimes:jpg,jpeg,png,gif'
        ]);

        #KB, MAX: 10240 = 10MB
        // "img_path" => 'dimensions:min_width=100,min_height=200',
        // "img_path" => 'mimes:jpg,jpeg,png,gif',
        // "img_path" => 'required|max:mimes:jpg,jpeg,png,gif',


        if ($validator->fails()) {
            # no me dejes insertar enviar error en json
            return response()->json([
                'data' => $validator->errors(),
                'code' => 404
            ]);
        } else {
            #Subir el archivo a mi disco local

            $filename = $request->file('img_path');
            $extension = $filename->getClientOriginalExtension(); #La extension archivo
            $file_path = $filename->getFilename() . "." . $extension;
            Storage::disk('s3')->put($file_path, File::get($filename),'public');


            #Haga la insercion en la tabla Product BDD con Eloquent
            $product = new Product();
            $product->name = $request->name;
            $product->img_path = $file_path;
            $product->save();

            return response()->json([
                'data' => 'Inserción correcta',
                'code' => 200
            ]);
        }
    }

}
