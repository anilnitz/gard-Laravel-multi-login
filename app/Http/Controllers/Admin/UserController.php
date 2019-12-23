<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web_admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', [
            'pageTitle' => 'Users',
            'users' => Staff::all(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.users.form', [
            'pageTitle' => 'Create User',
            'user' => new Staff(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(Request $request)
    {
        return $this->doSave($request, new Staff());
    }

    /**
     * @param int $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($userId)
    {
        if ( ! $staff = Staff::find($userId)) {
            abort(404);
        }

        return view('admin.users.form', [
            'pageTitle' => 'Edit User',
            'user' => $staff,
        ]);
    }

    /**
     * @param Request $request
     * @param $userId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(Request $request, $userId)
    {
        if ( ! $staff = Staff::find($userId)) {
            abort(404);
        }

        return $this->doSave($request, $staff);
    }

    /**
     * @param Request $request
     * @param Staff $staff
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function doSave(Request $request, Staff $staff)
    {
        $input = $this->validate($request, $this->rules($staff));

        $staff->name = $input['name'];
        $staff->email = $input['email'];
        if ($input['password']) {
            $staff->password = Hash::make($input['password']);
        }

        $staff->save();

        $request->session()->flash('success', 'Staff user has been saved');

        return redirect()->route('admin.users.edit', ['userId' => $staff->getKey()]);
    }

    /**
     * @param Staff $staff
     * @return array
     */
    protected function rules(Staff $staff)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:staff,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];

        if ($staff->getKey()) {
            $rules['email'] = ['required', 'string', 'email', 'max:255', Rule::unique('staff', 'email')->ignore($staff->getKey())];
            $rules['password'] = ['nullable', 'string', 'min:6', 'confirmed'];
        }

        return $rules;
    }
}
