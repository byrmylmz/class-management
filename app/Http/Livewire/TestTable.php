<?php

namespace App\Http\Livewire;

use App\Models\Classroom;
use Illuminate\Support\Carbon;

use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class TestTable extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();
        

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()
                ->showSearchInput()
                ->showToggleColumns()
                ->includeViewOnTop('comp'),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
            

        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return Builder<\App\Models\Classroom>
    */
    public function datasource(): Builder
    {
        return Classroom::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('classroom_name')
            ->addColumn('classroom_number')
            ->addColumn('updated_at')
            ->addColumn('updated_at_formatted', fn (Classroom $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'))
            ->addColumn('created_at')
            ->addColumn('created_at_formatted', fn (Classroom $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->searchable()
                ->sortable(),

            Column::make('Derslik', 'classroom_name')
                ->searchable()
                ->sortable(),

            Column::make('Derslik No', 'classroom_number')
                ->searchable()
                ->sortable(),

            Column::make('Updated at', 'updated_at')
                ->hidden(),

            Column::make('Update at', 'updated_at_formatted', 'updated_at')
                ->searchable(),

            Column::make('Created at', 'created_at')
                ->hidden(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->searchable()
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Classroom Action Buttons.
     *
     * @return array<int, Button>
     */

    
    public function actions(): array
    {
       return [
            Button::make('edit', 'Düzenle')
               ->class('bg-indigo-500 hover:bg-indigo-600 cursor-pointer text-white px-3 py-1  rounded-md text-md')
               ->route('classroom.edit', ['classroom' => 'id'])
               ->target('_self'),

            Button::make('detay', 'Detay')
               ->class('bg-purple-500 hover:bg-purple-600 cursor-pointer text-white px-3 py-1 text-md rounded-md')
               ->route('classroom.show',['classroom'=>'id']),

        ];
    }
    

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid Classroom Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($classroom) => $classroom->id === 1)
                ->hide(),
        ];
    }
    */


    public function header(): array
    {
        return [
            
            Button::add('Sil')
                ->caption('Sil')
                ->class('cursor-pointer block hover:bg-gray-100 px-2 py-1.5 text-gray-600 font-semibold border rounded')
                ->emit('bulkSoldOutEvent', []),
            
            Button::add('yeni-derslik')
                ->caption('Yeni Derslik')
                ->class('cursor-pointer block hover:bg-gray-100 border text-gray-600 font-semibold px-2 py-1.5 rounded')
                ->openModal('edit-user', []),

            
                
                
            //...
        ];
    }

    protected function getListeners()
    {
        return array_merge(
            parent::getListeners(), [
                'eventX',
                'eventY',
                'bulkSoldOutEvent',
            ]);
    }

    public function bulkSoldOutEvent(): void
    {
        if (count($this->checkboxValues) == 0) {
            $this->dispatchBrowserEvent('showAlert', ['message' => 'You must select at least one item!']);

            return;
        }

        $ids = implode(', ', $this->checkboxValues);
        //$this->dispatchBrowserEvent('showAlert', ['message' => 'You have selected IDs: ' . $ids]);

        if(count($this->checkboxValues)>1){
            foreach($this->checkboxValues as $id){
                Classroom::find($id)->delete();
            }
        }else{
            // dd($this->checkboxValues);
            Classroom::find($this->checkboxValues[0])->delete();
        }
       
         $this->checkboxValues=[];
       
    }
}
