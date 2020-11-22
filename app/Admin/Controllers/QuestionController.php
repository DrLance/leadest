<?php

namespace App\Admin\Controllers;

use App\Models\Question;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class QuestionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Question';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Question());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('subtitle', __('Subtitle'));
        $grid->column('type', __('Type'));
        $grid->column('data', __('Data'));
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
        $show = new Show(Question::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('subtitle', __('Subtitle'));
        $show->field('type', __('Type'));
        $show->field('data', __('Data'));
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
        $form = new Form(new Question());

        $form->text('title', __('Title'));
        $form->text('subtitle', __('Subtitle'));
        $form->select('type', __('Type'))->options(['start' => 'start', 'checkbox' => 'Checkboxes', 'input' => 'Inputs']);
        $form->keyValue('data', 'Data');

        return $form;
    }
}
