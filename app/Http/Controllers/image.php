<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\ajax;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
class image extends Controller
{

        public function show(){
                 return view('list');
 }
          public function ImageUpload(Request $req)
         {
                  $imagecount=ajax::count('id');
                  $images= DB::table('photos')->take(5)->select('image','id')->latest('created_at')->get();
                  return response()->json([
                        'images'=>$images,
                        'imagecounter'=>$imagecount,
                  ]);
       }
                  public function ImageUploadlimit(Request $req,$page)
                  {
                            $imagecount=ajax::count('id');
                            $skipdata=$page*5;
                            $images= DB::table('photos')->select('image','id')->offset($skipdata)->orderby('created_at','desc')->take(5)->get();
                             return response()->json([
                            'images'=>$images,
                            'imagecounter'=>$imagecount,
                          ]);
                     }

                 public function ImageUploadPost(Request $request)
                   {
                         $validator = Validator::make($request->all(),[
                             'name' => 'required',
                             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                          ]);

                         if ($validator->passes()){

                                 $input['image'] ='images/'.time().'.'.$request->image->extension();
                                 $data = ['name' => $request->name,'image'=>$input['image']];
                                 ajax::create($data);
                                 $image=ajax::get();

                                $lastID= DB::table('photos')
                                 ->orderBy('id', 'desc')
                                 ->first();

                                  $inputpublic['image'] =time().'.'.$request->image->extension();
                                  $request->image->move(public_path('images'),$inputpublic['image']);
                                 return response()->json([
                                   'success' => 'Image Upload Successfully',
                                   'class_name'  =>'alert-success'
                               ]);
                            }

                                 return response()->json(['error'=>$validator->errors()->all()]);
                      }
                }

