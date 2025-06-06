<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
  <xsl:template match="/">
    <html>
      <body>
        <h2> My CD Collection</h2>
        <table border="1">
          <tr>
            <th>Title</th>
            <th>Artist</th>
            <th>Country</th>
          </tr>
          <xsl:for-each select="catalog/cd [artist='Bob Dylan']">
          <tr>
            <td><xsl:value-of select="title"/></td>
            <td><xsl:value-of select="artist"/></td>
            <td><xsl:value-of select="country"/></td>
          </tr>
          </xsl:for-each>
        </table>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
