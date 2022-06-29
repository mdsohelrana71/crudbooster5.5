<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use App\StyleTag;
use App\Collection;
use App\Plan;
use App\PlanImage;
use App\FeatureCategory;
use DB;
use Illuminate\Support\Str;
class FrontendController extends Controller
{
     public function index()
     {
          $sliders=Slider::all();
     	 return view('frontend.home',compact('sliders'));
     }

     public function browseStyle()
     {
     	return view('frontend.browse-style');
     }
     public function homeResource()
     {
     	 return view('frontend.home-resource');
     }

     public function builder()
     {
     	return view('frontend.builder');
     }

     public function testimonial()
     {
     	return view("frontend.testimonial");
     }
     public function whyBuy()
     {
     	 return view('frontend.why-buy');
     }

     public function style()
     {
          $styles=StyleTag::all();
           return view('frontend.styles',compact('styles'));
     }


     public function gallery($id)
     {
          $query=PlanImage::orderby('id','desc');
               if(!empty($id)){
                    $query->where('collection_id',$id);
               }
               $galleries=$query->get();
           return view('frontend.gallery',compact('galleries'));
     }

     public function galleryDetails($id)
     {
          $plan_image=PlanImage::with('collection')->find($id);
          $title=$plan_image->collection->name.' Gallery';
           return view('frontend.gellary_details',compact('plan_image','title','styles'));
     }

     public function styleDetails($id)
     {
          $style=StyleTag::with('plans')->find($id);
          $styles=StyleTag::all();
          $title=$style->name.' Style';
           return view('frontend.style_details',compact('style','title','styles'));
     }

     public function planDetails($id)
     {
          $plan=Plan::with('planImages','options')->find($id);
          $feature_cats=FeatureCategory::all();
          $similar_plans=Plan::where([
               'floors'=>$plan->floors,
               'garages'=>$plan->garages,
          ])
          ->where('id','!=',$plan->id)
          ->get();
           return view('frontend.plan_details',compact('plan','similar_plans','feature_cats'));
     }

     public function contact()
     {
           return view('frontend.contact');
     }

     public function saveContactMessage(Request $request)
     {
        $request->validate([

           'username' => 'required',
           'email' => 'required',
           'phone' => 'required',
           'city' => 'required',
           'state' => 'required',
           'message' => 'required',

        ]);


       if( $request->file ) {
      
          $fileName = "contact-" . time() . '.' . request()->file->getClientOriginalExtension();
          $request->file->storeAs('uploads', $fileName);
      
        }

        DB::table('contacts')->insert([

          'username' => $request->username,
          'email' => $request->email,
          'phone' => $request->phone, 
          'city' => $request->city,
          'state' => $request->state,
          'plan_code' => $request->plan_code,
          'file' => $fileName, 
          'message' => $request->message
         
       ]);

       return redirect()->back()->with('message', 'Your message was sent successfully!');

     }


     public function architectureDesign(){

      return view('frontend.architecture_design');

     }
}
