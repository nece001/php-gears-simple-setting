<?php

namespace Nece\Gears\SimpleSetting\Application\Commands;

use Nece\Gears\Commands\IntCommandAbstract;
use Nece\Gears\IValidator;
use Nece\Gears\SimpleSetting\Repository\ISimpleSettingRepository;
use Nece\Util\ArrayUtil;

/**
 * 值设置命令
 *
 * @Author nece001@163.com
 * @DateTime 2023-10-05
 */
class SetCommand extends IntCommandAbstract
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
     * @param IValidator $validator
     * @param ISimpleSettingRepository $simpleSettingRepository
     */
    public function __construct(IValidator $validator, ISimpleSettingRepository $simpleSettingRepository)
    {
        parent::__construct($validator);
        $this->simpleSettingRepository = $simpleSettingRepository;
    }

    /**
     * 运行
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-05
     *
     * @param array $params
     *
     * @return integer
     */
    public function execute(array $params): int
    {
        $this->validator->validate($params, array(
            'id' => 'require',
            'key_value' => 'require',
        ));

        $id = ArrayUtil::getValue($params, 'id');

        $entity = $this->simpleSettingRepository->find($id);
        if ($entity) {
            $entity->key_value = ArrayUtil::getValue($params, 'key_value');
            return $this->simpleSettingRepository->setValue($entity);
        }
        return 0;
    }
}
