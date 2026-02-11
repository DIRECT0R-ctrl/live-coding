<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Seed Demo — Posts</title>
    <style>
        body{font-family:system-ui;max-width:900px;margin:40px auto;padding:0 16px}
        header{display:flex;gap:12px;align-items:center;justify-content:space-between;margin-bottom:16px}
        a{padding:8px 12px;border:1px solid #ddd;border-radius:10px;background:#fff;text-decoration:none;color:#111}
        .muted{color:#666}
        .card{border:1px solid #eee;border-radius:14px;padding:14px;margin-bottom:12px}
        .title{font-weight:700;margin-bottom:6px}
    </style>
</head>
<body>

<header>
    <div>
        <h2 style="margin:0">Seed Demo — Posts</h2>
        <div class="muted">Each post shows its owner (user_id relation)</div>
    </div>

    <a href="{{ route('seed-demo.users') }}">View Users</a>
</header>

@foreach($posts as $p)
    <div class="card">
        <div class="title">{{ $p->title }}</div>
        <div class="muted">Owner: {{ $p->user?->email ?? '—' }} (user_id={{ $p->user_id }})</div>
        <p style="margin:10px 0 0">{{ \Illuminate\Support\Str::limit($p->body, 180) }}</p>
    </div>
@endforeach

{{ $posts->links() }}

</body>
</html>

