<?php

namespace Nece\Gears\SimpleSetting\Entity;

use Nece\Gears\Entity;
use Nece\Gears\SimpleSetting\Application\Consts;

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

    /**
     * 获取值
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     *
     * @return mixed
     */
    public function getValue()
    {
        $value = $this->key_value ? $this->key_value : $this->default_value;
        return $this->formatValue($value, $this->value_type);
    }

    /**
     * 获取备选项
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->textToArray($this->options);
    }

    /**
     * 格式化
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-05
     *
     * @param string $value
     * @param string $type
     *
     * @return mixed
     */
    private function formatValue($value, $type)
    {
        switch ($type) {
            case Consts::VALUE_TYPE_BOOLEAN:
                return boolval($value);
            case Consts::VALUE_TYPE_STRING:
                return strval($value);
            case Consts::VALUE_TYPE_NUMBER:
                return floatval($value);
            case Consts::VALUE_TYPE_ARRAY:
                return $this->textToArray($value);
        }

        return $value;
    }

    /**
     * 转数组
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-05
     *
     * @param string $value
     *
     * @return array
     */
    private function textToArray($value)
    {
        $data = array();
        $rows = explode("\n", $value);
        foreach ($rows as $line) {
            $line = trim($line);
            $parts = explode(':', $line);
            if (count($parts) > 1) {
                $data[$parts[0]] = $parts[1];
            } else {
                $data[] = $line;
            }
        }
        return $data;
    }
}
