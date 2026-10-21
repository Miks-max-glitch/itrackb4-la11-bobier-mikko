1. Which column did you turn into a table, and why that one and not another?

Answer: I turned the genre column into a separate genres table because it avoids repeating genre names in every book record. I chose that column because one genre can belong to many books, so using genre_id makes the data more organized.

2. What number did screenshot 6 show, and why exactly that number?

Screenshot 6 showed 6 queries because one query retrieves all the books, and five more queries fetch the genre of each book. Since I had five books, the total was 1 + 7 = 8 queries.

3. Your belongsTo method is named in the singular. What would break if you made it plural?

If I changed genre() to genres(), Laravel would not recognize with('genre') as the correct relationship name anymore. I would need to update every place that uses the old name; otherwise, the relationship loading would cause an error.