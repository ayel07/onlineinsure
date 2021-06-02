<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollClient extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payroll_clients';

    /**
     * Get the payroll associated with this client.
     */
    public function payroll()
    {
        return $this->belongsTo(Payroll::class, 'payroll_id');
    }
}
