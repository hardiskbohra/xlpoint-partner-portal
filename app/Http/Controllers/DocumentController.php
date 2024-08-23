<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\PdfToText\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PdfDataExport;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
       return view('documents.home');
    }
    
    public function uploadBankStatement(Request $request)
    {
        $request->validate([
            'bank_statement.*' => 'required|mimes:pdf|max:2048',
        ]);
        
        $filePaths = [];

        if ($request->hasFile('bank_statement')) {
            foreach ($request->file('bank_statement') as $file) {
                if ($file->isValid()) {
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $filePaths[] = $file->storeAs('documents', $fileName, 'public');                }
            }
        }

        return response()->json(['success' => true, 'file_paths' => $filePaths], 200);
    }
    
    public function convertToExcel(Request $request)
    {
        $files = $request->input('files');
        $pdfData = [];

        foreach ($files as $file) {
            $filePath = storage_path('app/public/documents/' . $file);
            $text = Pdf::getText($filePath); // Extract text from PDF
            dd($text);
            $pdfData[] = $this->parsePdfText($text); // Parse text into structured data
        }
        return response()->json(['success' => true, 'message' => 'Conversion successful']);
    }
}
