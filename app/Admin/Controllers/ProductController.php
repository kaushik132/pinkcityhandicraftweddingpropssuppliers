<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Product;
use \App\Models\ProductCategory;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('Id'));
        $grid->column('category.name', __('Product category id'));
        $grid->column('title', __('Title'));
        // $grid->column('slug', __('Slug'));
        $grid->column('sku', __('Sku'));
        $grid->column('badge', __('Badge'));
        $grid->column('short_description', __('Short description'));

        $grid->column('price', __('Price'));
        $grid->column('sale_price', __('Sale price'));
        $grid->column('stock', __('Stock'));

        $grid->column('is_active', __('Is active'));


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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('product_category_id', __('Product category id'));
        $show->field('title', __('Title'));
        $show->field('slug', __('Slug'));
        $show->field('sku', __('Sku'));
        $show->field('product_badge', __('Badge'));
        $show->field('short_description', __('Short description'));
        $show->field('description', __('Description'));
        $show->field('price', __('Price'));
        $show->field('sale_price', __('Sale price'));
        $show->field('stock', __('Stock'));
        $show->field('rating', __('Rating'));
        $show->field('reviews_count', __('Reviews count'));
        $show->field('specs', __('Specs'));
        $show->field('ships_in_days', __('Ships in days'));
        $show->field('is_active', __('Is active'));
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
        $form = new Form(new Product());

        // TEMPORARY DEBUG
        // if (request()->route('product')) {
        //     dd(
        //         Product::with('images')
        //             ->find(request()->route('product'))
        //             ->images
        //             ->toArray()
        //     );
        // }
        $form->tab('Product Info', function ($form) {
            $form->select('product_category_id', __('Product category id'))->options(ProductCategory::pluck('name', 'id'))->required();
            $form->text('title', __('Title'));
            $form->text('slug', __('Slug'));
            $form->text('sku', __('Sku'));
            $form->text('product_badge', __('Badge'));
            $form->textarea('short_description', __('Short description'));
            $form->textarea('description', __('Description'));
            $form->decimal('price', __('Price'));
            $form->decimal('sale_price', __('Sale price'));
            $form->number('stock', __('Stock'));
            $form->decimal('rating', __('Rating'))->default(0.0);
            $form->number('reviews_count', __('Reviews count'));

            $form->textarea('specs', __('Specs (JSON format)'))
                ->rows(6)
                ->help('Example: {"Material":"Ceramic","Size":"3 inch","Craft":"Handmade"}');

            $form->number('ships_in_days', __('Ships in days'))->default(5);
            $form->switch('is_active', __('Is active'))->default(1);

            // Jab form EDIT ke liye khule — array ko readable JSON string mein convert karo
            $form->model()->specs = is_array($form->model()->specs)
                ? json_encode($form->model()->specs, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
                : $form->model()->specs;

            // Jab form SAVE ho — JSON string ko wapas array mein convert karo
            $form->saving(function (Form $form) {
                if ($form->specs && is_string($form->specs)) {
                    $decoded = json_decode($form->specs, true);
                    $form->specs = $decoded ?: null;
                }
            });
        });
        $form->tab('Product Images', function ($form) {

            $form->hasMany('images', 'Images', function (Form\NestedForm $form) {

                $form->hidden('id');


                $form->number('sort_order', 'Order')->default(0);

                $form->image('image', 'Image')
                    ->disk('admin')
                    ->move('images')
                    ->uniqueName();
            });
        });
        $form->tab('Product SEO', function ($form) {
            $form->text('seo_title', __('SEO Title'))->help('Leave empty to auto-use product title');
            $form->textarea('seo_description', __('SEO Description'))->rows(3);
            $form->text('seo_keywords', __('SEO Keywords'))->help('Comma separated keywords');
        });
        return $form;
    }
}
