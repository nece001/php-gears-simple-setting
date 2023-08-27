<?php

namespace Nece\Gears\SimpleSetting\Service;

use Nece\Gears\Paginator;

class PagedListCommand extends CommandAbstract
{
    /**
     * 分页列表查询
     *
     * @Author nece001@163.com
     * @DateTime 2023-08-27
     *
     * @param array $params
     *
     * @return Paginator
     */
    public function execute(array $params): Paginator
    {
        return $this->simpleSettingRepository->pagedList($params);
    }
}
