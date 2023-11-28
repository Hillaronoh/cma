<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class ContactApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try{
            $contacts = Contact::all();
            $response = [
                'success' => true,
                'contacts' => $contacts
            ];
        }catch(Exception $exception){
            $response = [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }catch(Throwable $throwable){
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
    public function store(Request $request): JsonResponse
    {
        try{
            Contact::create($request->all());
            $response = [
                'success' => true,
                'message' => 'Resource created!'
            ];
        }catch (Exception $exception){
            $response = [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }catch(Throwable $throwable){
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
        try{
            $contact = Contact::find($id);
            $contact->update($request->all());
            $response = [
                'success' => true,
                'message' => 'Resource updated!'
            ];
        }catch (Exception $exception){
            $response = [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }catch(Throwable $throwable){
            $response = [
                'success' => false,
                'message' => $throwable->getMessage()
            ];
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $contact= Contact::find($id);
            $contact->delete();
            $response = [
                'success' => true,
                'message' => 'Resource deleted!'
            ];
        }catch (Exception $exception){
            $response = [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }catch(Throwable $throwable){
            $response = [
                'success' => false,
                'message' => $throwable->getMessage()
            ];
        }
        return response()->json($response);
    }
}
