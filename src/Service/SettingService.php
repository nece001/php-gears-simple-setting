<?php

namespace Nece\Gears\SimpleSetting\Service;

use Nece\Gears\SimpleSetting\Repository\ISimpleSettingRepository;

class SettingService
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
     * @param ISimpleSettingRepository $simpleSettingRepository
     */
    public function __construct(ISimpleSettingRepository $simpleSettingRepository)
    {
        $this->simpleSettingRepository = $simpleSettingRepository;
    }

    public function getValue($key_name)
    {
        $entity = $this->simpleSettingRepository->findByKeyName($key_name);
        if ($entity) {
            return $entity->getValue();
        }
        return null;
    }
}
