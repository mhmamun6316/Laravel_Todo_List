
<button type="button" class="btn mx-2"><a class="text-decoration-none"><i onclick="event.preventDefault();document.getElementById('form-complete-{{$todo->id}}').submit()" class="text-dark fas fa-check"></i></a> </button> 
  <form id="{{'form-complete-'.$todo->id}}" action="{{route('todo.complete',$todo->id)}}" style="displaye:none;" method="post">
  @csrf
  </form>