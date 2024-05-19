<x-layout>

    <div class="profileHeader">
        <div class="profileCoverPhoto">
            <img src="{{$profileCover}}" alt="profileCover" class="profileCover">
            @auth
              @if(!$followStatus && auth()->user()->username !== $username)  
                <form action="/create-follow/{{$username}}" method="POST">
                  @csrf
                  <button type="submit" class="followButton">Follow</button>
                </form>
              @endif
              @if($followStatus)
                <form action="/remove-follow/{{$username}}" method="POST">
                  @csrf
                  <button type="submit" class="followButton remove">Unfollow</button>
                </form>
              @endif
            @endauth
        </div>
        <div id="grad1"></div>
        <div class="profileSection">
            <img src="{{$profilePhoto}}" alt="Profile Picture" class="profileImage">
            <p class="profileName">{{$username}}</p>
        </div>
    </div>

    <section class="profileLinks">
        <ul>
            <a href="{{route('overview', ['user' => $username])}}"><li>Overview</li></a>
            <a href="{{route('animelist', ['user' => $username])}}"><li>Anime List</li></a>
            <a href="#" class="active"><li>Favorites</li></a>
        </ul>
    </section>

    <div id="profileContent">
        <div class="favoriteContainer">
            <div class="imageContainer">
                <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx2246-WHkSkgyuxfgD.jpg" class="favoriteImage">
                <div class="favoriteNameContainer">
                    <p>Anime Name</p>
                </div>
            </div>
            <div class="imageContainer">
                <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx2246-WHkSkgyuxfgD.jpg" class="favoriteImage">
                <div class="favoriteNameContainer">
                    <p>Anime Name</p>
                </div>
            </div>
            <div class="imageContainer">
                <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx2246-WHkSkgyuxfgD.jpg" class="favoriteImage">
                <div class="favoriteNameContainer">
                    <p>Anime Name</p>
                </div>
            </div>
            <div class="imageContainer">
                <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx2246-WHkSkgyuxfgD.jpg" class="favoriteImage">
                <div class="favoriteNameContainer">
                    <p>Anime Name</p>
                </div>
            </div>
            <div class="imageContainer">
                <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx2246-WHkSkgyuxfgD.jpg" class="favoriteImage">
                <div class="favoriteNameContainer">
                    <p>Anime Name</p>
                </div>
            </div>
            <div class="imageContainer">
                <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx2246-WHkSkgyuxfgD.jpg" class="favoriteImage">
                <div class="favoriteNameContainer">
                    <p>Anime Name</p>
                </div>
            </div>
            <div class="imageContainer">
                <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx2246-WHkSkgyuxfgD.jpg" class="favoriteImage">
                <div class="favoriteNameContainer">
                    <p>Anime Name</p>
                </div>
            </div>
            <div class="imageContainer">
                <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx2246-WHkSkgyuxfgD.jpg" class="favoriteImage">
                <div class="favoriteNameContainer">
                    <p>Anime Name</p>
                </div>
            </div>
            <div class="imageContainer">
                <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx2246-WHkSkgyuxfgD.jpg" class="favoriteImage">
                <div class="favoriteNameContainer">
                    <p>Anime Name</p>
                </div>
            </div>
            <div class="imageContainer">
                <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx2246-WHkSkgyuxfgD.jpg" class="favoriteImage">
                <div class="favoriteNameContainer">
                    <p>Anime Name</p>
                </div>
            </div>
            <div class="imageContainer">
                <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx2246-WHkSkgyuxfgD.jpg" class="favoriteImage">
                <div class="favoriteNameContainer">
                    <p>Anime Name</p>
                </div>
            </div>
            <div class="imageContainer">
                <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx2246-WHkSkgyuxfgD.jpg" class="favoriteImage">
                <div class="favoriteNameContainer">
                    <p>Anime Name</p>
                </div>
            </div>
            <div class="imageContainer">
                <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx2246-WHkSkgyuxfgD.jpg" class="favoriteImage">
                <div class="favoriteNameContainer">
                    <p>Anime Name that is really big like humongus amongus</p>
                </div>
            </div>
        </div>
    </div>

</x-layout>