<?php

namespace Indigoram89\Status;

use Indigoram89\Fetchable\Fetchable;
use Illuminate\Database\Eloquent\Model;
use Indigoram89\Translatable\Translatable;

class Status extends Model
{
    use Fetchable, Translatable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'laravel_statuses';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Translatable attributes.
     *
     * @var array
     */
    protected $translatable = ['name'];

    /**
     * Get an attributes for search a record in the database.
     *
     * @return array
     */
    public function fetchableAttributes() : array
    {
        return [
            'label' => snake_case(class_basename($this)),
        ];
    }

    /**
     * Get an attributes for create a record in the database.
     *
     * @return array
     */
    public function fetchableValues() : array
    {
        return [
            'name' => $this->getName(),
        ];
    }
}
