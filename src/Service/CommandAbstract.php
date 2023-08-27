<?php

namespace Nece\Gears\SimpleSetting\Service;

use Nece\Gears\CommandAbstract as GearsCommandAbstract;
use Nece\Gears\IValidate;
use Nece\Gears\SimpleSetting\Repository\ISimpleSettingRepository;

abstract class CommandAbstract extends GearsCommandAbstract
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
    public function __construct(IValidate $validate, ISimpleSettingRepository $simpleSettingRepository)
    {
        $this->validate = $validate;
        $this->simpleSettingRepository = $simpleSettingRepository;
    }
}
