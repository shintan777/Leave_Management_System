<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Leave extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use Sortable;
    protected $fillable = [
        'employee_id',
        'leave_type',
        'date_from',
        'date_to',
        'days',
        'reason',
        'department',
        'rejectionreason',
        'image',
        'remark',
    ];
    
    public $sortable = ['employee_id','leave_type','date_from','date_to','days','reason','department','image','remark'];
    public function users()
    {
        return $this->belongsTo('App\User', 'employee_id');
        return $this->belongsTo('App\User', 'department');
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved',true);
    }

}
