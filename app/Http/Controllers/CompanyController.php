<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use RahulHaque\Filepond\Facades\Filepond;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//
        return view('companies.index', [
            'companies' =>  Company::latest()->filter(request(['search']))->paginate(10)
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCompanyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $data = $request->validated();
        if ($request->has('logo')) {
            Filepond::field($request->logo)
                ->validate(['logo' => 'required|image|max:2000|dimensions:min_width=100,min_height=100']);
            $ext = Filepond::field($request->logo)->getModel();
            $filename = 'logo-' . now()->timestamp ;
           Filepond::field($request->logo)
                ->moveTo('logos/' . $filename);
           $data['logo'] = $filename . '.' . $ext['extension'];
        }

        $company = Company::create($data);
        return redirect(route('companies.show', $company));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $employees = $company->employees()->paginate(5);
        return view('companies.show', ['company' => $company, 'employees' => $employees]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCompanyRequest $request
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $oldImage = storage_path('app/public/logos/' . $company->logo);
        $data = $request->validated();

        if ($request->has('logo')) {
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }
            Filepond::field($request->logo)
                ->validate(['logo' => 'required|image|max:2000|dimensions:min_width=100,min_height=100']);
            $ext = Filepond::field($request->logo)->getModel();
            $filename = 'logo-' . now()->timestamp ;
            Filepond::field($request->logo)
                ->moveTo('logos/' . $filename);
            $data['logo'] = $filename . '.' . $ext['extension'];
        }
        $company->update($data);
        return redirect(route('companies.show', $company));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $Image = storage_path('app/public/') . $company->logo;
        if (File::exists($Image)) {
            File::delete($Image);
        }
        $company->delete();
        return back();
    }
}
