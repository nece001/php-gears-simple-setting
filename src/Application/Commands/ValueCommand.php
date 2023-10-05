<?php

namespace Nece\Gears\SimpleSetting\Application\Commands;

use Nece\Gears\CommandAbstract;
use Nece\Gears\IValidator;
use Nece\Gears\SimpleSetting\Application\Consts;
use Nece\Gears\SimpleSetting\Repository\ISimpleSettingRepository;
use Nece\Util\ArrayUtil;

/**
 * 获取值命令
 *
 * @Author nece001@163.com
 * @DateTime 2023-10-05
 */
class ValueCommand extends CommandAbstract
{
    /**
     * 模型存储仓库
     *
     * @var ISimpleSettingRepository
     * @Author nece001@163.com
     * @DateTime 2023-07-02
     */
    protected $simpleSettingRepository;

    /**
     * 构造
     *
     * @Author nece001@163.com
     * @DateTime 2023-08-27
     *
     * @param IValidate $validate
     * @param ISimpleSettingRepository $simpleSettingRepository
     */
    public function __construct(IValidator $validate, ISimpleSettingRepository $simpleSettingRepository)
    {
        $this->validate = $validate;
        $this->simpleSettingRepository = $simpleSettingRepository;
    }

    /**
     * 运行
     *
     * @Author nece001@163.com
     * @DateTime 2023-08-27
     *
     * @param array $params
     *
     * @return mixed
     */
    public function execute(array $params): mixed
    {
        $this->validate->validate($params, array(
            'key_name' => 'require',
        ));

        $key_name = ArrayUtil::getValue($params, 'key_name', '');
        $entity = $this->simpleSettingRepository->findByKeyName($key_name);

        if ($entity) {
            return $this->formatValue($entity->key_value, $entity->value_type);
        }
        return null;
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
                return $this->valueToArray($value);
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
    private function valueToArray($value)
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
