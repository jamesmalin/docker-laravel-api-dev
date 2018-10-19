<?php

namespace App\Api\V1\Controllers;

use App\ConsumedDrink;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\ConsumedDrinkRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Auth;

class ConsumedDrinkController extends Controller
{
    /**
     * List the drinks
     *
     * @param ConsumedDrinkRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(ConsumedDrinkRequest $request)
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
        
       //$results = ConsumedDrink::orderBy('created_at', 'desc')->take(1)->get();

       $results = ConsumedDrink::whereDate('created_at', DB::raw('CURDATE()'))->get();

        return response()
            ->json([
                'status' => 'ok',
                'results' => $results,
                'expires_in' => Auth::guard()->factory()->getTTL() * 60
            ]);
    }

    public function addToList(ConsumedDrinkRequest $request)
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
       $drink = new ConsumedDrink($request->only(['drink', 'caffeine_consumed']));
       if(!$drink->save()) {
        throw new HttpException(500);
        }

        return response()
            ->json([
                'status' => 'ok'
            ]);
    }
}