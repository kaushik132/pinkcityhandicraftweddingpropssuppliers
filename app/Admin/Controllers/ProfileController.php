<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Profile;

class ProfileController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Profile';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Profile());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('address', __('Address'));
        $grid->column('city', __('City'));
        $grid->column('state', __('State'));
        $grid->column('pincode', __('Pincode'));
        $grid->column('dob', __('Dob'));
        $grid->column('gender', __('Gender'));
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
        $show = new Show(Profile::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('address', __('Address'));
        $show->field('city', __('City'));
        $show->field('state', __('State'));
        $show->field('pincode', __('Pincode'));
        $show->field('dob', __('Dob'));
        $show->field('gender', __('Gender'));
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
        $form = new Form(new Profile());

        $form->number('user_id', __('User id'));
        $form->text('address', __('Address'));
        $form->text('city', __('City'));
        $form->text('state', __('State'));
        $form->text('pincode', __('Pincode'));
        $form->date('dob', __('Dob'))->default(date('Y-m-d'));
        $form->text('gender', __('Gender'));

        return $form;
    }
}
