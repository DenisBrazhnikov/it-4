<div>
    <table class="table">
        <thead>
        <tr>
            <th><input type="checkbox"></th>
            <th>ID</th>
            <th>Name</th>
            <th>Registered</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td><input type="checkbox"></td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->blocked_at ? 'Blocked' : 'Active' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
