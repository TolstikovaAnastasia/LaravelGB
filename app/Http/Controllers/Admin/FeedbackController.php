<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feedback\CreateRequest;
use App\Models\Feedback;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return \view('admin.feedback.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('admin.feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return JsonResponse
     */
    public function store(CreateRequest $request): JsonResponse
    {
        $validator = Feedback::create($request->validated());

        if ($validator->fails()) {
            \Log::debug($validator->errors()->first());
            return \response()->json(['success'=> false]);
        }

        $data_string = "*********\nUSER: $request->user
                                 \nDESCRIPTION: $request->feedback
                                 \n*******\n";
        $file = file_put_contents('feedback/log_feedback.txt', $data_string, FILE_APPEND);

        return \response()->json(['success'=> true]);
    }
}
