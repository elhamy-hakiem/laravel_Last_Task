<?php

namespace App\Http\Controllers\users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;

class userController extends Controller
{
    function __construct()
    {
        $this->middleware('userCheck',['except' => ['create','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $users =  user::get(); // get all Uers
        return view('users.index', ['data' => $users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data =  $this->validate($request, [
            'name'      => "required",
            'email'     => "required|email",
            'password'  => "required|min:6",
            'image'     => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);


        # Hashing the password before saving it to the database
        $data['password']  = bcrypt($data['password']);


        # Uploading the image to the server
        $imageName = time() . uniqid() . '.' . $request->image->extension();

        $request->image->move(public_path('images/users'), $imageName);

        $data['image'] = $imageName;


        $op =  user::create($data);    // insert into users (name,email,passsowrd) values ($data['name'],$data['email'],$data['password'])

        if ($op) {
            $message = "User Created Successfully";
            session()->flash('Message-success', $message);
        } else {
            $message = "User Not Created";
            session()->flash('Message-error', $message);
        }
        return redirect(url('Users/Create'));
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
