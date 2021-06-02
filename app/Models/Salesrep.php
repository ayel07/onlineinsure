<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesrep extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'salesrep';

    /**
     * Get the payrolls associated with this salesrep.
     */
    public function payrolls()
    {
        return $this->hasMany(Payroll::class, 'salesrep_id');
    }
}
