<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\BloodGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BloodGroupController extends BackendBaseController
{
    protected $module = 'BloodGroup';
    protected  $base_view = 'backend.bloodgroup.';
    protected  $base_route = 'backend.bloodgroup.';
    // protected  $file_path = 'images' . DIRECTORY_SEPARATOR . 'backend' . DIRECTORY_SEPARATOR . 'role' . DIRECTORY_SEPARATOR;


    function __construct()
    {
        $this->model = new BloodGroup();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['records'] = $this->model->orderby('created_at', 'desc')->get();
        return view($this->__LoadDataToView($this->base_view . 'index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->__LoadDataToView($this->base_view . 'create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'bg_name' => 'required',
            ]
        );
        try {
            $request->request->add(['created_by' => Auth::user()->id]);
            $record = $this->model->create($request->all());
            if ($record) {
                $request->session()->flash('success', $this->module . ' Created Successfully.');
            } else {
                $request->session()->flash('error', $this->module . ' Creation Failed!!');
            }
        } catch (\Exception $exception) {
            $request->session()->flash('error', 'Error: ' . $exception->getMessage());
        }
        return redirect()->route($this->base_route . 'index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['record'] =  $this->model->find($id);
        if (!$data['record']) {
            request()->session()->flash('error', ' Error: Invalid Request');
            return redirect()->route($this->base_route . 'index');
        }
        return view($this->__LoadDataToView($this->base_view . 'show'), compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['record'] = $this->model->find($id);
        if ($data['record']) {
            return view($this->__LoadDataToView($this->base_view . 'edit'), compact('data'));
        } else {
            request()->session()->flash('error', 'Invalid Request');
            return redirect()->route($this->base_route . 'index');
        }
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
        $data['record'] = $this->model->find($id);
        $request->validate([
            'bg_name' => 'required',
        ]);
        if (!$data['record']) {
            request()->session()->flash('error', 'Error: Invalid Request');
            return redirect()->route($this->base_route . 'index');
        }
        try {
            $request->request->add(['updated_by' => auth()->user()->id]);
            $record = $data['record']->update($request->all());
            if ($record) {
                $request->session()->flash('success', $this->module . ' update success');
            } else {
                $request->session()->flash('error', $this->module . ' update failed');
            }
        } catch (\Exception $exception) {
            $request->session()->flash('error', 'Error: ' . $exception->getMessage());
        }
        return redirect()->route($this->base_route . 'index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request  $request, $id)
    {
        $data['record'] =  $this->model->find($id);
        if (!$data['record']) {
            request()->session()->flash('error', ' Error: Invalid Request');
            return redirect()->route($this->base_route . 'index');
        }
        if ($data['record']->delete()) {
            request()->session()->flash('success', $this->module . " delete success");
            return redirect()->route($this->base_route . 'index');
        } else {
            request()->session()->flash('error', $this->module . " deletion failed");
            return redirect()->route($this->base_route . 'index');
        }
    }
    // to display deleted data
    public function trash()
    {
        $data['records'] =  $this->model->onlyTrashed()->get();
        return view($this->__LoadDataToView($this->base_view . 'trash'), compact('data'));
    }

    // to restore data
    public function restore(Request $request, $id)
    {
        $data['record'] =  $this->model->onlyTrashed()->where('id', $id)->first();
        if (!$data['record']) {
            request()->session()->flash('error', ' Error: Invalid Request');
            return redirect()->route($this->base_route . 'index');
        }
        try {
            if ($data['record']) {
                $data['record']->restore();
                $request->session()->flash('success', $this->module . ' restored successfully!!');
            } else {
                $request->session()->flash('error', $this->module . ' failed to restore records');
            }
        } catch (\Exception $exception) {
            $request->session()->flash('error', 'Error: ' . $exception->getMessage());
        }

        return redirect()->route($this->base_route . 'index');
    }

    //permanent delete from database
    public function permanentDelete($id)
    {
        $data['record'] =  $this->model->onlyTrashed()->where('id', $id)->first();
        if (!$data['record']) {
            request()->session()->flash('error', ' Error: Invalid Request');
            return redirect()->route($this->base_route . 'index');
        }
        if ($data['record']->forceDelete()) {
            request()->session()->flash('success', $this->module . " successfully Deleted");
            return redirect()->route($this->base_route . 'index');
        } else {
            request()->session()->flash('error', $this->module . " error: Delete failed");
            return redirect()->route($this->base_route . 'index');
        }
    }
}
