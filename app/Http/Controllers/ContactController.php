<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function main() {
        return view('contact');
     }

     public function postContactAdd(Request $request) {
      $rules = [
         'name' => 'required',
         'email' => 'required',
         'message' => 'required',
      ];
      $messages = [
         'name.required' => 'Se require de un nombre para enviar el mensaje',
         
         'email.required' => 'Se require de un correo electronico para enviar el mensaje',
         'message.required' => 'El mensaje no puede ir vacio.'
      ];
      $validator = Validator::make($request->all(), $rules, $messages);
      if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
      else:
         $c = new Contact;
         $c->name = e($request->input('name'));
         $c->email = e($request->input('email'));
         $c->message = e($request->input('message'));
         if($c->save()):
            return back()->with('message', 'Enviado con éxito.')->with('typealert', 'success');
         endif;
      endif;
     }


     public function postCategoryAdd(Request $request, $module){
      $rules = [
         'name' => 'required',
         'icon' => 'required',
      ];
      $messages = [
         'name.required' => 'Se require de un nombre para la categoria',
         'icon.required' => 'Se require de un icono para la categoria.'
      ];

      $validator = Validator::make($request->all(), $rules, $messages);
      if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
      else:
           /*
           $upload_icon = $this->postFileUpload('icon', $request);
           $icon = json_decode($upload_icon, true);
           if($icon['upload'] == "error"):
               return back()->with('message', 'No se pudo subir el archivo.')->with('typealert', 'danger');
           endif;
           */
         $c = new Category;
         $c->module = $module;
         $c->parent = $request->input('parent');
         $c->name = e($request->input('name'));
         $c->slug = Str::slug($request->input('name'));
         $c->icon = $this->postFileUpload('icon', $request);
         if($c->save()):
            return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success');
         endif;
      endif;
   }


}
