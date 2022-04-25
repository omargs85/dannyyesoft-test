<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\PasswordResetRequest;
use App\Http\Requests\UserForgotRequest;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Passport\Passport;

class SimpleAuthController extends Controller
{
    public function logout(Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        return response([
            'msg' => 'Bye!',
            'success' => true,
            'exception' => null,
            'time_execution' => microtime(true) - LARAVEL_START
        ], 200);
    }

    public function login(UserLoginRequest $request) {
        /**
         * @var Usuario $user
         */
        $user = Usuario::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $tokenResult = $user->createToken('Usuario loggeado', $user->getScopes());
                $token = $tokenResult->token;
                $token->expires_at = Carbon::now()->addDays($user->getExpiration());
                $token->save();

                return response([
                    'token' => $tokenResult->accessToken,
                    'msg' => "Hola, $user->S_Nombre!",
                    'success' => true,
                    'exception' => null,
                    'time_execution' => microtime(true) - LARAVEL_START
                ], 200);
            } else {
                return response([
                    'msg' => "Contraseña incorrecta.",
                    'success' => false,
                    'exception' => null,
                    'time_execution' => microtime(true) - LARAVEL_START],
                    422);
            }
        } else {
            return response([
                'msg' =>'El usuario no existe.',
                'success' => false,
                'exception' => null,
                'time_execution' => microtime(true) - LARAVEL_START
            ], 422);
        }
    }

    public function forgot(UserForgotRequest $request): JsonResponse {
        $email = request()->get('email');

        $user = Usuario::firstWhere('email', '=', $email);

        if ($user) {
            $token = Str::random(60);

            //Create Password Reset Token
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            $user->sendPasswordResetNotification($token);

            return response()->json(
                [
                    'msg' => 'Ok',
                    'success' => true,
                    'exception' => null,
                    'time_execution' => microtime(true) - LARAVEL_START
                ]
            );
        }

        return response()->json([
            'msg' => 'El usuario no existe.',
            'success' => false,
            'exception' => null,
            'time_execution' => microtime(true) - LARAVEL_START
        ]);
    }

    public function reset(PasswordResetRequest $request): JsonResponse {
        $result = $this->validateToken($request->get('token'));

        if ($result['success']) {
            $user = Usuario::firstWhere('email', '=', $request->get('email'));
            if ($user) {
                $user->password = bcrypt($request->get('password'));
                $user->save();
                DB::table('password_resets')->where('email', '=', $request->get('email'))->delete();
                return response()->json([
                    'msg' => 'Ok',
                    'success' => true,
                    'exception' => null,
                    'time_execution' => microtime(true) - LARAVEL_START
                ]);
            }
            $result['reason'] = 'El usuario no existe.';
        }

        return response()->json([
            'msg' => $result['reason'],
            'success' => false,
            'exception' => null,
            'time_execution' => microtime(true) - LARAVEL_START
        ]);
    }

    public function verifyToken(Request $request, string $token): JsonResponse {
        return response()->json(array_merge($this->validateToken($token),
            [
                'exception' => null,
                'time_execution' => microtime(true)- LARAVEL_START]
        ));
    }

    private function validateToken(string $token): array {
        $reason = "";
        $valid = false;
        $passwordReset = DB::table('password_resets')->where('token', '=', $token)->get()->first();
        if ($passwordReset) {
            if ( Carbon::parse($passwordReset->created_at)
                    ->addMinutes( config('password_restart.token_expiration', 30) ) < Carbon::now() ) {
                $reason = 'El token expiró.';
            }
            else {
                $valid = true;
            }
        }
        else {
            $reason = 'El token es invalido.';
        }
        return ["msg" => $reason, "success" => $valid];
    }
}
