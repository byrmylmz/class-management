<?php

namespace App\Http\Livewire;

use App\Models\Lesson;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class LessonTable extends PowerGridComponent
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
                ->showToggleColumns(),
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
    * @return Builder<\App\Models\Lesson>
    */
    public function datasource(): Builder
    {
        return Lesson::query();
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
            ->addColumn('Fakülte')
            ->addColumn('Bölüm')
            ->addColumn('Ders Kodu')
            ->addColumn('Ders Adı');
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

            Column::make('Fakülte', 'faculty')
                ->searchable()
                ->sortable(),

            Column::make('Bölüm', 'department')
                ->searchable()
                ->sortable(),

            Column::make('Ders Kodu', 'code')
                ->searchable()
                ->sortable(),

            Column::make('Ders Adı', 'name')
                ->searchable()
                ->sortable()
                ->bodyAttribute(''),


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
     * PowerGrid Lesson Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
       return [
            Button::make('edit', 'Düzenle')
               ->class('bg-indigo-500 hover:bg-indigo-600 cursor-pointer text-white px-3 py-1  rounded-md text-md')
               ->route('lesson.edit', ['lesson' => 'id'])
               ->target('_self'),

            Button::make('detay', 'Detay')
               ->class('bg-purple-500 hover:bg-purple-600 cursor-pointer text-white px-3 py-1 text-md rounded-md')
               ->route('lesson.show',['lesson'=>'id']),

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
     * PowerGrid Lesson Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($lesson) => $lesson->id === 1)
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
                ->emit('delete', []),
            
            Button::add('yeni-ders')
                ->caption('Yeni Ders')
                ->class('cursor-pointer block hover:bg-gray-100 border text-gray-600 font-semibold px-2 py-1.5 rounded')
                ->openModal('edit-user', []),

            
                
                
            //...
        ];
    }

    protected function getListeners()
    {
        return array_merge(
            parent::getListeners(), [
                'delete',
            ]);
    }

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
                Lesson::find($id)->delete();
            }
        }else{
            // dd($this->checkboxValues);
            Lesson::find($this->checkboxValues[0])->delete();
        }
       
         $this->checkboxValues=[];
       
    }



    
}
