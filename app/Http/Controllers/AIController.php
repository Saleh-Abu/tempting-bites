<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cake;

class AIController extends Controller
{
   public function index(Request $request)
{
    return view('ai.chat',[
        'question'=>$request->question
    ]);
}
    public function ask(Request $request)
    {
        $request->validate([
            'message' => 'required|string' // validate msg
        ]);

        $message = strtolower($request->message);

        $query = Cake::query();

        // Search by flavour
        if (str_contains($message, 'chocolate')) {
            $query->where('flavour', 'LIKE', '%chocolate%');
        }

        if (str_contains($message, 'vanilla')) {
            $query->where('flavour', 'LIKE', '%vanilla%');
        }

        if (str_contains($message, 'red velvet')) {
            $query->where('flavour', 'LIKE', '%red velvet%');
        }

        // Eggless
        if (str_contains($message, 'eggless')) {
            $query->where('egg_type', 'Eggless');
        }

        // Featured
        if (str_contains($message, 'featured')) {
            $query->where('is_featured', 1);
        }

        // Budget
        if (preg_match('/under\s+(\d+)/', $message, $match)) {
            $query->where('price', '<=', $match[1]);
        }

        // Weight
        if (preg_match('/(\d+)\s*kg/', $message, $match)) {
            $query->where('weight', 'LIKE', '%' . $match[1] . '%');
        }

        // Cheapest
        if (str_contains($message, 'cheap') || str_contains($message, 'cheapest')) {
            $query->orderBy('price');
        }

        $cakes = $query->take(5)->get();

        if ($cakes->isEmpty()) {
            return response()->json([
                'answer' => "Sorry, I couldn't find a matching cake."
            ]);
        }

        $reply = "🍰 I found these cakes:\n\n";

        foreach ($cakes as $cake) {

            $reply .= "• {$cake->name}\n";
            $reply .= "Price: ₹{$cake->price}\n";
            $reply .= "Flavour: {$cake->flavour}\n";
            $reply .= "Weight: {$cake->weight}\n";
            $reply .= "Egg Type: {$cake->egg_type}\n";

            if ($cake->stock > 0) {
                $reply .= "Stock: Available\n";
            } else {
                $reply .= "Stock: Out of Stock\n";
            }

            $reply .= "\n";
        }

        return response()->json([
            'answer' => $reply
        ]);
    }
}