@extends('layouts.note')
@section('title') History @endsection
@section('username') <a href="{{route('notes.profile')}}">@ {{$username}}</a>@endsection
    @section('content')
        

        <div class="HistoyHeader">
            <h2>History ..</h2>
        </div>
            
           <div class="historyBtns">
            <button id="back"><a href="{{route('notes.profile') }}">Back</a></button>
            <form action="{{route('notes.deleteAll')}}" method="post">
              @csrf
                <button class="deleteAll">
                <img src="{{asset('./images/trash (1).png')}}" alt="">
                Delete All
                </button>
            </form>
            
           </div>
           <div class="note-container">
            @if(session('status'))
            <p class="success">All Done Notes Deleted Successfully</p>
            @endif
            @if(session('fail'))
            <p class="fail">{{session('fail')}}</p>
            @endif
            @if(!$notes->isEmpty())
            @foreach($notes as $note)
            <div class="note" id="{{$note->id}}">
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
                      <button id="edit"><a href="{{route('notes.edit',$note->id)}}">Edit</a></button>
                     
                    </div>
                  </div>
      
                  
              </div>
          @endforeach
          
          
          @else
          <p class="nothing">Nothing to Show!</p>
             @endif
              
           </div>
          <script>
             let notes =document.querySelectorAll(".note");
    for(let i=0; i<notes.length ;i++){
        notes[i].addEventListener("click",function(){
        window.location.href=`http://127.0.0.1:8000/show/${notes[i].id}`;
    });
    }

          </script>
      
   @endsection