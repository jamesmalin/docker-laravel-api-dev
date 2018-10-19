<?php

namespace App\Api\V1\Controllers;

use App\Drink;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\ListRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Auth;

class ListController extends Controller
{
    /**
     * List the drinks
     *
     * @param ListRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(ListRequest $request)
    {
        // $credentials = $request->only(['email', 'password']);

        // try {
        //     $token = Auth::guard()->attempt($credentials);

        //     if(!$token) {
        //         throw new AccessDeniedHttpException();
        //     }

        // } catch (JWTException $e) {
        //     throw new HttpException(500);
        // }
        
       $results = Drink::orderBy('drink', 'desc')->take(10)->get();

        return response()
            ->json([
                'status' => 'ok',
                'results' => $results,
                'expires_in' => Auth::guard()->factory()->getTTL() * 60
            ]);
    }

    public function addToList(ListRequest $request)
    {
        // $credentials = $request->only(['email', 'password']);

        // try {
        //     $token = Auth::guard()->attempt($credentials);

        //     if(!$token) {
        //         throw new AccessDeniedHttpException();
        //     }

        // } catch (JWTException $e) {
        //     throw new HttpException(500);
        // }
        
       
       //$drink = new Drink($request->all());
       $drink = new Drink($request->only(['drink', 'description']));
       if(!$drink->save()) {
        throw new HttpException(500);
        }

        return response()
            ->json([
                'status' => 'ok'
            ]);
    }
}