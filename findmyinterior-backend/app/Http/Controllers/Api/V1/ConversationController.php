<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Conversation;
use App\Models\Requirement;
use App\Models\ContactUnlock;
use App\Models\Bid;
use Illuminate\Support\Facades\DB;

class ConversationController extends Controller
{
    /**
     * List user's active conversations.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        
        $conversations = Conversation::with(['conversationable', 'customer', 'vendor'])
            ->where('customer_id', $user->id)
            ->orWhere('vendor_id', $user->id)
            ->orderByDesc('last_message_at')
            ->paginate(15);
            
        return response()->json($conversations);
    }

    /**
     * Initiate a conversation attached to a requirement.
     */
    public function store(Request $request, $requirementId)
    {
        $user = $request->user();
        $requirement = Requirement::findOrFail($requirementId);
        
        // Determine roles
        $customerId = $requirement->user_id;
        $vendorId = null;
        
        if ($user->id === $customerId) {
            $request->validate(['vendor_id' => 'required|exists:users,id']);
            $vendorId = $request->vendor_id;
        } else {
            $vendorId = $user->id;
        }
        
        // Authorization: Customer <-> Bidder OR Unlocked Vendor only
        $isUnlocked = ContactUnlock::where('requirement_id', $requirementId)
            ->where('user_id', $vendorId)
            ->exists();
            
        $isBidder = Bid::where('requirement_id', $requirementId)
            ->where('professional_id', $vendorId)
            ->exists();
            
        if (!$isUnlocked && !$isBidder) {
            return response()->json(['message' => 'Unauthorized to message. Vendor must bid or unlock first.'], 403);
        }
        
        // Create or get existing conversation
        $conversation = Conversation::firstOrCreate(
            [
                'conversationable_type' => Requirement::class,
                'conversationable_id' => $requirementId,
                'customer_id' => $customerId,
                'vendor_id' => $vendorId,
            ],
            [
                'status' => 'active',
                'project_stage' => 'initiated',
                'unlocked_at' => $isUnlocked ? now() : null,
            ]
        );
        
        return response()->json($conversation->load(['customer', 'vendor']), 201);
    }
}
