<?php

namespace App\Http\Controllers;

use App\IpcLeader;
use Illuminate\Http\Request;

class IpcLeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        return view('cms.ipcLeaders', [
          'ipcLeaders' => $this->ipcLeaders(),
        ]);
    }

    /**
     * Return the ipcLeaders as json.
     *
     * @return \Illuminate\Database\Eloquent\Collection  $ipcLeaders
     */
    public function ipcLeaders()
    {
      return IpcLeader::all()
                    ->map(function ($ipcLeader) {
                      return $ipcLeader;
                      // return $this->attachPicture($ipcLeader);
                    });
    }
    
    /**
     * Display the form to add resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create() {
      return view('cms.forms.ipc_leader-form', [
        'breadcrumb_active' => 'Create New IpcLeader',
        'breadcrumb_past' => 'IpcLeaders',
        'breadcrumb_past_url' => route('ipcLeaders.index'), 
      ]);
    }
    
    public function edit(IpcLeader $ipcLeader) {
      // $ipcLeader = $this->attachPicture($ipcLeader);
      
      return view('cms.forms.ipc_leader-form', [
        'breadcrumb_active' => 'Update IpcLeader',
        'breadcrumb_past' => 'IpcLeaders',
        'breadcrumb_past_url' => route('ipcLeaders.index'), 
        'ipcLeader' => $ipcLeader,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, $this->rules(), $this->messages());
      $ipcLeader = IpcLeader::create($request->all());
  		// if ($ipcLeader && $request->hasFile('picture')) {
  		// 	$this->updatePicture($request, $ipcLeader);
  		// }
      return redirect()->route('ipcLeaders.create')
                       ->with('message', 'IpcLeader created successfully');
    }

    /**
     * Get the validation rules
     *
     * @return array
     */
    private function rules(string $id = null) {
      return [
        'first_name'=> 'required', 
        'last_name'=> 'required', 
        'phone_number'=> 'required',
        'device_sn'=> 'nullable', 
        'device_imei'=> 'nullable', 
        'status'=> 'nullable|boolean',
        'description'=> 'nullable',
        'picture' => 'nullable|file|image|max:2048',
      ];
    }

    /**
     * Get the validation messages
     *
     * @return array
     */
    private function messages() {
      return [
        'name.unique' => 'An ipcLeader with same name exists',
      ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IpcLeader  $ipcLeader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, $this->rules($id), $this->messages());
      $ipcLeader = IpcLeader::updateOrCreate(compact('id'), $request->all());
      return $ipcLeader;
      // return $this->attachPicture($ipcLeader);
    }
    
    // public function updatePicture(Request $request, IpcLeader $ipcLeader)
    // {
    //   $this->validate($request, ['picture' => 'nullable|file|image|max:2048',]);
    //   $ipcLeader->clearMediaCollection('program_pictures');
    //   $extension = $request->file('picture')->getClientOriginalExtension();
    //   $fileName = uniqid() . $extension;
    //   $ipcLeader->addMediaFromRequest('picture')
    //           ->usingFileName($fileName)->toMediaCollection('program_pictures');
    //   return $this->attachPicture($ipcLeader)->picture;
    // }
    
    /**
     * Attach Picture to IpcLeader.
     *
     * @return \App\IpcLeader  $ipcLeader
     */
    // private function attachPicture($ipcLeader) {
    // 
    //   if($ipcLeader->hasMedia('program_pictures')) {
    //     $ipcLeader->picture = $ipcLeader->getFirstMediaUrl('program_pictures');
    //   } else {
    //     $ipcLeader->picture = asset('images/programsbanner.png');
    //   }
    //   
    //   return $ipcLeader;
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IpcLeader  $ipcLeader
     * @return boolean
     */
    public function destroy(IpcLeader $ipcLeader)
    {
      $id = $ipcLeader->id;
      $ipcLeader->delete();
      
      return $id;
    }
}
