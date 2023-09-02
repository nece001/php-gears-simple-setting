<?php

namespace Nece\Gears\SimpleSetting\Application;

use Nece\Gears\IValidator;
use Nece\Gears\SimpleSetting\Service\SettingService;

class SettingApplication
{
    /**
     * 验证实例
     *
     * @var IValidator
     * @Author nece001@163.com
     * @DateTime 2023-09-02
     */
    protected $validator;

    protected $settingService;

    public function __construct(IValidator $validator, SettingService $settingService)
    {
        $this->validator = $validator;
        $this->settingService = $settingService;
    }

    public function getValue(array $params)
    {
        $this->validator->validate($params, array(
            'key_name' => 'require'
        ));

        $key_name = $params['key_name'];

        return $this->settingService->getValue($key_name);
    }
}
