<?php

namespace App\Http\Controllers;



class SideMenuController extends Controller
{

       public function miembros (){ 
          if (!auth()->user()->hasAnyPermission(['miembros-ver','miembros-crear','miembros-actualizar','miembros-eliminar']) 
        || auth()->user()->estado!=1 ) {                
                    // return abort(403, 'No autorizado');               
                    return view("components.unauthorized");
                    }
        return view("admin.miembros");  
       }


       public function beneficios (){ 
          if (!auth()->user()->hasAnyPermission(['beneficios-ver','beneficios-crear','beneficios-actualizar','beneficios-eliminar']) 
        || auth()->user()->estado!=1 ) {                
                    return view("components.unauthorized");           
                    }
        return view("admin.beneficios");  
       }

       public function miembroBeneficios (){ 
          if (!auth()->user()->hasAnyPermission(['miembros-ver','miembros-crear','miembros-actualizar','miembros-eliminar']) 
        || auth()->user()->estado!=1 ) {                
                    return view("components.unauthorized");           
                    }
        return view("admin.miembros-beneficios");  
       }



       public function tablaEmpresa (){
        if (!auth()->user()->hasAnyPermission(['empresas-ver','empresas-crear','empresas-actualizar','empresas-eliminar']) 
        || auth()->user()->estado!=1 ) {                
                    return view("components.unauthorized");           
                    }
        
        return view("admin.tablas.empresas");          
       }

        
       public function tablaGremio (){
                if (!auth()->user()->hasAnyPermission(['gremios-ver','gremios-crear','gremios-actualizar','gremios-eliminar']) 
                || auth()->user()->estado!=1 ) {                
                    return view("components.unauthorized");           
                    }
          return view("admin.tablas.gremios");          
       }

       public function tablaSector (){        
        if (!auth()->user()->hasAnyPermission(['sectores-ver','sectores-crear','sectores-actualizar','sectores-eliminar']) 
        || auth()->user()->estado!=1 ) {                
                    return view("components.unauthorized");           
                    }          
                    
        return view("admin.tablas.sectores");          
       }

       public function tablaCondicion (){        
          if (!auth()->user()->hasAnyPermission(['condiciones-ver','condiciones-crear','condiciones-actualizar','condiciones-eliminar'])
           || auth()->user()->estado!=1 ) {                
              return view("components.unauthorized");           
            }

        return view("admin.tablas.condiciones");          
       }


       public function usuarios (){        
          if (!auth()->user()->hasAnyPermission(['usuarios-ver','usuarios-crear','usuarios-actualizar','usuarios-eliminar']) 
          || auth()->user()->estado!=1 ) {                
              return view("components.unauthorized");           
            }

        return view("admin.usuarios.usuarios");          
       }


       public function roles (){        
           if (!auth()->user()->hasAnyPermission(['usuarios-ver','usuarios-crear','usuarios-actualizar','usuarios-eliminar']) 
           || auth()->user()->estado!=1 ) {                
              return view("components.unauthorized");           
            }

        return view("admin.usuarios.roles"); 
       }
       
       public function beneficiosActivos (){        
          //  if (!auth()->user()->hasAnyPermission(['usuarios-ver','usuarios-crear','usuarios-editar','usuarios-actualizar','usuarios-eliminar']) 
          //  || auth()->user()->estado!=1 ) {                
              // return view("components.unauthorized");           
            // }

        return view("admin.guest.activos"); 
       }

       public function beneficiosPreaprovados (){        
          //  if (!auth()->user()->hasAnyPermission(['usuarios-ver','usuarios-crear','usuarios-editar','usuarios-actualizar','usuarios-eliminar']) 
          //  || auth()->user()->estado!=1 ) {                
              // return view("components.unauthorized");           
            // }

        return view("admin.guest.preaprovados"); 
       }

       public function beneficiosVigentes (){        
           if (!auth()->user()->hasAnyPermission(['beneficios-ver','beneficios-crear','beneficios-actualizar','beneficios-eliminar']) 
           || auth()->user()->estado!=1 ) {                
                  return view("components.unauthorized");           
            }

        return view("admin.beneficios.vigentes"); 
       }
       public function perfil (){        
          //  if (!auth()->user()->hasAnyPermission(['usuarios-ver','usuarios-crear','usuarios-editar','usuarios-actualizar','usuarios-eliminar']) 
          //  || auth()->user()->estado!=1 ) {                
          //     return abort(403, 'No autorizado');               
          //   }

        return view("admin.perfil"); 
       }
}
