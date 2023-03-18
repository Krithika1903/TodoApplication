<link href="./css/app.css" rel="stylesheet">


<h1 >Add Your Todo List</h1>
<form action="/add" method="POST">
    @csrf
    <input type="text" name="title"  placeholder="Enter the title">
    <p>@error('title'){{$message}}@enderror</p>
    <input type="text" name="description" placeholder="Enter the description">
    <p>@error('description'){{$message}}@enderror</p>
    <input type="date" name="deadline">
    <button type="submit">ADD</button>
   
</form>