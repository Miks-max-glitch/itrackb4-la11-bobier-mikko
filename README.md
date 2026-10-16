F1 Which column did you make nullable, and why that one and not another?
Answer:
I made `genre` nullable. Every book needs a title, author and year, so those can't be empty. But some books don't really fit Classical, Mystery or Historical, so genre is the one that's okay to leave blank.

F2 Which step failed first for you, and what did the error say?
Answer:
The first thing that failed was my seeder, because I ran it before adding `$fillable` to my `Book` model. The error said I needed to add `title` to the fillable property. Laravel didn't know which columns it was allowed to fill. Once I added `$fillable`, it worked.

F3 You changed no Blade file in Part D, yet your pages still work. Why not?
Answer:
My Blade files only read things like `$book['title']`, and a book from the database can be read the same way. They can't tell if the data came from the JSON file or the database. I also kept the same variable names in the controller, so nothing in the views needed to change.
