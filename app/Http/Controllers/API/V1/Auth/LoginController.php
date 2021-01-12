<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\API\V1\ApiController;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends ApiController
{

    /**
     * Sign in the user
     *
     * @param Request $request
     * @return JsonResponse|Response
     * @throws ValidationException
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        $check = 0;
        try { // Find the user by ID
            $user = User::where('username', $request->input('username'))->with('roles')->firstOrFail();
            $check = 1;
        } catch (ModelNotFoundException $e) {
            return $this->respondWithError('Incorrect username or password');
        }
        /* if($check==0){
             try { // Find the user by ID
                 $user = User::where('email', $request->input('email'))->firstOrFail();
             } catch (ModelNotFoundException $e) {
                 return $this->respondWithError('Incorrect email or password');
             }
         }*/

        // Verify the password and generate the token
        if (!Hash::check($request->input('password'), $user->password)) {
            // Bad request
            return $this->respondWithError('Incorrect password');
        }

        return $this->tokenResponse($user->generateToken(), $user);
    }

    /**
     * Sign out the user
     *
     * @param session_id
     */
    public function logout(Request $request)
    {
        // Find the session with given ID
        // Set logged_out_time to current timestamp
    }

    protected function params($request)
    {
        // TODO: Implement params() method.
    }

    protected function getRules($request)
    {
        // TODO: Implement getRules() method.
    }
}
