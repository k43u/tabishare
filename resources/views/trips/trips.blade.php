<div class="grid">
@foreach ($trips as $trip)
 <div class="l-wrapper_01">
   <article class="card_01">
      <div class="card__header_01">
         <p class="card__title_01">{{$trip->title}}</p>
      </div>
      <figure class="card__thumbnail_01">
        <img src="css/text_ryokou.png" alt="サムネイル" class="card__image_01">
      </figure>
       <div class="card__footer_01">
         <p class="card__text_01"> {!! link_to_route('trips.show', 'この旅の詳細を見る', ['trip' => $trip->id], ['class' => "button_01 -compact"]) !!}
         @if (Auth::id() == $trip->user_id)
          <p class="card__text_01"> {!! link_to_route('trips.edit', '編集する', ['trip' => $trip->id], ['class' => "button_01 -compact"]) !!}
         @endif
       </div>
 </div>  
@endforeach
</div>

