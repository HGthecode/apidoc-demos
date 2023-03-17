<?php

namespace app\model;

use support\Model;
use hg\apidoc\annotation as Apidoc;

class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    #[
        Apidoc\Field(['nickname','name']),
    ]
    public function getInfo(){

    }
}