<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | {{config('app.name')}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/front/css/login.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
</head>
<body class="bg-dark">
    <div class="row justify-content-center mt-5">
        <h4 class="text-center text-white">Welcome, <br><span>{{$user->name}}</span></h4>
        <div class="col-md-6 mt-5">
            {{-- Error --}}
            @if ($errors->any())
                <div class="row justify-content-center mb-5">
                    <div class="col-md-10">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            {{-- Success Msg --}}
            @if(session()->has('success'))
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="alert alert-success text-center text-sucess">
                            {{ session()->get('success') }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    
                </div>
            </div>
            <form action="{{route('todo.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                        <input type="text" name="toDo" placeholder="Here Add Your Task"  class="bg-dark w-100 text-white-50">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-light" type="submit">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if (count($to_dos))
    <section class = ''>
        <div class="row justify-content-center w-100">
            <div class="col-md-6">
                @foreach($to_dos as $to_do)
                    <div class="row text-white justify-content-center">
                        {{-- <div class="col-md-2"></div> --}}
                        <div class="col-md-5">
                            <li>{{$to_do->task}}</li>
                        </div>
                        <div class="col-md-2">
                            @if (!$to_do->is_complete) 
                                <a href="{{route('is_completed', $to_do->id)}}" class="btn btn-dark"><i class="fa fa-times-rectangle-o"></i></a>
                            @else  
                                <a href="{{route('is_completed', $to_do->id)}}" class="btn btn-dark"><i class="fa fa-check-square-o"></i></a>
                            @endif
                        </div>
                        <div class="col-md-5">
                            <form action="{{route('todo.destroy', $to_do->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-dark"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>  
    </section>
    @else
    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <h3 class="text-white text-center">You have 0 task</h3>
        </div>
    </div>
    @endif
    @if (count($to_dos))
    <div class="row justify-content-center mt-5">
        <div class="col-md-10 mt-5">
            <h3 class="text-white text-center">You have {{count($to_dos)}} pendding task</h3>
        </div>
    </div>
    @endif
</body>
</html>