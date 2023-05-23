<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EnrollmentRequest;
use App\Http\Requests\Admin\EnrollmentUpdateRequest;
use App\Http\Resources\Admin\EnrollmentResource;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EnrollmentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrollments= EnrollmentResource::collection(Enrollment::all());
        return Inertia::render('Admin/Enrollments/Index', compact('enrollments'));
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


    public function store(EnrollmentRequest $request)
    {
        Enrollment::create($request->validated());
        return redirect()->route('admin.enrollment-types.index');
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


    public function update(EnrollmentUpdateRequest $request, $id)
    {
        Enrollment::find($id)->update($request->validated());
        return redirect()->route('admin.enrollment-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Enrollment::find($id)->delete();
        return redirect()->route('admin.enrollment-types.index');
    }
}
