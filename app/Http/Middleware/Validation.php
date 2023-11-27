<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\AddStudent;


class Validation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        //data validation process

        $vali= Validator::make($request->all(), [
            'name' => 'required|min:4',
            'age' => 'required|numeric|digits:2',
            'mobile' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'address' => 'required|min:10|max:100',
            'image' => 'mimes:jpg,bmp,png,svg'
        ]);


        if($vali->fails()){

            if($request->ajax()){

                return response()->json(['err'=>$vali->errors()], 200);

            }
            else{
            $request->flash();
            return redirect()->back()->withErrors($vali)->withInput();
            }
        }

        return $next($request);
    }
}
