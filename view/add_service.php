
<link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
  rel="stylesheet"
/>

<form action="service_router.php?action=add" method="post" enctype="multipart/form-data" class="container mt-5 p-4 border rounded shadow">
  <h2 class="mb-4">Add Service</h2>


  <div class="mb-3">
    <label for="name" class="form-label">Name:</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter service name">
  </div>

  <div class="mb-3">
    <label for="price" class="form-label">Price:</label>
    <input type="text" class="form-control" id="price" name="price" placeholder="Enter price">
  </div>

  <div class="mb-3">
    <label for="category" class="form-label">Category:</label>
    <select class="form-select" id="category" name="category">
      <option value="Haircuts">Haircut</option>
      <option value="Hair dye">Hair dye</option>
      <option value="Hairstyles">Hairstyles</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="duration" class="form-label">Duration (minutes):</label>
    <input type="text" class="form-control" id="duration" name="duration_minutes" placeholder="Enter duration in minutes">
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Description:</label>
    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter service description"></textarea>
  </div>

  <div class="mb-3">
    <label for="image" class="form-label">Image:</label>
    <input type="file" class="form-control" id="image" name="image">
  </div>

  <button type="submit" class="btn btn-primary w-100">Add Service</button>
</form>




