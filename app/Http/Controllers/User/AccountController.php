<?php

namespace App\Http\Controllers\User;

use App\{
    Http\Requests\UserRequest,
    Http\Controllers\Controller,
    Repositories\Front\UserRepository
};
use App\Helpers\ImageHelper;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use GuzzleHttp\Client;

class AccountController extends Controller
{

    /**
     * Constructor Method.
     *
     * Setting Authentication
     *
     * @param  \App\Repositories\Back\UserRepository $repository
     *
     */
    public function __construct(UserRepository $repository)
    {
        $this->middleware('auth');
        $this->middleware('localize');
        $this->repository = $repository;
    }

    public function index()
    {
        return view('user.dashboard.dashboard', [
            'allorders' => Order::whereUserId(Auth::user()->id)->count(),
            'pending' => Order::whereUserId(Auth::user()->id)->whereOrderStatus('pending')->count(),
            'progress' => Order::whereUserId(Auth::user()->id)->whereOrderStatus('In Progress')->count(),
            'delivered' => Order::whereUserId(Auth::user()->id)->whereOrderStatus('Delivered')->count(),
            'canceled' => Order::whereUserId(Auth::user()->id)->whereOrderStatus('Canceled')->count()

        ]);
    }


    public function profile()
    {
        $user = Auth::user();
        $check_newsletter = Subscriber::where('email', $user->email)->exists();
        return view('user.dashboard.index', [
            'user' => $user,
            'check_newsletter' => $check_newsletter,
        ]);
    }



    public function profileUpdate(UserRequest $request)
    {
        $this->repository->profileUpdate($request);
        Session::flash('success', __('Profile Updated Successfully.'));
        return redirect()->back();
    }

    public function addresses()
    {
        $user = Auth::user();
        return view('user.dashboard.address', [
            'user' => $user
        ]);
    }

    public function billingSubmit(Request $request)
    {

        $request->validate([
            'bill_address1' => 'required|max:100',
            'bill_address2' => 'nullable|max:100',
            'bill_zip'      => 'nullable|max:100',
            'bill_city'      => 'required|max:100',
            'bill_company'   => 'nullable|max:100',
            'bill_country'   => 'required|max:100',
        ]);
        $user =  Auth::user();
        $input = $request->all();
        $user->update($input);
        Session::flash('success', __('Address update successfully'));
        return back();
    }

    public function shippingSubmit(Request $request)
    {
        $request->validate([
            'ship_address1' => 'required|max:100',
            'ship_address2' => 'nullable|max:100',
            'ship_zip'      => 'nullable|max:100',
            'ship_city'      => 'required|max:100',
            'ship_company'   => 'nullable|max:100',
            'ship_country'   => 'required|max:100',
        ]);
        $user =  Auth::user();
        $input = $request->all();
        $user->update($input);
        Session::flash('success', __('Address update successfully'));
        return back();
    }


    public function shippingSubmitCode(Request $request)
    {

        $client = new Client();

        $code = $request->codezip;

        $response = $client->get('https://api.copomex.com/query/info_cp/'. $code .'?token=pruebas');
        $data = json_decode($response->getBody());
        $zip = [];
        foreach($data as $value){

                $data = [
                    'ciudad' => $value->response->asentamiento,

                ];
                array_push($zip, $data);
        }




        //$response = $client->get('https://api.example.com/data?input=' . $code);


        return response()->json(['code' => 200, 'data' => $zip, 'message' => 'Se ha obtenido la siguiente información.']);
    }


    public function removeAccount()
    {
        $user = User::where('id', Auth::user()->id)->first();
        ImageHelper::handleDeletedImage($user, 'photo', 'assets/images/');
        $user->delete();
        Session::flash('success', __('Your account successfully remove'));
        return redirect(route('front.index'));
    }
}
