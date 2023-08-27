<?php

namespace Nece\Gears\SimpleSetting\Repository;

use Nece\Gears\Paginator;
use Nece\Gears\SimpleSetting\Entity\SimpleSettingEntity;

interface ISimpleSettingRepository
{
    /**
     * 删除
     *
     * @Author nece001@163.com
     * @DateTime 2023-08-27
     *
     * @param array $ids
     *
     * @return integer
     */
    public function delete(array $ids): int;

    /**
     * 检查键名是否存在
     *
     * @Author nece001@163.com
     * @DateTime 2023-08-27
     *
     * @param SimpleSettingEntity $entity
     *
     * @return boolean
     */
    public function exists(SimpleSettingEntity $entity): bool;

    /**
     * 创建或更新
     *
     * @Author nece001@163.com
     * @DateTime 2023-08-27
     *
     * @param SimpleSettingEntity $entity
     *
     * @return integer
     */
    public function createOrUpdate(SimpleSettingEntity $entity): int;

    /**
     * 查询一个实体
     *
     * @Author nece001@163.com
     * @DateTime 2023-08-27
     *
     * @param integer $id
     *
     * @return SimpleSettingEntity
     */
    public function find(int $id): SimpleSettingEntity;

    /**
     * 分页列表
     *
     * @Author nece001@163.com
     * @DateTime 2023-08-27
     *
     * @param array $params
     *
     * @return \Nece\Gears\Paginator
     */
    public function pagedList(array $params): Paginator;
}
