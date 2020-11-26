<?php

namespace App\DataTables;

use App\Employee;
use App\Photo;
use App\Position;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\DataTableAbstract;
use Illuminate\Database\Eloquent\Builder;

class EmployeeDataTable extends DataTable
{

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     *
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()->eloquent($query)->addColumn('photo',
            function ($data) {
                $photo = Photo::find($data->photo_id);
                $url   = url($photo->path);

                return '<img src="' . $url . '" border="0" width="40" class="rounded-circle" align="center" />';
            }
        )->addColumn('position',
            function ($data) {
                return Position::find($data->position_id)->name;
            }
        )->addColumn('action',
            function ($data) {
                return '<a href="employee/' . $data->id
                    . '/edit" class="btn btn-md"><i class="glyphicon glyphicon-pencil"></i></a><a href="artist/"'
                    . $data->id . ' class="btn btn-md"><i class="glyphicon glyphicon-trash"></i></a>';
            }
        )->addColumn('salary', function ($data){
            return '$ ' . floatval($data->salary/100);
        })->rawColumns(['photo', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Employee $model
     *
     * @return Builder
     */
    public function query(Employee $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()->setTableId('employee-table')->columns($this->getColumns())->minifiedAjax()->orderBy(1)
//                    ->buttons(
//                        Button::make('create')
//                    )
            ;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('photo', 'Image'),
            Column::make('full_name'),
            Column::make('position'),
            Column::make('employment_date'),
            Column::make('phone_number'),
            Column::make('email'),
            Column::make('salary'),
            Column::computed('action', 'Action')->exportable(false)->printable(false)->width(60)->addClass('text-center'
            ),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Employee_' . date('YmdHis');
    }
}
