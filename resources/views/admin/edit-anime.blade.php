<x-admin>

    <h2>Update Anime</h2>
    <form action="{{ route('admin.animes.update') }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Add form fields for updating anime details -->
        <button type="submit">Update Anime</button>
    </form>

</x-admin>