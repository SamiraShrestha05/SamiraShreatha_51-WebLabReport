for $b in doc("q12.xml")/book_list/book
order by $b/price
return $b/title
