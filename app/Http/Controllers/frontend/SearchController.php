<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Plan;
use App\Bed;
use App\Bath;
use App\Floor;
use App\Garage;
use App\plansImage;
use App\Floorplans;
use App\CollectionCategory;
use App\Collection;

class SearchController extends Controller
{
  
    public function index()
    {   
        $query = Plan::getFilterplans();
        return view('frontend.filter',compact('query'));
    }

    public function planIndex(Request $r){
        $title='All PLan';

    	$price=request()->get('price');
        $styles=request()->get('styles');
        $features=request()->get('features');
        $this->beds=request()->get('beds');
        $this->baths=request()->get('baths');
        $this->floors=request()->get('floors');
        $this->garages=request()->get('garages');
        $plan_number=request()->get('plans');
        $min_area=request()->get('min_area');
        $max_area=request()->get('max_area');
        $min_width=request()->get('min_width');
        $max_width=request()->get('max_width');
        $min_depth=request()->get('min_depth');
        $max_depth=request()->get('max_depth');
        $sort=request()->get('sort');
    	$plans = Plan::orderby('plans.id','desc')->select('plans.*');

    	if($r->plan !=null){
    		$plans->where('plan_number',$r->plan)
    			->orwhere('title','like','%'.$r->plan.'%');
    	}

    	if($price!=null){
            foreach ($price as $key => $value) {
                 $plans->whereBetween('plans.min_price',[$value,$value+999]);
            }
        }

        if($min_area!=null){
            $plans->where('area','>=',$min_area);
        }
        if($max_area!=null){
            $plans->where('area','<=',$max_area);
        }
        if($min_width!=null){
            $plans->where('width','>=',feetToCM($min_width));
        }
        if($max_width!=null){
            $plans->where('width','<=',feetToCM($max_width));
        }
        if($min_depth!=null){
            $plans->where('depth','>=',feetToCM($min_depth));
        }
        if($max_depth!=null){
            $plans->where('depth','<=',feetToCM($max_depth));
        }

        // multiple search
        if($this->beds!=null){
            foreach ($this->beds as $key => $value) {
                 if($value=='5p'){
                    $plans->where('plans.beds','<=',$value);
                 }else{
                    $plans->where('plans.beds',$value);
                 }
            }
        }
        if($this->baths!=null){
            foreach ($this->baths as $key => $value) {
                 if($value=='4p'){
                    $plans->where('plans.baths','<=',$value);
                 }else{
                    $plans->where('plans.baths',$value);
                 }
            }
        }
        if($this->floors!=null){
            foreach ($this->floors as $key => $value) {
                 if($value=='3p'){
                    $plans->where('plans.floors','<=',$value);
                 }else{
                    $plans->where('plans.floors',$value);
                 }
            }
        }
        if($this->garages!=null){
           foreach ($this->garages as $key => $value) {
                 if($value=='4p'){
                    $plans->where('plans.garages','<=',$value);
                 }else{
                    $plans->where('plans.garages',$value);
                 }
            }
        }
        // multiple search

        $plans->leftJoin('plan_style_tags','plans.id','=','plan_style_tags.plan_id');
        $plans->leftJoin('feature_plans','plans.id','=','feature_plans.plan_id');


        if($styles!=null){
            $plans->whereIn('plan_style_tags.style_tag_id', $styles);
        }

        if($features!=null){
            $plans->whereIn('feature_plans.plan_id', $features);
        }

        // if($features!=null){
        //     $plans->join('feature_plans', function ($join) {
        //                 $join->on('plans.id', '=', 'feature_plans.plan_id');
        //             })->whereIn('feature_plans.feature_id', $features);
        // }

        $plans=$plans->groupby('plans.id')->paginate(21);
        return view('frontend.plan.index',compact('plans','title'));
    }

}
