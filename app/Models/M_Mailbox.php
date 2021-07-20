<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Mailbox extends Model
{
    protected $table      = 'trx_contact';
    protected $primaryKey = 'trx_contact_id';
    protected $allowedFields = [
        'name',
        'email',
        'subject',
        'inquiry',
        'phone',
        'message',
        'isactive'
    ];
    protected $returnType = 'App\Entities\Mailbox';
    protected $useTimestamps = true;
}
