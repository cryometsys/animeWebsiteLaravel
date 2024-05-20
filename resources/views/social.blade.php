<x-layout>

    <section class="user-panel">
        <div class="searchUser">
          <form action="/{{auth()->user()->username}}/search-users" method="GET">
            <input type="text" id="search" placeholder="Search Users" name="userSearch">
            <button type="submit">Search</button>
          </form>
          <ul>
            @if(isset($users))
              @foreach($users as $user)
                <li><a href="{{route('overview', ['user' => $user->username])}}">{{ $user->username }}</a></li>
              @endforeach  
            @endif
        </ul>
        </div>
        <div class="following-list">
          <h3>Following</h3>
          <ul>
            @foreach ($following as $follow)
            <li><a href="/user/{{$follow->userBeingFollowed->username}}/overview">{{$follow->userBeingFollowed->username}}</a></li>
            @endforeach
          </ul>
        </div>
      </section>

</x-layout>