<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProduitsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProduitsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProduitsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Produits');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/produits');
        $this->crud->setEntityNameStrings('produits', 'produits');
    }

    protected function setupListOperation()
    {
        $V1 = [
            'name' => 'nom',
            'type' => 'text',
            'label' => 'Nom',
        ];
        $V2 = [
            'name' => 'imgPah',
            'type' => 'image',
            'label' => 'Image',
            'upload' => true,
            'height' =>'80px',
            'width' =>'80px',
        ];
        $V3= [
            'name' => 'category.nomCat',
            'type' => 'text',
            'label' => 'Categorie',
        ];
        $V4= [
            'name' => 'prix',
            'type' => 'text',
            'label' => 'Prix',
        ];

        $V5= [
            'name' => 'remise',
            'type' => 'text',
            'label' => 'Remise(%)',
        ];

        $V6= [
            'name' => 'date_debut',
            'type' => 'simple',
            'label' => 'Date debut',
        ];

        $V7= [
            'name' => 'date_debut',
            'type' => 'simple',
            'label' => 'Date Fin',
        ]; 
        $this->crud->addColumns([$V2,$V1,$V3,$V4,$V5,$V6,$V7]);



        $this->crud->setFromDb();
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ProduitsRequest::class);

        $V1=[  // Select
            'label' => "Categorie",
            'type' => 'select',
            'name' => 'category_id', // the db column for the foreign key categories
            'entity' => 'category', // the method that defines the relationship in your Model 
            'attribute' => 'nomCat', // foreign key attribute that is shown to user
           
        ];
        $V2=['name' => 'ImgPah',
            'label' => 'Image',
            'type' => 'image'];

        $V3=['name' => 'nom',
         'label' => 'Nom',
         'type' => 'text',
            ];
         $V4=[
            'name' => 'prix',
            'label' => 'prix',
            'type' => 'number',];
         $V5=[
            'name' => 'remise',
            'label' => 'remise',
            'type' => 'number',];
         $V6=[
        'name' => 'date_debut',
         'label' => 'Date_Debut',
         'type' => 'dateTime',
            ];
         $V7=[
            'name' => 'date_fin',
            'label' => 'Date Fin',
            'type' => 'dateTime',
            ];
             $V8=[
                'name' => 'isPomo',
                'label' => 'isPomo',
                'type' => 'checkbox'
            ];
        


            $this->crud->addFields([$V1,$V2,$V3,$V4,$V5,$V6,$V7,$V8]);





        
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
