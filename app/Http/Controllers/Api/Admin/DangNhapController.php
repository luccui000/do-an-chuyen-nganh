<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DangKyAdminRequest;
use App\Http\Requests\DangNhapAdminRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\UserNotDefinedException;

class DangNhapController extends Controller
{
    public function register(DangKyAdminRequest $request)
    {
        $user = $request->all();
        $user['password'] = Hash::make($request->password);

        $createdUser = User::create($user);

        return new JsonResponse(
            data: $createdUser,
            status: JsonResponse::HTTP_OK
        );
    }
    public function login(DangNhapAdminRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(!($token = Auth::guard('admin')->attempt($credentials))) {
            return new JsonResponse(data: [
                'error' => 'Email hoặc mật khẩu không đúng'
            ], status: JsonResponse::HTTP_UNAUTHORIZED);
        }
        $token = $this->createNewToken($token);

        return new JsonResponse(
            data: $token,
            status: JsonResponse::HTTP_OK
        );
    }
    public function profile()
    {
        try {
            $user = Auth::guard('admin')->userOrFail();
            return new JsonResponse(
                data: $user,
                status: JsonResponse::HTTP_OK
            );
        } catch (UserNotDefinedException $exception) {
            return new JsonResponse(
                data: [
                    'message' => "Không thể tìm thấy tài khoản"
                ],
                status: JsonResponse::HTTP_NOT_FOUND
            );
        }
    }
    public function createNewToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => Auth::guard('admin')->user()
        ];
    }
}
