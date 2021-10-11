<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    public function logs()
    {
        return $this->hasMany(UrlLog::class, 'url_id');
    }

    public function lastLog()
    {
        $log = $this->logs()->orderBy('id', 'desc')->first();
        if (isset($log->status)) {
            $badge = $log->status == 200 ? 'success' : 'danger';
            $log->badge = '<span class="badge bg-' . $badge . '">' . $log->status . '</span>';
        }
        return $log;
    }
}
