<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Order;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

$grid->model()->orderBy('id', 'desc');

    $grid->column('id', __('Id'))->sortable();
        $grid->column('order_number', __('Order number'));
        $grid->column('user_id', __('User id'));
        $grid->column('user_address_id', __('User address id'));
        $grid->column('full_name', __('Full name'));
        $grid->column('mobile', __('Mobile'));
        $grid->column('address', __('Address'));
        $grid->column('landmark', __('Landmark'));
        $grid->column('city', __('City'));
        $grid->column('state', __('State'));
        $grid->column('pincode', __('Pincode'));
        $grid->column('subtotal', __('Subtotal'));
        $grid->column('discount', __('Discount'));
        $grid->column('shipping_charge', __('Shipping charge'));
        $grid->column('total', __('Total'));
        $grid->column('coupon_code', __('Coupon code'));
        $grid->column('payment_method', __('Payment method'));
        $grid->column('payment_status', __('Payment status'));
        $grid->column('razorpay_order_id', __('Razorpay order id'));
        $grid->column('razorpay_payment_id', __('Razorpay payment id'));
        $grid->column('status', __('Status'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('order_number', __('Order number'));
        $show->field('user_id', __('User id'));
        $show->field('user_address_id', __('User address id'));
        $show->field('full_name', __('Full name'));
        $show->field('mobile', __('Mobile'));
        $show->field('address', __('Address'));
        $show->field('landmark', __('Landmark'));
        $show->field('city', __('City'));
        $show->field('state', __('State'));
        $show->field('pincode', __('Pincode'));
        $show->field('subtotal', __('Subtotal'));
        $show->field('discount', __('Discount'));
        $show->field('shipping_charge', __('Shipping charge'));
        $show->field('total', __('Total'));
        $show->field('coupon_code', __('Coupon code'));
        $show->field('payment_method', __('Payment method'));
        $show->field('payment_status', __('Payment status'));
        $show->field('razorpay_order_id', __('Razorpay order id'));
        $show->field('razorpay_payment_id', __('Razorpay payment id'));
        $show->field('status', __('Status'));
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
        $form = new Form(new Order());

        $form->text('order_number', __('Order number'));
        $form->number('user_id', __('User id'));
        $form->number('user_address_id', __('User address id'));
        $form->text('full_name', __('Full name'));
        $form->phonenumber('mobile', __('Mobile'));
        $form->text('address', __('Address'));
        $form->text('landmark', __('Landmark'));
        $form->text('city', __('City'));
        $form->text('state', __('State'));
        $form->text('pincode', __('Pincode'));
        $form->decimal('subtotal', __('Subtotal'));
        $form->decimal('discount', __('Discount'))->default(0.00);
        $form->decimal('shipping_charge', __('Shipping charge'))->default(0.00);
        $form->decimal('total', __('Total'));
        $form->text('coupon_code', __('Coupon code'));
        $form->text('payment_method', __('Payment method'))->default('cod');
        $form->text('payment_status', __('Payment status'))->default('pending');
        $form->text('razorpay_order_id', __('Razorpay order id'));
        $form->text('razorpay_payment_id', __('Razorpay payment id'));
        $form->text('status', __('Status'))->default('placed');

        return $form;
    }
}
