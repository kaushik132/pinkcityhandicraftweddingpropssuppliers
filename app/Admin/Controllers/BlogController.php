<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Blog;
use \App\Models\BlogCategory;

class BlogController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Blog';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Blog());

        $grid->column('id', __('Id'));
        $grid->column('category.name', __('Blog category Name'));
        $grid->column('title', __('Title'));
        $grid->column('image', __('Image'))->image('/uploads/', 100, 100);


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
        $show = new Show(Blog::findOrFail($id));



        $show->field('id', __('Id'));
        $show->field('blog_category_id', __('Blog category id'));
        $show->field('title', __('Title'));
        $show->field('slug', __('Slug'));
        $show->field('image', __('Image'));
        $show->field('excerpt', __('Excerpt'));
        $show->field('content', __('Content'));
        $show->field('read_time', __('Read time'));
        $show->field('views', __('Views'));
        $show->field('published_at', __('Published at'));
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
        $form = new Form(new Blog());

        $form->select('blog_category_id', __('Blog category id'))->options(BlogCategory::pluck('name', 'id'));

        $form->text('title', __('Title'));
        $form->text('slug', __('Slug'));
        $form->image('image', __('Image'));
        $form->text('excerpt', __('Excerpt'));
        $form->textarea('content', __('Content'));
        $form->number('read_time', __('Read time'))->default(5);
        $form->number('views', __('Views'));
        $form->datetime('published_at', __('Published at'))->default(date('Y-m-d H:i:s'));
        $form->text('seo_title', __('SEO Title'))->help('Leave empty to auto-use blog title');
        $form->textarea('seo_description', __('SEO Description'))->rows(3);
        $form->text('seo_keywords', __('SEO Keywords'))->help('Comma separated keywords');

        return $form;
    }
}
