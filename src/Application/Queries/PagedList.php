<?php

namespace Nece\Gears\SimpleSetting\Application\Queries;

use Nece\Gears\Commands\PaginatorCommandAbstract;
use Nece\Gears\IValidator;
use Nece\Gears\Paginator;
use Nece\Gears\SimpleSetting\Repository\ISimpleSettingRepository;

/**
 * 分页查询
 *
 * @Author nece001@163.com
 * @DateTime 2023-10-05
 */
class PagedList extends PaginatorCommandAbstract
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
     * @return Paginator
     */
    public function execute(array $params): Paginator
    {
        return $this->simpleSettingRepository->pagedList($params);
    }
}
