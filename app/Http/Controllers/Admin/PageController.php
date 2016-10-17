<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App;
use Auth;
use Illuminate\Http\Request;
use Redirect;
use App\Models\Menu;

/**
 *
 */
class PageController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create(Menu $menuModel, Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if($data['Page']['enabled'] == 'on'){
                $data['Page']['enabled'] = 1;
            }else{
                $data['Page']['enabled'] = 0;
            }
            if(Menu::insert($data['Page'])){
                die('1');
            }else{
                die('2');
            }
        }
//        App::setLocale($locale);
        if (!Auth::check()){
            return Redirect::to( (string)'login' );
        }
        $userName = Auth::user()->name;
        $menu = $menuModel->getMenus();
        $parent = $menuModel->getParentPages();
//        dd($parent);
//        return view('admin.index', ['menu'=> $menu, 'userName' => $userName]);
        return view('admin.pages.create_pages',
            [
                'menu'=> $menu,
                'userName' => $userName,
                'parentPage' => $parent
            ]);
    }
}