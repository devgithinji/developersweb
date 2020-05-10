<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Icon;
use App\Service;
use App\ServicePrice;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ServicesController extends Controller
{


    /**
     * ServicesController constructor.
     */
    public function __construct()
    {

        $this->middleware('auth:employee');
    }

    public function index()
    {
        $page_name = 'Services List';


        $services = Service::all();

        return view('backend.services.list', compact('page_name', 'services'));

    }

    public function create()
    {

        $page_name = 'Services Create';

        $icons = Icon::all();

        return view('backend.services.create', compact('page_name','icons'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'description' => 'required|string|max:200',
            'image' => 'mimes:jpeg,jpg,png,gif|required'
        ]);

        $service = new Service();
        if ($request->hasFile('image')){
            $random_no = rand(9999, 9999999);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $small_image = 'small_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;
            $large_image = 'large_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;


            Image::make($file)->resize(100, 100)->save(public_path('serviceImages/' . $small_image));
            Image::make($file)->resize(485, 303)->save(public_path('serviceImages/' . $large_image));

            $service->small_photo = $small_image;
            $service->large_photo = $large_image;
        }
        $service->name = $request->name;
        $service->icon = $request->icon;
        $service->status = 0;
        $service->description = $request->description;

        $service->save();
        $notification=array(
            'message'=>'Service saved successfully',
            'alert-type'=>'success'
        );

        return redirect()->to(route('services.list'))->with($notification);
    }

    public function edit($id){

        $page_name = 'Services Edit';
        $service  = Service::find($id);
        $icons = Icon::all();
        return view('backend.services.edit',compact('service','icons','page_name'));

    }

    public function update(Request $request,$id){
       $this->validate($request,[
           'name' => 'required|string',
           'description' => 'required|string|max:200',
           'image' => 'mimes:jpeg,jpg,png,gif'
       ]);

        $service  = Service::find($id);
        if ($request->hasFile('image')){
            $random_no = rand(9999, 9999999);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $small_image = 'small_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;
            $large_image = 'large_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;

            if ($service->small_photo != null && $service->large_photo != null){
                unlink(public_path('serviceImages/' . $service->small_photo));
                unlink(public_path('serviceImages/' . $service->large_photo));
            }


            Image::make($file)->resize(100, 100)->save(public_path('serviceImages/' . $small_image));
            Image::make($file)->resize(485, 303)->save(public_path('serviceImages/' . $large_image));

            $service->small_photo = $small_image;
            $service->large_photo = $large_image;
        }
        $service->name = $request->name;
        $service->icon = $request->icon;
        $service->description = $request->description;
        $service->save();

        $notification=array(
            'message'=>'Service updated successfully',
            'alert-type'=>'success'
        );

        return redirect()->to(route('services.list'))->with($notification);

    }

    public function statusUpdate($id,$status){

        $service = Service::find($id);
        $service->status = $status;

        $service->save();

        $notification=array(
            'message'=>'Service status updated successfully',
            'alert-type'=>'success'
        );

        return redirect()->to(route('services.list'))->with($notification);

    }

    public function delete($id){
        $service = Service::find($id);
        $service->delete();

        $notification=array(
            'message'=>'Service deleted successfully',
            'alert-type'=>'success'
        );

        return redirect()->to(route('services.list'))->with($notification);
    }

    public function servicePricingList(){
        $prices = ServicePrice::all();

        return view('backend.services.pricing_list',compact('prices'));
    }

    public function servicePricingCreate(){

        return view('backend.services.pricing_create');
    }

    public function servicePricingStore(Request $request){

        $this->validate($request,[
            'name' => 'required|string',
            'price' => 'required|numeric',
            'desc1' => 'required|string|max:30',
            'desc2' => 'required|string|max:30',
            'desc3' => 'required|string|max:30',
        ]);

        $pricing = new ServicePrice();
        $pricing->name = $request->name;
        $pricing->price = $request->price;
        $pricing->desc1 = $request->desc1;
        $pricing->desc2 = $request->desc2;
        $pricing->desc3 = $request->desc3;
        $pricing->save();

        $notification = array(
            'message' => 'Service Created successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('prices.list'))->with($notification);

    }

    public function servicePricingEdit($id){

        $price = ServicePrice::find($id);

        return view('backend.services.pricing_edit',compact('price'));
    }


    public function servicePricingUpdate(Request $request,$id){

        $this->validate($request,[
            'name' => 'required|string',
            'price' => 'required|numeric',
            'desc1' => 'required|string|max:30',
            'desc2' => 'required|string|max:30',
            'desc3' => 'required|string|max:30',
        ]);

        $pricing = ServicePrice::find($id);
        $pricing->name = $request->name;
        $pricing->price = $request->price;
        $pricing->desc1 = $request->desc1;
        $pricing->desc2 = $request->desc2;
        $pricing->desc3 = $request->desc3;
        $pricing->save();

        $notification = array(
            'message' => 'Service updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('prices.list'))->with($notification);

    }

    public function servicePricingDelete($id){
        $pricing = ServicePrice::find($id);

        $pricing->delete();

        $notification = array(
            'message' => 'Service deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('prices.list'))->with($notification);

    }
}
