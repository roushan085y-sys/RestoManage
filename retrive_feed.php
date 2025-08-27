        <?php
      include 'db.php';
      $result = $connection->query("SELECT * FROM feedback");
      ?>

         <?php while ($row = $result->fetch_assoc()) { ?>
        <!-- <img src="https://images.unsplash.com/photo-1553621042-f6e147245754?q=80&w=1200&auto=format&fit=crop" class="w-full h-48 object-cover rounded-xl mb-4 group-hover:scale-105 transition-transform duration-500" alt="Sushi"> -->
        <h3 class="text-xl font-semibold"><?= $row['id'] ?></h3>
        <p class="text-gray-600 dark:text-gray-300 mb-4"><?= $row['rating'] ?></p>
        <div class="flex items-center justify-between">
          <span class="text-lg font-bold text-red-600"><?= $row['message'] ?></span>
          <span class="text-lg font-bold text-red-600"><?= $row['created_at'] ?></span>
        
        </div>
        <?php } ?>