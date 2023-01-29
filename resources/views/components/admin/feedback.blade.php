<div class="container">
    <form method="post" action="#">
        @csrf
        <div class="form-group">
            <h1>Feedback</h1>
            <label for="user">User</label>
            <input type="text" id="user" name="user" class="form-control">
            <br>
            <label for="comment">Comment</label>
            <input type="text" id="comment" name="comment" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-success">Send</button>
    </form>
</div>
@php
    $file = 'userFile.txt';
	$feedback = 'order.blade.php';
	file_put_contents($file,$feedback);
@endphp
