<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Seed Demo — Users</title>
    <style>
        body{font-family:system-ui;max-width:900px;margin:40px auto;padding:0 16px}
        header{display:flex;gap:12px;align-items:center;justify-content:space-between;margin-bottom:16px}
        a,button{padding:8px 12px;border:1px solid #ddd;border-radius:10px;background:#fff;text-decoration:none;color:#111;cursor:pointer}
        table{width:100%;border-collapse:collapse}
        th,td{padding:10px;border-bottom:1px solid #eee;text-align:left}
        .muted{color:#666}
        .status{padding:10px;border:1px solid #e6f4ea;background:#f0fff4;border-radius:12px;margin-bottom:14px}
    </style>
</head>
<body>

<header>
    <div>
        <h2 style="margin:0">Seed Demo — Users</h2>
        <div class="muted">Shows what seeders/factories inserted</div>
    </div>

    <div style="display:flex; gap:10px;">
        <a href="{{ route('seed-demo.posts') }}">View Posts</a>

        <form method="POST" action="{{ route('seed-demo.reseed') }}">
            @csrf
            <button type="submit">Reset + Seed (LOCAL)</button>
        </form>
    </div>
</header>

@if(session('status'))
    <div class="status">{{ session('status') }}</div>
@endif

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Posts count</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $u)
        <tr>
            <td>{{ $u->id }}</td>
            <td>{{ $u->name }}</td>
            <td class="muted">{{ $u->email }}</td>
            <td><strong>{{ $u->posts_count }}</strong></td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>

