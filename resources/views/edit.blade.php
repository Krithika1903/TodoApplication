<h1>Edit Todo</h1>
<form action="/update" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $data['id']}}"> 
    <input type="text" name="title" value="{{ $data['title']}}">
    <br>
    <br>
    <input type="text" name="description"  value="{{ $data['description']}}">
    <br>
    <br>
    <input type="date" name="deadline"  value="{{ $data['deadline']}}">
    <button type="submit">UPDATE</button>
</form>