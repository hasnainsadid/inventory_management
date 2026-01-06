<?php
namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class StockDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Stock> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('product_name', fn($row) => $row->name)
            ->editColumn('category', fn($row) => $row->category->name)
            ->editColumn('stock', fn($row) => $row->stock->stock)
            ->editColumn('status', fn($row) => 
                $row->stock->stock <= 0 ? '<span class="badge bg-danger">Out of Stock</span>' : ($row->stock->stock < $row->alert_quantity ? '<span class="badge bg-warning">Low Stock</span>' : '<span class="badge bg-success">In Stock</span>'))
            
            ->filterColumn('category', function ($query, $keyword) {
                $query->whereHas('category', function ($q) use ($keyword) {
                    $q->where('name', 'like', "%{$keyword}%");
                });
            })
            ->rawColumns(['status']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Stock>
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery()->with(['category', 'stock']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        $column = [
            Column::computed('product_name')->title('Product'),
            Column::computed('category')->title('Category'),
            Column::computed('stock')->title('Stock')->searchable(false)->orderable(false),
            Column::computed('status')->title('Status')->searchable(false)->orderable(false),
        ];
        return $column;

    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Stock_' . date('YmdHis');
    }
}
