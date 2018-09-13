@extends('front-end.master')
@section('main_content')


<!-- custom html -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="span4">
                <div class="profile-img">
                   <img style="" src="data:image/jpeg;base64,{{ $person->persion_picture }}" class="img-responsive" alt=""/>
                </div>
                <!-- Profile Image -->
            </div>
            <div class="span8">
                <div class="name-wrapper">
                    <h1 class="name">{{ $person->name }}</h1>
                    <span>{{ $person->email }}</span>
                </div>
                <p>
                    Hi ! I am {{ $person->name }} , Tnask you for visit my profile
                    
                    
                </p>

                <div class="row">
                    <div class="span2">
                        <div class="personal-details">
                            <strong>{{$person->date_of_birth }}</strong>
                            <small>BIRTH</small>
                        </div>
                    </div>
                    <div class="span2">
                        <div class="personal-details">
                            <strong>{{$person->gender==1 ? 'Male' : 'Femail'}}</strong>
                            <small>Gender</small>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="personal-details">
                            <strong>ENGLISH <span>(NATIVE)</span>, FRENCH <span>(INTERMEDIATE)</span></strong>
                            <small>LANGUAGE</small>
                        </div>
                    </div>
                </div>

                <ul class="social-icon">
                    <form action="{{route('like-person')}}" method="post" id="demo-form2" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="request_person_id" id='response_id' value="{{Auth::user()->id}}">
                      <input type="hidden" name="response_id" id='response_id' value="{{$person->id}}">

                      
                     @if($check_like==null)

                        <li><input type="submit" class="btn btn-info" title="like" value="Like"/></li>
                        @elseif($check_like==1) 
                        <li><input type="button" disabled="" class="btn btn-dark" value="You Already Liked"/></li>
                        @elseif($check_like==2) 
                          <li><input type="button" disabled="" class="btn btn-dark" value="Friend"/></li>
                        @endif             
                    </form>

                    <form action="{{route('dislike-person')}}" method="post" id="demo-form2" enctype="multipart/form-data">
                    {{csrf_field()}}

     
                      @if($check_like==null)
                    <li><input type="submit" class="btn btn-info" value="Dislike"/></li>
                    @endif
                    
                    </form>
                    
                </ul>

            </div>
        </div>
    </div>
</header>

<script>
var like=document.getElementById('like');
like.onclick=function(){
   var like_id=document.getElementById('person_id').value;
   // alert(like_id);
   var xmlHTTP=new XMLHttpRequest();
   var serverPage='http://localhost:8484/soulmateLaravel/public/ajax-like-person/'+like_id
    
    xmlHTTP.open('GET',serverPage);
  
    xmlHTTP.onreadystatechange=function(){
        alert(xmlHTTP.readyState);
        if(xmlHTTP.readyState == 4 && xmlHTTP.status == 200){
              
          var dd=  document.getElementById('res').innerHTML=xmlHTTP.responseText;
        
        }
    }      
    xmlHTTP.send(null);
}

</script>

@endsection