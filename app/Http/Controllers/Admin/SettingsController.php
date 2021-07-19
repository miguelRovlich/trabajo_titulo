<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __Construct(){
    	$this->middleware('auth');
        $this->middleware('user.status');
    	$this->middleware('isadmin');
    }

    public function getHome(){
    	return view('admin.settings.settings');
    }

    public function postHome(Request $request){
    	if(!file_exists(config_path().'/cms.php')):
    		fopen(config_path().'/cms.php', 'w');
    	endif;

    	$file = fopen(config_path().'/cms.php', 'w');
    	fwrite($file, '<?php'.PHP_EOL);
    	fwrite($file, 'return ['.PHP_EOL);
    	foreach ($request->except(['_token']) as $key => $value):
    		if(is_null($value)):
    			fwrite($file, '\''.$key.'\' => \'\',' .PHP_EOL);
    		else:
    			fwrite($file, '\''.$key.'\' => \''.$value.'\',' .PHP_EOL);
    		endif;
    	endforeach;
    	fwrite($file, ']'.PHP_EOL);
    	fwrite($file, '?>'.PHP_EOL);
    	fclose($file);

        if($request->input('server_webapp_path') != ""):
            if(file_exists($request->input('server_webapp_path'))):
                copy(config_path().'/cms.php', $request->input('server_webapp_path').'/config/cms.php');
            endif;
        endif;
        

    	return back()->with('message', 'Las configuraciones fueron guardadas con éxito.')->with('typealert', 'success');
    }
}
