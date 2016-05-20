@foreach($dates as $key=>$date)

    @if($key == 0)

        {!! $dates[1] !!} h |

    @endif

    @if($key == 1)

        {!! $dates[0] !!} min |

    @endif

    @if($key == 2)

        @if($dates[3] == '*')

            Todos Meses |

        @else

            {!! $dates[3] !!} Mes |
         @endif

    @endif


    @if($key == 3)

        @if($dates[2] == '*')

            Todos Dias |
        @else

            {!! $dates[2] !!} Dia |
        @endif

    @endif

    @if($key == 4)

        @if($date == '*')

            Todos os dias da Semana |
        @else

            @if($date == 0)

                Todo Domingo

            @endif

            @if($date == 1)

                Toda Segunda-Feira

            @endif

            @if($date == 2)

                Toda Terça-Feira

            @endif


        @endif

    @endif


@endforeach