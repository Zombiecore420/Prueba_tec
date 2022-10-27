<?php

namespace App\Http\Controllers;

use SoftDeletes;
use App\Models\dato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class LlantaController extends Controller
{
    public function altadato() //ordena los valores de la base de datos y le añade + 1 a los campos para que se agreguen
    {
        $consulta = dato::orderBy('id_llanta', 'ASC')
                            ->get();
        $cuantos = count($consulta);
        if($cuantos==0)
        {
            $idsigue = 1;
        }
        else{
            $idsigue = $consulta[0]->id_llanta + 1;
        }
        $dato - dato::all();
        return view('admin.llantas')
                ->with('idsigue', $idsigue)
                ->with('dato', $dato);        
    }

    public function guardardato(Request $request){ //guarda el dato 
 
        $nombre = $request->nombre;
        $ancho_llanta = $request->ancho_llanta;
        $diametro_rin = $request->diametro_rin;
        $presion_max = $request->presion_max;
        $fabricante = $request->fabricante;
        $stock = $request->stock;

        $dato1 = new dato;
        $dato1->nombre = $request->nombre;
        $dato1->ancho_llanta = $request->ancho_llanta;
        $dato1->diametro_rin = $request->diametro_rin;
        $dato1->presion_max = $request->presion_max;
        $dato1->fabricante = $request->fabricante;
        $dato1->stock = $request->stock;
        $dato1->save();

        Session::flash('mensaje', 'El dato: '. $request->nombre. ' ha sido agredado correctamente.');
        return redirect()->route('datos');
    }

    public function reportellanta() //Permite visualizar el reporte con los datos de la b.d
   {
      $consulta =DB::table('dato')
      ->select('dato.id_llanta', 'dato.nombre', 'dato.ancho_llanta','dato.diametro_rin',
      'dato.presion_max', 'dato.fabricante','dato.stock', 'dato.deleted_at' )
      ->orderBy('dato.id_llanta', 'asc')
      ->get();
       return view ('admin.llantas')
       ->with('consulta',$consulta);
   }    

   public function activardato($id_llanta){ //ACTIVAR
    $dato = dato::withTrashed()->where('id_llanta',$id_llanta)->restore();
    Session::flash('mensaje','El Dato: ha sido reactivado correctamente.');
    return redirect()->route('datos');

}
public function desactivardato($id_llanta){ //DESACTIVAR
    $dato = dato::find($id_llanta);
    $dato->delete();
    Session::flash('mensaje','El Dato:  ha sido desactivado correctamente.');
    return redirect()->route('datos');

    }

    public function eliminardato($id_llanta){  //ELIMINACION
        $dato = dato::withTrashed()
        ->where('id_llanta',$id_llanta)          
        ->forceDelete();
        Session::flash('mensaje','El dato:  ha sido eliminado correctamente.');
        return redirect()->route('datos');

}
public function modificardato($id_llanta){ //modificacion 
    $consulta = DB::table('dato')
    ->select('dato.id_llanta', 'dato.nombre', 'dato.ancho_llanta','dato.diametro_rin',
    'dato.presion_max', 'dato.fabricante','dato.stock', 'dato.deleted_at')
    ->where('id_llanta', $id_llanta)
    ->get();

     $dato = dato::all();
        return view('admin.modificard')
                ->with('consulta', $consulta[0])
                ->with('dato',$dato);
}
public function guardarcambiodato(Request $request){ //guardar modificacion 

    $dato1 = dato::find($request->id_llanta);
    $dato1->nombre = $request->nombre;
    $dato1->ancho_llanta = $request->ancho_llanta;
    $dato1->diametro_rin = $request->diametro_rin;
    $dato1->presion_max = $request->presion_max;
    $dato1->fabricante = $request->fabricante;
    $dato1->stock = $request->stock;
    $dato1->save();
    Session::flash('mensaje', 'El dato: '. $request->nombre. ' ha sido modificado correctamente.');
    return redirect()->route('datos');
}
}


