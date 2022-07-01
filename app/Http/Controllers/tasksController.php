<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;
use Carbon\Carbon;

class tasksController extends Controller
{
    function __construct()
    {
        $this->middleware('userCheck');
    }
    //
    public function index()
    {
        //
        $userId = auth()->user()->id ;
        $tasks = task::where('addedBy',$userId)->get();

        return view('tasks.index', ['tasksData' => $tasks]);
    }

    public function create()
    {

        return   view('tasks.create');
    }

    public function store(Request $request)
    {
        $userId = auth()->user()->id ;
        $taskData = $this->validate($request, [
            'title'       => 'required|string',
            'content'     => 'required|min:50',
            'image'       => 'required|file|image|mimes:png,jpg,jpeg,gif',
            'startDate'   =>  'required|date',
            'endDate'     =>  'required|date',
        ]);

        $title = $request->title."<br>";
        $content = $request->content."<br>";
        $image = $request->file('image');
        $newImageName = md5(rand(0,100000)).'.'.$image->getClientOriginalExtension();
        $image->move(public_path("images/tasks"),$newImageName);
        $taskData['image'] =$newImageName;
        $taskData['addedBy'] = $userId;

        $op =  task :: create($taskData);

        if($op){
            $message = "Blog Created Successfully";
            session()->flash('Message-success',$message);
        }else{
            $message = "Blog Not Created";
            session()->flash('Message-error',$message);

        }

        return redirect(url('Tasks/Create'));

    }

    public function delete(Request $request)
    {
        // code . . .
        $userId = auth()->user()->id ;
        $date = date('Y-m-d',Carbon::now()->timestamp);

        # Fetch User Data . . .
        $task = task::find($request->id);
        $endDate =$task['endDate'];
        if($endDate < $date)
        {
            $op =   task::where('id', $request->id)->where('addedBy',$userId)->delete();
            if ($op) {

                # Remove image . . .
                unlink(public_path('images/tasks/' . $task->image));

                $message = "Task Removed Successfully";
                session()->flash('Message-success', $message);
            } else {
                $message = "Task Not Removed";
                session()->flash('Message-error', $message);
            }
        }
        else
        {
            $message = "Task Not Removed The End Date Is Expired";
            session()->flash('Message-error', $message);
        }



        return redirect(url('Tasks'));
    }

}
