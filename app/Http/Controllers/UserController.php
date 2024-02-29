<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Section ;
use app\Convocation;

use app\SalleG;
use app\User;
use app\Pointage;
use Illuminate\Http\Request;

class UserController extends Controller
{

/**
     * Create a new controller instance.
     *
     * @return void
     */
   

 public function yossra() {
     $contacts=\App\Contact::all();
     $pointages=\App\Pointage::all();
   $admins=\App\Admin::all();
    $salle_g_s=\App\SalleG::all();
    $sections=\App\Section::all();
    $a= DB::table('contacts')->count();
    $x= DB::table('pointages')->count();
   
    $users=\App\User::all();
     return view('admin.enseignant',compact('sections','salle_g_s','users','contacts','a','x','pointages'));
 }
public function Ajouterens()
{
     return view('enseignant.ajouter',compact('sections','salle_g_s','users','contacts','a','x','pointages'));

}
 public function AjouterE(Request $request)
   {  
       
      


      $users = new \App\User();
      $users->Fullname=$request['Fullname'];
      $users->email=$request['email'];
      $users->grade=$request['grade'];
      $users->age=$request['age'];
      $users->telephone=$request['telephone'];
      $users->image=$request['image']->store('images');

      $users->password=Hash::make($request['password']);
      
        $users->save();

        $users=\App\User::all();
        return redirect()->route('enseignant',compact('users'))->with('success','le prof a bien été ajouté');
   }
   public function modifierens(Request $request)
   {
   
        $id=$request['id'];
        $users=\App\User::find($id);
        return view('enseignant.modifierprof',compact('users'));
   }
   
   public function modifierE(Request $request)
   {
       
        $id=$request['id'];
        $users=\App\User::find($id);
        $users->Fullname=$request['Fullname'];
        $users->email=$request['email'];
        $users->password=Hash::make($request['password']);
        $users->grade=$request['grade'];
        $users->age=$request['age'];
        $users->telephone=$request['telephone'];
        $users->image=$request['image'];

        
      
        $users->update();
     
        $users=\App\User::all();
        return redirect()->route('enseignant',compact('users'))->with('tak','les information sont bien été modifier');
   
   }
   
public function supprimerens(Request $request)
{
     $id=$request['id'];
     $users=\App\User::find($id);
     return view('enseignant.supprimer',compact('users'));
}

public function supprimerE(Request $request)
{
     $id=$request['id'];
     $users=\App\User::find($id);

     $users->delete();

     $users=\App\User::all();
     return redirect()->route('enseignant',compact('users'))->with('xxx','les informations bien été supprimer');
}

public function profil(){
     return view('education.profiluser.profil');
     
}



public function modifierEnseignant(Request $request)
{
     $id=$request['id'];
     $users=\App\User::find($id);

     return view('education.profiluser.modifier',compact('users'));
}

public function modifierP(Request $request)
{

      $id=$request['id'];
     $users=\App\User::find($id);

     $users->Fullname = $request['Fullname'];
     $users->email=$request['email'];
     $users->password=Hash::make($request['password']);
     $users->grade=$request['grade'];
     $users->age=$request['age'];
     $users->telephone=$request['telephone'];

     if($request->hasFile('newphoto')){
       $users->image=$request->newphoto->store('images');
   }



     $users->update();

     $users=\App\User::all();
     return redirect()->route('profile',compact('users'))->with('vert','Modification avec succés');

   }
   public function index2()
{

     $c=\App\Convocation::all();
     return view ('education.welcome',compact('c'));
}



}
