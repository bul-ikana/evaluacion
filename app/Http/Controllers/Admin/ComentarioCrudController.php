<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ComentarioRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ComentarioCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ComentarioCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Comentario::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/comentario');
        CRUD::setEntityNameStrings('comentario', 'comentarios');
    }
    
    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        
        CRUD::addClause('onlyTrashed');
        CRUD::column('nombre_estudiante');
        CRUD::addColumn([
            'name' => 'correo_estudiante',
            'label' => 'Correo estudiante',
            'type' => 'text',
            'priority' => 3
        ]);
        CRUD::addColumn([
            'name' => 'comentario',
            'label' => 'Comentario',
            'type' => 'text',
            'limit' => 150,
            'priority' => 1
        ]);
        CRUD::addColumn([
            'name' => 'profesor.nombre',
            'label' => 'Profesor',
            'type' => 'text',
            'priority' => 1
        ]);
        CRUD::addColumn([
            'name' => 'calificacion',
            'label' => 'Calificación',
            'type' => 'number',
            'priority' => 2
        ]);
        CRUD::addColumn([
            'name' => 'created_at',
            'label' => 'Creado',
            'type' => 'date',
        ]);
    }
}
