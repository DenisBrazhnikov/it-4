<div class="container">
    <div class="mb-2">
        <button class="btn btn-secondary btn-sm" wire:click="deleteUsers">
            <i class="fa fa-trash fa-fw mr-1"></i>
            Delete
        </button>

        <button class="btn btn-secondary btn-sm" wire:click="blockUsers(true)">
            <i class="fa fa-user-times fa-fw mr-1"></i>
            Block
        </button>

        <button class="btn btn-secondary btn-sm" wire:click="blockUsers(false)">
            <i class="fa fa-undo fa-fw mr-1"></i>
            Unblock
        </button>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th><input type="checkbox" wire:model="selectAll"></th>
            <th>ID</th>
            <th>Name</th>
            <th>Registered</th>
            <th>Last login</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>
                    <span wire:click="toggleUser({{ $user->id }})">
                        <input type="checkbox"
                            {{ (in_array($user->id, $selectedUserIds) || $selectAll) ? 'checked' : '' }}>
                    </span>
                </td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->last_login_at ? $user->last_login_at : '-' }}</td>
                <td>{{ $user->blocked_at ? 'Blocked' : 'Active' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
