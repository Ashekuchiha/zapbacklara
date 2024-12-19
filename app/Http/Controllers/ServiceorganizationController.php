<?php

namespace App\Http\Controllers;

use App\Models\Serviceorganization;
use Illuminate\Http\Request;

class ServiceorganizationController extends Controller
{



    //all
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10); // Default to 10 items per page
        $serviceOrganizations = Serviceorganization::paginate($perPage);

        return response()->json([
            'success' => true,
            'message' => 'Service organizations retrieved successfully.',
            'data' => $serviceOrganizations,
        ], 200);
    }

    //by id
    public function show($id)
    {
        $serviceOrganization = Serviceorganization::find($id);

        if (!$serviceOrganization) {
            return response()->json([
                'success' => false,
                'message' => 'Service organization not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Service organization retrieved successfully.',
            'data' => $serviceOrganization,
        ], 200);
    }

    //new

    // public function store(Request $request)
    // {
        
    //     $validated = $request->validate([
    //         'organizationName' => 'required|string|max:255',
    //         'ownerName' => 'required|string|max:255',
    //         'state' => 'required|string|max:255',
    //         'city' => 'required|string|max:255',
    //         'address' => 'required|string|max:255',
    //         'mapSelection' => 'required|array|min:2',
    //         'organizationBio' => 'required|string',
    //         'organizationDescription' => 'required|string',
    //         'organizationWebsite' => 'nullable|url',
    //         'phoneNumber' => 'required|string|max:20',
    //         'emergencyPhoneNumber' => 'required|string|max:20',
    //         'employeeNumbers' => 'required|string|max:10',
    //         'organizationLogo' => 'nullable|file|mimes:jpg,jpeg,png',
    //         'organizationBanner' => 'nullable|file|mimes:jpg,jpeg,png',
    //         'tradeLicense' => 'nullable|file|mimes:pdf',
    //         'organizationDocuments' => 'nullable|file|mimes:pdf',
    //         'featured' => 'required|boolean',
    //     ]);

    //     $data = $validated;

    //     // Handle file uploads
    //     if ($request->hasFile('organizationLogo')) {
    //         $data['organizationLogo'] = $request->file('organizationLogo')->store('organization_logos', 'public');
    //     }

    //     if ($request->hasFile('organizationBanner')) {
    //         $data['organizationBanner'] = $request->file('organizationBanner')->store('organization_banners', 'public');
    //     }

    //     if ($request->hasFile('tradeLicense')) {
    //         $data['tradeLicense'] = $request->file('tradeLicense')->store('trade_licenses', 'public');
    //     }

    //     if ($request->hasFile('organizationDocuments')) {
    //         $data['organizationDocuments'] = $request->file('organizationDocuments')->store('organization_documents', 'public');
    //     }

    //     // Save to database
    //     $serviceorganization = Serviceorganization::create($data);

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Service organization created successfully.',
    //         'data' => $serviceorganization
    //     ], 201);
    // }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'organizationName' => 'required|string|max:255',
            'ownerName' => 'required|string|max:255',
            'state' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'address' => 'required|string',
            'mapSelection' => 'nullable|json',
            'organizationBio' => 'nullable|string',
            'organizationDescription' => 'nullable|string',
            'organizationWebsite' => 'nullable|url',
            'phoneNumber' => 'required|string',
            'emergencyPhoneNumber' => 'nullable|string',
            'employeeNumbers' => 'nullable|integer',
            'organizationLogo' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
            'organizationBanner' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
            'tradeLicense' => 'nullable|file|mimes:pdf|max:10240',
            'organizationDocuments.*' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:2048',
            'featured' => 'required|boolean',
        ]);

        // Handle file uploads
        if ($request->hasFile('organizationLogo')) {
            $validatedData['organizationLogo'] = $request->file('organizationLogo')->store('logos', 'public');
        }

        if ($request->hasFile('organizationBanner')) {
            $validatedData['organizationBanner'] = $request->file('organizationBanner')->store('banners', 'public');
        }

        if ($request->hasFile('tradeLicense')) {
            $validatedData['tradeLicense'] = $request->file('tradeLicense')->store('licenses', 'public');
        }

        if ($request->hasFile('organizationDocuments')) {
            $documents = [];
            foreach ($request->file('organizationDocuments') as $file) {
                $documents[] = $file->store('documents', 'public');
            }
            $validatedData['organizationDocuments'] = json_encode($documents);
        }

        // Save to database
        $serviceOrganization = ServiceOrganization::create($validatedData);

        return response()->json([
            'success' => true,
            'data' => $serviceOrganization,
        ], 201);
    }

    //update
    public function update(Request $request, $id)
    {
        $serviceOrganization = Serviceorganization::find($id);

        if (!$serviceOrganization) {
            return response()->json([
                'success' => false,
                'message' => 'Service organization not found.',
            ], 404);
        }

        $validated = $request->validate([
            'organizationName' => 'nullable|string|max:255',
            'ownerName' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'mapSelection' => 'nullable|array|min:2',
            'organizationBio' => 'nullable|string',
            'organizationDescription' => 'nullable|string',
            'organizationWebsite' => 'nullable|url',
            'phoneNumber' => 'nullable|string|max:20',
            'emergencyPhoneNumber' => 'nullable|string|max:20',
            'employeeNumbers' => 'nullable|string|max:10',
            'organizationLogo' => 'nullable|file|mimes:jpg,jpeg,png',
            'organizationBanner' => 'nullable|file|mimes:jpg,jpeg,png',
            'tradeLicense' => 'nullable|file|mimes:pdf',
            'organizationDocuments' => 'nullable|file|mimes:pdf',
            'featured' => 'nullable|boolean',
        ]);

        $data = $validated;

        // Handle file uploads
        if ($request->hasFile('organizationLogo')) {
            $data['organizationLogo'] = $request->file('organizationLogo')->store('organization_logos', 'public');
        }

        if ($request->hasFile('organizationBanner')) {
            $data['organizationBanner'] = $request->file('organizationBanner')->store('organization_banners', 'public');
        }

        if ($request->hasFile('tradeLicense')) {
            $data['tradeLicense'] = $request->file('tradeLicense')->store('trade_licenses', 'public');
        }

        if ($request->hasFile('organizationDocuments')) {
            $data['organizationDocuments'] = $request->file('organizationDocuments')->store('organization_documents', 'public');
        }

        $serviceOrganization->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Service organization updated successfully.',
            'data' => $serviceOrganization,
        ], 200);
    }

    //delet
    public function destroy($id)
    {
        $serviceOrganization = Serviceorganization::find($id);

        if (!$serviceOrganization) {
            return response()->json([
                'success' => false,
                'message' => 'Service organization not found.',
            ], 404);
        }

        $serviceOrganization->delete();

        return response()->json([
            'success' => true,
            'message' => 'Service organization deleted successfully.',
        ], 200);
    }
}
