<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <form action="service_router.php?action=edit&id=<?= $service->getId() ?>" method="post" enctype="multipart/form-data" class="p-4 shadow-lg rounded bg-light">
        <h3 class="text-center mb-4">Edit Service</h3>

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($service->getName()) ?>" placeholder="Enter service name" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input type="text" name="price" id="price" class="form-control" value="<?= htmlspecialchars($service->getPrice()) ?>" placeholder="Enter service price" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category:</label>
            <select name="category" id="category" class="form-select">
                <option value="Haircuts" <?= $service->getCategory() == 'haircut' ? 'selected' : '' ?>>Haircut</option>
                <option value="Hair dye" <?= $service->getCategory() == 'dyeing' ? 'selected' : '' ?>>Dyeing</option>
                <option value="Hairstyles" <?= $service->getCategory() == 'hairstyles' ? 'selected' : '' ?>>Hairstyles</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="duration_minutes" class="form-label">Duration (minutes):</label>
            <input type="text" name="duration_minutes" id="duration_minutes" class="form-control" value="<?= htmlspecialchars($service->getDuration()) ?>" placeholder="Enter duration in minutes" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter service description"><?= htmlspecialchars($service->getDescription()) ?></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="text-center">
            <input type="submit" value="Save Changes" class="btn btn-success">
        </div>
    </form>
</div>
