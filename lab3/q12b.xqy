count(
  for $b in doc("q12.xml")/book_list/book
  where contains($b/author, "Abiteboul")
  return $b
)
