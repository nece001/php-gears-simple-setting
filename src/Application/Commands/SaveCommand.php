<?php

namespace Nece\Gears\SimpleSetting\Application\Commands;

use Nece\Gears\Commands\IntCommandAbstract;
use Nece\Gears\IValidator;
use Nece\Gears\SimpleSetting\Entity\SimpleSettingEntity;
use Nece\Gears\SimpleSetting\Repository\ISimpleSettingRepository;
use Nece\Util\ArrayUtil;

/**
 * 保存记录命令
 *
 * @Author nece001@163.com
 * @DateTime 2023-10-05
 */
class SaveCommand extends IntCommandAbstract
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
     * @return integer
     */
    public function execute(array $params): int
    {
        $this->validator->validate($params, array(
            'title' => 'require',
            'input_type' => 'require',
            'value_type' => 'require',
            'key_name' => 'require',
        ));

        $entity = new SimpleSettingEntity();
        $entity->id = ArrayUtil::getValue($params, 'id');
        $entity->is_hidden = ArrayUtil::getInt($params, 'is_hidden', 0);
        $entity->is_disabled = ArrayUtil::getInt($params, 'is_disabled', 0);
        $entity->is_require = ArrayUtil::getInt($params, 'is_require', 0);
        $entity->sort = ArrayUtil::getInt($params, 'sort', 0);
        $entity->title = ArrayUtil::getValue($params, 'title');
        $entity->note = ArrayUtil::getValue($params, 'note', '');
        $entity->input_type = ArrayUtil::getValue($params, 'input_type');
        $entity->value_type = ArrayUtil::getValue($params, 'value_type');
        $entity->default_value = ArrayUtil::getValue($params, 'default_value', '');
        $entity->options = ArrayUtil::getValue($params, 'options', '');
        $entity->key_name = ArrayUtil::getValue($params, 'key_name');

        if ($this->simpleSettingRepository->exists($entity)) {
            throw $this->validator->buildException('键名存在重复');
        }

        return $this->simpleSettingRepository->createOrUpdate($entity);
    }
}
