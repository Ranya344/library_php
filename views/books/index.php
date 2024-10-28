<h2>Book List</h2>
<ul>
    <?php foreach ($books as $book): ?>
        <li>
            <h3><?php echo htmlspecialchars($book['title']); ?></h3>
            <p>Author: <?php echo htmlspecialchars($book['author']); ?></p>
            <p>Category: <?php echo htmlspecialchars($book['category']); ?></p>
            <p>Publication Year: <?php echo htmlspecialchars($book['publication_year']); ?></p>
            <a href="/books/view/<?php echo $book['id']; ?>">View Details</a>
        </li>
    <?php endforeach; ?>
</ul>