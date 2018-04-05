<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Repositories\SettingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\Setting;

class SettingController extends AppBaseController
{
    /** @var  SettingRepository */
    private $settingRepository;

    public function __construct(SettingRepository $settingRepo)
    {
        $this->settingRepository = $settingRepo;
    }

    /**
     * Display a listing of the Setting.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $setting = Setting::first();
        if (is_null($setting)) {
            return view('admin.settings.create');
        }else{
            return view('admin.settings.edit')->with('setting', $setting);
        }
    }

	public function edit_pwd(){
        $user=User::find(1);
        return view('admin.edit_pwd.index')
                ->with('user',$user);
    }

    public function edit_pwd_api($id,Request $request){
        $user=User::find($id);
        $pwd=$request->get('passwords');
        $pwd_re=$request->get('newpassword');
        if($pwd==$pwd_re){
            $user->update(['password'=>Hash::make($pwd)]);
            Flash::success('密码修改成功');

            return redirect('/zcjy');
        }else{
            Flash::error('两次密码输入不一致');
            return redirect(route('settings.edit_pwd'));
        }
    }
	
    public function seo(Request $request)
    {

        $setting = Setting::first();
        if (is_null($setting)) {
            $setting = Setting::create(['site_name' => '网站名称']);
        }
        return view('admin.settings.seo')->with('setting', $setting);
    }

    public function intro(Request $request)
    {

        $setting = Setting::first();
        if (is_null($setting)) {
            $setting = Setting::create(['site_name' => '网站名称']);
        }
        return view('admin.settings.intro')->with('setting', $setting);
    }

    public function contact(Request $request)
    {

        $setting = Setting::first();
        if (is_null($setting)) {
            $setting = Setting::create(['site_name' => '网站名称']);
        }
        return view('admin.settings.contact')->with('setting', $setting);
    }

    public function other(Request $request)
    {

        $setting = Setting::first();
        if (is_null($setting)) {
            $setting = Setting::create(['site_name' => '网站名称']);
        }
        return view('admin.settings.other')->with('setting', $setting);
    }

    public function view(Request $request)
    {

        $setting = Setting::first();
        if (is_null($setting)) {
            $setting = Setting::create(['site_name' => '网站名称']);
        }
        return view('admin.settings.view')->with('setting', $setting);
    }

    public function update($id, Request $request)
    {
        $setting = $this->settingRepository->findWithoutFail($id);

        if (empty($setting)) {
            Flash::error('Site Info not found');

            return redirect()->back();
        }


        $input = $request->all();
        //清除空字符串
        $input = array_filter( $input, function($v, $k) {
            return $v != '';
        }, ARRAY_FILTER_USE_BOTH );

        if (array_key_exists('intro', $input)) {
            $input['intro'] = str_replace("../../../", $request->getSchemeAndHttpHost().'/' ,$input['intro']);
            $input['intro'] = str_replace("../../", $request->getSchemeAndHttpHost().'/' ,$input['intro']);
        }

        $setting = $this->settingRepository->update($input, $id);

        Flash::success('设置更新成功');

        return redirect()->back();
        //return redirect(route('admin.settings.index'));
    }



    public function helper(Request $request)
    {
        return view('admin.helper.index');
    }
    
}
