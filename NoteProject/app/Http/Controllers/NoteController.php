<?php
namespace App\Http\Controllers;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

 date_default_timezone_set("Africa/cairo");


class NoteController extends Controller
{
    public function welcome(){
        return view('index');
    }
    public function dashboard(){
        
        $now=date_create("now");
       
        $records=Note::where('user_id',auth()->user()->id)->get()->reverse();
        
        // this function for classes
        $classesFromDB= Note::select('class')->where('user_id',auth()->user()->id)->where('status',"")->get();
        // dd($classesFromDB);
        $classes=[];
        foreach($classesFromDB as $class){
            if($class->class != null && !in_array($class->class , $classes)){
                array_push($classes,$class->class);
            }
        
        }
     
        // dd($classes);
          
            $username =auth()->user()->name;
      
        return view('notes.dashboard',['notes'=>$records,'classes'=>$classes,'username'=>$username]);
    }
    public function create(){
         
        return view('notes.create',['username'=>auth()->user()->name]);
    }
    public function store(Request $request){
        // dd(auth()->user()->id);
       
       $request->validate([
        'title'=>['required','min:3'],
       ]);
      

       Note::create([
        'title'=>$request->title,
        'body'=>$request->description,
        'deadLine'=>$request->date." ".$request->time,
        'class'=>$request->class,
        'user_id'=>auth()->user()->id,
        'status'=>'',
        
       
       ]);

       return to_route('notes.dashboard');

    }
    public function show($id){
        $note= Note::where('id',$id)->first();
       
        return view('notes.show',['note'=>$note,'username'=>auth()->user()->name]);
    }
    public function edit($id){
        $note= Note::where('id',$id)->first();
        return view('notes.edit',['note'=>$note,'username'=>auth()->user()->name]);
    }
    public function update($id){
        $note=Note::Find($id);
        $note->update([
            'title'=>request()->title,
            'body'=>request()->description,
            'deadLine'=>request()->date." ".request()->time,
            'class'=>request()->class,
        ]);
        return to_route('notes.show',$id);
    }
    public function delete($id){
        $post=Note::Find($id)->delete();
        return redirect()->back();
    }
    public function changePass(){

        $username =auth()->user()->name;
        return view('notes.changePass',['user'=>$username]);
    }
    public function UpdatePass(Request $request){
        validator(request()->all(),[
            'oldPass'=>['required'],
            'password'=>['required', 'min:8','confirmed']
           ])->validate();
           
   
            if(Hash::check($request->oldPass,auth()->user()->getAuthPassword())){
               auth()->user()->update([
                    'password'=>Hash::make($request->password),
                ]);
                
                return to_route('notes.profile')->with('success','User regirtered successfully!');
            }else{
                return redirect()->back()->withErrors(['oldPass'=>'Wrong Password!']);
            }
    
    }

    public function profile(){
        $username =auth()->user();
        return view('notes.profile',['user'=>$username]);
    }
    public function done($id){
        $note =Note::find($id);
        $note->update([
            'status'=>'done',
        ]);
        return to_route('notes.dashboard');
    }
    public function history(){
        $notes =Note::where('status','done')->get();
       
        return view('notes.history',['notes'=>$notes,'username'=>auth()->user()->name]);
    }
    public function deleteAll(){
        if(!Note::where('status','done')->get()->isEmpty()){
             Note::where('status','done')->delete();
        return redirect()->route('notes.deleteAll')->with('status', 'All done notes deleted successfully!');

        }
        return redirect()->route('notes.deleteAll')->with('fail', 'Nothing to delete!');
       
    }
}
