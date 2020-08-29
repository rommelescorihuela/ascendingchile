<?php
// Our Controller
namespace App\Http\Controllers;


use Auth;
use DB;
use App\User;
use App\Profesional;
use App\Empresa;
use App\Oferta;
use App\OfertaOp;
use App\Levantamiento;
use App\winwin;
use App\contacto;
use App\Operativo;
use Illuminate\Http\Request;// This is important to add here.
use PDF;

class CustomerController extends Controller
{
    public function printPDF($id)
    {
      $usuario= new Operativo;
      $user = $usuario->find($id);
      $pro = $user->profesional;
      //var_dump($user->nombre);
      //var_dump($pro->genero);
       // This  $data array will be passed to our PDF blade
        $data = [
       'content' =>  $user,
            ];

        $pdf = PDF::loadView('pdf_view', $data);
        return $pdf->download('perfil_operativo'.$id.'.pdf');
    }

    public function OfertaprintPDF($id)
    {
      //echo 'hola';
      //exit();
      $datos= new Oferta;
      $info = $datos->find($id);
      //var_dump($user->nombre);
      //var_dump($pro->genero);
       // This  $data array will be passed to our PDF blade
        $data = [
       'content' =>  $info,
            ];

        $pdf = PDF::loadView('Ofertapdf_view', $data);
        return $pdf->download('reporte_oferta'.$id.'.pdf');
    }

    public function ProfesionalprintPDF($id)
    {
      //echo 'hola';
      //exit();
      $datos= new Profesional;
      $info = $datos->find($id);
      //var_dump($user->nombre);
      //var_dump($pro->genero);
       // This  $data array will be passed to our PDF blade
        $data = [
       'content' =>  $info,
            ];

        $pdf = PDF::loadView('Profesionalpdf_view', $data);
        return $pdf->download('reporte_profesional'.$id.'.pdf');
    }

    public function levantamientoprintPDF($id)
    {
      //echo 'hola';
      //exit();
      $datos= new Levantamiento;
      $info = $datos->find($id);
      //var_dump($user->nombre);
      //var_dump($pro->genero);
       // This  $data array will be passed to our PDF blade
        $data = [
       'content' =>  $info,
            ];

        $pdf = PDF::loadView('Levantamientopdf_view', $data);
        return $pdf->download('reporte_levantamiento'.$id.'.pdf');
    }

    public function empresaprintPDF($id)
    {
      //echo 'hola';
      //exit();
      $datos= new Empresa;
      $info = $datos->find($id);
      //var_dump($user->nombre);
      //var_dump($pro->genero);
       // This  $data array will be passed to our PDF blade
        $data = [
       'content' =>  $info,
            ];

        $pdf = PDF::loadView('Empresapdf_view', $data);
        return $pdf->download('reporte_empresa'.$id.'.pdf');
    }

    public function EmpresaofertaprintPDF($id)
    {
      //echo 'hola';
      //exit();
      $datos= new Oferta;
      $info = $datos->find($id);
      //var_dump($user->nombre);
      //var_dump($pro->genero);
       // This  $data array will be passed to our PDF blade
        $data = [
       'xp' =>  $info,
            ];

        $pdf = PDF::loadView('Empresaofertapdf_view', $data);
        return $pdf->download('reporte_empresa_oferta'.$id.'.pdf');
    }

    public function EmpresaofertaopprintPDF($id)
    {
      //echo 'hola';
      //exit();
      $datos= new OfertaOp;
      $info = $datos->find($id);
      //var_dump($user->nombre);
      //var_dump($pro->genero);
       // This  $data array will be passed to our PDF blade
        $data = [
       'xp' =>  $info,
            ];

        $pdf = PDF::loadView('Empresaofertaoppdf_view', $data);
        return $pdf->download('reporte_empresa_oferta_op'.$id.'.pdf');
    }
}
