<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\OrderItem;

class OrderItemController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'OrderItem';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new OrderItem());

        $grid->model()->orderBy('id', 'desc');

    $grid->column('id', __('Id'))->sortable();
        $grid->column('order_id', __('Order id'));
        $grid->column('product_id', __('Product id'));
        $grid->column('product_title', __('Product title'));
        $grid->column('product_image', __('Product image'));
        $grid->column('price', __('Price'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('total', __('Total'));


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
        $show = new Show(OrderItem::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('order_id', __('Order id'));
        $show->field('product_id', __('Product id'));
        $show->field('product_title', __('Product title'));
        $show->field('product_image', __('Product image'));
        $show->field('price', __('Price'));
        $show->field('quantity', __('Quantity'));
        $show->field('total', __('Total'));
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
        $form = new Form(new OrderItem());

        $form->number('order_id', __('Order id'));
        $form->number('product_id', __('Product id'));
        $form->text('product_title', __('Product title'));
        $form->text('product_image', __('Product image'));
        $form->decimal('price', __('Price'));
        $form->number('quantity', __('Quantity'));
        $form->decimal('total', __('Total'));

        return $form;
    }
}
