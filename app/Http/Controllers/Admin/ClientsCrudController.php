<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ClientsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClientsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Clients');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/clients');
        $this->crud->setEntityNameStrings('clients', 'clients');
    }

    protected function setupListOperation()
    {
      
        $V1 = [
            'name' => 'imageClient',
            'type' => 'image',
            'label' => 'Image de Client',
            'upload' => true,
            'height' =>'80px',
            'width' =>'80px',
        ];

        $V2 = [

        'name'=>'nom',
        'label'=>'Nom',
        'type'=>'text',
        ];

        $V3=[
            'name'=>'prenom',
            'label'=>'Prénom',
            'type'=>'text',
          ];
          $V4=[
            'name'=>'login',
            'label'=>"Nom d'utillisateur",
            'type'=>'text',
          ];

          $V5=[
            'name'=>'email',
            'label'=>"Email",
            'type'=>'email',
          ];

          $V6=[
            'name'=>'adresse',
            'label'=>"Adresse",
            'type'=>'textarea',
          ];
    
    

        $this->crud->addColumns([$V1,$V2,$V3,$V4,$V5,$V6]);
      
      
    
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ClientsRequest::class);

        $V1=[
            'label' => "Profile Image : ",
            'name' => "imageClient",
            'type' => 'image',
          
      ];
      $V2=[
        'name'=>'nom',
        'label'=>'Nom :',
        'type'=>'text',
      ];

      $V3=[
        'name'=>'prenom',
        'label'=>'Prénom :',
        'type'=>'text',
      ];
      $V4=[
        'name'=>'login',
        'label'=>"Nom d'utillisateur :",
        'type'=>'text',
      ];
      $V5=[
        'name'=>'motdepasse',
        'label'=>"Password :",
        'type'=>'Password',
      ];

      $V6=[
        'name'=>'email',
        'label'=>"Email :",
        'type'=>'email',
      ];

      
      $V7=[
        'name'=>'adresse',
        'label'=>"Adresse :",
        'type'=>'textarea',
      ];
         $this->crud->addFields([$V2,$V3,$V4,$V5,$V6,$V7,$V1]);





       
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
