<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SideMenuController extends Controller
{


       public function tablaEmpresa (){
        
        return view("admin.tablas.empresas");
          
       }

       public function tablaGremio (){
        
        return view("admin.tablas.gremios");
          
       }

       public function tablaSector (){        
        return view("admin.tablas.sectores");          
       }

       public function tablaCondicion (){        
        return view("admin.tablas.condiciones");          
       }
}
