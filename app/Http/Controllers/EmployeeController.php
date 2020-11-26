<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeeDataTable;
use App\Employee;
use App\Http\Requests\CreateEmployeeRequest;
use App\Photo;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class EmployeeController extends Controller
{

    /**
     * @param EmployeeDataTable $dataTable
     *
     * @return mixed
     */
    public function index(EmployeeDataTable $dataTable)
    {
        return $dataTable->render('admin.employee.index');
    }

    /**
     * @param CreateEmployeeRequest $request
     *
     * @return RedirectResponse
     */
    public function create(CreateEmployeeRequest $request)
    {
        $employee                  = new Employee();
        $employee->full_name       = $request->get('full_name');
        $employee->position_id     = Position::find($request->get('position'))->id;
        $employee->employment_date = $request->get('date_of_employment');
        $employee->phone_number    = $request->get('phone');
        $employee->email           = $request->get('email');
        $employee->salary          = $request->get('salary') * 100;

        if ($request->hasFile('photo')) {
            $path        = $request->file()['photo']->store('assets/images', ['disk' => 'public']);
            $photo       = new Photo();
            $photo->path = $path;
            $photo->save();
            $employee->photo_id = $photo->id;
        }
        $employee->head_id             = Employee::find($request->get('head_'))->id;
        $employee->admin_created_at_id = auth()->user()->id;
        $employee->admin_updated_at_id = auth()->user()->id;

        $employee->save();

        return redirect('employees');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('admin.employee.add')->with(['positions' => Position::all(), 'heads' => Employee::all()]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
