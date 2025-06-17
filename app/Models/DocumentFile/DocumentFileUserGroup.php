<?php

namespace App\Models\DocumentFile;

use Illuminate\Database\Eloquent\Model;

class DocumentFileUserGroup extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'document_file__user_group';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'document_file__user_group_id';

    protected $fillable = [
         'document_file_id', 'user_group_id',
    ];
}
