<?php

namespace App\Http\Controllers\Api;

use App\Factories\KhachHangFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\KhachHangRequest;
use App\Models\KhachHang;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Exceptions\UserNotDefinedException;

class XacThucController extends Controller
{
    public function register(KhachHangRequest $request)
    {
        try {
            $khachhang = KhachHang::create(
                KhachHangFactory::make($request->all())->toArray()
            );
            return new JsonResponse(
                data: $khachhang,
                status: JsonResponse::HTTP_OK
            );
        } catch (\Exception $exception) {
            return new JsonResponse(
                data: $exception->getMessage(),
                status: JsonResponse::HTTP_OK,
            );
        }
    }
    public function login(Request $request)
    {
        $credentials = $this->getCredentials($request);
//        var_dump($credentials);

        if(!($token = Auth::guard('api')->attempt($credentials))) {
            return new JsonResponse(data: [
                'error' => 'Tên đăng nhập / Email / Số điện thoại hoặc mật khẩu không đúng'
            ], status: JsonResponse::HTTP_UNAUTHORIZED);
        }
        $token = $this->createNewToken($token);

        return new JsonResponse(
            data: $token,
            status: JsonResponse::HTTP_OK
        );
    }
    public function refresh()
    {
        return new JsonResponse(
            data: $this->createNewToken(Auth::guard('api')->refresh()),
            status: JsonResponse::HTTP_OK
        );
    }
    public function profile()
    {
        try {
            $user = Auth::guard('api')->userOrFail();
            return new JsonResponse(
                data: $user,
                status: JsonResponse::HTTP_OK
            );
        } catch (UserNotDefinedException $exception) {
            return new JsonResponse(
                data: [
                    'message' => $exception->getMessage()
                ],
                status: JsonResponse::HTTP_NOT_FOUND
            );
        }
    }
    public function logout()
    {
        Auth::guard('api')->logout();

        return new JsonResponse(
            data: [
                'message' => 'Bạn đã đăng xuất'
            ],status: JsonResponse::HTTP_OK
        );
    }
    public function getCredentials(Request $request)
    {
        $login = $request->email;

        if(Str::startsWith($login, '0') || Str::startsWith($login, '84')) {
            $field = 'so_dien_thoai';
        } else {
            $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'ten_dang_nhap';
        }
        return [
            $field        => $login,
            'password'  => $request->password
        ];
    }
    protected function createNewToken($token){
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => Auth::guard('api')->user()
        ];
    }
}
