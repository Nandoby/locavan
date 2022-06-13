@foreach(range(1,5) as $i)
    <span class="fa-stack" style="width:1em">
                                    @if ($rating < $i)
            <i class="far fa-star fa-stack-1x text-amber-500"></i>
        @else
            <i class="fas fa-star fa-stack-1x text-amber-500"></i>
        @endif
                                </span>
@endforeach
