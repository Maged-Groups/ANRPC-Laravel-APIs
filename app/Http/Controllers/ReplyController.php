<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestoreReplyRequest;
use App\Http\Requests\StoreReplyRequest;
use App\Http\Requests\UpdateReplyRequest;
use App\Models\Reply;
use Illuminate\Support\Facades\Gate;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $replies = Reply::all();

        return $replies;
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
    public function store(StoreReplyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReplyRequest $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reply $reply)
    {

        // Call the delete policy method (MIDDLEWARE)
        Gate::authorize('delete', $reply);

        return $reply->delete();
    }

    /**
     * Show a list of deleted (Soft Deleted) resources from storage.
     */
    public function deleted()
    {
        $deleted_replies = Reply::onlyTrashed()->get();

        return $deleted_replies;
    }

    /**
     * Restore deleted (Soft Deleted) resource
     *
     * @return void
     */
    public function restore(int $id)
    {

        $reply = Reply::onlyTrashed()->where('id', $id)->first();

        if ($reply) {
            $restored = $reply->restore();

            if ($restored) {
                return 'Reply restored successfully';
            } else {
                return 'Reply cannot be restored at the moment!!!';
            }
        } else {
            return 'No replies found with this ID!';
        }
    }

    /**
     * Restore all deleted (Soft Deleted) resources
     *
     * @return void
     */
    public function restore_all()
    {
        $replies = Reply::onlyTrashed()->get();

        foreach ($replies as $reply) {
            $reply->restore();
        }

        $replies = Reply::onlyTrashed()->get();

        if (count($replies) > 0) {
            return 'Some replies did not restored';
        }

        return 'All replies restored successfully';
    }

    /**
     * Restore some resrources
     */
    public function restore_some(RestoreReplyRequest $request)
    {

        $reply_ids = $request->reply_ids;

        $user_id = auth()->user()->id;

        foreach ($reply_ids as $id) {
            $reply = Reply::onlyTrashed()
            ->where('id', $id)
            ->where('user_id', $user_id)
            ->first();

            if ($reply) {
                $reply->restore();
            }
        }

        return 'Task completed successffuly, check your replies.';
    }

    /**
     * * Force delete trashed resource
     *
     * @return string
     */
    public function force_delete(int $id)
    {
        $reply = Reply::onlyTrashed()->where('id', $id)->first();

        if ($reply) {
            $deleted = $reply->forceDelete();

            if ($deleted) {
                return 'Reply deleted successffully';
            }

            return 'Reply did not deleted';
        }

        return 'Reply not found';
    }

    /**
     * Force delete all trashed resources
     *
     * @return string
     */
    public function force_delete_all()
    {
        $replies = Reply::onlyTrashed()->get();

        $replies_count = $replies->count();

        $deleted_counter = 0;

        foreach ($replies as $reply) {
            if ($reply->forceDelete()) {
                $deleted_counter++;
            }
        }

        return "$deleted_counter of $replies_count replies deleted forever!";
    }
}
