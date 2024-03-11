<form method="post" action="createContent.php">
      <div class="mb-3">
            <label for="heading" class="form-label">Main Heading</label>
            <input value="" type="text" name="mainHeading" class="form-control">
      </div>
      <div class="mb-3">
            <label for="heading" class="form-label">Heading</label>
            <input type="text" name="heading" required class="form-control">
      </div>
      <div class="mb-3">
            <label for="heading" class="form-label">Description</label>
            <textarea class="form-control" name="description" required rows="3"></textarea>
      </div>
      <div class="mb-3">
            <label for="heading" class="form-label">Note</label>
            <textarea class="form-control" name="note" rows="3"></textarea>
      </div>
      <div class="mb-3">
            <label for="heading" class="form-label">Types</label>
            <textarea class="form-control" name="type" rows="3"></textarea>
      </div>
      <div class="mb-3">
            <label for="heading" class="form-label">Methods</label>
            <textarea class="form-control" name="method" rows="3"></textarea>
      </div>
      <div class="mb-3">
            <label for="heading" class="form-label">Example</label>
            <textarea class="form-control" name="example" rows="3"></textarea>
      </div>
      <div class="mb-3">
            <select class="form-select" name="publish" aria-label="Default select example">
                  <option value=true>Publish</option>
                  <option value=false>Unpublish</option>
            </select>
      </div>
      <button type="submit" class="btn btn-primary bg-info border-info text-light">Save</button>
</form>