<?php

namespace App\Classes;

use App\Contracts\DiaChiInterface;
use Illuminate\Support\Facades\Http;

class DiaChi implements DiaChiInterface
{
    protected $http;

    public function __construct(private array $config)
    {
        $this->http = Http::baseUrl($this->config['base_uri'])
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Token' => $this->config['token']
            ]);
    }

    public function dsTinhThanh(): array
    {
        $response = $this->http->get('/shiip/public-api/master-data/province');
        $collectData = $response->collect();

        if($collectData['code'] == 200) {
            return array_map(function ($item) {
                return [
                    'id' => $item['ProvinceID'],
                    'name' => $item['ProvinceName'],
                    'created_at' => $item['CreatedAt']
                ];
            }, $collectData['data']);
        } else {
            return [];
        }
    }

    public function dsQuanHuyen($maTinhThanh): array
    {
        $response = $this->http->get("/shiip/public-api/master-data/district?province_id={$maTinhThanh}");
        $collectData = $response->collect();

        if($collectData['code'] == 200) {
            return array_map(function ($item) {
                return [
                    'id' => $item['DistrictID'],
                    'name' => $item['DistrictName'],
                    'created_at' => $item['CreatedAt']
                ];
            }, $collectData['data']);
        } else {
            return [];
        }
    }

    public function dsXaPhuong($maQuanHuyen): array
    {
        $response = $this->http->get("/shiip/public-api/master-data/ward?district_id={$maQuanHuyen}");
        $collectData = $response->collect();

        if($collectData['code'] == 200) {
            return array_map(function ($item) {
                return [
                    'id' => $item['WardCode'],
                    'name' => $item['WardName'],
                    'created_at' => $item['CreatedAt']
                ];
            }, $collectData['data']);
        } else {
            return [];
        }
    }
}
