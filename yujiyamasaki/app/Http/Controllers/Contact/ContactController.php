<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact\Thanks;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{

    private $formItems = ['contact_name', 'contact_email', 'contact_detail'];

    public function show()
    {
        return view('contact.create');
    }

    public function post(ContactRequest $request)
    {
        $contact_input = $request->only($this->formItems);

        //セッションに書き込む
        $request->session()->put('contact_input', $contact_input);

        unset($request['_token']);

        return redirect()->action('Contact\ContactController@confirm');
    }

    function confirm(Request $request){
		//セッションから値を取り出す
        $contact_input = $request->session()->get('contact_input');
        $param = ['contact_input'=>$contact_input];
		
		//セッションに値が無い時はフォームに戻る
		if(!$contact_input){
			return redirect()->action('Contact\ContactController@show');
		}
		return view('contact.confirm', $param);
	}

    public function send(Request $request)
    {
        $contact_input = $request->session()->get('contact_input');
        //戻るボタンが押された時
        if($request->has('back')){
            return redirect()->action('Contact\ContactController@show')->withInput($contact_input);
        }
        $contact = new Contact();
        $contact->contact_name = $contact_input['contact_name'];
        $contact->contact_email = $contact_input['contact_email'];
        $contact->contact_detail = $contact_input['contact_detail'];
        // unset($request['_token']);
        $contact->save();
        Mail::to($contact->contact_email)->send(new Thanks($contact));
        $request->session()->forget("form_input");
        return redirect('contact/thanks');
    }

    public function complete()
    {
        return view('contact.complete');
    }
}
