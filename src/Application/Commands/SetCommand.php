<?php

namespace Nece\Gears\SimpleSetting\Application\Commands;

use Nece\Gears\Commnads\IntCommandAbstract;
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
     * @DateTime 2023-10-05
     *
     * @param array $params
     *
     * @return integer
     */
    public function execute(array $params): int
    {
        $this->validate->validate($params, array(
            'id' => 'require',
            'value' => 'require',
        ));

        $id = ArrayUtil::getValue($params, 'id');

        $entity = $this->simpleSettingRepository->find($id);
        if ($entity) {
            $entity->key_value = ArrayUtil::getValue($params, 'value');
            return $this->simpleSettingRepository->createOrUpdate($entity);
        }
        return 0;
    }
}
