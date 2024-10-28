<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($book_data['title']) ?> - Library System</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ccd5e1;
            color: #2c3e50;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            padding: 12px 24px;
            background-color: #2c3e50;
            color: white;
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            font-weight: 500;
            margin-bottom: 30px;
        }

        .back-button:hover {
            background-color: #34495e;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(44, 62, 80, 0.2);
        }

        .book-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(44, 62, 80, 0.1);
            overflow: hidden;
            display: flex;
            margin-top: 20px;
        }

        .book-image-container {
            flex: 0 0 400px;
            padding: 30px;
            background-color: #f8fafc;
        }

        .book-image {
            width: 100%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(44, 62, 80, 0.1);
        }

        .book-info {
            flex: 1;
            padding: 35px;
        }

        h1 {
            color: #2c3e50;
            margin: 0 0 15px 0;
            font-size: 2.5em;
            font-weight: 600;
        }

        .author {
            color: #64748b;
            font-size: 1.2em;
            margin-bottom: 30px;
            font-weight: 500;
        }

        .book-details-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .detail-item {
            background-color: #f8fafc;
            padding: 20px;
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .detail-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(44, 62, 80, 0.1);
        }

        .detail-label {
            font-weight: 600;
            color: #64748b;
            margin-bottom: 8px;
            font-size: 0.9em;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .detail-value {
            color: #2c3e50;
            font-size: 1.1em;
            font-weight: 500;
        }

        .description {
            line-height: 1.8;
            color: #475569;
            background-color: #f8fafc;
            padding: 25px;
            border-radius: 15px;
            margin-top: 20px;
        }

        .description-label {
            font-weight: 600;
            color: #64748b;
            margin-bottom: 12px;
            font-size: 0.9em;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .no-image {
            width: 100%;
            height: 500px;
            background-color: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
            font-size: 1.2em;
            border-radius: 15px;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .book-container {
                flex-direction: column;
            }

            .book-image-container {
                flex: none;
                max-width: 100%;
            }

            .book-details-grid {
                grid-template-columns: 1fr;
            }

            .container {
                margin: 20px auto;
            }

            h1 {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="home.php" class="back-button">← Back to Library</a>
        
        <div class="book-container">
            <div class="book-image-container">
                <?php if (!empty($book_data['image'])): ?>
                    <img src="../public/images/<?= htmlspecialchars($book_data['image']) ?>" 
                         alt="<?= htmlspecialchars($book_data['tittle']) ?>" 
                         class="book-image">
                <?php else: ?>
                    <div class="no-image">No Image Available</div>
                <?php endif; ?>
            </div>
            
            <div class="book-info">
                <h1><?= htmlspecialchars($book_data['tittle']) ?></h1>
                <div class="author">by <?= htmlspecialchars($book_data['author']) ?></div>
                
                <div class="book-details-grid">
                    <?php if (!empty($book_data['category'])): ?>
                    <div class="detail-item">
                        <div class="detail-label">Category</div>
                        <div class="detail-value"><?= htmlspecialchars($book_data['category']) ?></div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($book_data['publication_year'])): ?>
                    <div class="detail-item">
                        <div class="detail-label">Publication Year</div>
                        <div class="detail-value"><?= htmlspecialchars($book_data['publication_year']) ?></div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($book_data['isbn'])): ?>
                    <div class="detail-item">
                        <div class="detail-label">ISBN</div>
                        <div class="detail-value"><?= htmlspecialchars($book_data['isbn']) ?></div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($book_data['language'])): ?>
                    <div class="detail-item">
                        <div class="detail-label">Language</div>
                        <div class="detail-value"><?= htmlspecialchars($book_data['language']) ?></div>
                    </div>
                    <?php endif; ?>
                </div>
                
                <?php if (!empty($book_data['description'])): ?>
                <div class="description">
                    <div class="description-label">Description</div>
                    <?= nl2br(htmlspecialchars($book_data['description'])) ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>