<x-admin>

    <h2>All Admins</h2>

    <table>
        <thead>
            <tr>
                <th>Admin Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->username }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <form action="{{ route('admin.delete.admin', $admin->username) }}" method="POST">
                            @csrf
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-admin>

