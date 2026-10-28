G1. Route model binding needs two things to be true. Name both, and say what happens when only one of them is.
Answer:
Route model binding only works when I type-hint Book and name the variable $book so it matches {book} in the route. If only one is right, Laravel can’t figure out which book I mean, so I either get no book at all or just a plain id.

G2. Your Delete link gave a 404 even though the address was correct. Explain why.
Answer:
When I clicked my Delete link, it didn’t show a 404 and just opened the book’s detail page, and nothing got deleted. That’s because a link can only send GET, and GET at that address goes to my show page, while deleting needs a DELETE request.

G3. old() takes a second argument on your edit form. What would break if you left it out, and what would break if you used only it?
Answer:
If I leave out the second part of old(), my edit form opens empty because there’s nothing to fill it with. If I use only the second part, the form starts filled in, but whenever I make a mistake and submit, my typing disappears and the old saved values come back.
