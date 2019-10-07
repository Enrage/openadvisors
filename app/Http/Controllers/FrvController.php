<?php

namespace App\Http\Controllers;

use App\Mail\FrvProf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Operation;
use PhpOffice\PhpSpreadsheet\{Spreadsheet, Writer\Xlsx};
use Illuminate\Support\Facades\Mail;

class FrvController extends Controller {
    public function __construct() {

    }

    public function frv_prof() {
        return view('pages.frv_prof');
    }

    public function operation_save(Request $request) {
        $operation = new Operation();
        $operation->user_id = Auth::user()->id;
        $operation->email = Auth::user()->email;
        $operation->phone = Auth::user()->phone;
        $operation->regulate = $request->regulate;
        $operation->actions = $request->operations;

        $operation->save();

        $actions = json_decode($request->operations);
        $row_count = count($actions);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Телефон');
        $sheet->setCellValue('B1', $operation->phone);
        $sheet->setCellValue('C1', 'Что и кого нормируем:');
        $sheet->setCellValue('D1', $operation->regulate);

        $sheet->setCellValue('A3', 'Дата:');
        $sheet->setCellValue('B3', 'Время:');
        $sheet->setCellValue('C3', 'Код:');
        $sheet->setCellValue('D3', 'Комментарий:');

        for ($i = 0; $i < $row_count; $i++) {
            $cell = $i + 4;
            $sheet->setCellValue('A' . $cell, explode(' ', $actions[$i]->time)[0]);
            $sheet->setCellValue('B' . $cell, explode(' ', $actions[$i]->time)[1]);
            $sheet->setCellValue('C' . $cell, $actions[$i]->code);
            $sheet->setCellValue('D' . $cell, $actions[$i]->comment);
        }

        $time = date('Y_m_d_H_i_s');
        $writer = new Xlsx($spreadsheet);
        if (!is_dir("documents/user_{$operation->user_id}")) {
            mkdir("documents/user_{$operation->user_id}", 0777, true);
        }
        $file_path = "/documents/user_{$operation->user_id}/frv_{$time}.xlsx";
        $writer->save("documents/user_{$operation->user_id}/frv_{$time}.xlsx");

        $operation->file_path = 'http://' . $request->server('SERVER_NAME') . $file_path;

        Mail::to($operation->email)->send(new FrvProf($operation));

        return json_encode($operation->email);
    }
}