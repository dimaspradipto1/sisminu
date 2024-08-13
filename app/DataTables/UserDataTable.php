<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function($users){
                return '
                    <div style="display: flex; justify-content: space-between;">
                        <a href="'.route('users.edit', $users->id).'" class="btn btn-sm btn-warning text-white mx-2"><i class="fas fa-edit"></i></a>
                        <form action="'.route('users.destroy', $users->id).'" method="POST" style="display: inline-block;">
                        '.method_field('delete').'
                        '.csrf_field().'
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini? \')"><i class="fas fa-trash"></i></button> 
                        </form>
                    </div>
                ';
            })
            ->rawColumns(['action'])
            ->setRowId('DT_RowIndex');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('user-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            
            Column::make('DT_RowIndex')->title('NO')->width('5%'),
            Column::make('name')->title('NAMA'),
            Column::make('jabatan')->title('JABATAN'),
            Column::make('email')->title('EMAIL'),
            Column::make('role')->title('STATUS'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center')
                  ->title('AKSI'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
