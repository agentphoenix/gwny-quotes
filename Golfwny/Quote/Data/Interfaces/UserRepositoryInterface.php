<?php namespace Quote\Data\Interfaces;

interface UserRepositoryInterface extends BaseRepositoryInterface {

    public function create(array $data);
    public function delete($id);
    public function update($id, array $data);

}