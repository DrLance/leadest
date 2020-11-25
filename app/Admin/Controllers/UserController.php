<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Hash;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('email_verified_at', __('Email verified at'));
        $grid->column('avatar', __('Avatar'))->image(null, 32, 32);
        $grid->column('is_agent');
        $grid->column('created_at', __('Created at'))->display(function ($item) {
            $tmDate = Carbon::parse($item);

            return $tmDate->format('d.m.Y H:m:i');
        });
        $grid->column('updated_at', __('Updated at'))->display(function ($item) {
            $tmDate = Carbon::parse($item);

            return $tmDate->format('d.m.Y H:m:i');
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('avatar', __('Avatar'))->image();
        $show->field('avatar_original', __('Avatar original'))->image();
        $show->field('is_agent');
        $show->field('ref');
        $show->field('from_ref');
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $states = [
          'on'  => ['value' => 1, 'text' => 'enable', 'color' => 'success'],
          'off' => ['value' => 0, 'text' => 'disable', 'color' => 'danger'],
        ];

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->password('password', __('Password'))->default(function ($form) {
            return $form->model()->password;
        });;
        $form->image('avatar', __('Avatar'));
        $form->image('avatar_original', __('Avatar original'));
        $form->switch('is_agent', 'is Agent')->states($states);

        $form->saving(function (Form $form) {
            if ($form->password && $form->model()->password != $form->password) {
                $form->password = Hash::make($form->password);
            }
        });

        return $form;
    }
}
