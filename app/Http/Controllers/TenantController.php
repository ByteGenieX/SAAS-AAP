<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tenant = Tenant::with('domains')->get();
        // return view('tenant.index',compact('tenant'));
        // return response()->json($tenant);
       
        return view('tenants.index',['data'=>$tenant]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
      
        $validationData = $request->validate([
            'name' => 'required|String|max:255',
            'domain'=> 'required| String|max:255|unique:domains,domain',
            'email' => 'required|email|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

              
        $tenant = Tenant::create($validationData);
        $tenant->domains()->create([
            'domain' => $validationData['domain'].'.'.config('app.domain'),
        ]);
        
        return redirect()->route('tenant.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
