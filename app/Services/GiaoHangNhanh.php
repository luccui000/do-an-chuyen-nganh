<?php

namespace App\Services;

use App\Contracts\GiaoHangInterface;
use App\Exceptions\GiaoHangException;
use Illuminate\Support\Facades\Http;

class GiaoHangNhanh implements GiaoHangInterface
{
    const DI_BO = 0;
    const MAY_BAY = 1;
    protected $http;

    protected $ToDistrictId;
    protected $ToWardCode;
    protected int $Height;
    protected int $Width;
    protected int $Weight;
    protected int $Length;
    protected int $InsuranceValue;
    protected string|null $Coupon;

    public function __construct(protected array $config)
    {
        $this->http = Http::baseUrl($this->config['base_uri'])
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Token' => $this->config['token'],
                'ShopId' => $this->config['shop_id']
            ]);
        $this->Height = 0;
        $this->Width = 0;
        $this->Weight = 5;
        $this->Length = 0;
        $this->InsuranceValue = 0;
        $this->Coupon = "";
    }
    public function phiVanChuyen($maPhuongXa, $maQuanHuyen, $maTinhThanh, $loaiDichVu = GiaoHangNhanh::DI_BO)
    {
        $this->toWardCode($maPhuongXa);
        $this->toDistrictId($maQuanHuyen);
        $dichvus = $this->layDichVu($this->ToDistrictId);
        if(!isset($dichvus[$loaiDichVu])) {
            throw new GiaoHangException("Không hỗ trợ giao hàng");
        }
        $serviceId = $dichvus[$loaiDichVu]['service_id'];
        $formData = [
            'from_district_id' => intval($this->config['from_district_id']),
            'service_id' => $serviceId,
            'service_type_id' => 2,
            'to_district_id' => intval($this->ToDistrictId),
            'to_ward_code' => $this->ToWardCode,
            'height' => $this->Height,
            'length' => $this->Length,
            'weight' => $this->Weight,
            'width' => $this->Width,
            'insurance_value' => $this->InsuranceValue,
            'coupon' =>  $this->Coupon
        ];
        $response = $this->http->post('/shiip/public-api/v2/shipping-order/fee', $formData);
        $collectData = $response->collect();
        if($collectData['code'] == 200) {
            return $collectData['data'];
        } else {
            return 0;
        }
    }
    public function layDichVu($maQuanHuyen)
    {
        $response = $this->http->post('/shiip/public-api/v2/shipping-order/available-services', [
            'shop_id' => +$this->config['shop_id'],
            'from_district' => +$this->config['from_district_id'],
            'to_district' => $maQuanHuyen
        ]);
        $collectData = $response->collect();
        if($collectData['code'] == 200) {
            return $collectData['data'];
        } else {
            return null;
        }
    }
    public function toDistrictId($value)
    {
        $this->ToDistrictId = intval($value);
        return $this;
    }

    public function toWardCode($value)
    {
        $this->ToWardCode = $value;
        return $this;
    }

    public function height($value)
    {
        $this->Height = $value;
        return $this;
    }

    public function width($value)
    {
        $this->Width = $value;
        return $this;
    }

    public function weight($value)
    {
        $this->Weight = $value;
        return $this;
    }
    public function length($value)
    {
        $this->Length = $value;
        return $this;
    }
    public function insuranceValue($value)
    {
        $this->InsuranceValue = $value;
    }
    public function coupon($value)
    {
        $this->Coupon = $value;
        return $this;
    }

}
