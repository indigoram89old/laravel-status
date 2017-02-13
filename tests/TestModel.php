<?php

namespace Indigoram89\Status\Test;

use Indigoram89\Status\Status;
use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
