<?php

namespace App\Models;

use CodeIgniter\Model;

class Banner extends Model
{
    protected $table      = 'banner';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['titulo', 'texto', 'imagemUrl'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
        'titulo'     => 'required',
        'texto'      => 'required',
    ];

    protected $validationMessages = [
        'titulo'       => [
            'required' => 'Voce precisa inserir o Titulo'
        ],
        'texto'        => [
            'required' => 'Voce precisa inserir o Texto'
        ]
    ];
}