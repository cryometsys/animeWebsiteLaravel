<x-admin>

    <h2>View Animes</h2>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Synopsis</th>
                <th>Genre</th>
                <th>Airing Season</th>
                <th>Episodes</th>
                <th>Duration</th>
                <th>Airing Date</th>
                <th>Ending Date</th>
                <th>Status</th>
                <th>Studio</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($animes as $anime)
                <tr>
                    <td>{{ $anime->title }}</td>
                    <td>{{ $anime->synopsis }}</td>
                    <td>{{ implode(' | ', $animesWithGenres[$anime->anime_id] ?? []) }}</td>
                    <td>{{ $anime->airing_season }} {{$anime->airing_year}}</td>
                    <td>{{ $anime->episodes }}</td>
                    <td>{{ $anime->animeDuration }} minutes</td>
                    <td>{{ $anime->airing_date }}</td>
                    <td>{{ $anime->ending_date }}</td>
                    <td>{{ $anime->status }}</td>
                    <td>{{ $anime->studio }}</td>
                    <td>{{ $anime->animeCover }}</td>
                    <td>
                        <form action="{{ route('admin.animes.destroy', $anime->title) }}" method="POST">
                            @csrf
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-admin>