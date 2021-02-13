<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SportEventRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SportEventCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SportEventCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\SportEvent::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/sport_event');
        CRUD::setEntityNameStrings('sport_event', 'sport_events');

        $this->crud->addFields($this->getFieldsData());
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // columns

        $this->crud->set('show.setFromDb', false);
        $this->crud->addColumns($this->getFieldsData(TRUE));

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SportEventRequest::class);

        // CRUD::setFromDb(); // fields

        $this->crud->set('show.setFromDb', false);
        $this->crud->addFields($this->getFieldsData(TRUE));

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    private function getFieldsData($show = FALSE)
    {
        return [
            [
                'name' => 'name',
                'label' => 'Name',
                'type' => 'text'
            ],
            [
                'name' => 'start_date',
                'label' => 'Start date',
                'type' => 'date',
            ],
            [
                'name' => 'duration_in_days',
                'label' => 'Duration in days',
                'type' => 'number'
            ],
            [
                'label' => "Sport",
                'name' => 'sport_id',
                'type' => 'select',
                'entity' => 'sport',
                'model'     => "App\Models\Sport",
                'attribute' => 'type', // foreign key attribute that is shown to user
            ],
            [
                'label' => "Organizer",
                'name' => 'organizer_id',
                'type' => 'select',
                'entity' => 'organizer',
                'model' => "App\Models\Organizer",
                'attribute' => 'name', // foreign key attribute that is shown to user
            ],
            [
                'label'        => "Sport Event Image",
                'name'         => "image",
                'filename'     => NULL, // set to null if not needed
                'type'         => 'image',
                'aspect_ratio' => 1, // set to 0 to allow any aspect ratio
                'crop'         => true, // set to true to allow cropping, false to disable
                'src'          => NULL, // null to read straight from DB, otherwise set to model accessor function
            ]
        ];
    }
}
