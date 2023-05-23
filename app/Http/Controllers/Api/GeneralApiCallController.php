<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserRoleApiResorce;
use App\Models\Collage;
use App\Models\Department;
use Illuminate\Http\Request;

class GeneralApiCallController extends Controller
{

    public function department(Request $request)
    {
        $collageID= request('collage_id');
        $departmentsInCollage = UserRoleApiResorce::collection(Department::where('collage_id', $collageID)->get());

        return $departmentsInCollage;

    }


    public function store(Request $request)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
