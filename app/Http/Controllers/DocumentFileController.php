<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
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
        $this->middleware(['auth', 'verified', 'isAdmin',]);
    }

    /**
     * Show the dashboard document file view.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        return view('dashboard.document-file');
    }

    public function pdfDisplayFile($documentFileId): mixed
    {
        $documentFile = DocumentFile::find($documentFileId);

        if (Gate::allows('view-document-file', $documentFile)) {
            return response()->file('storage/' . $documentFile->file_path);
        } else {
            return 'Not allowed';
        }
    }
}
