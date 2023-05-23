<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserTypeRequest;
use App\Http\Requests\Admin\UserTypeUpdateRequest;
use App\Http\Resources\Admin\UserTypesResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTypes= UserTypesResource::collection(Role::with('users')->get());
        return Inertia::render('Admin/UserTypes/Index', compact('userTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(UserTypeRequest $request)
    {
        $input = $request->validated();
        Role::create($input);

        return redirect()->route('admin.user-types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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


    public function update(UserTypeUpdateRequest $request, $id)
    {
        Role::findById($id)->update([
            'name'=> request('newname'),
            'guard_name' => request('newguard_name'),
        ]);
        return redirect()->route('admin.user-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role=Role::findById($id);
        $role->delete();
        return redirect()->route('admin.user-types.index');
    }
}
