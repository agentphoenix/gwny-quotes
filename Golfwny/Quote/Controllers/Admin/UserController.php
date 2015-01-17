<?php namespace Quote\Controllers\Admin;

use View,
    Event,
    Flash,
    Input,
    Redirect,
    UserRepositoryInterface,
    UserValidator as Validator;
use Quote\Controllers\BaseController;

class UserController extends BaseController {

    protected $users;
    protected $validator;

    public function __construct(UserRepositoryInterface $users, Validator $validator)
    {
        parent::__construct();

        $this->users = $users;
        $this->validator = $validator;
    }

    public function index()
    {
        return View::make('pages.admin.users.index')
            ->withUsers($this->users->all());
    }

    public function create()
    {
        return View::make('pages.admin.users.create');
    }

    public function store()
    {
        // Validate
        $this->validator->validate(Input::all());

        // Create the user
        $user = $this->users->create(Input::all());

        // Fire the event
        Event::fire('user.created', [$user]);

        // Set the flash message
        Flash::success('User was successfully created.');

        return Redirect::route('admin.users.index');
    }

    public function edit($id)
    {
        return View::make('pages.admin.users.edit')
            ->withUser($this->users->getById($id));
    }

    public function update($id)
    {
        // Validate
        $this->validator->validate(Input::all());

        // Update the user
        $user = $this->users->update($id, Input::all());

        // Fire the event
        Event::fire('user.updated', [$user]);

        // Set the flash message
        Flash::success('User was successfully updated.');

        return Redirect::route('admin.users.index');
    }

    public function remove($id)
    {
        return View::make('pages.admin.users.remove')
            ->withUser($this->users->getById($id));
    }

    public function destroy($id)
    {
        // Delete the user
        $user = $this->users->delete($id);

        // Fire the event
        Event::fire('user.deleted', [$user]);

        // Set the flash message
        Flash::success('User was successfully removed.');

        return Redirect::route('admin.users.index');
    }

}