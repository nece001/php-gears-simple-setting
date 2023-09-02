<?php

namespace Nece\Gears\SimpleSetting\Entity;

use Nece\Gears\Entity;

class SimpleSettingEntity extends Entity
{
    public $id;
    public $create_time;
    public $update_time;
    public $is_hidden;
    public $is_disabled;
    public $is_require;
    public $sort;
    public $title;
    public $note;
    public $input_type;
    public $value_type;
    public $key_name;
    public $key_value;
    public $default_value;
    public $options;

    public function getValue()
    {
        return $this->key_value;
    }

    public function getOptions()
    {
    }
}
