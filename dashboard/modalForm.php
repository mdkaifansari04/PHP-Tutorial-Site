<form method="post" action="edit.php">
      <input id="id" name="id" hidden>
      <div class="mb-3">
            <label for="heading" class="form-label">Main Heading</label>
            <input id="mainHeading" type="text" name="mainHeading" class="form-control">
      </div>
      <div class="mb-3">
            <label for="heading" class="form-label">Heading</label>
            <input id="heading" type="text" name="heading" required class="form-control">
      </div>
      <div class="mb-3">
            <label for="heading" class="form-label">Description</label>
            <textarea id="description" class="form-control" name="description" required rows="3"></textarea>
      </div>
      <div class="mb-3">
            <label for="heading" class="form-label">Note</label>
            <textarea id="note" class="form-control" name="note" rows="3"></textarea>
      </div>
      <div class="mb-3">
            <label for="heading" class="form-label">Types</label>
            <textarea id="type" class="form-control" name="type" rows="3"></textarea>
      </div>
      <div class="mb-3">
            <label for="heading" class="form-label">Methods</label>
            <textarea id="methods" class="form-control" name="method" rows="3"></textarea>
      </div>
      <div class="mb-3">
            <label for="heading" class="form-label">Example</label>
            <textarea id="example" class="form-control" name="example" rows="3"></textarea>
      </div>
      <div class="mb-3">
            <select class="form-select" name="publish" aria-label="Default select example">
                  <option value="true">Publish</option>
                  <option value="false">Unpublish</option>
            </select>
      </div>
      <button type="submit" class="btn btn-info text-light">Save</button>
</form>