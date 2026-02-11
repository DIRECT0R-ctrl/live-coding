<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SeedDemoController extends Controller
{
    public function users()
    {
        $users = User::withCount('posts')->orderByDesc('posts_count')->get();
        return view('seed-demo.users', compact('users'));
    }

    public function posts()
    {
        $posts = Post::with('user')->latest()->paginate(20);
        return view('seed-demo.posts', compact('posts'));
    }

    // DEV ONLY: reset + seed from UI (for demo)
    public function reseed()
    {
        abort_unless(app()->environment('local'), 403);

        Artisan::call('migrate:fresh', ['--seed' => true, '--force' => true]);

        return redirect()->route('seed-demo.users')
            ->with('status', 'Database reset + seeded successfully.');
    }
}

