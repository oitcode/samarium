<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\DocumentFile;

class DocumentFileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }

    /**
     * Show the appointment component.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('document-file.dashboard.document-file');
    }

    public function pdfDisplayFile($documentFileId)
    {
        $documentFile = DocumentFile::find($documentFileId);

        if (Gate::allows('view-document-file', $documentFile)) {
            return response()->file('storage/' . $documentFile->file_path);
        } else {
            return 'No way';
        }

    }
}
