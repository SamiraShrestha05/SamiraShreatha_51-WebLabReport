for $author in distinct-values(doc("q12.xml")/book_list/book/author)
let $count := count(
  for $b in doc("q12.xml")/book_list/book
  where $b/author = $author
  return $b
)
return 
  <author count="{$count}">{ $author }</author>
