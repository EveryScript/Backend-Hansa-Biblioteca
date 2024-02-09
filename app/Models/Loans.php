<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    use HasFactory;

    protected $table = 'loans';

    protected $fillable = [
        'book_id',
        'client_id',
        'date_loan',
        'days_loan',
        'status'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
