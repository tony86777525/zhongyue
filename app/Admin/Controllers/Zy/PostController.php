<?php

namespace App\Admin\Controllers\Zy;

use App\Models\Post;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PostController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Post';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Post());

        $grid->model()->orderBy('id', 'DESC');

//        $grid->column('id', __('Id'));
        $grid->column('name', __('姓名'));
        $grid->column('phone', __('手機'));
        $grid->column('email', __('信箱'));
        $grid->column('ip', __('用戶IP'));
        $grid->column('url', __('來源網址'));
        $grid->column('created_at', __('Created at'))->display(function () {
            return date('Y-m-d H:i:s', strtotime($this->created_at));
        });
//        $grid->column('updated_at', __('Updated at'));

        $grid->filter(function($filter){
            $filter->disableIdFilter();

//            $filter->equal('section.id', __('Section'))->select(Section::all()->pluck('title', 'id'));

            $filter->like('name', __('姓名'));
            $filter->like('phone', __('手機'));
            $filter->like('email', __('信箱'));
            $filter->like('ip', __('用戶IP'));
            $filter->like('url', __('來源網址'));
        });

        //        $grid->disableActions();
        $grid->disableBatchActions();
//        $grid->disableCreateButton();
        $grid->disableExport();
        $grid->disableColumnSelector();
        $grid->disablePagination();


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
        $show = new Show(Post::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('phone', __('Phone'));
        $show->field('email', __('Email'));
        $show->field('ip', __('IP'));
        $show->field('url', __('Url'));
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
        $form = new Form(new Post());

        $form->text('name', __('Name'));
        $form->mobile('phone', __('Phone'));
        $form->email('email', __('Email'));
        $form->email('ip', __('IP'));
        $form->email('url', __('Url'));

        return $form;
    }
}
