<?php

namespace Nece\Gears\SimpleSetting\Application\Commands;

use Nece\Gears\Commands\ArrayCommandAbstract;
use Nece\Gears\IValidator;
use Nece\Gears\SimpleSetting\Application\Consts;
use Nece\Gears\SimpleSetting\Repository\ISimpleSettingRepository;
use Nece\Util\ArrayUtil;

/**
 * 编辑记录命令
 *
 * @Author nece001@163.com
 * @DateTime 2023-10-05
 */
class EditCommand extends ArrayCommandAbstract
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
     * @param IValidator $validate
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
     * @return array
     */
    public function execute(array $params): array
    {
        $data = array('entity' => null);
        $id = ArrayUtil::getValue($params, 'id');
        if ($id) {
            $data['entity'] = $this->simpleSettingRepository->find($id);
        }

        $data['input_type'] = array(
            Consts::INPUT_TYPE_TEXT,
            Consts::INPUT_TYPE_SELECT,
            Consts::INPUT_TYPE_RADIO,
            Consts::INPUT_TYPE_CHECKBOX,
            Consts::INPUT_TYPE_FILE,
            Consts::INPUT_TYPE_TEXTAREA,
        );

        $data['value_type'] = array(
            Consts::VALUE_TYPE_STRING,
            Consts::VALUE_TYPE_NUMBER,
            Consts::VALUE_TYPE_BOOLEAN,
            Consts::VALUE_TYPE_ARRAY
        );

        return $data;
    }
}
