<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Update Post</title>
</head>
<body>
   <div class="container mt-5">
        <div class="row">
            <div class="col-8 bg-primary text-white mb-4">
                <h1>Update Posts</h1>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-8">
                {{-- @dd($post) --}}
            <form action="{{route('post.update',$post->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Title</label>
                  <input type="text" class="form-control" value="{{$post->title}}" id="title" name="title" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                  <textarea class="form-control" id="description"  name="description" rows="2">{{$post->description}}</textarea>
                </div>
                <input type="submit" class="btn btn-primary"/>
                <a href="{{route('dashboard')}}" class="btn btn-secondary">Back</a>
                <a href="{{route('dashboard')}}" class="btn btn-secondary">Back</a>
              </form>
            </div>
        </div>
   </div>
   <!-- Latest compiled and minified JavaScript -->
   {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
   <script>
        var addForm = document.querySelector("#addForm");
        addForm.onsubmit = async (e) => {
            e.preventDefault();
            const token = localStorage.getItem('api_token');
            const title = document.querySelector("#title").value;
            const description = document.querySelector("#description").value;
            const image = document.querySelector("#image").files[0];
            // console.log(token);
            var formData = new FormData();
                formData.append('title',title);
                formData.append('description',description);
                formData.append('image',image);
                // console.log(...formData);
            let response = await fetch('/api/posts',{
                                method:'POST',
                                body: formData,
                                headers:{
                                    'Authorization': `Bearer ${token}`
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                window.location.href = "/allposts";
                            });

        }
   </script>
</body>
</html>