<?php

namespace Nece\Gears\SimpleSetting\Application\Commands;

use Nece\Gears\Commnads\IntCommandAbstract;
use Nece\Gears\IValidator;
use Nece\Gears\SimpleSetting\Entity\SimpleSettingEntity;
use Nece\Gears\SimpleSetting\Repository\ISimpleSettingRepository;
use Nece\Util\ArrayUtil;

/**
 * 创建记录命令
 *
 * @Author nece001@163.com
 * @DateTime 2023-10-05
 */
class CreateCommand extends IntCommandAbstract
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
     * @return integer
     */
    public function execute(array $params): int
    {
        $this->validate->validate($params, array(
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
        $entity->key_name = ArrayUtil::getValue($params, 'key_name');
        $entity->key_value = ArrayUtil::getValue($params, 'key_value');
        $entity->default_value = ArrayUtil::getValue($params, 'default_value', '');
        $entity->options = ArrayUtil::getValue($params, 'options', '');

        if ($this->simpleSettingRepository->exists($entity)) {
            throw $this->validate->buildException('键名存在重复');
        }

        return $this->simpleSettingRepository->createOrUpdate($entity);
    }
}
