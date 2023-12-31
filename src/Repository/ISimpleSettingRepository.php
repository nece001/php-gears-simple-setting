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
     * 创建或更新（只更新记录不更新值）
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
     * 设置值
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-05
     *
     * @param SimpleSettingEntity $entity
     *
     * @return integer
     */
    public function setValue(SimpleSettingEntity $entity): int;

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
    public function find(int $id): ?SimpleSettingEntity;

    /**
     * 用争名查询一个实体
     *
     * @Author nece001@163.com
     * @DateTime 2023-09-02
     *
     * @param string $key_name
     *
     * @return SimpleSettingEntity
     */
    public function findByKeyName(string $key_name): ?SimpleSettingEntity;

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
