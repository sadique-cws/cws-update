<?php

namespace App\Http\Controllers;

use App\Models\Placement;
use Illuminate\Http\Request;

class PlacementController extends Controller
{
    public function placements(){
        $data['placements'] = Placement::all();
        return view('admin.placements',$data);
    }

    public function destroy($id){
        echo "";
    }

    public function add(){
        return view('admin.add_placement');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);


        $image = time(). "." . $request->image->extension();
        $request->image->move(public_path("images/placement"),$image);

        $placement = new Placement();
        $placement->name = $request->name;
        $placement->role = $request->job_role;
        $placement->company_name = $request->company_name;
        $placement->joining_date = $request->joining_date;
        $placement->job_type = $request->job_type;
        $placement->description = $request->description;
        $placement->image = $image;
        $placement->save();

        toast('Placement has been added!','success');
        return redirect()->back();
    }
}
