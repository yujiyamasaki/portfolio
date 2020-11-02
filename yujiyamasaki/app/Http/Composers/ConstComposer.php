<?php
namespace App\Http\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ConstComposer
{
    public function compose(View $view)
    {
        $categories_web = config('const.CATEGORIES_WEB');
        $id = Auth::id();

        $params = [
            'categories_web'=>$categories_web,
            'id'=>$id,
        ];
        $view->with($params);
    }
}
?>