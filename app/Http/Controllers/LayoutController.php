<?php


namespace App\Http\Controllers;
use App\Http\Requests\ApartmentRequest;
use App\Http\Requests\EventRequest;
use App\Models\Apartment;
use App\Models\Event;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function getLayout(){
        return view('admin.layout.master-layout');
    }

    public function getForm(){
        return view('admin.demo.form');
    }

    public function processForm(ApartmentRequest $request){
        $name = $request->get('name');
        $apartment =new Apartment($request->all());
        $apartment->save();
        return redirect('/table')->with('success',"Create new Apartment name = $name, Success");
    }

    public function getTable(){
        return view('admin.demo.table',['items'=>Apartment::where('status','!=',-1)->get()]);
    }

    public function getDetail(Request $request){
        $id = $request->get('id');
        return view('admin.demo.detail',['item' =>Apartment::find($id)]);
    }

    public function getEdit(Request $request){
        $id = $request->get('id');
        return view('admin.demo.edit',['item' => Apartment::find($id)] );
    }

    public function processEdit(ApartmentRequest $request){
        $request->request->remove('_token');
        $id = $request->get('id');
        $apartment= Apartment::find($id);
//        $request->request->add([
//            'startDate' => date('Y-m-d',strtotime($request->get('startDate'))),
//            'endDate' => date('Y-m-d',strtotime($request->get('endDate')))
//        ]);
        $apartment->update($request->all());
        return redirect('/table')->with('success',"Update with ID= $id, Success");
    }

    public function getDelete(Request $request){
        $id = $request->get('id');
        $data =[
            'id' =>Apartment::where('id','=',$id)->value('id'),
            'name' =>Apartment::where('id','=',$id)->value('name'),
        ];
        return view('admin.demo.delete',$data);
    }

    public function processDelete(Request $request){
        $id = $request->get('id');
        $event = Apartment::find($id);
        $event->delete();
        return redirect('/table')->with('success',"Delete hard with ID= $id, Success");
    }
}
