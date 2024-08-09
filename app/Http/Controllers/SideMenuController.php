<?php

namespace App\Http\Controllers;



class SideMenuController extends Controller
{

       public function miembros (){ 
          if (!auth()->user()->hasAnyPermission(['miembros-ver','miembros-crear','miembros-editar','miembros-actualizar','miembros-eliminar']) 
        || auth()->user()->estado!=1 ) {                
                    return abort(403, 'No autorizado');               
                    }
        return view("admin.miembros");  
       }


       public function beneficios (){ 
          if (!auth()->user()->hasAnyPermission(['miembros-ver','miembros-crear','miembros-editar','miembros-actualizar','miembros-eliminar']) 
        || auth()->user()->estado!=1 ) {                
                    return abort(403, 'No autorizado');               
                    }
        return view("admin.beneficios");  
       }



       public function tablaEmpresa (){
        if (!auth()->user()->hasAnyPermission(['empresas-ver','empresas-crear','empresas-editar','empresas-actualizar','empresas-eliminar']) 
        || auth()->user()->estado!=1 ) {                
                    return abort(403, 'No autorizado');               
                    }
        
        return view("admin.tablas.empresas");          
       }

        
       public function tablaGremio (){
                if (!auth()->user()->hasAnyPermission(['gremios-ver','gremios-crear','gremios-editar','gremios-actualizar','gremios-eliminar']) 
                || auth()->user()->estado!=1 ) {                
                    return abort(403, 'No autorizado');               
                    }
          return view("admin.tablas.gremios");          
       }

       public function tablaSector (){        
        if (!auth()->user()->hasAnyPermission(['sectores-ver','sectores-crear','sectores-editar','sectores-actualizar','sectores-eliminar']) 
        || auth()->user()->estado!=1 ) {                
                    return abort(403, 'No autorizado');               
                    }          
                    
        return view("admin.tablas.sectores");          
       }

       public function tablaCondicion (){        
          if (!auth()->user()->hasAnyPermission(['condiciones-ver','condiciones-crear','condiciones-editar','condiciones-actualizar','condiciones-eliminar'])
           || auth()->user()->estado!=1 ) {                
              return abort(403, 'No autorizado');               
            }

        return view("admin.tablas.condiciones");          
       }


       public function usuarios (){        
          if (!auth()->user()->hasAnyPermission(['usuarios-ver','usuarios-crear','usuarios-editar','usuarios-actualizar','usuarios-eliminar']) 
          || auth()->user()->estado!=1 ) {                
              return abort(403, 'No autorizado');               
            }

        return view("admin.usuarios.usuarios");          
       }


       public function roles (){        
           if (!auth()->user()->hasAnyPermission(['usuarios-ver','usuarios-crear','usuarios-editar','usuarios-actualizar','usuarios-eliminar']) 
           || auth()->user()->estado!=1 ) {                
              return abort(403, 'No autorizado');               
            }

        return view("admin.usuarios.roles"); 
       }

       public function perfil (){        
          //  if (!auth()->user()->hasAnyPermission(['usuarios-ver','usuarios-crear','usuarios-editar','usuarios-actualizar','usuarios-eliminar']) 
          //  || auth()->user()->estado!=1 ) {                
          //     return abort(403, 'No autorizado');               
          //   }

        return view("admin.perfil"); 
       }
}
