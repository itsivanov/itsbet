<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App;
use Auth;
use Redirect;
use App\Models\Menu;

/**
 *
 */
class TestController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


  function __construct()
  {
    # code...
  }

  public function index(Menu $menuModel)
  {
//      App::setLocale($locale);
      if (!Auth::check()){
          return Redirect::to( (string)'login' );
      }
      $userName = Auth::user()->name;
      $menu = $menuModel->getMenus();

    return view('admin.index', ['menu'=> $menu, 'userName' => $userName]);
  }

  public function location()
  {
      return view('home');
  }

  public function homePage($locale)
  {
//      App::setLocale($locale);
      return view('index');
  }
}
