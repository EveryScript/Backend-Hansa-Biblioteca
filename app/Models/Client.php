<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'email',
        'phone'
    ];

    public function loans()
    {
        return $this->hasMany(Loans::class);
    }
    public function loansUnreturned()
    {
        $date = Carbon::now();
        return $this->hasMany(Loans::class)
            ->join('books', 'loans.book_id', 'books.id')
            ->select(
                'loans.id',
                'books.title',
                'loans.client_id',
                'loans.status',
                'loans.date_loan',
                'loans.days_loan',
                Loans::raw('DATE_ADD(loans.date_loan, INTERVAL loans.days_loan DAY) AS expired_loan')
            )
            ->where('loans.status', 'En Prestamo')
            ->whereRaw("DATE_ADD(loans.date_loan, INTERVAL loans.days_loan DAY) < '$date'")
            ->orderBy('loans.date_loan', 'DESC');
    }
}
