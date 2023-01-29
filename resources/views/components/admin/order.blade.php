<div class="container">
    <form method="post" action="#">
        @csrf
        <div class="form-group">
            <h1>Order Form</h1>
            <label for="user">User name</label>
            <input type="text" id="user" name="user" class="form-control">
            <br>
            <label for="phone">Phone number</label>
            <input type="number" id="phone" name="phone" class="form-control">
            <br>
            <label for="email">E-mail</label>
            <input type="text" id="email" name="email" class="form-control">
            <br>
            <label for="criteria">Criteria of search</label>
            <input type="text" id="criteria" name="criteria" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@php
    $file = 'userFile.txt';
	$body = 'order.blade.php';
	file_put_contents($file,$body);
@endphp
