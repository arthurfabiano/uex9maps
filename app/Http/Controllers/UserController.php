<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Http\Requests\UpdateUserAddressFormRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUserFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $idAddress = $this->model->address()->create($request->all());
        $data['id_address'] = $idAddress['id'];
        $this->model->create($data);

        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        $request->session()->regenerate();
        return redirect()->intended(route('dashboard.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->model->find($id);

        if (!$user)
        {
            return redirect()->route('dashboard.index');
        }

        return view('users.map', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserAddressFormRequest $request, $id)
    {
        if (!$user = $this->model->find($id))
        {
            return redirect()->route('user.show', $id);
        }

        $user                       = $this->model->find($id);
        $arrUser                    = array();
        $arrUser['name']            = $request->name;
        $arrUser['email']           = $request->email;
        $arrUser['phone']           = $request->phone;
        $arrUser['cpf']             = $request->cpf;
        $user->update($arrUser);

        $userAddress                = Address::find($request->id_address);
        $arrAddress                 = array();
        $arrAddress['endereco']     = $request->endereco;
        $arrAddress['number']       = $request->number;
        $arrAddress['complemento']  = $request->complemento;
        $arrAddress['bairro']       = $request->bairro;
        $arrAddress['cidade']       = $request->cidade;
        $arrAddress['estado']       = $request->estado;
        $arrAddress['id']           = $request->id_address;
        $arrAddress['cep']          = $request->cep;
        $userAddress->update($arrAddress);

        return redirect()->route('user.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(Request $request) {
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->back()->with('error', 'Usuário ou senha invalidos!');
        }

        $request->session()->regenerate();
        return redirect()->intended(route('dashboard.index'));
    }

    public function listUsers() {
        return response()->json(
            User::with('address')->get(),
            200
        );
    }

    public function listUsersMap() {
        $user = User::with('address')->get();
        dd($user[0]['address']);

        return view('user.index');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('user.index');
    }

    public function forgotpassword() {
        return view('users.forgotpassword');
    }
}
