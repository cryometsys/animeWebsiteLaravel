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
            <a href="#" class="active"><li>Anime List</li></a>
            <a href="{{route('favorites', ['user' => $username])}}"><li>Favorites</li></a>
        </ul>
    </section>

    <div id="profileContent">
        <div class="myAnimeList">

            <div class="animeOperation">
                <input type="text" placeholder="Filter" class="inputFilter" name="filter">
                <p>Lists</p>
                <a href="#" class="gridLink active"><li>All</li></a>
                <a href="anime watching.html" class="gridLink"><li>Watching</li></a>
                <a href="#" class="gridLink"><li>Completed</li></a>
                <a href="#" class="gridLink"><li>Planning</li></a>
            </div>
        
            <div class="myAnime watching">
                <h2>Watching</h2>
                <div class="image-container">
                    <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx1-CXtrrkMpJ8Zq.png" alt="">
                    <a href="#" class="image-name">Anime Name</a>
                    <span class="episode-number">12</span>
                </div>
                <div class="image-container">
                    <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx1-CXtrrkMpJ8Zq.png" alt="">
                    <a href="#" class="image-name">Anime Name with lots of text and a big name like huge big</a>
                    <span class="episode-number">144</span>
                </div>
                <div class="image-container">
                    <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx1-CXtrrkMpJ8Zq.png" alt="">
                    <a href="#" class="image-name">Anime Name</a>
                    <span class="episode-number">70</span>
                </div>
                <div class="image-container">
                    <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx1-CXtrrkMpJ8Zq.png" alt="">
                    <a href="#" class="image-name">Anime Name</a>
                    <span class="episode-number">1</span>
                </div>    
            </div>
            
            <div class="myAnime completed">
                <h2>Completed</h2>
                <div class="image-container">
                    <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx1-CXtrrkMpJ8Zq.png" alt="">
                    <a href="#" class="image-name">Anime Name</a>
                    <span class="episode-number">11</span>
                </div>
                <div class="image-container">
                    <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx1-CXtrrkMpJ8Zq.png" alt="">
                    <a href="#" class="image-name">Anime Name</a>
                    <span class="episode-number">24</span>
                </div>
                <div class="image-container">
                    <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx1-CXtrrkMpJ8Zq.png" alt="">
                    <a href="#" class="image-name">Anime Name</a>
                    <span class="episode-number">36</span>
                </div>
                    
            </div>
            
            <div class="myAnime planning">
                <h2>Planning</h2>
                <div class="image-container">
                    <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx1-CXtrrkMpJ8Zq.png" alt="">
                    <a href="#" class="image-name">Anime Name</a>
                    <span class="episode-number">36</span>
                </div>
                    
            </div>
            
        </div>
    
    </div>

</x-layout>