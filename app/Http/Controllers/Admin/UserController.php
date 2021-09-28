<?php

namespace App\Http\Controllers\Admin;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use App\Services\Image\ImageInterface;
use Illuminate\Http\Request;
use File;

class UserController extends Controller
{
    protected $imageInterface;

    public function __construct(ImageInterface $imageInterface) {
        $this->imageInterface = $imageInterface;
    }
    public function index()
    {
        $roles = Role::all();
        $users = User::with('image', 'role_users')->get();

        return view('Backend.user.index',compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('Backend.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $imageUrl = '';
        $role = ['role_id' => $request->role, 'status' => 1];

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'

        ]);

        //.. $image = $request->file('image');
        $slug  = Str::slug($request->name);
        if($request->hasFile('image')){

            $imageUrl = $this->imageInterface->uploadSingleImage($request->file('image'));
            
        }
         $user = User::create($request->all());

         $user->role_users()->create($role);
         if (!$imageUrl == '') {
            $user->image()->create(['url' => $imageUrl]);
         }
         return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
        $roles = Role::all();

        return view('Backend.user.create',compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $imageUrl = '';
        $user = User::findOrFail($id);
        $user->update($request->all());
        
        if($request->hasFile('image')){

            $imageUrl = $this->imageInterface->uploadSingleImage($request->file('image'));
            
            if($user->image){
                $this->imageInterface->deleteSingleImage($user->image->url);
                $user->image->delete();
            }
 
        }
        $user->role_users()->updateOrCreate(["user_id" => $id],["role_id" => $request->role]);
        if (!$imageUrl == '') {
            $user->image()->updateOrCreate(['url' => $imageUrl]);
         }
        return redirect()->route('user.index');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        if($user->image){
            $this->imageInterface->deleteSingleImage($user->image->url);
            $user->image->delete();
        }
        
        $user->delete();
        Toastr::Success('User successfully deleted','Success');
        return redirect()->back();
    }
}
