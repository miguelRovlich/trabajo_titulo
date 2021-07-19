<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Mail\OrderSendDetails, App\Mail\OrderSendDetailsAdmin;
use App\Models\User, App\Http\Models\Order;
use Mail, DB, Str, Config, Image;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getOrderEmailDetails($orderid){
    	$order = Order::find($orderid);
    	$data = ['order' => $order];
    	Mail::to($order->getUser->email)->send(new OrderSendDetails($data));
    	foreach($this->getAdminsEmails() as $admin):
    		$data = ['order' => $order, 'name' => $admin->name.' '.$admin->lastname];
    		Mail::to($admin->email)->send(new OrderSendDetailsAdmin($data));
    	endforeach;
    }

    public function getAdminsEmails(){
    	return DB::table('users')->where('role', '1')->get();
    }

    public function getProcessOrder($id){
        $order = Order::find($id);
        $order->o_number = $this->getOrderNumbeGenerate();
        $order->status = '1';
        $order->request_at = date('Y-m-d h:i:s');
        $order->save();
    }

    public function getOrderNumbeGenerate(){
        $orders = Order::where('status', '>', '0')->count();
        $orderNumber = $orders + 1;
        return $orderNumber;
    }

    public function postFileUpload($field, $request, $thumbnails = null){
        $path = date('Y/m/d');
        $original_name = $request->file($field)->getClientOriginalName();
        $final_name = Str::slug($request->file($field)->getClientOriginalName().'_'.time()).'.'.trim($request->file($field)->getClientOriginalExtension());

        if($request->$field->storeAs($path, $final_name, 'uploads')):
            $data = json_encode(['upload' => 'success', 'path' => $path, 'original_name' => $original_name, 'final_name' => $final_name]);
        else:
            $data = ['upload' => 'error'];
        endif;

        if($thumbnails):
            $file_path = Config::get('filesystems.disks.uploads.root').'/'.$path.'/'.$final_name;
            foreach($thumbnails as $thumbnail):
                $img = Image::make($file_path)->orientate();
                $img->fit($thumbnail[0], $thumbnail[1], function($constraint){
                    $constraint->aspectRatio();
                });
                $img->save(Config::get('filesystems.disks.uploads.root').'/'.$path.'/'.$thumbnail[2].'_'.$final_name, 75);
            endforeach;
        endif;

        return $data;
    }

    public function getFileDelete($disk, $file, $thumbnails = null){
        $end_file = json_decode($file, true);
        $file_path = Config::get('filesystems.disks.'.$disk.'.root').'/'.$end_file['path'].'/'.$end_file['final_name'];
        if(file_exists($file_path)):

            unlink($file_path);

            foreach($thumbnails as $thumbnail):
                $thumbnail_path = Config::get('filesystems.disks.'.$disk.'.root').'/'.$end_file['path'].'/'.$thumbnail.'_'.$end_file['final_name'];
                if(file_exists($thumbnail_path)):
                    unlink($thumbnail_path);
                endif;
            endforeach;

        endif;
    }
}
