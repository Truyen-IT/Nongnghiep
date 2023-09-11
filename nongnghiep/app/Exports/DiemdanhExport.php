<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class DiemdanhExport implements FromCollection , WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array {
        return [
          'Tên nhân viên',
          'Carid',
          'Số tiền',
          'Ngày điểm danh',
          'Thời gian vào',
          'Thời gian ra',
         
        ];
      }
    public function collection()
    {

        return DB::table('tbl_diemdanh')
        ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
        ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->orderBy('tbl_diemdanh.diemdanh_id','desc')
        ->select('tbl_nhanvien.nhanvien_hoten','tbl_nhanvien.nhanvien_maso',
        'tbl_cap.captien','tbl_diemdanh.admin_time','tbl_diemdanh.admin_day','tbl_diemdanh.admin_arive')
        ->get();

    }
}
