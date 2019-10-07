<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {
    protected $table = 'services';

    public function children() {
        return $this->hasMany(self::class, 'parent_id');
    }
}