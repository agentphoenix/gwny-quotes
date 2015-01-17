<?php namespace Quote\Data\Repositories;

use User,
    UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface {

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function delete($id)
    {
        // Get the user
        $user = $this->getById($id);

        if ($user)
        {
            $user->delete();

            return $user;
        }

        return false;
    }

    public function update($id, array $data)
    {
        // Get the user
        $user = $this->getById($id);

        if ($user)
        {
            $item = $user->fill($data);

            $item->save();

            return $item;
        }

        return false;
    }

}