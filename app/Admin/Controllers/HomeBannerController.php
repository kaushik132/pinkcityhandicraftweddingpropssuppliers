<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\HomeBanner;

class HomeBannerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'HomeBanner';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new HomeBanner());

        $grid->column('id', __('Id'));
        $grid->column('image', __('Image'))->image('/uploads/', 100, 100);
        $grid->column('alt', __('Alt'));
        $grid->column('category_name', __('Category name'));
        $grid->column('title', __('Title'));



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
        $show = new Show(HomeBanner::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('image', __('Image'));
        $show->field('alt', __('Alt'));
        $show->field('category_name', __('Category name'));
        $show->field('title', __('Title'));
        $show->field('short_note', __('Short note'));
        $show->field('first_button_name', __('First button name'));
        $show->field('first_button_link', __('First button link'));
        $show->field('second_button_name', __('Second button name'));
        $show->field('second_button_icon', __('Second button icon'));
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
        $form = new Form(new HomeBanner());

        $form->image('image', __('Image'));
        $form->text('alt', __('Alt'));
        $form->text('category_name', __('Category name'));
        $form->text('title', __('Title'));
        $form->text('short_note', __('Short note'));
        $form->text('first_button_name', __('First button name'));
        $form->text('first_button_link', __('First button link'));
        $form->text('second_button_name', __('Second button name'));
        $form->text('second_button_icon', __('Second button icon'));

        return $form;
    }
}
