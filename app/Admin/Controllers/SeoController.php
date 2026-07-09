<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Seo;

class SeoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Seo';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Seo());

        $grid->column('id', __('Id'));
        $grid->column('seo_title_home', __('Seo title home'));
        $grid->column('seo_des_home', __('Seo des home'));
        $grid->column('seo_key_home', __('Seo key home'));
        $grid->column('seo_title_about', __('Seo title about'));
        $grid->column('seo_des_about', __('Seo des about'));
        $grid->column('seo_key_about', __('Seo key about'));
        $grid->column('seo_title_contact', __('Seo title contact'));
        $grid->column('seo_des_contact', __('Seo des contact'));
        $grid->column('seo_key_contact', __('Seo key contact'));
        $grid->column('seo_title_products', __('Seo title products'));
        $grid->column('seo_des_products', __('Seo des products'));
        $grid->column('seo_key_products', __('Seo key products'));
        $grid->column('seo_title_blog', __('Seo title blog'));
        $grid->column('seo_des_blog', __('Seo des blog'));
        $grid->column('seo_key_blog', __('Seo key blog'));
        $grid->column('seo_title_wishlist', __('Seo title wishlist'));
        $grid->column('seo_des_wishlist', __('Seo des wishlist'));
        $grid->column('seo_key_wishlist', __('Seo key wishlist'));
        $grid->column('seo_title_cart', __('Seo title cart'));
        $grid->column('seo_des_cart', __('Seo des cart'));
        $grid->column('seo_key_cart', __('Seo key cart'));
        $grid->column('seo_title_privacy', __('Seo title privacy'));
        $grid->column('seo_des_privacy', __('Seo des privacy'));
        $grid->column('seo_key_privacy', __('Seo key privacy'));
        $grid->column('seo_title_terms', __('Seo title terms'));
        $grid->column('seo_des_terms', __('Seo des terms'));
        $grid->column('seo_key_terms', __('Seo key terms'));
        $grid->column('seo_title_shipping', __('Seo title shipping'));
        $grid->column('seo_des_shipping', __('Seo des shipping'));
        $grid->column('seo_key_shipping', __('Seo key shipping'));
        $grid->column('seo_title_return', __('Seo title return'));
        $grid->column('seo_des_return', __('Seo des return'));
        $grid->column('seo_key_return', __('Seo key return'));
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
        $show = new Show(Seo::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('seo_title_home', __('Seo title home'));
        $show->field('seo_des_home', __('Seo des home'));
        $show->field('seo_key_home', __('Seo key home'));
        $show->field('seo_title_about', __('Seo title about'));
        $show->field('seo_des_about', __('Seo des about'));
        $show->field('seo_key_about', __('Seo key about'));
        $show->field('seo_title_contact', __('Seo title contact'));
        $show->field('seo_des_contact', __('Seo des contact'));
        $show->field('seo_key_contact', __('Seo key contact'));
        $show->field('seo_title_products', __('Seo title products'));
        $show->field('seo_des_products', __('Seo des products'));
        $show->field('seo_key_products', __('Seo key products'));
        $show->field('seo_title_blog', __('Seo title blog'));
        $show->field('seo_des_blog', __('Seo des blog'));
        $show->field('seo_key_blog', __('Seo key blog'));
        $show->field('seo_title_wishlist', __('Seo title wishlist'));
        $show->field('seo_des_wishlist', __('Seo des wishlist'));
        $show->field('seo_key_wishlist', __('Seo key wishlist'));
        $show->field('seo_title_cart', __('Seo title cart'));
        $show->field('seo_des_cart', __('Seo des cart'));
        $show->field('seo_key_cart', __('Seo key cart'));
        $show->field('seo_title_privacy', __('Seo title privacy'));
        $show->field('seo_des_privacy', __('Seo des privacy'));
        $show->field('seo_key_privacy', __('Seo key privacy'));
        $show->field('seo_title_terms', __('Seo title terms'));
        $show->field('seo_des_terms', __('Seo des terms'));
        $show->field('seo_key_terms', __('Seo key terms'));
        $show->field('seo_title_shipping', __('Seo title shipping'));
        $show->field('seo_des_shipping', __('Seo des shipping'));
        $show->field('seo_key_shipping', __('Seo key shipping'));
        $show->field('seo_title_return', __('Seo title return'));
        $show->field('seo_des_return', __('Seo des return'));
        $show->field('seo_key_return', __('Seo key return'));
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
        $form = new Form(new Seo());

        $form->textarea('seo_title_home', __('Seo title home'));
        $form->textarea('seo_des_home', __('Seo des home'));
        $form->textarea('seo_key_home', __('Seo key home'));
        $form->textarea('seo_title_about', __('Seo title about'));
        $form->textarea('seo_des_about', __('Seo des about'));
        $form->textarea('seo_key_about', __('Seo key about'));
        $form->textarea('seo_title_contact', __('Seo title contact'));
        $form->textarea('seo_des_contact', __('Seo des contact'));
        $form->textarea('seo_key_contact', __('Seo key contact'));
        $form->textarea('seo_title_products', __('Seo title products'));
        $form->textarea('seo_des_products', __('Seo des products'));
        $form->textarea('seo_key_products', __('Seo key products'));
        $form->textarea('seo_title_blog', __('Seo title blog'));
        $form->textarea('seo_des_blog', __('Seo des blog'));
        $form->textarea('seo_key_blog', __('Seo key blog'));
        $form->textarea('seo_title_wishlist', __('Seo title wishlist'));
        $form->textarea('seo_des_wishlist', __('Seo des wishlist'));
        $form->textarea('seo_key_wishlist', __('Seo key wishlist'));
        $form->textarea('seo_title_cart', __('Seo title cart'));
        $form->textarea('seo_des_cart', __('Seo des cart'));
        $form->textarea('seo_key_cart', __('Seo key cart'));
        $form->textarea('seo_title_privacy', __('Seo title privacy'));
        $form->textarea('seo_des_privacy', __('Seo des privacy'));
        $form->textarea('seo_key_privacy', __('Seo key privacy'));
        $form->textarea('seo_title_terms', __('Seo title terms'));
        $form->textarea('seo_des_terms', __('Seo des terms'));
        $form->textarea('seo_key_terms', __('Seo key terms'));
        $form->textarea('seo_title_shipping', __('Seo title shipping'));
        $form->textarea('seo_des_shipping', __('Seo des shipping'));
        $form->textarea('seo_key_shipping', __('Seo key shipping'));
        $form->textarea('seo_title_return', __('Seo title return'));
        $form->textarea('seo_des_return', __('Seo des return'));
        $form->textarea('seo_key_return', __('Seo key return'));

        return $form;
    }
}
