<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\{Student,Country,State,City};
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
        $this->middleware('auth');
    }

    public function index()
    {   
        // $student = Student::where("students.is_deleted", 0)
        $student = Student::where("students.is_deleted", 0)
            ->leftJoin('countries','countries.id','=','students.country')
            ->leftJoin('states','states.id','=','students.state')
            ->leftJoin('cities','cities.id','=','students.city')
            ->select('students.*','countries.name as countryName','states.name as stateName','cities.name as cityName')
            ->paginate(13);
        return view('Student.index', compact('student'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $countries = Country::select('name','id')->orderBy('name')->get();
        $state = State::select('name','id')->orderBy('name')->get();
        $city = City::select('name','id')->orderBy('name')->get();
        $student = Student::find($id);
        return view('student.edit', compact('student','countries','state','city'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::select('name','id')->orderBy('name')->get();
        return view('Student.create',compact('countries'));
    }

    public function fetchState(Request $request)
    {
        $data = State::where("country_id",$request->country_id)->select('name', 'id')->orderBy('name')->get();
        return response()->json($data);
    }
    
    public function fetchCity(Request $request)
    {
        $data = City::where("state_id",$request->state_id)->select('name','id')->orderBy('name')->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = new Student();
        $data->name = $request->name;
        $data->country = $request->country;
        $data->state = $request->state;
        $data->city = $request->city;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->password = Hash::make($request->password);
        if($data->save()){
            return redirect()->route('students.index')->with('completed', 'Employee has been saved!');
        }else{
            return redirect()->route('students.create')->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $data =  Student::find($id);
        $data->name = $request->name;
        $data->country = $request->country_id;
        $data->state = $request->state_id;
        $data->city = $request->city_id;
        $data->email = $request->email;
        $data->phone = $request->phone;
        if($data->save()){
            return redirect()->route('students.index')->with('completed', 'Employee has been saved!');
        }else{
            return redirect()->route('students.edit')->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $student = Student::findOrFail($id);
        $student->is_deleted = 1;
        $student->update();
        return redirect('/students')->with('completed', 'Student has been deleted');
    }
}
