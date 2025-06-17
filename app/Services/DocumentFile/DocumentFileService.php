<?php

namespace App\Services\DocumentFile;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\DocumentFile\DocumentFile;

class DocumentFileService
{
    /**
     * Get paginated list of document files
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedDocumentFiles(int $perPage = 5): LengthAwarePaginator
    {
        return DocumentFile::orderBy('document_file_id', 'DESC')->paginate($perPage);
    }

    /**
     * Create a new document file
     *
     * @param array $data
     * @return DocumentFile
     */
    public function createDocumentFile(array $data): DocumentFile
    {
        $documentFile = DocumentFile::create($data);

        return $documentFile;
    }

    /**
     * Check if a document file can be deleted.
     *
     * @param int $document_file_id
     * @return void
     */
    public function canDeleteDocumentFile(int $document_file_id): bool
    {
        $documentFile = DocumentFile::find($document_file_id);

        // Todo

        return true;
    }

    /**
     * Delete document file
     *
     * @param int $document_file_id
     * @return void
     */
    public function deleteDocumentFile(int $document_file_id): void
    {
        $documentFile = DocumentFile::find($document_file_id);

        $documentFile->delete();
    }

    /**
     * Get total document file count
     *
     * @return int
     */
    public function getTotalDocumentFileCount(): int
    {
        return DocumentFile::count();
    }
}
