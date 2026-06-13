<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Requirement;
use App\Services\UnlockService;

class UnlockController extends Controller
{
    private UnlockService $unlockService;

    public function __construct(UnlockService $unlockService)
    {
        $this->unlockService = $unlockService;
    }

    /**
     * Unlock a requirement's contact
     */
    public function unlockContact(Request $request, int $requirementId): JsonResponse
    {
        $requirement = Requirement::with('user')->findOrFail($requirementId);
        
        try {
            $result = $this->unlockService->unlockContact($request->user(), $requirement);
            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
