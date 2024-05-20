<x-admin>

    <h2>Insert Anime</h2>
    <form action="{{ route('admin.animes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="synopsis">Synopsis:</label>
        <input type="text" id="synopsis" name="synopsis" required>
        <label for="genre">Genres (Format: "Genre Name"/"Genre Name"/"Genre Name"/"Genre Name"):</label>
        <input type="text" id="genre" name="genre" required pattern="^(\w+(\s*\w*)*\/)+\w+(\s*\w*)*$">
        <label for="airing_season">Airing Season:</label>
        <input type="text" id="airing_season" name="airing_season" required>
        <label for="airing_year">Airing Year:</label>
        <input type="text" id="airing_year" name="airing_year" required>
        <label for="airing_date">Airing Date:</label>
        <input type="text" id="airing_date" name="airing_date" required>
        <label for="ending_date">Ending Date:</label>
        <input type="text" id="ending_date" name="ending_date" required>
        <label for="episodes">Episodes:</label>
        <input type="text" id="episodes" name="episodes" required>
        <label for="format">Format:</label>
        <input type="text" id="format" name="format" required>
        <label for="duration">Duration:</label>
        <input type="text" id="duration" name="duration" required>
        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required>
        <label for="studio">Studio:</label>
        <input type="text" id="studio" name="studio" required>
        <label for="animeCover">Anime Cover Photo:</label>
        <input type="file" id="animeCover" name="animeCover">
        <button type="submit">Add Anime</button>
    </form>

</x-admin>