<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payroll';

    /**
     * Get the sales rep associated with the permission.
     */
    public function salesrep()
    {
        return $this->belongsTo(Salesrep::class, 'salesrep_id');
    }

    /**
     * Get the clients associated with this payroll.
     */
    public function clients()
    {
        return $this->hasMany(PayrollClient::class, 'payroll_id');
    }
}
