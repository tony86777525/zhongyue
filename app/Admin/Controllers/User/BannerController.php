<?php

namespace App\Admin\Controllers\User;

use App\Models\Banner;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;

class BannerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Banner';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Banner());

//        $grid->column('id', __('Id'));
        $grid->column('image', __('Image'))->modal(__('Image'), function () {
            return new Table([$this->alt], [[$this->show_image]]);
        });
        $grid->column('alt', __('Alt'));
//        $grid->column('created_at', __('Created at'));
//        $grid->column('updated_at', __('Updated at'));

        $grid->actions(function($actions){
            $actions->disableView();
            $actions->disableDelete();
        });

        $grid->disableFilter();
//        $grid->disableActions();
        $grid->disableBatchActions();
        $grid->disableCreateButton();
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
        $show = new Show(Banner::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('image', __('Image'));
        $show->field('alt', __('Alt'));
//        $show->field('created_at', __('Created at'));
//        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Banner());

        $form->image('image', __('Image'));
        $form->text('alt', __('Alt'));

        $form->tools(function (Form\Tools $tools) {
            $tools->disableList();
            $tools->disableDelete();
            $tools->disableView();
        });
        $form->disableEditingCheck();
        $form->disableViewCheck();
        $form->disableCreatingCheck();
        $form->footer(function ($footer) {
            $footer->disableReset();
        });

        return $form;
    }
}
