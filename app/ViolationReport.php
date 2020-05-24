<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViolationReport extends Model
{
    public $timestamps = true;
    protected $table = 'violation_reports';
    protected $fillable = ['violationable_type', 'violationable_id', 'report_violation_reason', 'report_violation_text', 'user_id', 'ip_address'];

}
