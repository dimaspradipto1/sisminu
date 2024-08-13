<?php

namespace App\DataTables;

use App\Models\User;
use App\Models\SuratMasuk;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class SuratMasukDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        
        $user = auth()->user();

        if($user->role == 'admin'){
            $query = SuratMasuk::query();
        }elseif($user->role == 'user'){
            $query = SuratMasuk::where('user_id', $user->id)->orWhere('disposisi', $user->id);
        }


        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->editColumn('tgl_surat', function($item){
                return date('d M Y', strtotime($item->tgl_surat));
            })
            ->editColumn('status', function($item){
                if($item->status == 'Dibuat'){
                    return '<span class="badge bg-secondary">Dibuat</span>';
                }elseif($item->status == 'Dikoreksi'){
                    return '<span class="badge bg-warning">Dikoreksi</span>';
                }else{
                    return '<span class="badge bg-success">Disposisi</span>';
                }
            })
            ->editColumn('disposisi', function($item){
                return $item->disposisi;
            })
            ->addColumn('action', function($item){
                return '
                     <div class="d-flex justify-content-between">
                         <a href="'.route('surat-masuk.show', $item->id).'" class="btn btn-sm btn-primary text-white px-2 mx-2" title="preview"><i class="fa-solid fa-eye"></i></a>

                         <a href="'.Storage::url($item->file).'" class="btn btn-sm btn-secondary text-white px-2 mx-2" target="_blank" title="download"><i class="fa-solid fa-download"></i></a>

                     </div>
                ';
            })
            ->rawColumns(['action','tgl_surat', 'disposisi', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SuratMasuk $model): QueryBuilder
    {
        return $model->newQuery();

        // Apply search filter
        // if ($search = $this->request()->get('search')['value']) {
        //     $query->where(function($query) use ($search) {
        //         $query->where('no_surat', 'like', "%{$search}%")
        //               ->orWhere('surat_dari', 'like', "%{$search}%")
        //               ->orWhere('perihal', 'like', "%{$search}%")
        //               ->orWhere('tgl_surat', 'like', "%{$search}%");
        //     });
        // }

        // return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('suratmasuk-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    // ->paging(false)
                    // ->info(false)
                    // ->searching(false)
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
            
            // Column::make('id'),
            Column::make('no_surat')->title('No Surat'),
            Column::make('tgl_surat')->title('Tanggal Surat'),
            // Column::make('disposisi'),
            Column::make('surat_dari')->title('Asal'),
            Column::make('perihal')->title('Perihal'),
            Column::make('derajat_surat')->title('Derajat'),
            Column::make('status')->title('Status'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center')
                  ->title('Aksi'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SuratMasuk_' . date('YmdHis');
    }
}
