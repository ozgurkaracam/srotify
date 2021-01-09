<?php

namespace App\Http\Controllers;

use App\Exports\StoryExport;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DashboardController extends Controller
{
    public function index(Request $request){

        $type=$request->input('type');
        if(in_array($type,['short','long']))
            $stories=Story::where(['status'=>1,'type'=>$type])->orderBy('ID','DESC')->paginate(9);
        else
            $stories=Story::where(['status'=>1])->orderBy('ID','DESC')->paginate(9);
        return view('dashboard',compact('stories'));

    }

    public function exceldeneme(){
//        $spreadsheet = new Spreadsheet();
//        $sheet = $spreadsheet->getActiveSheet();
//        $sheet->setCellValue('A1', 'Hello World !');
//
//        $writer = new Xlsx($spreadsheet);
//        $writer->save('hello world.xlsx');
//        $read=IOFactory::load('hello world.xlsx');
//        $read->getActiveSheet()->setCellValue('A2','Hello Me!');
//        $writer=new Xlsx($read);
//        $writer->save('helloooo.xlsx');
//        $read=IOFactory::load('pomform.xlsx');
//        $read->getActiveSheet()->setCellValue('C7','denemeeee');
//        (new Xlsx($read))->save('pomforms'.Str::random(5).'.xlsx');
        File::delete('public/deneme.xlsx');
    }
    public function export()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new StoryExport,'users.xlsx');
    }
}
