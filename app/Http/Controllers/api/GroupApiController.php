<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\GroupContact;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class GroupApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $contacts = Group::all();
            $response = [
                'success' => true,
                'groups' => $contacts
            ];
        } catch (Exception $exception) {
            $response = [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        } catch (Throwable $throwable) {
            $response = [
                'success' => false,
                'message' => $throwable->getMessage()
            ];
        }
        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $contacts = $request->contacts;
            $group = new Group();
            $group->name = $request->name;
            $group->description = $request->description;
            $group->save();
            $group_contacts = [];
            foreach ($contacts as $contact_id) {
                $group_contacts[] = [
                    'group_id' => $group->id,
                    'contact_id' => $contact_id
                ];
            }
            GroupContact::insert($group_contacts);
            $response = [
                'success' => true,
                'message' => 'Resource created!'
            ];
        } catch (\Exception $exception) {
            $response = [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        } catch (Throwable $throwable) {
            $response = [
                'success' => false,
                'message' => $throwable->getMessage()
            ];
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
