
<form action="/upload" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="image">Upload image</label>
        <input type="file" name="image" id="image">
    </div>

    <button type="submit">Upload</button>
</form>
