@extends('layouts.note')
@section('title') Home @endsection
@section('username') <a href="{{route('notes.profile')}}">@ {{$username}}</a>@endsection
    @section('content')
        <!-- classes -->
         <div class="filters">
          <div class="FilterText">
             <h6>Filters</h6>
          </div>
         
    
      <div class="classifications">
        <button id="all" class="colored" >All</button>
        <button id="today"  >Today</button>
        <button id="tomorrow"  >Tomorrow</button>
        @if($classes != null) 
        @foreach($classes as $class)
        <button id="{{$class}}">#{{$class}}</button>
      @endforeach
        @endif
      </div>
         </div>
    <!-- create Btn -->
     <div class="addNote">
        <img src="{{asset('./images/note-medical.png')}}" alt="">
        <a href="{{route('notes.create')}}">New Note</a>
     </div>
     
     <!-- note container -->
      <div class="note-container">
        @if ($notes != null)
        @foreach ($notes as $note)
        @if($note->status != "done")
        <div class="note {{$note->class}} @if($note->deadLine != " " && date_diff(date_create($note->deadLine),date_create())->d == 0) today @endif @if($note->deadLine != " " && date_format(date_modify(date_create(),"+1 day"),"m/d/y") == date_format(date_create($note->deadLine),"m/d/y"))tomorrow @endif" id="{{$note->id}} ">
          <div class="noteText">
             <h2>{{$note->title}}</h2>
             <pre>{{$note->body}}</pre>
          </div>
            <div class="delete">
              <form style="display:inline" method="POST" action="{{route('notes.delete',$note->id)}}">
                @csrf
                @method('DELETE')
              <button type="submit"><img src="{{asset('./images/trash (1).png')}}" alt=""></button> 
              </form>
            
            </div>
            @if ($note->deadLine !== " " )
            <div class="deadLine">
              <div>
                <img src="{{asset('./images/clock.png')}}" alt="">
                <h6>DeadLine</h6>
              </div>
            @if(date_diff(date_create($note->deadLine),date_create())->invert == 0)  <pre>Ended</pre>
              @else <pre>{{date_format(date_create($note->deadLine),"m/d/y")}}
{{date_format(date_create($note->deadLine),"g:i a ")}}</pre> @endif
            </div>
            @endif
            <div class="noteFooter">
              <p>#{{$note->class}} <span>|</span></p>

              <div class="note-btns">
                <button id="edit" class=><a href="{{route('notes.edit',$note->id)}}">Edit</a></button>
                
                <form action="{{route('notes.done',$note->id)}}" method="POST">
                  @csrf
                  @method('PUT')
                  <button id="done{{$note->id}}" type="submit" class="doneBtn">Done</button></form>
              </div>
            </div>

            
        </div>
        @endif
        @endforeach
        @endif
      
       
        
      </div>
      <script src="{{asset('./js/note.js')}}"> </script>
      @endsection
