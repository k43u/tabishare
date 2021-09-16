<div class="grid">
@foreach ($trips as $trip)
 <div class="box1">
      <div class="card__header_01">
         <h4>{{$trip->title}}</h4>
      </div>
      <figure class="card__thumbnail_01">
        <?php $trip_image = $trip->images()->first(); ?>
        @if ($trip_image == null)
         <img src="css/text_ryokou.png" alt="サムネイル" class="box__image_01">
        @else
         <img src="{{ $trip_image->image_url }}" class="box__image_01">
        @endif
      </figure>
       <div class="card__footer_01">
         <p class="box__text_01"> {!! link_to_route('trips.show', 'この旅の詳細を見る', ['trip' => $trip->id], ['class' => "btn-border-bottom"]) !!}</p>
         
        @if(Auth::check())
         @if (Auth::id() == $trip->user_id)
          <div class="card__text_02"> {!! link_to_route('trips.edit', '編集する', ['trip' => $trip->id], ['class' => "btn-border-bottom"]) !!}</div>
         @endif
          @if (Auth::user()->is_favoriting($trip->id))
             {{-- unfavoriteボタンのフォーム --}}
               {!! Form::open(['route' => ['favorites.unfavorite', $trip->id], 'method' => 'delete']) !!}
               {!! Form::submit('お気に入りを外す', ['class' => "btn-sticky"]) !!}
               {!! Form::close() !!}
          @else
              {{-- favoriteボタンのフォーム --}}
              {!! Form::open(['route' => ['favorites.favorite', $trip->id]]) !!}
              {!! Form::submit('お気に入り', ['class' => "btn-sticky"]) !!}
              {!! Form::close() !!}
         @endif
        @endif
       </div>
 </div>  
@endforeach
</div>
{{ $trips->links() }}
