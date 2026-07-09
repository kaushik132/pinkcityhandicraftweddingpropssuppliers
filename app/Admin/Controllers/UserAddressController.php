<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\UserAddress;

class UserAddressController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'UserAddress';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserAddress());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('type', __('Type'));
        $grid->column('full_name', __('Full name'));
        $grid->column('country_code', __('Country code'));
        $grid->column('mobile', __('Mobile'));
        $grid->column('pincode', __('Pincode'));
        $grid->column('address', __('Address'));
        $grid->column('landmark', __('Landmark'));
        $grid->column('city', __('City'));
        $grid->column('state', __('State'));
        $grid->column('is_default', __('Is default'));


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
        $show = new Show(UserAddress::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('type', __('Type'));
        $show->field('full_name', __('Full name'));
        $show->field('country_code', __('Country code'));
        $show->field('mobile', __('Mobile'));
        $show->field('pincode', __('Pincode'));
        $show->field('address', __('Address'));
        $show->field('landmark', __('Landmark'));
        $show->field('city', __('City'));
        $show->field('state', __('State'));
        $show->field('is_default', __('Is default'));
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
        $form = new Form(new UserAddress());

        $form->number('user_id', __('User id'));
        $form->text('type', __('Type'))->default('home');
        $form->text('full_name', __('Full name'));
        $form->text('country_code', __('Country code'))->default('+91');
        $form->phonenumber('mobile', __('Mobile'));
        $form->text('pincode', __('Pincode'));
        $form->text('address', __('Address'));
        $form->text('landmark', __('Landmark'));
        $form->text('city', __('City'));
        $form->text('state', __('State'));
        $form->switch('is_default', __('Is default'));

        return $form;
    }
}
