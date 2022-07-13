<?php

namespace App\Http\Controllers\Api;

use App\Factories\DonHangFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\DonHangRequest;
use App\Models\DonHang;
use App\Models\KhachHang;
use App\Transformers\DonHangTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Invoice;

class DonHangController extends Controller
{
    public function index()
    {
        $donhangs = DonHang::with([
            'khachhang',
            'sanphams',
        ])->get();

        return fractal($donhangs, new DonHangTransformer())
            ->respond(JsonResponse::HTTP_OK, [], JSON_PRETTY_PRINT);
    }
    public function loctheo(Request $request)
    {
        $q = $request->query('trang_thai');

        $trangThai = match ($q) {
            "0" => DonHang::DA_HUY,
            "1" => DonHang::DANG_CHO_XAC_NHAN,
            "2" => DonHang::DA_XAC_NHAN,
            "3" => DonHang::DA_HOAN_THANH,
            default => null,
        };

        if($trangThai == null) {
            $donhangs = DonHang::with(['khachhang'])->get();
        } else {
            $donhangs = DonHang::with(['khachhang'])
                ->where('trang_thai', '=', $trangThai)
                ->get();
        }
        return new JsonResponse($donhangs);
    }
    public function donhanggannhat()
    {
        $donhang = DonHang::with([
            'khachhang',
            'sanphams'
        ])->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        return new JsonResponse(
            data: $donhang,
            status: JsonResponse::HTTP_OK
        );
    }
    public function store(DonHangRequest $request)
    {
        $formData = $request->all();
        if($request->has('khachhang_id')) {
            $khachhang = KhachHang::findOrFail($request->khachhang_id);
            $formData['ho'] = $khachhang->ho_khach_hang;
            $formData['ten'] = $khachhang->ten_khach_hang;
            $formData['so_dien_thoai'] = $khachhang->so_dien_thoai;
        }
        $donhang = DonHang::create(
            DonHangFactory::make($formData)
                ->toArray()
        );
        return new JsonResponse(
            data: $donhang,
            status: JsonResponse::HTTP_OK
        );
    }
    public function show($id)
    {
        $donhang = DonHang::where('id', '=', $id)
            ->orWhere('ma_don_hang', '=', $id)
            ->with(['khachhang', 'sanphams'])
            ->firstOrFail();

        return new JsonResponse(
            data: $donhang,
            status: JsonResponse::HTTP_OK
        );
    }
    public function timkiem(Request $request)
		{
			if($request->has('ma')) {
				$q = $request->get('ma');
        $donhang = DonHang::where('ma_don_hang', '=', $q)
            ->orWhereHas('khachhang', function($query) use ($q) {
                    $query->where('email', '=', $q);
            })
            ->with(['sanphams'])
            ->get();

        return new JsonResponse(
            data: $donhang,
            status: JsonResponse::HTTP_OK
        );
			} else {
				return new JsonResponse(
						data: [],
						status: JsonResponse::HTTP_OK
				);
			}
    }
    public function dsDonHang(Request $request)
    {
        $trangThai = $request->get('trang_thai') || 1;
        $donhang = null;
        switch ($trangThai) {
            case 0:
                $donhang = DonHang::with(['khachhang'])->where('trang_thai', '=', DonHang::DA_HUY)->get();
                break;
            case 1:
                $donhang = DonHang::with(['khachhang'])->where('trang_thai', '=', DonHang::DANG_CHO_XAC_NHAN)->get();
                break;
            case 2:
                $donhang = DonHang::with(['khachhang'])->where('trang_thai', '=', DonHang::DA_XAC_NHAN)->get();
                break;
            case 3:
                $donhang = DonHang::with(['khachhang'])->where('trang_thai', '=', DonHang::DA_HOAN_THANH)->get();
                break;
            default:
                $donhang = DonHang::with(['khachhang'])->get();
                break;
        }
        return new JsonResponse($donhang);
    }
    public function update(DonHangRequest $request, $id)
    {
//        $rules = (new DonHangRequest())->rules();
//        $validator = Validator::make($request->all(), $rules);
        $donhang = DonHang::findOrFail($id);


        return new JsonResponse(
            data: $donhang,
            status: JsonResponse::HTTP_OK
        );
    }
    public function choXacNhan(Request $request)
    {
        $donhang = DonHang::findOrFail($request->id);
        $donhang->update([
            'trang_thai' => DonHang::DA_XAC_NHAN
        ]);
        return new JsonResponse('OK');
    }
    public function dangGiaoHang(Request $request)
    {
        $donhang = DonHang::findOrFail($request->id);
        $donhang->update([
            'trang_thai' => DonHang::DA_HOAN_THANH
        ]);
        return new JsonResponse('OK');
    }
    public function huyDonHang(Request $request)
    {
        $donhang = DonHang::findOrFail($request->id);
        $donhang->update([
            'trang_thai' => DonHang::DA_HUY
        ]);
        return new JsonResponse('OK');
    }
    public function inHoaDon(Request $request)
    {
        $donhang = DonHang::with([
            'sanphams',
            'khachhang'
        ])->findOrFail($request->id);

        if($donhang->khachhang_id) {
            $customer = new Buyer([
                'name' => $donhang->khachhang->ho_khach_hang . ' ' . $donhang->khachhang->ten_khach_hang,
                'address' => $donhang->dia_chi,
                'custom_fields' => [
                    'Số điện thoại' => $donhang->khachhang->so_dien_thoai,
                    'Email' => $donhang->khachhang->email
                ]
            ]);
        } else {
            $customer = new Buyer([
                'name' => $donhang->ho . ' ' . $donhang->ten,
                'address' => $donhang->dia_chi,
                'custom_fields' => [
                    'Số điện thoại' => $donhang->so_dien_thoai,
                    'Email' => $donhang->email
                ]
            ]);
        }
        $items  = [];
        foreach ($donhang->sanphams as $sanpham) {
            $items[] = (new InvoiceItem())->title($sanpham->ten_sp)
                ->pricePerUnit($sanpham->pivot->don_gia)
                ->quantity($sanpham->pivot->so_luong);
        }
        $invoices = Invoice::make()
            ->buyer($customer)
            ->serialNumberFormat($donhang->ma_don_hang)
            ->addItems($items)
            ->shipping($donhang->phi_giao_hang)
            ->notes($donhang->ghi_chu || "")
            ->save('public');
        return $invoices->url();
    }
    public function destroy()
    {}

}
