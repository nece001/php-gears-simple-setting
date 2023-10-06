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
     * @DateTime 2023-08-27
     *
     * @param array $params
     *
     * @return mixed
     */
    public function execute(array $params): mixed
    {
        $this->validator->validate($params, array(
            'key_name' => 'require',
        ));

        $key_name = ArrayUtil::getValue($params, 'key_name', '');
        $entity = $this->simpleSettingRepository->findByKeyName($key_name);

        if ($entity) {
            return $entity->getValue();
        }
        return null;
    }
}
