<?php

namespace App\Admin\Controllers;

use App\Models\UserAnswer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserAnswerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'UserAnswer';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserAnswer());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('answers', __('Answers'));
        $grid->column('from_ref', __('From ref'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(UserAnswer::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('answers', __('Answers'));
        $show->field('from_ref', __('From ref'));
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
        $form = new Form(new UserAnswer());

        $form->text('user.email');
        $form->textarea('answers', __('Answers'));
        $form->text('from_ref', __('From ref'));

        return $form;
    }
}
