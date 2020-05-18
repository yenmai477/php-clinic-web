<?php

namespace App\Http\Controllers;

use App\BenhNhan;
use App\ChiTietPKB;
use App\HoaDon;
use App\LoaiBenh;
use App\ThamSo;
use App\Thuoc;
use Illuminate\Http\Request;
use App\PhieuKhamBenh;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\BaoCaoDoanhThu;
use App\ChiTietBCDT;
use Maatwebsite\Excel\Facades\Excel;

class PhieuKhamController extends Controller
{
    //
    public function getDSKhamBenh()
    {
        $dsKhamBenh = PhieuKhamBenh::where('NgayKham', date('Y-m-d'))->get();
        return view('index.phieukhambenh.dskhambenh', compact('dsKhamBenh'));
    }

    public function getAjaxDSKhamBenh(Request $request)
    {
        if ($request->ajax()) {
            $Key = $request->key;
            $dsKhamBenh = PhieuKhamBenh::where('NgayKham', $Key)->get();
            $i = 0;
            foreach ($dsKhamBenh as $detail) {
                echo "<tr>";
                echo "<td>" . ++$i . "</td>";
                echo "<td>" . $detail->benhnhan->HoTen . "</td>";
                if ($detail->benhnhan->GioiTinh == 1)
                    echo "<td>Nữ</td>";
                elseif ($detail->benhnhan->GioiTinh == 2)
                    echo "<td>Nam</td>";
                else echo "<td>Khác</td>";
                echo "<td>" . $detail->benhnhan->NamSinh . "</td>";
                echo "<td>" . $detail->benhnhan->DiaChi . "</td>";
                echo "<td>" . "<a href='" . route('ct-phieukham.get', [$detail->MaPKB]) . "' target='_blank'
                                   class='btn btn-icon waves-effect waves-light btn-success' title='Chi tiết đơn thuốc'>
                                    Đơn thuốc</a>" . "</td>";
                echo "</tr>";
            }
        }
    }

    public function getXuatExcel($ngay)
    {
        $nameCompany = "Phòng Mạch Tư";
        $ngayFormat = date_format(date_create($ngay), 'd_m_Y');
        $dskhambenh = PhieuKhamBenh::where('NgayKham', $ngay)->get();
        if (count($dskhambenh) == 0)
            return redirect()->route('ds-khambenh.get')->with('error', 'Không có gì để xuất');
        Excel::create('Danh sách khám bệnh ngày ' . $ngayFormat, function ($excel) use ($dskhambenh, $nameCompany, $ngayFormat) {
            $excel->setCreator('Phần mềm quản lý phòng mạch tư')
                ->setCompany($nameCompany)
                ->setTitle('Danh sach kham benh')
                ->setDescription('Đây là danh sách khám bệnh được backup từ hệ thống');
            $excel->sheet('DSKB_' . $ngayFormat, function ($sheet) use ($dskhambenh) {
                //set font and size
                $sheet->setStyle(array(
                    'font' => array(
                        'name' => 'Times New Roman',
                        'size' => 13,
                        'bold' => false
                    ),
                    'text-align' => 'center'
                ));
                $sheet->row(1, array(
                    'Họ & Tên', 'Giới tính', 'Năm sinh', 'Địa chỉ'
                ));
                $sheet->row(1, function ($row) {
                    $row->setFontWeight('bold');
                });
                foreach ($dskhambenh as $i => $value) {
                    if ($value->benhnhan->GioiTinh == 1)
                        $sheet->row($i + 2, array(
                            $value->benhnhan->HoTen,
                            'Nữ',
                            $value->benhnhan->NamSinh,
                            $value->benhnhan->DiaChi
                        ));
                    elseif ($value->benhnhan->GioiTinh == 2)
                        $sheet->row($i + 2, array(
                            $value->benhnhan->HoTen,
                            'Nam',
                            $value->benhnhan->NamSinh,
                            $value->benhnhan->DiaChi
                        ));
                    else
                        $sheet->row($i + 2, array(
                            $value->benhnhan->HoTen,
                            'Khác',
                            $value->benhnhan->NamSinh,
                            $value->benhnhan->DiaChi
                        ));
                }
            });
        })->download('xlsx');
//        return redirect()->back();
    }

    public function getDSPhieuKham()
    {
        $dsPhieuKham = PhieuKhamBenh::all()->sortByDesc('created_at');
        return view('index.phieukhambenh.danhsach', compact('dsPhieuKham'));
    }

    public function getThemPhieuKham($id = 0)
    {
        $BenhNhan = BenhNhan::where('MaBN', $id)->count() != 0 ? BenhNhan::find($id)->MaBN : "";
        $SoBNDaKhamTrongNgay = PhieuKhamBenh::where('NgayKham', date('Y-m-d'))->count();
        $SoBNToiDa = ThamSo::where('ThamSo', 'SoBenhNhanToiDa')->first()->GiaTri;
        if ($SoBNDaKhamTrongNgay - $SoBNToiDa == 0)
            $CanhBao = 'Không thể thêm phiếu khám bệnh mới do đã khám quá số bệnh nhân tối đa được khám trong ngày.';
        else $CanhBao = "";
        $dsBenhNhan = BenhNhan::all()->sortByDesc('created_at');
        $dsLoaiBenh = LoaiBenh::all();
        $dsThuoc = Thuoc::all();
        return view("index.phieukhambenh.them", compact('dsBenhNhan', 'dsLoaiBenh', 'dsThuoc', 'SoBNDaKhamTrongNgay', 'SoBNToiDa', 'CanhBao', 'BenhNhan'));
    }

    public function postThemPhieuKham(Request $request)
    {
        $errors = new MessageBag();
        $SoBNDaKhamTrongKham = PhieuKhamBenh::where('NgayKham', date('Y-m-d'))->count();
        $SoBNToiDa = ThamSo::where('ThamSo', 'SoBenhNhanToiDa')->first()->GiaTri;
        if ($SoBNDaKhamTrongKham >= $SoBNToiDa) {
            $errors->add('err', 'Không thể thêm phiếu khám bệnh mới do đã khám quá số bệnh nhân tối đa được khám trong ngày.');
            return redirect()->route('them-phieukham.get')->withErrors($errors);
        } else {
            $dsThuoc = Thuoc::all();
            $messages = [
                'mabn.required' => 'Chưa chọn bệnh nhân.',
                'ngaykham.required' => 'Chưa có ngày khám.',
                'trieuchung.required' => 'Chưa nhập triệu chứng.',
                'trieuchung.min' => 'Triệu chứng quá ngắn.',
                'trieuchung.max' => 'Triệu chứng quá dài.',
                'loaibenh.required' => 'Chưa chọn loại bệnh.',
            ];
            $rules = [
                'mabn' => 'required',
                'ngaykham' => 'required',
                'trieuchung' => 'required|min:3|max:50',
                'loaibenh' => 'required',
            ];
            $errors = Validator::make($request->all(), $rules, $messages);
            if ($errors->fails()) {
                return redirect()
                    ->route('them-phieukham.get')
                    ->withErrors($errors)
                    ->withInput();
            }
            $PhieuKham = new PhieuKhamBenh();
            $PhieuKham->NgayKham = $request->ngaykham;
            $PhieuKham->MaBN = $request->mabn;
            $PhieuKham->TrieuChung = $request->trieuchung;
            $PhieuKham->MaLoaiBenh = $request->loaibenh;
            $PhieuKham->save();

            $TienKham = ThamSo::where('ThamSo', 'TienKham')->first();

            $HoaDon = new HoaDon();
            $HoaDon->MaPKB = $PhieuKham->MaPKB;
            $HoaDon->TienKham = $TienKham->GiaTri;

            $TienThuoc = 0;
            foreach ($dsThuoc as $detail) {
                $idThuoc = $detail->MaThuoc;
                $SoLuong = $request->$idThuoc;
                if ($SoLuong > 0 && $detail->SoLuongConLai >= $SoLuong) {
                    $ctpkb = new ChiTietPKB();
                    $ctpkb->MaPKB = $PhieuKham->MaPKB;
                    $ctpkb->MaThuoc = $detail->MaThuoc;
                    $ctpkb->DonGia = $detail->DonGia;
                    $ctpkb->SoLuong = $SoLuong * 1;
                    $ThanhTien = $detail->DonGia * $SoLuong * 1;
                    $ctpkb->ThanhTien = $ThanhTien;
                    $TienThuoc += $ThanhTien;

                    $detail->SoLuongConLai = $detail->SoLuongConLai - $SoLuong;
                    $detail->save();

                    $ctpkb->save();
                }
            }

            $HoaDon->TienThuoc = $TienThuoc;
            $HoaDon->save();
//            $this->ThemBaoCaoDT();
            return redirect()->route('them-phieukham.get')->with('success', "Thêm phiếu khám bệnh thành công<br/><a href='". route('ct-phieukham.get',[$PhieuKham->MaPKB]) ."'>Click vào đây để xem đơn thuốc</a>");
        }
    }

    public function getSuaPhieuKham($id)
    {
        $errors = new MessageBag();
        $DemPKB = PhieuKhamBenh::where('MaPKB', $id)->count();
        if ($DemPKB == 0) {
            $errors->add('err', 'Phiếu khám bệnh không tồn tại.');
            return redirect()->route('ds-phieukham.get')->withErrors($errors);
        } else {
            $PKB = PhieuKhamBenh::find($id);
            $ctpkb = ChiTietPKB::where('MaPKB', $PKB->MaPKB)->get();
            $arrThuocLoaiTru = array();
            foreach ($ctpkb as $i => $detail) {
                $arrThuocLoaiTru[$i] = $detail->MaThuoc;
            }
            $dsBenhNhan = BenhNhan::all()->sortByDesc('created_at');
            $dsLoaiBenh = LoaiBenh::all();
            $dsThuoc = Thuoc::whereNotIn('MaThuoc', $arrThuocLoaiTru)->get();
            return view("index.phieukhambenh.sua", compact('PKB', 'dsBenhNhan', 'dsLoaiBenh', 'dsThuoc', 'ctpkb'));
        }
    }

    public function postSuaPhieuKham(Request $request, $id)
    {
        $errors = new MessageBag();
        $DemPKB = PhieuKhamBenh::where('MaPKB', $id)->count();
        if ($DemPKB == 0) {
            $errors->add('err', 'Phiếu khám bệnh không tồn tại.');
            return redirect()->route('ds-phieukham.get')->withErrors($errors);
        } else {
            $messages = [
//                'mabn.required' => 'Chưa chọn bệnh nhân.',
                'ngaykham.required' => 'Chưa có ngày khám.',
                'trieuchung.required' => 'Chưa nhập triệu chứng.',
                'trieuchung.min' => 'Triệu chứng quá ngắn.',
                'trieuchung.max' => 'Triệu chứng quá dài.',
                'loaibenh.required' => 'Chưa chọn loại bệnh.',
            ];
            $rules = [
//                'mabn' => 'required',
                'ngaykham' => 'required',
                'trieuchung' => 'required|min:3|max:50',
                'loaibenh' => 'required',
            ];
            $errors = Validator::make($request->all(), $rules, $messages);
            if ($errors->fails()) {
                return redirect()
                    ->route('sua-phieukham.get', [$id])
                    ->withErrors($errors)
                    ->withInput();
            }

            $PhieuKham = PhieuKhamBenh::find($id);
            $PhieuKham->TrieuChung = $request->trieuchung;
            $PhieuKham->MaLoaiBenh = $request->loaibenh;
            $PhieuKham->save();

            $dsCTPKB = ChiTietPKB::where('MaPKB', $PhieuKham->MaPKB)->get();

            $HoaDon = HoaDon::where('MaPKB', $id)->first();

            $TienThuoc = 0;
            foreach ($dsCTPKB as $detail) {
                $Thuoc = Thuoc::where("MaThuoc", $detail->MaThuoc)->first();
                $idThuoc = $detail->MaThuoc;
                $SoLuong = $request->$idThuoc;
                if ($SoLuong > 0 && ($detail->SoLuong + $Thuoc->SoLuongConLai) >= $SoLuong) {
                    $detail->SoLuong = $SoLuong * 1;
                    $ThanhTien = $detail->DonGia * $SoLuong * 1;
                    $detail->ThanhTien = $ThanhTien;
                    $TienThuoc += $ThanhTien;

                    $Thuoc->SoLuongConLai = ($Thuoc->SoLuongConLai + $detail->SoLuong) - $SoLuong;
                    $Thuoc->save();

                    $detail->save();
                } else {
//                    $soluong = 0;
//                    $detail->SoLuong = $soluong * 1;
//                    $thanhtien = $detail->DonGia * $soluong * 1;
//                    $detail->ThanhTien = $thanhtien;
//                    $tienthuoc += $thanhtien;
//                    $detail->save();
                    $detail->delete();
                }
            }

            $arrThuocLoaiTru = array();
            foreach ($dsCTPKB as $i => $detail) {
                $arrThuocLoaiTru[$i] = $detail->MaThuoc;
            }

            //danh sach thuoc dung sau khi sua
            $dsThuoc = Thuoc::whereNotIn('MaThuoc', $arrThuocLoaiTru)->get();

            foreach ($dsThuoc as $detail) {
                $idThuoc = $detail->MaThuoc;
                $SoLuong = $request->$idThuoc;
                if ($SoLuong > 0 && $detail->SoLuongConLai >= $SoLuong) {
                    $ctpkb = new ChiTietPKB();
                    $ctpkb->MaPKB = $PhieuKham->MaPKB;
                    $ctpkb->MaThuoc = $detail->MaThuoc;
                    $ctpkb->DonGia = $detail->DonGia;
                    $ctpkb->SoLuong = $SoLuong * 1;
                    $ThanhTien = $detail->DonGia * $SoLuong * 1;
                    $ctpkb->ThanhTien = $ThanhTien;
                    $TienThuoc += $ThanhTien;

                    $detail->SoLuongConLai = $detail->SoLuongConLai - $SoLuong;
                    $detail->save();

                    $ctpkb->save();
                }
            }

            $HoaDon->TienThuoc = $TienThuoc;
            $HoaDon->save();
//            $this->SuaBaoCaoDT($id);
            return redirect()->route('sua-phieukham.get', [$id])->with('success', 'Sửa phiếu khám bệnh thành công');
        }
    }

    public function getXoaPhieuKham($id)
    {
        $errors = new MessageBag();
        $DemPKB = PhieuKhamBenh::where('MaPKB', $id)->count();
        if ($DemPKB == 0) {
            $errors->add('err', 'Phiếu khám bệnh không tồn tại.');
            return redirect()->route('ds-phieukham.get')->withErrors($errors);
        } else {
            $PKB = PhieuKhamBenh::find($id);
            $PKB->delete();
            return redirect()->route('ds-phieukham.get')->with('success', 'Xóa thành công.');
        }
    }

    public function getCTPhieuKham($id)
    {
        $PKB = PhieuKhamBenh::find($id);
        return view('index.phieukhambenh.chitiet', compact('PKB'));
    }

    public function getHDPhieuKham($id)
    {
        $PKB = PhieuKhamBenh::find($id);
        return view('index.phieukhambenh.hoadon', compact('PKB'));
    }
}
