<?php
/**
 * Created by PhpStorm.
 * User: vahid
 * Date: 6/9/19
 * Time: 8:19 PM
 */

namespace App\Repositories;


interface RepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function show($id);
}
