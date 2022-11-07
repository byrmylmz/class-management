<?php

namespace App\Http\Livewire;

use App\Models\Instructor;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class InstructorTable extends PowerGridComponent
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
            Header::make()->showSearchInput(),
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
    * @return Builder<\App\Models\Instructor>
    */
    public function datasource(): Builder
    {
        return Instructor::query();
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
            ->addColumn('name')
            ->addColumn('email')
            ->addColumn('phone');
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

            Column::make('İsim Soyisim', 'name')
                ->searchable()
                ->sortable(),

            Column::make('Email', 'email')
                ->searchable()
                ->sortable(),

            Column::make('Telefon', 'phone')
                ->searchable()
                ->sortable(),


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
     * PowerGrid Instructor Action Buttons.
     *
     * @return array<int, Button>
     */

    
    public function actions(): array
    {
       return [
        //    Button::make('edit', 'Edit')
        //        ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
        //        ->route('instructor.edit', ['instructor' => 'id']),

        //    Button::make('destroy', 'Delete')
        //        ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
        //        ->route('instructor.destroy', ['instructor' => 'id'])
        //        ->method('delete')
        Button::add('view')
            ->caption('Düzenle')
            ->class('bg-indigo-500 hover:bg-indigo-600 cursor-pointer text-white px-3 mt-1 rounded text-sm')
            ->openModal('update-instructor', ['instructerId' => 'id'])

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
     * PowerGrid Instructor Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($instructor) => $instructor->id === 1)
                ->hide(),
        ];
    }
    */

    /**
     * -----------------------------------------------
     * Header Buttons
     *------------------------------------------------
     */
    public function header(): array
    {
        return [
            
            Button::add('Sil')
                ->caption('Sil')
                ->class('cursor-pointer block hover:bg-gray-100 px-2 py-1.5 text-gray-600 font-semibold border rounded')
                ->emit('delete', []),
        ];
    }
    
    /**
     * ---------------------------------------------
     * Event listeners
     * ---------------------------------------------
     */

     protected function getListeners():array
     {
         return array_merge(
             parent::getListeners(),
             [
                 'refresh-data'=>'refreshData',
                 'delete'
             ]);
     }

     /**
      * ----------------------------------------------
      * Refresh data after insert new data
      * ----------------------------------------------
      */
     public function refreshData()
     {
        $this->fillData();
     }

     /**
      * -----------------------------------------------
      | Bulk delete button action on header
      |------------------------------------------------
      */

      public function delete(): void
      {
          if (count($this->checkboxValues) == 0) {
              $this->dispatchBrowserEvent('showAlert', ['message' => 'You must select at least one item!']);
  
              return;
          }
  
          $ids = implode(', ', $this->checkboxValues);
          //$this->dispatchBrowserEvent('showAlert', ['message' => 'You have selected IDs: ' . $ids]);
  
          if(count($this->checkboxValues)>1){
              foreach($this->checkboxValues as $id){
                  Instructor::find($id)->delete();
              }
          }else{
              // dd($this->checkboxValues);
              Instructor::find($this->checkboxValues[0])->delete();
          }
         
           $this->checkboxValues=[];
        }  
}
